<?php
class Admin_menu {

    // Default icon HTML
    private $default_icon_html = "<i class=\"la la-angle-right\"></i>";

    // Action in load_xml function
	public $action = "LOAD_MODULE";

    // HTML id for <nav> container
    private $menu_id = "admin-menu";

    private $default_group = "default";

    // Active class used for menu
    private $active_class = "active";

    // Active class used for menu
    private $inactive_class = "dis";

    // Menu HTML object
    private $menu_html;

    // Count total number of menu items
    private $menu_count = 0;

    // Menu group types
    private $group_types = [];

    // Menu array structure
    private $menu = [];

    private $active_is_set = false;

    // Module arguments
    protected $modules;

    // Init QC_admin_menu
    public function __construct($modules) {
        $this->modules = $modules;
        $this->set_menu_structure();
        $this->order_menu_structure();
        $this->set_menu_html();
    }

    // Create menu structure from module arguments
    private function set_menu_structure() {
        foreach ($this->modules as $module_name => $module) {
            foreach ($module['pages'] as $page) {

            	// Group item to
            	$group =  (isset($page['group']) ? $page['group'] : $this->default_group);

                // Set multi menu structure based on <group>
                $this->menu[$group][$this->menu_count] = [
                    "name"      => $page['name'],
                    "slug"      => $page['slug'],
                    "icon"      => (isset($page['icon']) ? $page['icon'] : $this->default_icon_html),
                    "order"     => (isset($page['order']) ? $page['order'] : 999),
                    "hidden"    => (isset($page['hidden']) && $page['hidden'] === true ? true : false),
                    "default"    => (
	                    isset($page['default']) && !$this->active_is_set
	                        ? $this->active_class
	                        : $this->inactive_class
                    )
                ];

                // Set active (max 1 active)
                if(isset($page['active']))
                    $this->active_is_set = true;

                // Set unique group types
                if(!in_array($group, $this->group_types, true))
                    array_push($this->group_types, $group);

                // Count total menu items
                $this->menu_count++;
            }
        }
    }

    // Order menu structure based on 'order' key
    private function order_menu_structure() {
        foreach ($this->menu as $group => $item) {
            usort($this->menu[$group], function($a, $b) {
                return $a['order'] <=> $b['order'];
            });
        }
    }

    // Set HTML menu structure
    private function set_menu_html() {
        $html = "<nav id=\"$this->menu_id\">";
        foreach ($this->menu as $group_name => $menu_items) {
        	if(!empty($menu_items)) {
		        $html .= "<ul id=\"group-$group_name\">";
		        foreach($menu_items as $key => $item) {
			        if(!$item['hidden']) {

				        // HTML Class and ID
				        $id_str = "id='menu-".$item['slug']."'";
				        $cl_str = "class='".$item['default']."'";

				        // On click
				        $action = $this->action;
				        $data   = '{&#34;slug&#34; : &#34;'.$item['slug'].'&#34;}';
				        $oc_str = 'onclick="load_xml(\''.$action.'\', \''.$data.'\')"';

				        // Actual HTML combined
				        $html .= "<li $id_str $cl_str $oc_str>".$item['icon'].$item['name']."</li>";

			        }
		        }
		        $html .= "</ul>";
	        }
        }
        $html .= "</nav>";
        $this->menu_html = $html;
    }

    // Get menu HTML object
    public function get_menu_html() {
        return $this->menu_html;
    }

}