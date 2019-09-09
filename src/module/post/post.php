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
    "name" => "Post",
    "slug" => "post",
    "pages" => [
        [
            "name" => "404",
            "slug" => "404",
            "group" => "author",
            "hidden" => true,
            "admin_init" => 'sections/test.php',
        ], [
            "name" => "News",
            "slug" => "news",
            "group" => "author",
            "icon" => "<i class=\"la la-newspaper-o\"></i>",
            "order" => 4,
            "admin_init" => 'sections/test.php',
        ], [
            "name" => "Projects",
            "slug" => "projects",
            "group" => "author",
            "icon" => "<i class=\"la la-wrench\"></i>",
            "order" => 3,
            "admin_init" => 'sections/test.php',
        ], [
            "name" => "Pages",
            "slug" => "pages",
            "group" => "author",
            "icon" => "<i class=\"la la-book\"></i>",
            "order" => 2,
            "admin_init" => 'sections/test.php',
        ], [
            "name" => "Post types",
            "slug" => "post-types",
            "group" => "development",
            "icon" => "<i class=\"la la-file-archive-o\"></i>",
            "order" => 3,
            "admin_init" => 'sections/test.php',
        ], [
            "name" => "Page templates",
            "slug" => "page-templates",
            "group" => "development",
            "icon" => "<i class=\"la la-text-width\"></i>",
            "order" => 5,
            "admin_init" => 'sections/test.php',
        ]
    ]
];