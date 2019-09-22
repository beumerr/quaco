<?php
// Load essentials
require_once(INC . 'class-session.php');
require_once(INC . 'class-route.php');
require_once(INC . 'class-module.php');

$url = new Route;
$mdl = new Module('login');
$ses = new Session;

$ses->unset_all_session();

echo json_encode([
	'success' => true,
	'container' => 'body',
	'html' => sanitize_output($mdl->get_active_module_html()),
	'title' => 'Login › Quaco',
	'url'   => $url->get_login_url(),
]);
exit();