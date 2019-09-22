<?php

class Query {

	public $last_result;
	private $query =  '';

	public $default_table = 'post';

	public $default_order_value = 'date';

	public $default_order_type = 'asc';

	public function __construct($query = '') {
		if(!empty($query)) {
			$this->query = $query;
		}
	}

	/**
	 * Build query with arguments
	 *
	 * @param $table    - table         String  -   Table to select from
	 * @param $args     - columns       array   -   Select columns, default is *
	 *                  - where         array   -   Where clause - ex: ['post_id' => 1, 'status' => 1]
	 *                  - order_by      String  -   Order by value, default is publish_date
	 *                  - order_type    String  -   Order by type (DESC, ASC), default is asc
	 *                  - limit         int     -   Limit results
	 *                  - offset        int     -   Offset for limit
	 */
	public function query($table = false, $args = false) {

		global $qdb;

		$prepare_values = [];

		// SELECT clause
		$query = 'SELECT ';
		if(isset($args['columns']) && count($args['columns']) > 0) {
			$count = 0;
			foreach($args['columns'] as $col) {
				$query .= $col;
				$query .= (count($args['columns']) > 1 && $count++ < count($args['columns']) - 1 ? ', ' : ' ');
			}
		} else {
			// Select ALL
			$query .= '* ';
		}

		// FROM clause
		$query .= "FROM ".($table ? $table : $this->default_table)." ";

		// WHERE clause
		if(isset($args['where']) && count($args['where']) > 0) {
			$count = 0;
			$query .= 'WHERE ';
			foreach($args['where'] as $col => $value) {
				$query .= $col." = ".(is_int($value) ? '%d' : '%s')." ";
				if(count($args['where']) > 1 && $count++ < count($args['where']) - 1) {
					$query .= 'AND ';
				}
				array_push($prepare_values, $value);
			}
		}

		// ORDER BY clause
		$query .= 'ORDER BY ';
		$query .= (isset($args['order_by']) && !empty($args['order_by'])
			? $args['order_by'].' '
			: $this->default_order_value.' ');

		// ORDER TYPE clause
		$query .= (isset($args['order_type']) && !empty($args['order_type'])
			? $args['order_type'].' '
			: $this->default_order_type.' ');

		// LIMIT clause
		if(isset($args['limit']) && !empty($args['limit'])) {
			$query .= 'LIMIT %d ';
			array_push($prepare_values, $args['limit']);
		}

		// OFFSET clause
		if(isset($args['offset']) && !empty($args['offset'])) {
			$query .= 'OFFSET %d';
			array_push($prepare_values, $args['offset']);
		}

		$prepare = $qdb->prepare($query, $prepare_values);
		$qdb->get_results($prepare);
		return $qdb->last_result;
	}


}