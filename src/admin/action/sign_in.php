<?php
/**
 *  xml.php action: SIGN_IN
 *
 *  Sign in action response. since signing in results into the panel view we got to load everything
 *
 * @data $data['cool_username'] = the user mail
 * @data $data['scary_password'] = the user password
 */

// TODO: load essentials before authentication, the others after

require_once(HELPERS . 'functions.php');
require_once(INC . 'class-session.php');
require_once(INC . 'class-route.php');
require_once(INC . 'class-database.php');
require_once(INC . 'class-user.php');
require_once(INC . 'class-module.php');


// Init globals we need to sign in
global $ses, $url, $qdb, $usr, $mdl, $pnl;
$ses = new Session();
$url = new Route();
$mdl = new Module();
$usr = new User();
$qdb = new Database(
	DB_USER,
	DB_PASSWORD,
	DB_NAME,
	DB_HOST,
	DB_CHARSET,
	DB_COLLATE
);


// Start authentication process
$user_id = $usr->authenticate_user($data['cool_username'], $data['scary_password']);
if($user_id) {

	require_once(INC . 'class-panel.php');
	require_once(INC . 'class-admin-menu.php');

	$pnl = new Panel(
		$mdl->get_module_arguments(),
		$mdl->get_active_module()
	);

	$usr->set_current_user($user_id);
	$ses->add_session('user_id', $user_id);
	$ses->add_session('user_level', $usr->get_user_level());

	$json =  json_encode([
		'success' => true,
		'container' => 'body',
		'html' => sanitize_output($pnl->get_body()),
		'title' => 'Hi, '.$usr->get_user_first_name().' ›  Quaco',
		'url'   => $url->host.ADMIN_BASE
	], JSON_HEX_QUOT | JSON_HEX_TAG);

} else {

	$json = json_encode([
		'success' => false,
		'msg' => "Can't match details in our system"
	]);

}

// Send JSON response
echo $json;
exit();