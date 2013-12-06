<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Welcome extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		$this->lang->load('home'); //in folder language is home_lang.php but u just call without _lang.php
		$data = array('judul' => 'Home');
		
		$this->load->view('template/home_us', $data);
		
		
	}
	

}