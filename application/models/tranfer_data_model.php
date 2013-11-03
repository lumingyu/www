<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tranfer_data_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this -> load -> database('default',TRUE);
	}

	function display() {

		$this -> db -> order_by('id', 'desc');
		$res = $this -> db -> get('instrument_history_info');
		return $res -> result();
	}
	
	function data_insert($data) {
	
		
		$p['stb_id'] = $data[0];
		$p['instrument_id'] = $data[1];
		$p['collect_time'] = $data[3];
		for($i = 1; $i <= 21; $i++)
		{
			$p['component'.$i] = $data[3 + $i];
		}
		$p['temperature'] = $data[25];
		$p['pressure'] = $data[26];
		$p['volume_flow'] = $data[27];
		$p['energy'] = $data[28];
		$p['accumulation_flow'] = $data[29];
		$p['accumulation_energy'] = $data[30];
		$this -> db -> insert('instrument_history_info', $p);
	}
	
}

