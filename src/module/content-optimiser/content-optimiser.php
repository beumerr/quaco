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
	"name" => "Content optimiser",
	"slug" => "content-optimiser",
	"admin_init" => 'static/static-html.php',
	"pages" => [
		[
			"name" => "Content optimiser",
			"slug" => "content-optimiser",
			"group" => "development",
			"icon" => "<i class=\"la la-diamond\"></i>",
			"order" => 1,
		]
	]
];