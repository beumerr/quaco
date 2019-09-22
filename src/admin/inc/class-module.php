<?php
/**
 * Class QC_module
 * Version: 0.1
 *
 * Load and set module information
 */

class Module {

    // Module arguments
    public $modules = [];

    // Active page arr
    private $active_module = [];

    // Whether active page is set
    private $active_is_set = false;

    // Active module
    private $default_module_slug;

    // Init Class
    public function __construct($active_module = false) {
        $this->set_module_arguments();
        $this->set_active_module($active_module);
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
    public function set_active_module($module_slug = false) {

    	// TODO: calling $url makes Module depend on Route const being init before, which is not robust enough
	    // TOTO: Best thing to do is a create a loader then can be used widely throughout xml req. and modules/pages

        global $url;
        $slug = $url->get_actual_request();

        foreach ($this->modules as $module_name => $module) {
            foreach ($module['pages'] as $key => $page) {
            	// Append module dir and admin init to page arr
                $page['dir'] = $module_name;
	            $page['admin_init'] = $module['admin_init'];

                // Append module JS to page arr
                if(isset($module['js_files']))
	                $page['js_files'] = $module['js_files'];

                // 1) Set default module based on slug parameter
                if($module_slug && $page['slug'] === $module_slug)
	                $this->active_module = $page;

	            // 2) Else set default modules based on url parameter
                else if(!$module_slug && $page['slug'] === $slug) {
                    $this->active_module = $page;
                    $this->active_is_set = true;
                }

                // 3) Else set default module based on ["active" => 1] in module arguments
                else if(
	                !$module_slug && isset($page['default']) &&
	                $page['default'] === true && !$this->active_is_set) {

                    $this->active_module = $page;
                }

				// Always set default module slug so we have our redirect if there is no 404 page
                if(isset($page['default']) && $page['default'] === true) {
                	$this->default_module_slug = $page['slug'];
                }
            }
        }
    }

    // Get active module HTML
	public function get_active_module_html() {
	    if(isset($this->active_module['admin_init'])) {
		    $dir = $this->active_module['dir'];
		    $file = $this->active_module['admin_init'];
		    return require_to_var("".ABSPATH . 'module/' . $dir . '/' . $file."");
	    } else {
		    return "204: Module parameter 'admin_init' not set";
	    }
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

    public function module_exists($module_slug) {
    	foreach($this->modules as $name => $values)
    		if($values['slug'] === $module_slug) return true;

    	return false;
    }

    public function action_exists($action) {
    	foreach($this->active_module['actions'] as $index => $action)
    		if($action['action'] === $action) return true;

    	return false;
    }


	public function get_action($action) {
		foreach($this->active_module['actions'] as $index => $action)
			if($action['action'] === $action) return $action;

		return false;
	}

    // One liners
    public function set_default_module_slug($slug)  { $this->default_module_slug = $slug; }
	public function get_module_arguments()          { return $this->modules; }
	public function get_active_module()             { return $this->active_module; }
	public function get_active_module_slug()        { return ($this->active_module)['slug']; }
	public function get_default_module_slug()       { return $this->default_module_slug; }


}