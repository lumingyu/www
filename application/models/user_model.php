<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this -> load -> database('default',TRUE);
	}
	//检查是否存在注册用户
	function check_user_name($user_name)
	{
		$this -> db -> where("user_name", $user_name);
		$res = $this -> db -> get('auth_user');
		return $res->num_rows();
	}
	/* 用户登录 */
	function login($tmp) {
		/*$this -> db -> where("uname", $tmp['uname']);
		$this -> db -> where("upass", $tmp['upass']);
		$this -> db -> from('mt_admin');
		$num = $this -> db -> count_all_results();
		*/
		return 0;
	}

	/* 更新用户资料 */
	function modify($uname,$data) {
		return $this -> db -> update('mt_admin', $data, "uname = '$uname'");
	}

	/* 查看管理员所属组 */
	function material($uname) {
		$this -> db -> where("uname", $uname);
		$res = $this -> db -> get('mt_admin');
		//echo $this -> db -> last_query();
		$arr = $res -> result();
		return $arr['0'];
	}

	/* 得到用户数组 */
	function userarr() {
		//$this -> db -> where("rank", 0);
		$this -> db -> where('delete','N');
		$res = $this -> db -> get('mt_admin');
		$arr = $res -> result();
		return $arr;
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
