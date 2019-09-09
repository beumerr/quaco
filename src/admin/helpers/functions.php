<?php

function load_modules() {

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function require_to_var($file) {
    ob_start();
    require($file);
    return ob_get_clean();
}


