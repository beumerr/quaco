<?php
session_start();

class Session {

	public function add_session($index, $value) {
		$_SESSION[$index] = $value;
		return $_SESSION[$index];
	}

	public function unset_session($index) {
		unset($_SESSION[$index]);
	}

	public function destroy_sessions() {
		session_destroy();
	}

	public function session_is_set($index) {
		if(isset($_SESSION[$index]))
			return true;

		return false;
	}

	public function get_session($index) {
		if(isset($_SESSION[$index]))
			return $_SESSION[$index];

		return false;
	}

	public function unset_all_session() {
		session_unset();
	}


}