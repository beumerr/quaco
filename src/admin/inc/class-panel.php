<?php
/**
 * Class QC_panel
 * Version: 0.1
 *
 * Compile and draw admin panel
 */

class Panel {

    // Title meta tag
    private $title = 'Quaco - Quality content manager';

    // Author meta tag
    private $author = 'Thomas Beumer';

    private $logo_text = 'quaco';

    // Default CSS files in <head> tag in order
    private $css_files = ['reset', 'icons', 'style'];

    // Default JS files above </body> tag in order
    private $js_files = ['jquery-3.4.1.min', 'jquery.quicksearch', 'scripts'];

    // Inline JS script (for now only used by XML requests)
    private $inline_js_html;

    // HTML elements
    private $meta_html, $logo_html, $menu_html, $css_html, $default_js_html, $additional_js_html;

    // Module info
    private $modules, $active_module;

    public function __construct($args = false, $active_module = false) {
        // Load modules
        $this->modules = $args;
        $this->active_module = $active_module;

        // Set HTML for elements first
	    if($args && $active_module)
            $this->set_page_elements();
    }

    // Draw the panel
    public function draw_panel() {
        echo $this->get_panel();
    }

    public function get_panel() {
	    return sanitize_output("<!DOCTYPE html>" .
            "<html lang=\"".LANGUAGE."\">".
                "<head>".
                    $this->meta_html.
                    $this->css_html.
                "</head>".
                "<body>".
	                $this->get_body().
                    $this->inline_js_html.
                    $this->default_js_html.
                    $this->additional_js_html.
                "</body>".
            "</html>");
    }

    public function draw_module() {
        if(isset($this->active_module['admin_init'])) {
	        $dir = $this->active_module['dir'];
            $file = $this->active_module['admin_init'];
            require_once "".ABSPATH . 'module/' . $dir . '/' . $file."";
        } else {
            echo "<h1>Admin page argument not set in module</h1>";
        }
    }

    public function get_body() {
    	if(isset($this->active_module['panel_container']) && $this->active_module['panel_container'] === false) {
    		return $this->get_content();
	    } else {
		    return "<div class=\"flex-container padding-top-medium\">" .
					    "<header>" .
						    $this->logo_html .
						    $this->menu_html .
					    "</header>" .
					    "<main>" .
						    $this->get_top_bar() .
						    "<div id=\"content\">" .
						        $this->get_content() .
						    "</div>" .
					    "</main>" .
				    "</div>";
	    }

    }

    // Set HTML element
    private function set_page_elements() {
        $this->set_css_html();
        $this->set_inline_js_html();
        $this->set_default_js_html();
        $this->set_additional_js_html();
        $this->set_menu_html();
        $this->set_logo_html();
        $this->set_meta_html();
    }

    // Set HTML for <head>
    private function set_meta_html() {
        $html = "<title>$this->title</title>";
        $html .= "<meta name='robots' content='noindex,follow' />";
        $html .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />";
        $html .= "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />";
        $html .= "<meta name=\"author\" content=\"$this->author\" />";
        $this->meta_html = $html;
    }

    // Set HTML for <nav>
    private function set_menu_html() {
        $menu = new Admin_menu($this->modules);
        $this->menu_html = $menu->get_menu_html();
    }

    // Set HTML for logo
    private function set_logo_html() {
        $html = "<div id=\"admin-logo\">";
        $html .= "<span class=\"typer\">|</span>";
        $html .= "<span>$this->author</span>";
        $html .= "<h1>".strtolower($this->logo_text)."</h1>";
        $html .= "</div>";
        $this->logo_html = $html;
    }

    // Set HTML for CSS files
    private function set_css_html() {
	    global $url;

        foreach ($this->css_files as $file_name) {
        	$src = "".$url->host.ADMIN_BASE."asset/css/$file_name.css";
            $this->css_html .= "<link rel='stylesheet' href='$src' type='text/css' />";
        }
    }

    // Set HTML for default JS files
    private function set_default_js_html() {
	    global $url;

        foreach ($this->js_files as $file_name) {
        	$src = "".$url->host.ADMIN_BASE."asset/js/$file_name.js";
            $this->default_js_html .= "<script src=\"$src\"></script>";
        }
    }

    // Set HTML for additional JS files
    private function set_additional_js_html() {
    	global $url;

        if(isset($this->active_module['js_files'])) {
            foreach ($this->active_module['js_files'] as $file_name) {
            	$src = $url->host.BASE_DIR.'module/'.$this->active_module['dir'].'/'.$file_name;
                $this->default_js_html .= "<script src=\"$src\"></script>";
            }
        }
    }

    // Set inline JS script (for now only used by XML requests)
    private function set_inline_js_html() {
        global $url, $mdl;

        $this->inline_js_html = "<script>let MDL = '".json_encode($mdl->get_active_module())."';".
	                            "let ABSPATH = '".$url->host.BASE_DIR."';</script>";
    }

    // Echo top bar
    private function get_top_bar() {
        return require_to_var(SECTIONS . 'top-bar.php');

    }

    // Get page content
    private function get_content() {
    	global $mdl;

        return $mdl->get_active_module_html();
    }
}