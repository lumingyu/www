<?php 

class System_register extends CI_Controller  {

	public $title = '镇江天然气发布平台';
	public $company = "北京博思达新世纪测控技术有限公司";
	
	/* 构造函数 */
	function __construct() {
		parent::__construct();
		$this->sys =& get_instance(); //载入扩展类
		$this->sys->load->model('user_model','user'); //载入用户模型
	}
	
	public function register()
	{
		$data = array(
				'title' => $this->title,
				);
		$this->load->view('/register/register_home.php',$data);
	}
	/*读取注册页面body*/
	public function register_body()
	{
		$data = array(
				'title' => $this->title,
				);
		$this->load->view('/register/register_body.php',$data);
	}
	/*读取注册页面TOP*/
	public function register_top()
	{
		$data = array(
				'title' => $this->title,
				);
		$this->load->view('/register/register_top.php',$data);
	}
	/*读取注册页面LEFT*/
	public function register_left()
	{
		$data = array(
				'title' => $this->title,
				);
		$this->load->view('/register/register_left.php',$data);
	}
	/*读取注册页面版权*/
	public function register_copy() {
		$data = array(
				'title' => $this->title,
				'company' => $this->company,
				);
		$this->load->view('/register/register_copy.php', $data);
		
	}
	
	public function check_user_name()
	{
		$user_name = $this->input->get('user_name');
		if(strlen($user_name) == 0)
		{
			echo "<font color=\"red\">用户名不得为空</font>";
			return;
		}
		if(strlen($user_name) > 20)
		{
			echo "<font color=\"red\">用户名称超过20个字符</font>";
			return;
		}
		if(preg_match("/[ '.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$user_name))
		{
			echo "<font color=\"red\">用户名称存在非法字符</font>";
			return;
		}
		$user_exist = $this->user->check_user_name($user_name);
		if($user_exist != 0)
		{
			echo "<font color=\"red\">用户名称已存在</font>";
		}else
		{
			echo "用户名可以使用";
		}
	}
	
}


