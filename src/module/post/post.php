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
	        "name" => "Pages",
	        "slug" => "page",
	        "group" => "author",
	        "icon" => "<i class=\"la la-file-archive-o\"></i>",
	        "order" => 2,
	        "admin_init" => 'section/test.php',
	        "single_init" => 'section/test.php',
        ], [
            "name" => "News",
            "slug" => "news",
            "group" => "author",
            "icon" => "<i class=\"la la-file-archive-o\"></i>",
            "order" => 3,
		    "sub_pages" => ['view','edit','new'],
		    "support" => [
		    	"title" => true,
			    "keywords" => true,
			    "parent" => true,
			    "category" => true,
			    "theme" => false,
			    "meta_description" => true,
			    "excerpt" => true,
			    "content" => true,
			    "thumbnail" => true,
			    "media_banner" =>  true
		    ],
		    "filter" => [
		    	"title" => true,
			    "seo" => true,
			    "focus" => true,
			    "author" => true,
			    "date" => true
		    ],
		    "seo_support" => true,
            "admin_init" => 'inc/init.php',
		    "single_init" => 'section/test.php',
		    "archive_init" => 'section/test.php'
        ]
    ]
];