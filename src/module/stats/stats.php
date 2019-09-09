<?php
/*
    Module Name: Statistics
    Version: 1
    Author: Thomas Beumer
*/

// Check absolute path or..
defined('ABSPATH') || die('Nope nope nope..');

$args = [
    "name" => "Stats",
    "slug" => "stats",
    "js_files" => ['chart.min', 'init-chart'],
    "pages" => [
        [
            "name" => "Stats",
            "slug" => "stats",
            "active" => 1,
            "group" => "author",
            "icon" => "<i class=\"la la-pie-chart\"></i>",
            "order" => 1,
            "admin_init" => 'sections/test.php',
            "theme_init" => 'asdasd'
        ]
    ]
];
