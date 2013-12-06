<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Login_access_code extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		
		$this->form_validation->set_rules('access_code','Access Code','required|numeric');
		$this->lang->load('login_member');
		
		if($this->form_validation->run()) {
			
			$access_code    = $this->input->post('access_code');
			
			$username = substr($access_code ,0,7);
		  	$password = substr($access_code ,7,4);
		  	$uri = 'http://sws.vectone.com/api/CTPLogin';
		  
		  	$params = array('login' => $username, 'password' => $password);
		  	$this->rest->format('application/json');
		  
		 	$result = $this->rest->post($uri, $params);
		  
			
		  	if($result->ErrCode == '0') {
							 
			   $this->session->set_userdata('username', $username); 
			   $this->session->set_userdata('password', $password);
			   $this->session->set_userdata('title', $result->Title);
			   $this->session->set_userdata('balance', $result->Balance);
			   $this->session->set_userdata('cust_id', $result->CustId);
			   $this->session->set_userdata('mobile_phone', $result->MobilePhone);
			   $this->session->set_userdata('account_id', $result->AccId);
			   $this->session->set_userdata('sec_id', $result->SecId);
			   $this->session->set_userdata('id_login', uniqid(rand()));
			   
			   $uri_pd = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
			  
			   $this->rest->format('application/json');
			  
			   $result_pd = $this->rest->get($uri_pd);
			
			   if($result_pd->FirstName == '-' || $result_pd->Surname == '-' || is_numeric($result_pd->Email)) {
				   
				   $this->session->set_userdata('complete_registrtion','complete');
				   
				   $uri_mail_signup = 'http://sws.vectone.com/api/CTPSendHTMLMail';
				   $params_mail_signup = array("Step" => 2,
											   "Email" => $email_address,
											   "MobileNo" => $this->session->userdata('username'),
											   "AccessNumber" => $this->session->userdata('access_no'),
											   "FriendName" => $first,
											   "FriendNumber" => "",
											   "LocalNumber" => "",
											   "Balance" => $this->session->userdata('total_bal')
											   );
				   $this->rest->format('application/json');
					
				   $result_mail_signup = $this->rest->post($uri_mail_signup, $params_mail_signup);
					
				  
				
				   redirect(base_url().$this->session->userdata('lang').'/login_member/complete_registration');
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
			 
			  $this->session->set_userdata('login_failed','Sorry, Please enter your Access Code correctly');	
			  redirect(base_url().$this->session->userdata('lang').'/login_access_code');		  
		  	}
		}
		
		$data = array('title' => 'Login Member', 'content' => 'login/access_code');
		$this->load->view('template/wrapper', $data);
		$this->session->unset_userdata('login_failed');
		$this->session->unset_userdata('logout_success');
		if($this->session->userdata('bundles') != '') {
			$this->session->unset_userdata('bundles');
		}
	}
	
	
}