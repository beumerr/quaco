<?php
/*
    Module Name: post
    Version: 1
    Author: Thomas Beumer
*/

// Check absolute path or..
defined('ABSPATH') || die('Nope nope nope..');

// Module prefix
$prefix = 'pt';
$name = 'post';

// Here should happen something that custom post types are added to array which are created in the backend

// Arguments
$args = [
	"name" => "Login",
	"slug" => "login",
	"admin_init" => 'section/login_page.php',
	"pages" => [
		[
			"name" => "login",
			"slug" => "login",
			"hidden" => true,
			"panel_container" => false,
		]
	]
];