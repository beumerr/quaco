<?php
/**
 *  Admin panel bootstrapper
 *
 * @version 0.1
 */

// Define paths
define('THIS'    , dirname(__FILE__ ,2) . '/');
// Require config constants
require_once(THIS . 'config.php');

// Load essentials before (possible) redirect
require_once(INC . 'qc-route.php');
require_once(INC . 'qc-module-arguments.php');

// Init url related routing
global $url;
$url = new QC_route();

// Init module arguments
global $mdls;
$mdls = new QC_module_arguments();

// Check whether redirect is required
$url->check_url_redirect(($mdls->get_active_module())['slug']);


//--------------------------------------------------------------


// Require includes
require_once(HELPERS . 'functions.php');
require_once(INC . 'qc-database.php');
require_once(INC . 'qc-admin-menu.php');
require_once(INC . 'qc-module.php');
require_once(INC . 'qc-panel.php');

// Include the database class and, if present, a db.php database drop-in.
global $db;
$db = new QC_database(
    DB_USER,
    DB_PASSWORD,
    DB_NAME,
    DB_HOST,
    DB_CHARSET,
    DB_COLLATE
);

// Draw the panel
global $panel;
$panel = new QC_panel($mdls->get_module_arguments(), $mdls->get_active_module());
$panel->draw_panel();