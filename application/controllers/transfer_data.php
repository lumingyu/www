<?php
class Transfer_data extends CI_Controller  {

	public $title = 'traffic';
	
	/* 构造函数 */
	function __construct() {
		parent::__construct();
		$this->sys =& get_instance(); //载入扩展类
		$this->sys->load->model('tranfer_data_model','data'); //载入Mis系统用户模型
		
	}
	
	/* 仪表状态信息数据展示页面 */
	public function instrument_history_info_display() {
		
		$info = objtoarr($this->data->display());
		$data = array(
			'title' => $this->title,
			'line' => $info
		);
		$this->load->view('instrument_history_info_display.php',$data);
	}
	
	/* 仪表状态信息数据查询页面 */
	public function instrument_history_info_find() {
		$this->get_data();
		sleep(10);
		jump("数据发送中,请稍后...","index.php/transfer_data/instrument_history_info_display");

	}
	
	/* 仪表天然气组分赋值页面 */
	public function instrument_history_info_set() {
		$data = array(
			'title' => $this->title
		);
		$this->load->view('instrument_history_info_set.php',$data);
	}
	
	public function get_data() {
		set_time_limit(0);

		$host = "192.168.1.104";
		$port = 8000;

		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)or die("Could not create	socket\n"); // 创建一个Socket
		 
		$connection = socket_connect($socket, $host, $port) or die("Could not connet server\n");    //  连接
		 
		socket_write($socket, '15712950227,101,1,3') or die("Write failed\n"); // 数据传送 向服务器发送消息
		 
		$buffer = socket_read($socket, 1024, PHP_NORMAL_READ);
		socket_close($socket);
		$data = explode(',',$buffer);
		$this->data->data_insert($data);
	}
	
		public function set_data() {
		$command = '15712950227,101,1,16';
		for($i = 1; $i <= 21; $i++) {
			$command .= ','.$this -> input -> post("component".$i,true);
		}
		set_time_limit(0);

		$host = "192.168.1.104";
		$port = 8000;

		$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)or die("Could not create	socket\n"); // 创建一个Socket
		 
		$connection = socket_connect($socket, $host, $port) or die("Could not connet server\n");    //  连接
		 
		socket_write($socket, $command) or die("Write failed\n"); // 数据传送 向服务器发送消息
		 
		$buffer = socket_read($socket, 1024, PHP_NORMAL_READ);
		socket_close($socket);
		$data = explode(',',$buffer);
		$this->data->data_insert($data);
		jump("数据发送中,请稍后...","index.php/transfer_data/instrument_history_info_display");
	}
}