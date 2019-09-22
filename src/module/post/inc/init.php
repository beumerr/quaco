<?php

// Set vars
global $mdl, $url, $module, $table, $usr, $query;
$module = $mdl->get_active_module();
$children = $url->children;
$usr = new User();

// Require post files
require_once ABSPATH.'module/'.$module['dir'].'/inc/functions.php';

require_once ABSPATH.'module/'.$module['dir'].'/inc/class-view-table.php';

// Route trough module
if(isset($children[0])) {
	switch($children[0]) {
		case 'add':
			require_once ABSPATH.'module/'.$module['dir'].'/admin/add.php';
			break;
		case 'edit':
			require_once ABSPATH.'module/'.$module['dir'].'/admin/edit.php';
			break;
		default :
			$slug_404 = true;
			$table = new View_table;
			require_once ABSPATH.'module/'.$module['dir'].'/admin/view.php';
	}
} else {
	$table = new View_table;
	require_once ABSPATH.'module/'.$module['dir'].'/admin/view.php';
}






