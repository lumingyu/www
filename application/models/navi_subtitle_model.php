<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class navi_subtitle_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this -> load -> database('default',TRUE);
	}

	function display($title_id) {
		$sql = "select * from system_navi_subtitle where title_id = ?";
		$this -> db -> order_by('subtitle_id', 'asc');
		$res = $this -> db -> query($sql, array($title_id));
		return $res -> result();
	}
	
	function data_insert($data) {
		$p['title_id'] = $data[0];
		$p['subtitle_name'] = $data[1];
		$p['link_page'] = $data[2];
		$this -> db -> insert('system_navi_subtitle', $p);
	}
	
}