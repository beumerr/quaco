<?php
/**
 * xml.php action: LOAD_MODULE_PAGE
 *
 * Load module page and return HTML
 *
 * @request $_POST['module'] = the module
 * @request $_POST['page'] = the page
 *
 */

// Define paths and constants
require_once(XML_PATH . 'config.php');

// This action may only be called by authorised users, before loading anything, check the session
require_once(INC . 'class-session.php');
isset($_SESSION['user_id']) || die("Access denied: no user session set");

// Load essentials
require_once(HELPERS . 'functions.php');
require_once(INC . 'class-route.php');
require_once(INC . 'class-module.php');

// Init url related routing
//TODO: check isset(data[module])
global $url, $mdl;
$url = new Route($data['module'].'/'.$data['page']);
$mdl = new Module();


if ($mdl->module_page_exists($data['module'])) {
	$nice_title = $data['page'].ucfirst(str_replace('-', ' ', $data['module']));

	echo json_encode([
		'success'   => true,
		'title'     => $nice_title.' › Quaco',
		'container' => '#content',
		'html'      => sanitize_output($mdl->get_active_module_html()),
		'url'       => $url->host.ADMIN_BASE.$data['module'].'/'.$data['page']
	], JSON_HEX_QUOT | JSON_HEX_TAG);
} else {
	echo json_encode([
		'succes'    => false,
		'msg'       => "Can't find module: ".$data['module']
	]);
}

// Send JSON response containing title, html and url

exit();