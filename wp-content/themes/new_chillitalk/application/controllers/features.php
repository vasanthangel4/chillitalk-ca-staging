<?php if(! defined('BASEPATH')) exit('Not Allowed');

class Features extends MY_Controller{
	
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
		$this->lang->load('features');		
		$data = array('title' => 'Bundles',
					  'content' => 'features/list'
					 );
		
		$this->load->view('template/wrapper', $data);
		
	}
	

}