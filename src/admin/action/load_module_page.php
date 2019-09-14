<?php
/**
 * xml.php action: LOAD_MODULE
 *
 * Load module and return HTML
 *
 * @request $_POST['slug'] = the page slug
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

// Get the slug
$module = test_input($_POST['module']);
$page = test_input($_POST['page']);

// Init url related routing
global $url, $mdl;
$url = new Route($module.'/'.$page);
$mdl = new Module();

// We will echo this later
$json = '';

if ($mdl->module_page_exists($module)) {
	$nice_title = $page.ucfirst(str_replace('-', ' ', $module));

	$json = json_encode([
		'success'   => true,
		'title'     => $nice_title.' › Quaco',
		'container' => '#content',
		'html'      => sanitize_output($mdl->get_active_module_html()),
		'url'       => $url->host.ADMIN_BASE.$module.'/'.$page
	], JSON_HEX_QUOT | JSON_HEX_TAG);
} else {
	$json = json_encode([
		'succes'    => false,
		'msg'       => "Can't find module: ".$module
	]);
}

// Send JSON response containing title, html and url
echo $json;
exit();