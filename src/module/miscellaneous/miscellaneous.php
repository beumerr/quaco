<?php
/*
    Module Name:    Miscellaneous
	Description:    Different pages with unique properties
    Version:        0.1
*/

// Check absolute path or..
defined('ABSPATH') || die('Nope nope nope..');

// Arguments
$args = [
	"name" => "Miscellaneous",
	"slug" => "miscellaneous",
	"pages" => [
		[
			"name" => "404",
			"slug" => "404",
			"group" => "author",
			"hidden" => true,
			"admin_init" => 'page/404.php',
		]
	]
];