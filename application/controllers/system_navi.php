<?php 

class System_navi extends CI_Controller  {

	public $title = '镇江天然气发布平台';
	public $company = "北京博思达新世纪测控技术有限公司";
	
	/* 构造函数 */
	function __construct() {
		parent::__construct();
		$this->sys =& get_instance(); //载入扩展类
		$this->sys->load->model('navi_title_model','navi_title'); //载入导航标题
		$this->sys->load->model('navi_subtitle_model','navi_subtitle'); //载入导航子标题
	}
	
	/*读取系统导航*/
	public function load_navi_title()
	{
		$navi_title = objtoarr($this->navi_title->display());
		$data = array(
				'title' => $this->title,
				'username' => $this->session->userdata('username'),
				'navi_title' => $navi_title
				);
		$this->load->view('mis_top.php',$data);
	}
	
	public function load_navi_subtitle($title_id)
	{
		$navi_subtitle = objtoarr($this->navi_subtitle->display($title_id));
		$navi_title = $this->navi_title->get_titlename_by_id($title_id);
		if($navi_title == null)
		{
			$default_title = $this->navi_title->get_first_title();
			$navi_subtitle = objtoarr($this->navi_subtitle->display($default_title->title_id));
			$navi_title = $default_title->title_name;
		}
		$data = array(
				'navi_title' => $navi_title,
				'navi_subtitle' => $navi_subtitle
				);
		$this->load->view('mis_left.php',$data);
	}
	
	
}


