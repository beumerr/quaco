<?php

/**
 * Class QC_database
 * Version: 0.1
 *
 * Init database connection
 */

define('EZSQL_VERSION', 'WP1.25');

/**
 * @since 0.71
 */
define('OBJECT', 'OBJECT');
// phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ConstantNotUpperCase
define('object', 'OBJECT'); // Back compat.

/**
 * @since 2.5.0
 */
define('OBJECT_K', 'OBJECT_K');

/**
 * @since 0.71
 */
define('ARRAY_A', 'ARRAY_A');

/**
 * @since 0.71
 */
define('ARRAY_N', 'ARRAY_N');

class Database {

    // ID from last insert query
    public $last_insert_id = 0;

    // Database table columns charset & collate
    public $db_charset, $db_collate;

    // Database details
    private $db_user, $db_password, $db_name, $db_host;

    // Database handle
    protected $dbh;

    // Query result
    protected $result, $last_error, $rows_affected, $last_result, $num_rows;

    // Whether connection is successful
    private $has_connected = false;

    public $field_types = array();

    /**
     * Connects to the database server and selects a database
     *
     * @param string $db_user - MySQL database usr
     * @param string $db_password - MySQL database password
     * @param string $db_name - MySQL database name
     * @param string $db_host - MySQL database host
     * @param string $db_charset - MySQL database column charset
     * @param string $db_collate - MySQL database column collate
     */
    public function __construct($db_user, $db_password, $db_name, $db_host, $db_charset, $db_collate) {
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
        $this->db_host = $db_host;
        $this->db_charset = $db_charset;
        $this->db_collate = $db_collate;

        $this->db_connect();
    }


    public function db_connect() {
        $this->dbh = mysqli_init();

        if(DEBUG_MODE) {
            $this->dbh->real_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        } else {
            $this->dbh->real_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        }

        if($this->dbh) {
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
     * @param string $query Query statement with sprintf()-like placeholders
     * @param array|mixed $args The array of variables to substitute into the query's placeholders if being called
     *                              with an array of arguments, or the first variable to substitute into the query's
     *                              placeholders if being called with individual arguments.
     * @return string|void Sanitized query string, if there is a query to prepare.
     */
    public function prepare($query, $args) {
        if(is_null($query)) {
            return;
        }

        // This is not meant to be foolproof -- but it will catch obviously incorrect usage.
        if(strpos($query, '%') === false) {
            sprintf('The query argument of %s must have a placeholder.', 'QC_database->prepare()');
        }

        $args = func_get_args();
        array_shift($args);

        // If args were passed as an array (as in vsprintf), move them up.
        $passed_as_array = false;
        if(is_array($args[0]) && count($args) == 1) {
            $passed_as_array = true;
            $args = $args[0];
        }

        foreach($args as $arg) {
            if(!is_scalar($arg) && !is_null($arg)) {
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
        $query = str_replace("'%s'", '%s', $query);

        // Strip any existing double quotes.
        $query = str_replace('"%s"', '%s', $query);

        // Quote the strings, avoiding escaped strings like %%s.
        $query = preg_replace('/(?<!%)%s/', "'%s'", $query);

        // Force floats to be locale unaware.
        $query = preg_replace("/(?<!%)(%($allowed_format)?f)/", '%\\2F', $query);

        // Escape any unescaped percents.
        $query = preg_replace("/%(?:%|$|(?!($allowed_format)?[sdF]))/", '%%\\1', $query);

        // Count the number of valid placeholders in the query.
        $placeholders = preg_match_all("/(^|[^%]|(%%)+)%($allowed_format)?[sdF]/", $query, $matches);

        if(count($args) !== $placeholders) {
            if(1 === $placeholders && $passed_as_array) {
                // If the passed query only expected one argument, but the wrong number of arguments were sent as an array, bail.
                sprintf('The query only expected one placeholder, but an array of multiple placeholders was sent.');
                return;
            } else {
                /*
                 * If we don't have the right number of placeholders, but they were passed as individual arguments,
                 * or we were expecting multiple arguments in an array, throw a warning.
                 */
                sprintf(
                    'The query does not contain the correct number of placeholders (%1$d) for the number of arguments passed (%2$d).',
                    $placeholders,
                    count($args)
                );

            }
        }

        //array_walk($args, array($this, 'escape_by_ref'));
        $query = @vsprintf($query, $args);

        return $this->add_placeholder_escape($query);
    }

    /**
     * Perform a MySQL database query, using current database connection.
     *
     * More information can be found on the codex page.
     *
     * @param string $query Database query
     * @return int|bool Boolean true for CREATE, ALTER, TRUNCATE and DROP queries. Number of rows
     *                  affected/selected for all other queries. Boolean false on error.
     * @since 0.71
     *
     */
    public function query($query) {

        // Preform the query
        $this->result = mysqli_query($this->dbh, $query);

        // MySQL server has gone away, try to reconnect.
        $mysql_errno = 0;
        if(!empty($this->dbh)) {
            if($this->dbh instanceof mysqli) {
                $mysql_errno = mysqli_errno($this->dbh);
            } else {
                // $dbh is defined, but isn't a real connection.
                // Something has gone horribly wrong, let's try a reconnect.
                $mysql_errno = 2006;
            }
        }

        if(empty($this->dbh) || 2006 == $mysql_errno) {
            if($this->check_connection()) {
                $this->result = mysqli_query($this->dbh, $query);
            } else {
                $this->last_insert_id = 0;
                return false;
            }
        }

        // If there is an error then take note of it.
        if($this->dbh instanceof mysqli) {
            $this->last_error = mysqli_error($this->dbh);
        } else {
            $this->last_error = "Unable to retrieve the error message from MySQL";
        }


        if($this->last_error) {
            // Clear insert_id on a subsequent failed insert.
            if($this->last_insert_id && preg_match('/^\s*(insert|replace)\s/i', $query)) {
                $this->last_insert_id = 0;
            }

            print_r($this->last_insert_id);
            return false;
        }

        if(preg_match('/^\s*(create|alter|truncate|drop)\s/i', $query)) {
            $return_val = $this->result;
        } elseif(preg_match('/^\s*(insert|delete|update|replace)\s/i', $query)) {
            $this->rows_affected = mysqli_affected_rows($this->dbh);
            // Take note of the insert_id
            if(preg_match('/^\s*(insert|replace)\s/i', $query)) {
                $this->last_insert_id = mysqli_insert_id($this->dbh);
            }
            // Return number of rows affected
            $return_val = $this->rows_affected;
        } else {
            $num_rows = 0;

            while($row = mysqli_fetch_object($this->result)) {
                $this->last_result[$num_rows] = $row;
                $num_rows++;
            }

            // Log number of rows the query returned
            // and return number of rows selected
            $this->num_rows = $num_rows;
            $return_val = $num_rows;
        }

        return $return_val;
    }

    // Generates and returns a placeholder escape string for use in queries returned by ::prepare().
    public function placeholder_escape() {
        static $placeholder;

        if(!$placeholder) {
            // Old WP installs may not have AUTH_SALT defined.
            $salt = defined('AUTH_SALT') && SALT_KEY ? SALT_KEY : (string)rand();
            $placeholder = '{' . hash_hmac('sha256', uniqid($salt, true), $salt) . '}';
        }

        return $placeholder;
    }

    // Add placeholder escape
    public function add_placeholder_escape($query) {
        return str_replace('%', $this->placeholder_escape(), $query);
    }

    // Remove placeholder escape
    public function remove_placeholder_escape($query) {
        return str_replace($this->placeholder_escape(), '%', $query);
    }

    // Real escape string
    public function real_escape($string) {
        return mysqli_real_escape_string($this->dbh, $string);
    }

    // Real escape array
    public function escape($data) {
        if(is_array($data)) {
            foreach($data as $k => $v) {
                if(is_array($v)) {
                    $data[$k] = $this->escape($v);
                } else {
                    $data[$k] = $this->real_escape($v);
                }
            }
        } else {
            $data = $this->real_escape($data);
        }

        return $data;
    }

    public function check_connection() {
        if(!empty($this->dbh) && mysqli_ping($this->dbh)) {
            return true;
        }
        return false;
    }

    public function close() {
        if(!$this->dbh) {
            return false;
        }
        $closed = mysqli_close($this->dbh);
        if($closed) {
            $this->dbh = null;
        }
        return $closed;
    }

    /**
     * Insert a row into a table.
     *
     *     wpdb::insert( 'table', array( 'column' => 'foo', 'field' => 'bar' ) )
     *     wpdb::insert( 'table', array( 'column' => 'foo', 'field' => 1337 ), array( '%s', '%d' ) )
     *
     * @param string $table Table name
     * @param array $data Data to insert (in column => value pairs).
     *                             Both $data columns and $data values should be "raw" (neither should be SQL escaped).
     *                             Sending a null value will cause the column to be set to NULL - the corresponding format is ignored in this case.
     * @param array|string $format Optional. An array of formats to be mapped to each of the value in $data.
     *                             If string, that format will be used for all of the values in $data.
     *                             A format is one of '%d', '%f', '%s' (integer, float, string).
     *                             If omitted, all values in $data will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @return int|false The number of rows inserted, or false on error.
     * @since 2.5.0
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     */
    public function insert($table, $data, $format = null) {
        return $this->_insert_replace_helper($table, $data, $format, 'INSERT');
    }

    /**
     * Replace a row into a table.
     *
     *     wpdb::replace( 'table', array( 'column' => 'foo', 'field' => 'bar' ) )
     *     wpdb::replace( 'table', array( 'column' => 'foo', 'field' => 1337 ), array( '%s', '%d' ) )
     *
     * @param string $table Table name
     * @param array $data Data to insert (in column => value pairs).
     *                             Both $data columns and $data values should be "raw" (neither should be SQL escaped).
     *                             Sending a null value will cause the column to be set to NULL - the corresponding format is ignored in this case.
     * @param array|string $format Optional. An array of formats to be mapped to each of the value in $data.
     *                             If string, that format will be used for all of the values in $data.
     *                             A format is one of '%d', '%f', '%s' (integer, float, string).
     *                             If omitted, all values in $data will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @return int|false The number of rows affected, or false on error.
     * @since 3.0.0
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     */
    public function replace($table, $data, $format = null) {
        return $this->_insert_replace_helper($table, $data, $format, 'REPLACE');
    }


    /**
     * Helper function for insert and replace.
     *
     * Runs an insert or replace query based on $type argument.
     *
     * @param string $table Table name
     * @param array $data Data to insert (in column => value pairs).
     *                             Both $data columns and $data values should be "raw" (neither should be SQL escaped).
     *                             Sending a null value will cause the column to be set to NULL - the corresponding format is ignored in this case.
     * @param array|string $format Optional. An array of formats to be mapped to each of the value in $data.
     *                             If string, that format will be used for all of the values in $data.
     *                             A format is one of '%d', '%f', '%s' (integer, float, string).
     *                             If omitted, all values in $data will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @param string $type Optional. What type of operation is this? INSERT or REPLACE. Defaults to INSERT.
     * @return int|false The number of rows affected, or false on error.
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     * @since 3.0.0
     */
    function _insert_replace_helper($table, $data, $format = null, $type = 'INSERT') {
        $this->last_insert_id = 0;

        if(!in_array(strtoupper($type), array('REPLACE', 'INSERT'))) {
            return false;
        }

        $data = $this->process_fields($table, $data, $format);
        if(false === $data) {
            return false;
        }

        $formats = $values = array();
        foreach($data as $value) {
            if(is_null($value['value'])) {
                $formats[] = 'NULL';
                continue;
            }

            $formats[] = $value['format'];
            $values[] = $value['value'];
        }

        $fields = '`' . implode('`, `', array_keys($data)) . '`';
        $formats = implode(', ', $formats);

        $sql = "$type INTO `$table` ($fields) VALUES ($formats)";


        return $this->query($this->prepare($sql, $values));
    }

    public function update($table, $data, $where, $format = null, $where_format = null) {
        if(!is_array($data) || !is_array($where)) {
            return false;
        }

        $data = $this->process_fields($table, $data, $format);
        if(false === $data) {
            return false;
        }
        $where = $this->process_fields($table, $where, $where_format);
        if(false === $where) {
            return false;
        }

        $fields = $conditions = $values = array();
        foreach($data as $field => $value) {
            if(is_null($value['value'])) {
                $fields[] = "`$field` = NULL";
                continue;
            }

            $fields[] = "`$field` = " . $value['format'];
            $values[] = $value['value'];
        }
        foreach($where as $field => $value) {
            if(is_null($value['value'])) {
                $conditions[] = "`$field` IS NULL";
                continue;
            }

            $conditions[] = "`$field` = " . $value['format'];
            $values[] = $value['value'];
        }

        $fields = implode(', ', $fields);
        $conditions = implode(' AND ', $conditions);

        $sql = "UPDATE `$table` SET $fields WHERE $conditions";


        return $this->query($this->prepare($sql, $values));
    }

    /**
     * Delete a row in the table
     *
     *     wpdb::delete( 'table', array( 'ID' => 1 ) )
     *     wpdb::delete( 'table', array( 'ID' => 1 ), array( '%d' ) )
     *
     * @param string $table Table name
     * @param array $where A named array of WHERE clauses (in column => value pairs).
     *                                   Multiple clauses will be joined with ANDs.
     *                                   Both $where columns and $where values should be "raw".
     *                                   Sending a null value will create an IS NULL comparison - the corresponding format will be ignored in this case.
     * @param array|string $where_format Optional. An array of formats to be mapped to each of the values in $where.
     *                                   If string, that format will be used for all of the items in $where.
     *                                   A format is one of '%d', '%f', '%s' (integer, float, string).
     *                                   If omitted, all values in $where will be treated as strings unless otherwise specified in wpdb::$field_types.
     * @return int|false The number of rows updated, or false on error.
     * @since 3.4.0
     * @see wpdb::prepare()
     * @see wpdb::$field_types
     * @see wp_set_wpdb_vars()
     *
     */
    public function delete($table, $where, $where_format = null) {
        if(!is_array($where)) {
            return false;
        }

        $where = $this->process_fields($table, $where, $where_format);
        if(false === $where) {
            return false;
        }

        $conditions = $values = array();
        foreach($where as $field => $value) {
            if(is_null($value['value'])) {
                $conditions[] = "`$field` IS NULL";
                continue;
            }

            $conditions[] = "`$field` = " . $value['format'];
            $values[] = $value['value'];
        }

        $conditions = implode(' AND ', $conditions);

        $sql = "DELETE FROM `$table` WHERE $conditions";


        return $this->query($this->prepare($sql, $values));
    }

    /**
     * Processes arrays of field/value pairs and field formats.
     *
     * This is a helper method for wpdb's CRUD methods, which take field/value
     * pairs for inserts, updates, and where clauses. This method first pairs
     * each value with a format. Then it determines the charset of that field,
     * using that to determine if any invalid text would be stripped. If text is
     * stripped, then field processing is rejected and the query fails.
     *
     * @param string $table Table name.
     * @param array $data Field/value pair.
     * @param mixed $format Format for each field.
     * @return array|false Returns an array of fields that contain paired values
     *                    and formats. Returns false for invalid values.
     * @since 4.2.0
     *
     */
    protected function process_fields($table, $data, $format) {
        $data = $this->process_field_formats($data, $format);
        if(false === $data) {
            return false;
        }
        // Other fields processors..
        return $data;
    }

    /**
     * Prepares arrays of value/format pairs as passed to qdb CRUD methods.
     *
     * @param array $data Array of fields to values.
     * @param mixed $format Formats to be mapped to the values in $data.
     * @return array Array, keyed by field names with values being an array
     *               of 'value' and 'format' keys.
     * @since 4.2.0
     *
     */
    protected function process_field_formats($data, $format) {
        $formats = $original_formats = (array)$format;

        foreach($data as $field => $value) {
            $value = array(
                'value' => $value,
                'format' => '%s',
            );

            if(!empty($format)) {
                $value['format'] = array_shift($formats);
                if(!$value['format']) {
                    $value['format'] = reset($original_formats);
                }
            } elseif(isset($this->field_types[$field])) {
                $value['format'] = $this->field_types[$field];
            }

            $data[$field] = $value;
        }

        return $data;
    }


    /**
     * Retrieve one variable from the database.
     *
     * Executes a SQL query and returns the value from the SQL result.
     * If the SQL result contains more than one column and/or more than one row, this function returns the value in the column and row specified.
     * If $query is null, this function returns the value in the specified column and row from the previous SQL result.
     *
     * @param string|null $query Optional. SQL query. Defaults to null, use the result from the previous query.
     * @param int $x Optional. Column of value to return. Indexed from 0.
     * @param int $y Optional. Row of value to return. Indexed from 0.
     * @return string|null Database query result (as string), or null on failure
     * @since 0.71
     *
     */
    public function get_var($query = null, $x = 0, $y = 0) {

        if($query) {
            $this->query($query);
        }

        // Extract var out of cached results based x,y vals
        if(!empty($this->last_result[$y])) {
            $values = array_values(get_object_vars($this->last_result[$y]));
        }

        // If there is a value return it else return null
        return (isset($values[$x]) && $values[$x] !== '') ? $values[$x] : null;
    }

    /**
     * Retrieve one row from the database.
     *
     * Executes a SQL query and returns the row from the SQL result.
     *
     * @param string|null $query SQL query.
     * @param string $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
     *                            an stdClass object, an associative array, or a numeric array, respectively. Default OBJECT.
     * @param int $y Optional. Row to return. Indexed from 0.
     * @return array|object|null|void Database query result in format specified by $output or null on failure
     * @since 0.71
     *
     */
    public function get_row($query = null, $output = OBJECT, $y = 0) {

        if($query) {
            $this->query($query);
        } else {
            return null;
        }

        if(!isset($this->last_result[$y])) {
            return null;
        }

        if($output == OBJECT) {
            return $this->last_result[$y] ? $this->last_result[$y] : null;
        } elseif($output == ARRAY_A) {
            return $this->last_result[$y] ? get_object_vars($this->last_result[$y]) : null;
        } elseif($output == ARRAY_N) {
            return $this->last_result[$y] ? array_values(get_object_vars($this->last_result[$y])) : null;
        } elseif(strtoupper($output) === OBJECT) {
            // Back compat for OBJECT being previously case insensitive.
            return $this->last_result[$y] ? $this->last_result[$y] : null;
        } else {
            print_r(' $qdb->get_row(string query, output type, int offset) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N');
        }
    }

    /**
     * Retrieve one column from the database.
     *
     * Executes a SQL query and returns the column from the SQL result.
     * If the SQL result contains more than one column, this function returns the column specified.
     * If $query is null, this function returns the specified column from the previous SQL result.
     *
     * @param string|null $query Optional. SQL query. Defaults to previous query.
     * @param int $x Optional. Column to return. Indexed from 0.
     * @return array Database query result. Array indexed from 0 by SQL result row number.
     * @since 0.71
     *
     */
    public function get_col($query = null, $x = 0) {
        if($query) {
            $this->query($query);
        }

        $new_array = array();
        // Extract the column values
        if($this->last_result) {
            for($i = 0, $j = count($this->last_result); $i < $j; $i++) {
                $new_array[$i] = $this->get_var(null, $x, $i);
            }
        }
        return $new_array;
    }

    /**
     * Retrieve an entire SQL result set from the database (i.e., many rows)
     *
     * Executes a SQL query and returns the entire SQL result.
     *
     * @param string $query SQL query.
     * @param string $output Optional. Any of ARRAY_A | ARRAY_N | OBJECT | OBJECT_K constants.
     *                       With one of the first three, return an array of rows indexed from 0 by SQL result row number.
     *                       Each row is an associative array (column => value, ...), a numerically indexed array (0 => value, ...), or an object. ( ->column = value ), respectively.
     *                       With OBJECT_K, return an associative array of row objects keyed by the value of each row's first column's value.
     *                       Duplicate keys are discarded.
     * @return array|object|null Database query results
     * @since 0.71
     *
     */
    public function get_results($query = null, $output = OBJECT) {

        if($query) {
            $this->query($query);
        } else {
            return null;
        }

        $new_array = array();
        if($output == OBJECT) {
            // Return an integer-keyed array of row objects
            return $this->last_result;
        } elseif($output == OBJECT_K) {
            // Return an array of row objects with keys from column 1
            // (Duplicates are discarded)
            if($this->last_result) {
                foreach($this->last_result as $row) {
                    $var_by_ref = get_object_vars($row);
                    $key = array_shift($var_by_ref);
                    if(!isset($new_array[$key])) {
                        $new_array[$key] = $row;
                    }
                }
            }
            return $new_array;
        } elseif($output == ARRAY_A || $output == ARRAY_N) {
            // Return an integer-keyed array of...
            if($this->last_result) {
                foreach((array)$this->last_result as $row) {
                    if($output == ARRAY_N) {
                        // ...integer-keyed row arrays
                        $new_array[] = array_values(get_object_vars($row));
                    } else {
                        // ...column name-keyed row arrays
                        $new_array[] = get_object_vars($row);
                    }
                }
            }
            return $new_array;
        } elseif(strtoupper($output) === OBJECT) {
            // Back compat for OBJECT being previously case insensitive.
            return $this->last_result;
        }
        return null;
    }
}