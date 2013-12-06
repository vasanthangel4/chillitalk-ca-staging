<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Home extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		
		$this->lang->load('home'); //in folder language is home_lang.php but u just call without _lang.php
		$data = array('judul' => 'Home', 'content' => 'front/front');
		
		$this->load->view('template/wrapper', $data);
		
		
	}
	
	
	
	public function get_rates(){
		
		header("HTTP/1.1 200 OK");
		
		$country = $this->uri->segment('3');
		
		$uri = 'http://sws.vectone.com/api/CTPRate?origin='.$this->config->item('country_code_web').'&dest='.$country.'&currency='.$this->config->item('currency_web').'&lang=ENG';
	  	
		
		
		$this->rest->format('application/json');

		$result = $this->rest->get($uri);
		
		echo json_encode($result);
	}
	
	public function call_rates() {
		
		header("HTTP/1.1 200 OK");
		
		$country = $this->uri->segment('3');
		
		$uri = 'http://sws.vectone.com/api/CTPRate?origin='.$this->config->item('country_code_web').'&dest='.$country.'&currency='.$this->config->item('currency_web').'&lang=ENG';
	  	
		
		
		$this->rest->format('application/json');

		$result = $this->rest->get($uri);
		
		echo json_encode($result);
	}

}