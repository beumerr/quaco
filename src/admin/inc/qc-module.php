<?php

class QC_module {
    // Module info
    private $active_module;

    public function __construct($active_module) {
        $this->active_module = $active_module;
    }

    public function get_module() {
        $dir = $this->active_module['dir'];
        if(isset($this->active_module['admin_init'])) {
            $file = $this->active_module['admin_init'];
            return require_to_var("".ABSPATH . 'module/' . $dir . '/' . $file."");
        } else {
            return "<h1>Admin page argument not set in module : ".$dir."</h1>";
        }
    }
}