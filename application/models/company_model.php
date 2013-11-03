<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this -> load -> database('default',TRUE);
	}

	/* 用户登录 */
	function display() {
		/*$this -> db -> where("uname", $tmp['uname']);
		$this -> db -> where("upass", $tmp['upass']);
		$this -> db -> from('company_info');
		$num = $this -> db -> count_all_results();
		*/
		$this -> db -> order_by('company_id', 'desc');
		$res = $this -> db -> get('company_info');
		return $res -> result();
	}

	
}

