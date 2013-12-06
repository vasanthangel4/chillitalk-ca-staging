<?php if(! defined('BASEPATH')) exit('Not Allowed');

class Earn_money extends MY_Controller{
	
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
				
		$data = array('title' => 'Bundles',
					  'content' => 'earn_money/list'
					 );
		
		$this->load->view('template/wrapper', $data);
		
	}
	

}