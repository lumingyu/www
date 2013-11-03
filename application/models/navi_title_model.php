<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class navi_title_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this -> load -> database('default',TRUE);
	}

	function display() {
		$this -> db -> order_by('title_id', 'asc');
		$res = $this -> db -> get('system_navi_title');
		return $res -> result();
	}
	
	function data_insert($data) {
		$p['title_name'] = $data[0];
		$this -> db -> insert('system_navi_title', $p);
	}
	
	function get_first_title() {
		$res = $this -> db -> query("select title_id,title_name from system_navi_title LIMIT 1");
		return $res -> row();
	}
	
	function get_titlename_by_id($title_id)
	{
		$sql = "select title_name from system_navi_title where title_id = ?";
		$res = $this -> db -> query($sql, array($title_id));
		if($res -> num_rows() > 0)
			return $res -> row()->title_name;
		else 
			return "";
	}
}