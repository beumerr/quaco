<?php

// Define paths and constants
define('XML_PATH', dirname(__FILE__ ,3) . '/');
require_once(XML_PATH . 'config.php');

// Load global functions
require_once(HELPERS . 'functions.php');

// Get the action
$action = test_input($_POST['action']);

// Set (possible) data, action response handler can target $data
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
		require_once(INC . 'class-route.php');
		require_once(INC . 'class-module.php');

		global $mdl, $url;
		$url = new Route;
		$mdl = new Module;

		if(isset($data['module']) && $mdl->module_exists($data['module'] && $mdl->action_exists($action))) {
			$mdl->set_active_module($data['module']);
			$module = $mdl->get_active_module();
			$action = $mdl->get_action($action);

			require_once (MODULES . $module['dir'].'/'.$action->payload);

		} else {
			echo json_encode([
				'success'   => false,
				'msg'       => "Unknown action: ".$action." - Please review: ".__FILE__
			]);
			header('Content-Type: application/json');
		}
}

exit();