<?php
class QC_route {

    // URL information
    public $url, $host, $request, $actual_request;

    private $xml_slug = false;

    // Init QC_route
    public function __construct($xml = false){
        $this->xml_slug = $xml;
        $this->set_url();
    }

    // Init set url methods
    private function set_url() {
        $this->set_url_host();
        $this->set_url_request();
        $this->set_url_actual_request();
        $this->set_url_complete();
    }

    // Set host url
    private function set_url_host() {
        $this->host = (
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
                ? "https"
                : "http"
            ) . "://{$_SERVER['HTTP_HOST']}";

        //echo $this->host;

    }

    // Set request url
    private function set_url_request() {

        $this->request = $_SERVER['REQUEST_URI'];
        //echo $this->request;
    }

    // Format request url
    private function set_url_actual_request() {
        if($this->xml_slug !== false) {
            return $this->actual_request  = $this->xml_slug;
        }

        $slug_with_parameters       = str_replace(ADMIN_BASE, '', $this->request);
        $slug_without_parameters    = strtok($slug_with_parameters, '?');
        $this->actual_request       = $slug_without_parameters;
    }

    // Set complete url including http(s)
    private function set_url_complete() {
        $this->url = (
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
                ? "https"
                : "http"
        ) . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        //echo $this->url;
    }

    // Redirect to active module if slug is invalid
    public function check_url_redirect($slug) {
        global $mdls;

        // 1) If no url is set -> redirect to active module page
        // 2) If request doesnt exists
            // 2.1) If 404 page exists -> redirect tot '/404'
            // 2.2) Redirect to admin basedir
        if(empty($this->actual_request)) {
            $this->safe_redirect($slug);
        } else if(!$mdls->module_page_exists($this->actual_request)) {
            if($mdls->module_page_exists('404')) {
                $this->safe_redirect('404');
            } else {
                $this->safe_redirect();
            }
        }
    }

    public function get_actual_request() {
        //echo $this->actual_request;
        return $this->actual_request;
    }

    public function safe_redirect($slug = '') {
        header("Location: ".$this->host.ADMIN_BASE.$slug."");
        die();
    }

}