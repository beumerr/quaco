<?php
/**
 * Class QC_load_xml
 *
 * Module used for loading page content
 *
 * @request $_POST['slug'] = the page slug
 *
 */

// Define paths
define('XML_PATH', dirname(__FILE__ ,3) . '/');

// Require config constants
require_once(XML_PATH . 'config.php');

// Load essentials before (possible) redirect
require_once(HELPERS . 'functions.php');
require_once(INC . 'qc-route.php');
require_once(INC . 'qc-module-arguments.php');
require_once(INC . 'qc-module.php');

// Init url related routing
global $url;
$slug = test_input($_POST['slug']);
$url = new QC_route($slug);

// Init module arguments
global $mdls;
$mdls = new QC_module_arguments();

// Check whether redirect is required
global $module;
$module = new QC_module($mdls->get_active_module());

// Send JSON response containing title, html and url
$nice_title = ucfirst(str_replace('-', ' ', $slug));
echo json_encode([
    'title' => $nice_title.' › Quaco',
    'html'  => $module->get_module(),
    'url'   => $url->host.ADMIN_BASE.$slug
]);
header('Content-Type: application/json');