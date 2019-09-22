<?php

// Folder constants, don't change these
define('ABSPATH'    , dirname(__FILE__ ) . '/');
define('ADMIN'      , ABSPATH . 'admin/');
define('MODULES'    , ABSPATH . 'module/');
define('THEME'      , ABSPATH . 'theme/');
define('HELPERS'    , ADMIN.'helper/');
define('INC'        , ADMIN.'inc/');
define('SECTIONS'   , ADMIN.'section/');
define('ACTIONS'    , ADMIN.'action/');


// ------------------------------------
 

// Site Language
define('LANGUAGE', 'en');

// The basedir for admin
define('BASE_DIR', '/quaco/src/');

// The basedir for admin
define('ADMIN_BASE', BASE_DIR.'admin/');

// The name of the database for WordPress
define('DB_NAME', 'cms');

// MySQL database username
define('DB_USER', 'root');

// MySQL database password
define('DB_PASSWORD', '');

// MySQL hostname
define('DB_HOST', 'localhost');

// Database Charset to use in creating database tables.
define('DB_CHARSET', 'utf8mb4');

// Database Collate type. Don't change this if in doubt.
define('DB_COLLATE', 'utf8mb4_unicode_520_ci');

// Salt for some extra protection
// Use: https://passwordsgenerator.net/ with password length: 50
define('SALT_KEY', '{oal!3z4.Z|VNDOZ3-k~3y5`xU`fIP][+/~$7FQFb&7|6!%7yK<MAec^4h^*ke[d');

// Suppress errors
define('DEBUG_MODE', true);



