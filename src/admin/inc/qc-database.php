<?php

/**
 * Class QC_database
 * Version: 0.1
 *
 * Init database connection
 */

class QC_database {

    // ID from last insert query
    public $last_insert_id = 0;

    // Database table columns charset & collate
    public $db_charset, $db_collate;

    // Database details
    private $db_user, $db_password, $db_name, $db_host;

    // Database handle
    protected $dbh;

    // Whether connection is successful
    private $has_connected = false;

    /**
     * Connects to the database server and selects a database
     *
     * @param string $db_user        - MySQL database user
     * @param string $db_password    - MySQL database password
     * @param string $db_name        - MySQL database name
     * @param string $db_host        - MySQL database host
     * @param string $db_charset     - MySQL database column charset
     * @param string $db_collate     - MySQL database column collate
     */
    public function __construct($db_user, $db_password, $db_name, $db_host, $db_charset, $db_collate) {
        $this->db_user      = $db_user;
        $this->db_password  = $db_password;
        $this->db_name      = $db_name;
        $this->db_host      = $db_host;
        $this->db_charset   = $db_charset;
        $this->db_collate   = $db_collate;

        $this->db_connect();
    }



    public function db_connect() {
        $this->dbh = mysqli_init();

        if (DEBUG_MODE) {
            $this->dbh->real_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        } else {
            $this->dbh->real_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        }

        if ($this->dbh) {
            $this->has_connected = true;
            return true;
        }
        return false;
    }

    /**
     * Prepares a SQL query for safe execution. Uses sprintf()-like syntax.
     *
     * The following placeholders can be used in the query string:
     *   %d (integer)
     *   %f (float)
     *   %s (string)
     *
     * A corresponding argument MUST be passed for each placeholder.
     *
     * Literal percentage signs (%) in the query string must be written as %%. Percentage wildcards (for example,
     * to use in LIKE syntax) must be passed via a substitution argument containing the complete LIKE string, these
     * cannot be inserted directly in the query string. Also see wpdb::esc_like().
     *
     * Arguments may be passed as individual arguments to the method, or as a single array containing all arguments.
     * A combination of the two is not supported.
     *
     * Examples:
     *     $wpdb->prepare( "SELECT * FROM `table` WHERE `column` = %s AND `field` = %d OR `other_field` LIKE %s",
     *                      array( 'foo', 1337, '%bar' ) );
     *     $wpdb->prepare( "SELECT DATE_FORMAT(`field`, '%%c') FROM `table` WHERE `column` = %s", 'foo' );
     *
     * @link https://secure.php.net/sprintf Description of syntax.
     *
     * @param string      $query    Query statement with sprintf()-like placeholders
     * @param array|mixed $args     The array of variables to substitute into the query's placeholders if being called
     *                              with an array of arguments, or the first variable to substitute into the query's
     *                              placeholders if being called with individual arguments.
     * @return string|void Sanitized query string, if there is a query to prepare.
     */
    public function prepare($query, $args) {
        if (is_null($query)) {
            return;
        }

        // This is not meant to be foolproof -- but it will catch obviously incorrect usage.
        if (strpos($query, '%') === false) {
            sprintf('The query argument of %s must have a placeholder.','QC_database->prepare()');
        }

        $args = func_get_args();
        array_shift($args);

        // If args were passed as an array (as in vsprintf), move them up.
        $passed_as_array = false;
        if (is_array($args[0]) && count($args) == 1) {
            $passed_as_array = true;
            $args            = $args[0];
        }

        foreach ($args as $arg) {
            if (!is_scalar($arg) && !is_null($arg)) {
                sprintf('Unsupported value type (%s).', gettype($arg));
            }
        }

        /*
         * Specify the formatting allowed in a placeholder. The following are allowed:
         *
         * - Sign specifier. eg, $+d
         * - Numbered placeholders. eg, %1$s
         * - Padding specifier, including custom padding characters. eg, %05s, %'#5s
         * - Alignment specifier. eg, %05-s
         * - Precision specifier. eg, %.2f
         */
        $allowed_format = '(?:[1-9][0-9]*[$])?[-+0-9]*(?: |0|\'.)?[-+0-9]*(?:\.[0-9]+)?';

        // Strip any existing single quotes.
        $query = str_replace("'%s'", '%s', $query );

        // Strip any existing double quotes.
        $query = str_replace('"%s"', '%s', $query );

        // Quote the strings, avoiding escaped strings like %%s.
        $query = preg_replace('/(?<!%)%s/', "'%s'", $query );

        // Force floats to be locale unaware.
        $query = preg_replace("/(?<!%)(%($allowed_format)?f)/", '%\\2F', $query );

        // Escape any unescaped percents.
        $query = preg_replace("/%(?:%|$|(?!($allowed_format)?[sdF]))/", '%%\\1', $query );

        // Count the number of valid placeholders in the query.
        $placeholders = preg_match_all( "/(^|[^%]|(%%)+)%($allowed_format)?[sdF]/", $query, $matches );

        if (count($args) !== $placeholders) {
            if (1 === $placeholders && $passed_as_array) {
                // If the passed query only expected one argument, but the wrong number of arguments were sent as an array, bail.
                sprintf('The query only expected one placeholder, but an array of multiple placeholders was sent.');
                return;
            } else {
                /*
                 * If we don't have the right number of placeholders, but they were passed as individual arguments,
                 * or we were expecting multiple arguments in an array, throw a warning.
                 */
                sprintf(
                    'The query does not contain the correct number of placeholders (%1$d) for the number of arguments passed (%2$d).' ,
                    $placeholders,
                    count($args)
                );

            }
        }

        array_walk($args, array($this, 'escape_by_ref'));
        $query = @vsprintf($query, $args);

        return $this->add_placeholder_escape($query);
    }

    /**
     * Generates and returns a placeholder escape string for use in queries returned by ::prepare().
     *
     * @return string String to escape placeholders.
     */
    public function placeholder_escape() {
        static $placeholder;

        if (!$placeholder) {
            // Old WP installs may not have AUTH_SALT defined.
            $salt = defined( 'AUTH_SALT' ) && AUTH_SALT ? AUTH_SALT : (string) rand();
            $placeholder = '{' . hash_hmac('sha256', uniqid($salt, true), $salt) . '}';
        }

        return $placeholder;
    }


    /**
     * Adds a placeholder escape string, to escape anything that resembles a printf() placeholder.
     *
     * @param string $query The query to escape.
     * @return string The query with the placeholder escape string inserted where necessary.
     */
    public function add_placeholder_escape($query) {
        /*
         * To prevent returning anything that even vaguely resembles a placeholder,
         * we clobber every % we can find.
         */
        return str_replace( '%', $this->placeholder_escape(), $query );
    }

    /**
     * Removes the placeholder escape strings from a query.
     *
     * @param string $query The query from which the placeholder will be removed.
     * @return string The query with the placeholder removed.
     */
    public function remove_placeholder_escape($query) {
        return str_replace( $this->placeholder_escape(), '%', $query );
    }
}