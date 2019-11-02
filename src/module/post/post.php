<?php
/*
    Module Name: post
	Description: Build custom post type based on arguments
    Version: 1
    Author: Thomas Beumer
*/

// Check absolute path or..
defined('ABSPATH') || die('Nope nope nope..  For some reason every "nope" decreases in size, yet they don\'t');

// Arguments
$args = [
    "name"          => "Post",
    "slug"          => "post",
	"admin_init"    => 'inc/init.php',

    "pages" => [
        [
	        "name"          => "News",
	        "slug"          => "news",
	        "type_id"       => 2,
	        "group"         => "author",
	        "icon"          => "<i class=\"la la-file-archive-o\"></i>",
	        "order"         => 2,
	        "show"          => 10,
	        "support" => [
		        "keywords"      => true,
		        "parent"        => true,
		        "author"        => true,
		        "category"      => true,
		        "theme"         => true,
		        "meta_desc"     => true,
		        "excerpt"       => true,
		        "content"       => true,
		        "thumbnail"     => true,
		        "media_banner"  => true
	        ]
        ],
	    [
            "name"          => "Page",
            "slug"          => "page",
		    "group"         => "author",
		    "icon"          => "<i class=\"la la-file-archive-o\"></i>",
		    "type_id"       => 1,
            "order"         => 3,
		    "show"          => 10,
		    "has_archive"   => true,
		    "seo_support"   => true,
		    "support" => [
			    "keywords"      => true,
			    "parent"        => true,
			    "author"        => true,
			    "category"      => true,
			    "theme"         => true,
			    "meta_desc"     => true,
			    "excerpt"       => true,
			    "content"       => true,
			    "thumbnail"     => true,
			    "media_banner"  => true
		    ]
        ]
    ],
	"actions" => [
		[
			"action"        => "DELETE_POST",
			"container"     => ".table-row tbody",
			"payload"       => "action/get_post_children.php"
		], [
			"action"        => "LOAD_POST_CHILDREN",
			"container"     => ".table-row tbody",
			"payload"       => "action/get_post_children.php"
		]

	]
];