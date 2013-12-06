<?php if(! defined('BASEPATH')) exit('Not Allowed');

class Bundles extends MY_Controller{
	
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
		
		$this->session->set_userdata('bundles','Sri Lanka');
		
		$this->lang->load('bundles');
		
		$data = array('title' => 'Bundles', 'content' => 'bundles/bundles');
		
		$this->load->view('template/wrapper', $data);
		
	}
	
	public function philippines() {
		
		header("HTTP/1.1 200 OK");
		
		$this->lang->load('bundlesphili');
		
		$this->session->set_userdata('bundles','Philippines');
		
		$data = array('title' => 'Bundles', 'content' => 'bundles/bundles_phili');
		$this->load->view('template/wrapper', $data);
		
	}
}