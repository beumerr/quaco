<?php

class View_table {

	private $table_html_set = false;
	private $table_data_set = false;
	private $table_data = false;
	private $table_html = '';
	private $module;
	private $user_ids = [];
	public $default_args;


	// Default column specification
	public $column_specs = [
		'title' => [
			"name" => "Title",
			"func" => "get_title_td"
		],
		'status' => [
			"name" => "Status",
			"align" => "align-center",
			"func" => "get_circle_td",
			"format" => "status_to_label"
		],
		'publish_date' => [
			"name" => "Date",
			"align" => "align-right",
			"func" => "get_block_td",
			"format" => "date_format"
		]
	];

	// Additional column specification
	public $additional_specs = [
		"parent" => [
			"name" => "Children",
			"align" => "align-center",
			"func" => "get_parent_td"
		],
		"user_id" => [
			"name" => "Author",
			"func" => "get_block_td",
			"format" => "id_to_name"
		]
	];

	public function __construct() {
		global $module;
		$this->module = $module;

		// Set arguments -> load query
		$this->set_arguments();
		$this->set_view_data();

		// Get author names when $arg['support']['author'] = true
		//if(isset($this->module['support']['author']) && $this->module['support']['author'])
			$this->set_user_ids();
	}

	private function set_arguments() {

		// Default argument values
		$this->default_args = [
			"where" => [
				"type_id" => $this->module['type_id'],
			],
			"order_by" => "publish_date",
			"order_type" => "DESC"
		];

		// If parent is supported in $arg
		if(isset($this->module['support']['parent']) && $this->module['support']['parent'])
			$this->set_column_specs('parent', $this->additional_specs['parent'], 1);


		// If author is supported in $arg
		if(isset($this->module['support']['author']) && $this->module['support']['author'])
			$this->set_user_ids();
			$this->set_column_specs('user_id', $this->additional_specs['user_id'], 2);
	}

	private function set_column_specs($db_col, $spec, $offset) {
		$new_spec = array_slice($this->column_specs, 0, $offset, true) +
					array($db_col => $spec) +
					array_slice($this->column_specs, $offset, NULL, true);

		$this->column_specs = $new_spec;
	}
	private function set_view_data() {
		$q = new Query;

		// TODO: Query should only load columns based on $arg['support'] values
		$this->table_data = $q->query('post', $this->default_args);
		$this->table_data_set = true;
	}

	private function get_view_data() {
		if(!$this->table_data_set) {
			$this->set_view_data();
		}
		return $this->table_data;
	}

	private function set_table_html() {
		$this->table_html = "<div class=\"table-row\">".
			"<table id=\"view-all\" data-show_parent=\"false\">".
				"<thead>".
					$this->get_table_head().
				"</thead>".
				"<tbody>".
					$this->get_table_body().
				"</tbody>".
			"</table>".
		"</div>";
		$this->table_html_set = true;
	}

	private function get_table_html() {
		if(!$this->table_html_set) {
			$this->set_view_data();
		}
		return $this->table_html;
	}

	private function get_table_head() {
		$count = 0;
		$html = '<tr>';

		foreach($this->column_specs as $db_col => $spec) {
			$colspan    = ($db_col === "title" ? "colspan='2'" : '');
			$align      = (isset($spec['align']) ? $spec['align'] : 'align-left');
			$active     = ($db_col === "publish_date" ? "active order-desc" : "dis");
			$on_click   = "onclick=\"sort_this(".$count++.")\"";

			$html .= "<th $on_click $colspan class='$align $active'>".
						$spec['name'].$this->get_order_button_html().
					"</th>";
		}

		return $html."</tr>";
	}

	private function get_table_body() {
		$html = '';
		$count = 0;
		foreach($this->get_view_data() as $row_id => $row) {

			$enable_parent_view = isset($this->module['support']['parent']) && $this->module['support']['parent'];
			$class = ($enable_parent_view && $row->parent == 0 ? ($count % 2 === 0 ? 'even_row' : 'odd_row') : 'hidden');
			$html .= '<tr data-id="'.$row->id.'" data-parent="'.$row->parent.'" class="'.$class.'">'.$this->get_checkbox_td();

			foreach($this->column_specs as $db_col => $specs) {
				$html .= $this->get_body_td($row, $db_col, $specs);
			}
			$html .= "</tr>";
			if($enable_parent_view && $row->parent == 0) {
				$count++;
			}


		}
		return $html;
	}

	private function get_body_td($row, $db_col, $specs) {
		if(isset($row->$db_col)) {
			return call_user_func(
				[$this, $specs['func']],
				($db_col == 'parent' ? $row->id : $row->$db_col),
				isset($specs['format']) ? $specs['format'] : false,
				$row->id
			);
		}
	}

	private function get_hidden_containers($arr) {
		unset($arr['total']);
		$html = "<div class='hidden-child-list shadow-medium'>".
					"<ul>".
						$this->get_child_li($arr).
					"</ul>".
				"</div>";
		return $html;
	}

	private function get_child_li($arr) {
		$html = '';
		foreach($arr as $id => $child) {
			$html .= "<li>".
						substr($child['title'],0,20)."...".
						_status_to_label_html($child['status']).
					"</li>";
		}
		return $html;
	}

	private function get_child_info($parent_id) {
		$count = 0;
		$arr = [];

		foreach($this->table_data as $row_id => $row) {
			if($row->parent == $parent_id) {
				$count++;
				$arr['total'] = $count;
				$arr[$row->id] = [
					"title" => $row->title,
					"status" => $row->status
				];
			}
		}
		return $arr;
	}

	private function get_hidden_tools($post_id, $total_childs = 0) {
		return "<ul class=\"hidden-tools\">".
			"<li onclick='load_xml()'>View post</li>".
			($total_childs > 0
				? "<li class=\"show-children-item\" onclick=\"show_children($post_id)\">View $total_childs children</li>"
				: null).
			"<li>Edit</li>".
			"<li onclick=\"delete_item($post_id)\">Delete</li>".
			"</ul>";
	}

	private function get_parent_td($parent_id, $format) {
		$child_info = $this->get_child_info($parent_id);
		if(!empty($child_info)) {
			return "<td class='td-parent got-child align-center'>".
						"<div class='view-container'>".
							"<span class='count'>".$child_info['total']."</span>".
							$this->get_hidden_containers($child_info).
							"<div class='oc-overlay' onclick='show_children($parent_id)'></div>".
						"</div>".
					"</td>";
		}
		return "<td class='td-parent align-center'><div class='view-container'>0</div></td>";
	}

	private function get_title_td($value, $format, $post_id) {
		$child_info = $this->get_child_info($post_id);

		return "<td class='td-title'>".
					"<div>".
			$post_id.' '.$value.
						$this->get_hidden_tools($post_id, (isset($child_info['total']) ? $child_info['total'] : 0)).
					"</div>".
				"</td>";
	}

	private function get_circle_td($value, $format) {
		return "<td class='td-circle align-center'>".
			($format ? call_user_func([$this, $format], $value) : $value).
			"</td>";
	}

	private function get_block_td($value, $format) {
		return "<td class='td-block'>".
					"<div class='small-block'>".
						($format ? call_user_func([$this, $format], $value) : $value).
					"</div>".
				"</td>";
	}

	private function date_format($timestamp) {
		return _timestamp_to_date($timestamp);
	}

	private function id_to_name($user_id) {
		return $this->user_ids[$user_id]['first_name'].' '.$this->user_ids[$user_id]['last_name'];
	}

	private function status_to_label($status) {
		return _status_to_label_html($status);
	}

	private function set_user_ids() {
		if(isset($this->table_data[0])) {
			$user_ids = [];
			foreach($this->get_view_data() as $row_id => $row) {
				if(isset($row->user_id)) {
					if(!in_array($row->user_id, $user_ids))
						array_push($user_ids, $row->user_id);
				}
			}
			$this->append_name_to_user_id($user_ids);
		}
	}

	private function append_name_to_user_id($user_ids) {
		global $usr;

		$users = $usr->get_names_by_ids($user_ids);
		foreach($users as $i => $user) {
			$this->user_ids[$user->id]['first_name'] = $user->first_name;
			$this->user_ids[$user->id]['last_name'] = $user->last_name;
		}
	}

	private function get_checkbox_td() {
		return "<td class=\"td-checkbox\">".
					"<label class=\"checkbox-container\">".
						"<input type=\"checkbox\"><span class=\"checkmark\"></span>".
					"</label>".
				"</td>";
	}

	private function get_order_button_html() {
		return "<div class=\"order-buttons\">".
					"<i class=\"la la-angle-up\"></i>".
					"<i class=\"la la-angle-down\"></i>".
				"</div>";
	}

	public function draw_view_table() {
		if(!$this->table_html_set) {
			$this->set_table_html();
		}

		echo sanitize_output($this->get_table_html());
	}
}