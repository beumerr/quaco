<?php
// Auto init
global $pst;
$pst = new Post;

class Post {

	public $module = [];
	public $children = false;
	public $query;

	public function __construct() {
		$this->set_module();
		$this->set_children();
		$this->load_functions();
		$this->set_query();
		$this->load_module_page();
	}

	private function set_module() {
		global $mdl;
		$this->module = $mdl->get_active_module();
	}

	private function set_children() {
		global $url;
		$children = $url->children;

		if(isset($children[0])) {
			$this->children = $children;
		}
	}

	private function load_functions() {
		require_once ABSPATH.'module/'.$this->module['dir'].'/inc/functions.php';
	}

	private function set_query() {
		require_once ABSPATH.'module/'.$this->module['dir'].'/inc/class-post-query.php';
		$this->query = new Post_query;
	}

	public function load_module_page() {
		global $url;
		$children = $url->children;

		if(empty($children[0])) {
			switch($children[0]) {
				case 'add':
					require_once ABSPATH.'module/'.$this->module['dir'].'/admin/add.php';
					break;
				case 'edit':
					require_once ABSPATH.'module/'.$this->module['dir'].'/admin/edit.php';
					break;
				default :
					$slug_404 = true;
					require_once ABSPATH.'module/'.$this->module['dir'].'/admin/view.php';
			}
		} else {
			require_once ABSPATH.'module/'.$this->module['dir'].'/admin/view.php';
		}
	}
}



