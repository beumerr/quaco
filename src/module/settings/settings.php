<?php
/*
    Module Name: settings
    Version: 1
    Author: Thomas Beumer
*/

// Check absolute path or..
defined('ABSPATH') || die('Nope nope nope..');

$prefix = 'st';
$name = 'settings';

$args = [
    "name" => "Settings",
    "slug" => "settings",
    "pages" => [
        [
            "name" => "Settings",
            "slug" => "settings",
            "group" => "development",
            "icon" => "<i class=\"la la-cog\"></i>",
            "order" => 1,
            "admin_init" => 'section/test.php',
        ]
    ]
];
