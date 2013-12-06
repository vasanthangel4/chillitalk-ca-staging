<?php if(! defined('BASEPATH')) exit('Not Allowed');

class Terms_condition extends MY_Controller{
	
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
		$this->lang->load('app');		
		$data = array('title' => 'Bundles',
					  'content' => 'support/terms_conditions'
					 );
		
		$this->load->view('template/wrapper', $data);
		
	}
	

}