<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class forgot_password extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		$this->form_validation->set_rules('forgot','forgot','required');
		
		if($this->form_validation->run()) {
			
			$forgot    = $this->input->post('forgot');

		  	$uri = 'http://sws.vectone.com/api/CTPForgotPassword';
		  
		  	$params = array('Login' => $forgot);
			
		  	$this->rest->format('application/json');
		  
		 	$result = $this->rest->post($uri, $params);
		  
			print_r($result);
		  	if($result->ErrCode == '0') {
			  
			  if(is_numeric($forgot)) {
				  $this->session->set_userdata('success_forgot','Your password has been sent to your mobile via SMS. If you haven’t receive a text from us within an hour, please email <a href="mailto:support@chillitalk.com?subject=Forget my chillitalk account Password">support@chillitalk.com</a>');
			  	  redirect(base_url().$this->session->userdata('lang').'/forgot_password');
			  }else{
				  $this->session->set_userdata('success_forgot','Your password has been sent to your email address. If you haven’t receive a email from us within an hour, please email <a href="mailto:support@chillitalk.com?subject=Forget my chillitalk account Password">support@chillitalk.com</a>');
				  redirect(base_url().$this->session->userdata('lang').'/forgot_password');
			  }
		  	}else{
				
			   $this->session->set_userdata('failed_forgot', $result->ErrMsg);
			   redirect(base_url().$this->session->userdata('lang').'/forgot_password');
			   	
		  	}
		}
		
		$data = array('title' => 'Login With Access Code', 'content' => 'login/forgot_password');
		$this->load->view('template/wrapper', $data);
		
		if($this->session->userdata('failed_forgot') != '') {
			$this->session->unset_userdata('failed_forgot');
		}
		
		if($this->session->userdata('success_forgot') != '') {
			$this->session->unset_userdata('success_forgot');
		}
		
	}

}