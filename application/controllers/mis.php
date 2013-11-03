<?php 

class Mis extends CI_Controller  {

	public $title = '镇江天然气发布平台';
	public $company = "北京博思达新世纪测控技术有限公司";
	
	/* 构造函数 */
	function __construct() {
		parent::__construct();
		$this->sys =& get_instance(); //载入扩展类
		/*$this->sys->load->model('user_model','u'); //载入Mis系统用户模型
		$this->sys->load->model('tag_model','t'); //载入Mis系统Tag模型
		$this->sys->load->model('article_model','a'); //载入Mis系统文章模型
		$this->sys->load->model('item_model','i'); //载入Mis系统项目模型
		$this->sys->load->model('link_model','l'); //载入Mis系统连接池模型
		$this->sys->template->assign("meituanseo", "美团优化系统V1.0 Beta");
		$this->sys->template->assign("meituanurl", base_url());
		$this->auth(array('mis/index','mis/login','project/tagsortjson','project/v2logs'),"请登录...");*/
		$this->sys->load->model('user_model','user'); //载入Mis系统用户模型
		
	}
	
	/* 后台登陆页面 */
	public function index() {
		$data = array('title' => $this->title);
		//if($this->session->userdata('meituanseo_admin') && $this->session->userdata('meituanseo_admin_id')) redirect('mis/home');
		//$this->template->assign('u',$this->getuser());
		$this->load->view('mis_login.php',$data);
	}

	/* 后台登录 */
	public function login() {
		
		$tmp = array();
		$tmp['username'] = $username = $this->input->post("username",true);
		$tmp['password'] = $password = md5($this->input->post("password",true));
		//log_message('info', 'User:'.$uname.',Pass:'.substr($this->input->post("upass",true),0,2).'*** IP:'.strip_tags($this->getuser()));
		/*
		$login = $this->user->login($tmp);
		if($login) {
			$this->session->set_userdata('meituanseo_admin', $uname);
			//$uinfo = objtoarr($this->u->material($uname));
			$this->session->set_userdata('meituanseo_admin_id', $uinfo['id']);
			$this->session->set_userdata('meituanseo_admin_truename', $uinfo['name']);
			//以后扩展权限组
			$this->session->set_userdata('meituanseo_admin_rank', $uinfo['rank']);
			jump("正在进入系统,初始化数据中,请稍后...","mis/home");
		} else {
			jump("用户名或者密码错误","mis");
		}
		*/
		$this->session->set_userdata('username', $username);
		$this->session->set_userdata('password', $password);
		jump("正在进入系统,初始化数据中,请稍后...","index.php/mis/home");
	}

	/* 控制面板 */
	public function home() {
		$data = array('title' => $this->title);
		$this->load->view('mis_home.php', $data);
	}

	/* 控制面板顶部 */
	public function mis_top() {
		$data = array(
				'title' => $this->title,
				'username' => $this->session->userdata('username')
				
				);
		$this->load->view('mis_top.php', $data);
	}

	/* 控制面板左侧 */
	public function mis_left() {
		$data = array(
				'title' => $this->title,
				
				);
		$this->load->view('mis_left.php', $data);
		
	}
	
	/* 版权页 */
	public function mis_copy() {
		$data = array(
				'title' => $this->title,
				'company' => $this->company,
				);
		$this->load->view('mis_copy.php', $data);
		
	}
	
	/* 控制面板欢迎页 */
	public function misini() {
		$this->template->display('mis_yini.tpl');
	}
	
	/* 专题管理 --系统管理*/
	public function missys() {
		$data = array(
				'title' => $this->title,
				
				);
		$this->load->view('mis_left.php', $data);
	}
	
	/* 专题管理 --网站栏目*/
	public function project() {
		$data = array(
				'title' => $this->title,
				
				);
		$this->load->view('mis_project.php', $data);
	}
	
	
	/* 专题管理 --数据传送*/
	public function data() {
		$data = array(
				'title' => $this->title,
				
				);
		$this->load->view('mis_mdata.php', $data);
	}



	/* 退出中心 */
	public function logout() {
		$this->session->sess_destroy();
		redirect("mis/index", "refresh");
	}

	/* 修改密码 */
	public function pass() {
		if(!empty($_POST)) {
			$oldpass = $this->input->post("oldpass",true);
			$upass = $this->input->post("upass",true);
			$upass1 = $this->input->post("upass1",true);
			if(empty($oldpass) || empty($upass) || empty($upass1)) {
				jump("旧密码或者新密码不能为空","mis/pass");
			} else {
				$login = $this->u->login(array("uname" => $this->session->userdata('meituanseo_admin'),"upass" => md5($oldpass)));
				if($login) {
					if($upass == $upass1) {
						$this->u->modify($this->session->userdata('meituanseo_admin'),array("upass" => md5($upass)));
						jump("修改成功","mis/pass");
					}
				}
			}
		} else {
			$this->template->display('mis_pass.tpl');
		}
	}
	
	/* 用户登录IP */
	private function getuser() {
		$this->load->library('ip'); //引入读取类
		$this->ip->getiplocation( getuip() ); 
		if($this->ip->get('country') != '本地网络' && $this->ip->get('country') != '局域网') {
			$ip = iconv("gb2312", "utf-8", $this->ip->get('country')); //转码
		} else {
			$ip = "www.buzhidao.com";
		}
		return "<font color='red'>你的操作记录将被记录 IP:".getuip()." 位置:".$ip.'</font>';
	}
}


