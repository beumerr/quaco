<?php

// Define paths and constants
define('XML_PATH', dirname(__FILE__ ,3) . '/');
require_once(XML_PATH . 'config.php');

// Load global functions
require_once(HELPERS . 'functions.php');

// Get the action
$action = test_input($_POST['action']);

// Get (possible) data
$data = [];
foreach($_POST as $index => $value) {
	if($index !== 'action')
		$data[test_input($index)] = test_input($value);
}

// Handle the action
switch($action) {
	case 'SIGN_IN':
		require_once(ACTIONS . 'sign_in.php');
		break;
	case 'SIGN_OUT':
		require_once(ACTIONS . 'sign_out.php');
		break;
	case 'LOAD_MODULE':
		require_once(ACTIONS . 'load_module.php');
		break;
	case 'LOAD_MODULE_PAGE':
		require_once(ACTIONS . 'load_module_page.php');
		break;
	default:
		echo json_encode([
			'success'   => false,
			'msg'       => "Unknown action: ".$action." - Please review: ".__FILE__
		]);
		header('Content-Type: application/json');
		break;
}

exit();