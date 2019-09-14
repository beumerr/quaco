<?php
function type_to_json($module, $page) {
	return htmlentities(json_encode([
		"module" => $module,
		"page" => $page
	]));
}