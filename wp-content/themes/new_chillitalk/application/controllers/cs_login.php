<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Cs_login extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		
		
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		
		if($this->form_validation->run()) {
			$info    = $this->input->post('info');
			$login    = $this->input->post('username');
		  	$password = $this->input->post('password');
		  	$uri = 'http://sws.vectone.com/api/CTPCSLogin';
		  
		  	$params = array('CustInfo' => $info,
							'CsLogin' => $login,
							'CsPwd' => $password,
							'Site' => $this->config->item('site_code_web'),
							'IpAddr' => $this->input->ip_address(),
							'UserAgent' => $this->input->user_agent()
							);
		  	$this->rest->format('application/json');
		  
		 	$result = $this->rest->post($uri, $params);
		  
			//print_r($result);
		  	
			if($result->ErrCode == '0') {
							 
			   $this->session->set_userdata('username', $login); 
			   $this->session->set_userdata('password', $password);
			   $this->session->set_userdata('title', $result->Title);
			   $this->session->set_userdata('balance', $result->Balance);
			   $this->session->set_userdata('cust_id', $result->CustId);
			   $this->session->set_userdata('mobile_phone', $result->MobilePhone);
			   $this->session->set_userdata('account_id', $result->AccId);
			   $this->session->set_userdata('sec_id', $result->SecId);
			   $this->session->set_userdata('id_login', uniqid(rand()));
			   $this->session->set_userdata('cs', 'cs');
			   
			   $uri_pd = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
			  
			   $this->rest->format('application/json');
			  
			   $result_pd = $this->rest->get($uri_pd);
			
			   if($result_pd->FirstName == '-' || $result_pd->Surname == '-' || is_numeric($result_pd->Email)) {
				   
				   $this->session->set_userdata('complete_registrtion','complete');
				   redirect(base_url().$this->session->userdata('lang').'/cs_login/complete_registration');
			   }else{
				   redirect(base_url().$this->session->userdata('lang').'/myaccount/dashboard');
			   }
				   
			   
			  
			   if($this->session->userdata('bundles') != '') {
						redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/buy');
			   }else{
						redirect(base_url().$this->session->userdata('lang').'/myaccount/dashboard'); 
			   }
				   
			   if($this->session->userdata('logout_success') != '') {
				   $this->session->unset_userdata('logout_success');
			   }
		  
		  	}else{
				
			   if($this->session->userdata('logout_success') != '') {
				   $this->session->unset_userdata('logout_success');
			   }
			 
			  $this->session->set_userdata('login_failed','Sorry, Please enter username and password correctly');	
			  redirect(base_url().$this->session->userdata('lang').'/cs_login');		  
		  	}
		}
		
		$data = array('title' => 'Login Member', 'content' => 'login/cslogin');
		$this->load->view('template/wrapper', $data);
		$this->session->unset_userdata('login_failed');
		$this->session->unset_userdata('logout_success');
		if($this->session->userdata('bundles') != '') {
			$this->session->unset_userdata('bundles');
		}
	}
	
	

}