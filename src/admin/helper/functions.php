<?php


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function require_to_var($file, $min = true) {
    ob_start();
    require($file);

    return $min ? sanitize_output(ob_get_clean()) : ob_get_clean();
}


function sanitize_output($html) {
	$search = array(
		'/\>[^\S ]+/s', //strip whitespaces after tags, except space
		'/[^\S ]+\</s', //strip whitespaces before tags, except space
		'/(\s)+/s'  // shorten multiple whitespace sequences
	);
	$replace = array(
		'>',
		'<',
		'\\1'
	);
	$html = preg_replace($search, $replace, $html);
	return $html;
}
