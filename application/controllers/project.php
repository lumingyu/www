<?php
class Project extends CI_Controller  {

	public $title = 'traffic';
	
	/* 构造函数 */
	function __construct() {
		parent::__construct();
		$this->sys =& get_instance(); //载入扩展类
		$this->sys->load->model('user_model','user'); //载入Mis系统用户模型
		$this->sys->load->model('company_model','company'); //载入公司信息模型
	}
	
	/* 公司展示页面 */
	public function company_display() {
		
		$info = objtoarr($this->company->display());
		$data = array(
			'title' => $this->title,
			'line' => $info
		);
		$this->load->view('company_display.php',$data);
	}
}