<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Rates extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		$this->lang->load('rates');
		$data = array('title' => 'Login With Access Code','content' => 'rates/rates');
		$this->load->view('template/wrapper', $data);
		
	}

}