<?php

class Error_handle {

	private $errors = [];

	public function add_error($type, $method, $msg) {
		$temp = [
			"method"    => $method,
			"msg"       => $msg
		];
		array_push($this->errors[$type], $temp);
	}


	public function get_error_html() {
		$html = "<div id='error'>";
		foreach($this->errors as $type => $errors) {
			$html .= "<div>".
						 "<span class='error-type'>".$type."</span>";
			foreach($errors as $index => $value) {
				$html .= "<span>".$index." - ".$value."</span>";
			}
			$html .= "</div>";
		}
	}

}