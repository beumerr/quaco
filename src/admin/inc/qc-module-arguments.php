<?php
/**
 * Class QC_module
 * Version: 0.1
 *
 * Load and set module information
 */

class QC_module_arguments {


    // Module arguments
    private $modules = [];

    // Active page arr
    private $default_module = [];

    // Whether active page is set
    private $default_is_set = false;

    // Active module
    private $active_module_slug;

    // Init Class
    public function __construct() {
        $this->set_module_arguments();
        $this->set_default_module();
    }

    // Set module arguments (loop trough '/module' folder)
    private function set_module_arguments() {
        $module_folder = scandir(ABSPATH.'/module');
        $module_names = array_splice($module_folder, 2);

        foreach ($module_names as $key => $module) {
            require_once ABSPATH.'module/'.$module.'/'.$module.'.php';
            $arr[$args['slug']] = $args;
        }
        $this->modules = $arr;
    }

    // Determine active module based on valid slug or where ["active" => 1]
    public function set_default_module() {
        global $url;
        $slug = $url->get_actual_request();

        foreach ($this->modules as $module_name => $module) {
            foreach ($module['pages'] as $key => $page) {
                $page['dir'] = $module_name;
                if($this->module_page_exists($slug) && $page['slug'] === $slug) {
                    $this->default_module = $page;
                    $this->default_is_set = true;
                } else if(isset($page['active']) && $page['active'] === 1 && !$this->default_is_set) {
                    $this->default_module = $page;
                }
            }
        }
    }

    // Return modules arguments
    public function get_module_arguments() {
        return $this->modules;
    }

    // Return active module
    public function get_active_module() {
        return $this->default_module;
    }

    // Return true/false whether module page exists
    public function module_page_exists($slug) {
        foreach ($this->modules as $module_name => $module) {
            foreach ($module['pages'] as $key => $page) {
                if($page['slug'] === $slug) return true;
            }
        }
        return false;
    }

    // Set active slug
    public function set_active_slug($slug) {
        $this->active_module_slug = $slug;
    }


}