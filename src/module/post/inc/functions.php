<?php
function _type_to_json($module, $page) {
	return htmlentities(json_encode([
		"module" => $module,
		"page" => $page
	]));
}

function _timestamp_to_date($timestamp) {
	return date( "d/m/Y", strtotime($timestamp));
}

function _status_to_label_html($status) {
	switch($status) {
		case 0 :
			$class = 'red-bg';
			$label = 'D';  // Draft
			$full = 'draft';  // Draft
			break;
		case 1 :
			$class = 'green-bg';
			$label = 'P'; // Published
			$full = 'publish';  // Draft
			break;
		case 2 :
			$class = 'orange-bg';
			$label = 'R'; // Review
			$full = 'review';  // Draft
			break;
		default :
			$class = 'red-bg';
			$label = 'U'; // Unknown
			$full = 'unknown';  // Draft
	}
	return "<div class='status-circle $class'>$label</div><div class='hidden'>$full</div>";
}