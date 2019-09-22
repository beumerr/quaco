<?php
/**
 * xml.php action: LOAD_MODULE
 *
 * Load module and return HTML
 *
 * @data['slug'] = the page slug
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
require_once(INC.'class-database.php');
require_once(INC.'class-query.php');
require_once(INC.'class-user.php');


// Init url related routing
global $url, $mdl;
$url = new Route($data['slug']);
$mdl = new Module();

// Init database
$qdb = new Database(
	DB_USER,
	DB_PASSWORD,
	DB_NAME,
	DB_HOST,
	DB_CHARSET,
	DB_COLLATE
);

if ($mdl->module_page_exists($data['slug'])) {
	$nice_title = ucfirst(str_replace('-', ' ', $data['slug']));
	$json = json_encode([
		'success'   => true,
		'title'     => $nice_title.' › Quaco',
		'container' => '#content',
		'html'      => sanitize_output($mdl->get_active_module_html()),
		'url'       => $url->host.ADMIN_BASE.$data['slug']
	], JSON_HEX_QUOT | JSON_HEX_TAG);
} else {
	$json = json_encode([
		'succes'    => false,
		'msg'       => "Can't find module: ".$data['slug']
	]);
}

// Send JSON response containing title, html and url
echo $json;
exit();