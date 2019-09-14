<?php
class Route {

    // URL information
    public $url, $host, $request, $actual_request;

    public $get_parameters, $post_parameters, $children = [];

    public $slug, $slug_no_parameters;


	private $xml_request_slug = false;

    // Init QC_route
    public function __construct($xml_request_slug = false){
        $this->xml_request_slug = $xml_request_slug;
        $this->set_url();
    }

    // Init set url methods
    private function set_url() {
        $this->set_url_host();
        $this->set_url_request();
        $this->set_url_actual_request();
        $this->set_url_children();
        $this->set_url_get_parameters();
	    $this->set_url_post_parameters();
        $this->set_url_complete();
    }

    // Set host url
    private function set_url_host() {
        $this->host = (
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
                ? "https"
                : "http"
            ) . "://{$_SERVER['HTTP_HOST']}";
    }

    // Set request url
    private function set_url_request() {
        $this->request = $_SERVER['REQUEST_URI'];
    }

    // Format request url
    private function set_url_actual_request() {
    	// If class is constructed with slug then we set is manually
        if($this->xml_request_slug !== false) {
	        $this->slug_no_parameters   = strtok($this->xml_request_slug, '?');
        	$this->actual_request       = strtok($this->xml_request_slug, '/');
	        return;
        }

        $this->slug                 = str_replace(ADMIN_BASE, '', $this->request);
        $this->slug_no_parameters   = strtok($this->slug, '?');
	    $this->actual_request       = strtok($this->slug_no_parameters, '/');
    }

    private function set_url_children() {
		$arr = explode('/', $this->slug_no_parameters);

		array_filter($arr);
	    unset($arr[0]);

		$this->children = array_values($arr);
    }

    private function set_url_get_parameters() {
    	foreach($_GET as $index => $value) {
    		$arr[test_input($index)] = test_input($value);
	    }

    	if(isset($arr)) $this->get_parameters = $arr;
    }

	private function set_url_post_parameters() {
		foreach($_POST as $index => $value) {
			$arr[test_input($index)] = test_input($value);
		}

		if(isset($arr)) $this->post_parameters = $arr;
	}


    // Set complete url including http(s)
    private function set_url_complete() {
        $this->url = (
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
                ? "https"
                : "http"
        ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    }

	// Check whether redirect is necessary
    public function check_url_redirect() {
	    global $mdl, $ses;

	    // Get vars
	    $session_set = $ses->session_is_set('user_id');
	    $request = $this->actual_request;

	    // 1) If session is set & request = login or empty -> redirect to default module page
		if($session_set && $request === 'login' || empty($request)) {
			$this->safe_redirect($mdl->get_default_module_slug());

		// 2) If request doesn't exists
        } else if(!$mdl->module_page_exists($request)) {

			// 3) Redirect to 404 if page exists
            if($mdl->module_page_exists('404')) {
                $this->safe_redirect('404');

            // 4) Else redirect to admin base
            } else {
                $this->safe_redirect();
            }
        }
    }

    // Return the actual request (no host or parameters, just the slug)
    public function get_actual_request() {
        return $this->actual_request;
    }

    public function safe_redirect($slug = '') {
        header("Location: ".$this->host.ADMIN_BASE.$slug."");
        die();
    }

    public function get_login_url() {
    	return $this->host.ADMIN_BASE.'login';
    }

}