<?php
/*
    Module Name: Statistics
    Version: 1
    Author: Thomas Beumer
*/

// Check absolute path or..
defined('ABSPATH') || die('Nope nope nope..');

$args = [
    "name" => "Statistics",
    "slug" => "statistics",
	"admin_init" => 'section/test.php',
    "pages" => [
        [
            "name" => "Statistics",
            "slug" => "statistics",
            "default" => true,
            "group" => "author",
            "icon" => "<i class=\"la la-pie-chart\"></i>",
            "order" => 1,

            "theme_init" => 'asdasd'
        ]
    ]
];
