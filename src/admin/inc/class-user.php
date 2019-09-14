<?php

class User {

	public $user_table = 'user';

	public $user_meta_table = 'user_meta';

	public $user_is_set = false;

	private $token_is_active = false;

	private $user_id = 0;

	private $user_mail = '';

	private $user_level = 0;

	private $user_first_name = '';

	private $user_last_name = '';

	private $current_user_meta = [];

	public function __construct($user_id = 0, $set_meta = false) {
		if($user_id > 0) {
			$this->set_current_user($user_id, $set_meta);
		}
	}

	public function user_exists($user_id) {
		global $qdb;

		$query = "SELECT COUNT(*) FROM $this->user_table WHERE id = %d";
		$prepare = $qdb->prepare($query, $user_id);
		$count = $qdb->get_var($prepare);

		if($count == 1) return true;
		return false;
	}

	/**
	 * @param $mail
	 * @param $password
	 * @return bool|string|null
	 */
	public function authenticate_user($mail, $password) {
		global $qdb;

		$query = "SELECT id, password FROM $this->user_table WHERE mail = %s";
		$prepare = $qdb->prepare($query, $mail);
		$user = $qdb->get_row($prepare);

		if(isset($user) && $user->id > 0 && password_verify($password, $user->password)) {
			$this->update_last_login($user->id);
			return $user->id;
		}

		return false;
	}


	public function set_current_user($user_id, $set_meta = false) {
		global $qdb;

		$query = "SELECT id, mail, level, first_name, last_name, last_login FROM $this->user_table WHERE id = %s";
		$prepare_sql = $qdb->prepare($query, $user_id);
		$user = $qdb->get_row($prepare_sql);

		if(!empty($user)) {
			$this->user_is_set = true;

			$this->user_id = $user->id;
			$this->user_mail = $user->mail;
			$this->user_level = $user->level;
			$this->user_first_name = $user->first_name;
			$this->user_last_name = $user->last_name;
		}

		if($set_meta) {
			$this->set_user_meta($user_id);
		}
	}

	// Set user meta data
	public function set_user_meta($user_id = 0) {
		global $qdb;

		if($this->user_is_set || $user_id > 0) {
			$query = "SELECT name, value FROM user_meta WHERE user_id = %s";
			$prepare_sql = $qdb->prepare($query, ($user_id > 0 ? $user_id : $this->user_id));
			$user_meta = $qdb->get_row($prepare_sql);

			$this->current_user_meta = $user_meta;
		}
	}

	public function update_last_login($user_id = 0) {
		global $qdb;

		$query = "UPDATE $this->user_table SET last_login = now() WHERE id = %d";
		$prepare = $qdb->prepare($query, $user_id > 0 ? $user_id : $this->user_id);

		$qdb->query($prepare);
	}

	/**
	 * Update user meta field
	 *
	 * @param $name * Meta name to update
	 * @param $value * Value to set
	 * @param int $user_id - Set the user to update
	 *
	 * @return bool|int
	 */
	public function update_user_meta($name, $value, $user_id = 0) {
		global $qdb;

		$row_count = 0;
		if($this->user_is_set || $user_id > 0) {
			$row_count = $qdb->update(
				'user_meta',
				["value" => $value],
				["user_id" => ($user_id > 0 ? $user_id : $this->user_id), "name" => $name]
			);
		}

		return $row_count;
	}

	/**
	 * Update user row with data array
	 *
	 * @param $data * Array for data to be set, ex: ["first_name" => $fn, "last_name" => $ln]
	 * @param int $user_id - Set the user to update
	 *
	 * @return bool|int
	 */
	public function update_user($data, $user_id = 0) {
		global $qdb;

		$row_count = 0;
		if($this->user_is_set || $user_id > 0) {
			$row_count = $qdb->update(
				$this->user_table,
				$data,
				["id" => ($user_id > 0 ? $user_id : $this->user_id)]
			);
		}

		return $row_count;
	}

	/**
	 * Update user field
	 * @param $field * Field to update
	 * @param $value * Value to set
	 * @param int $user_id - Set the user to update
	 *
	 * @return bool|int
	 * @see Database::update
	 *
	 */
	public function update_user_field($field, $value, $user_id = 0) {
		global $qdb;

		$row_count = 0;
		if($this->user_is_set || $user_id > 0) {
			$row_count = $qdb->update(
				$this->user_table,
				[$field => $value],
				["id" => ($user_id > 0 ? $user_id : $this->user_id)]
			);
		}

		return $row_count;
	}

	// Get meta data from current user
	public function get_current_user_meta() {
		if($this->user_is_set) {
			if(empty($this->current_user_meta)) {
				$this->set_user_meta($this->user_id);
			}
			return $this->current_user_meta;
		}
		return false;
	}

	// Get user is set true/false
	public function user_is_set()           { return $this->user_is_set; }
	public function get_user_id()           { return $this->user_id; }
	public function get_user_level()        { return $this->user_level; }
	public function get_user_mail()         { return $this->user_mail; }
	public function get_user_first_name()   { return $this->user_first_name; }
	public function get_user_last_name()    { return $this->user_last_name; }

}