<?php
/**
 *  Admin panel bootstrapper
 *
 * @version 0.1
 */

// Define paths and constants
define('CFG', dirname(__FILE__ ,2) . '/');
require_once(CFG . 'config.php');

// Load essentials before (possible) redirect
require_once(HELPERS . 'functions.php');
require_once(INC . 'class-error-handle.php');
require_once(INC . 'class-route.php');
require_once(INC . 'class-session.php');

// Declare globals
global $err, $ses, $url, $qdb, $mdl, $pnl, $usr;

// Init essential globals
$err = new Error_handle;
$ses = new Session;
$url = new Route;

// If session 'user_id is' not set and url is not 'login' redirect to 'login'
if(!isset($_SESSION['user_id']) && $url->get_actual_request() !== 'login')
	$url->safe_redirect('login');

// Load module arguments and set default
require_once(INC . 'class-module.php');
$mdl = new Module;

// Check whether redirect is required
$url->check_url_redirect();


//--------------------------------------------------------------


// Require includes
require_once(INC . 'class-database.php');
require_once(INC . 'class-query.php');
require_once(INC . 'class-user.php');
require_once(INC . 'class-admin-menu.php');
require_once(INC . 'class-panel.php');

// Init database
$qdb = new Database(
    DB_USER,
    DB_PASSWORD,
    DB_NAME,
    DB_HOST,
    DB_CHARSET,
    DB_COLLATE
);

$user_id = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0);
$usr = new User($user_id);

// Draw the panel
global $panel;
$panel = new Panel($mdl->get_module_arguments(), $mdl->get_active_module());
$panel->draw_panel();