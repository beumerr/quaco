<?php
class QC_admin_menu {

    // HTML id for <nav> container
    private $menu_id = "admin-menu";

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

                // Set multi menu structure based on <group>
                $this->menu[$page['group']][$this->menu_count] = [
                    "name"  => $page['name'],
                    "slug"  => $page['slug'],
                    "icon" => (isset($page['icon']) ? $page['icon'] : '<i class="la la-angle-right"></i>'),
                    "order" => (isset($page['order']) ? $page['order'] : 999),
                    "active" => (isset($page['active']) && !$this->active_is_set ? 'active' : 'dis'),
                    "hidden" => (isset($page['hidden']) ? true : false)
                ];

                // Set active (max 1 active)
                if(isset($page['active']))
                    $this->active_is_set = true;

                // Set unique group types
                if(!in_array($page['group'], $this->group_types, true))
                    array_push($this->group_types, $page['group']);

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
            $html .= "<ul id=\"group-$group_name\">";
            foreach($menu_items as $key => $item) {
                if(!$item['hidden']) {
                    $id_str = "id='menu-".$item['slug']."'";
                    $cl_str = "class='".$item['active']."''";
                    $oc_str = "onclick='open_page(\"".$item['slug']."\")'";
                    $html .= "<li $id_str $cl_str $oc_str>".$item['icon']." ".$item['name']."</li>";
                }
            }
            $html .= "</ul>";
        }
        $html .= "</nav>";
        $this->menu_html = $html;
    }

    // Get menu HTML object
    public function get_menu_html() {
        return $this->menu_html;
    }

}