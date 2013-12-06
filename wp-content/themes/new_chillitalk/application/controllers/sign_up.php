<?php if(! defined('BASEPATH')) exit('Not Allowed');

class Sign_up extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		/*if($this->session->userdata('username') == '') {
			return TRUE;
		}else{
			redirect(base_url().'myaccount/dashboard/logout_not_redirect');
		}*/
	}
	
	public function index($ref_code = null) {
		
		header("HTTP/1.1 200 OK");
		
		if($this->uri->segment('3') != '') {
			$ref_code = $this->uri->segment('3');
		}else{
			$ref_code = '';
		}
		
		$valid = $this->form_validation;
		$input_post = $this->input;
		
		$valid->set_rules('first_name','First Name','required|min_length[2]');
		$valid->set_rules('last_name','Last Name','required|min_length[2]');
		$valid->set_rules('email_address','Email address','required|valid_email|min_length[4]');
		$valid->set_rules('phone_number','Phone Number','required|numeric|min_length[6]');
		$valid->set_rules('password','Password','required|min_length[4]|max_length[12]');
		$valid->set_rules('confirm_password','confirm password','matches[password]');
		
		
			
		if($valid->run()) {
			
			$first_name = $input_post->post('first_name');
			$last_name = $input_post->post('last_name');
			$email	 = $input_post->post('email_address');
			$phone_number = $input_post->post('phone_number');
			$password = $input_post->post('password');
			
			$uri = 'http://sws.vectone.com/api/CTPWebRegister';
		    echo $ref_code;
		  	$params = array('FirstName' => $first_name, 
							'LastName' => $last_name,
							'Email'	=> $email,
							'PhoneNo'  => $this->config->item('prefix_phone_web').$phone_number,
							'Password' => $password,
							'PlanId'  => $this->config->item('plan_id_web'),
							'Country'  => $this->config->item('country_name_web'),
							'RefCode' => $ref_code
							);
							
		  	$this->rest->format('application/json');
		  
		 	$result = $this->rest->post($uri, $params);
		  	//print_r($result);
			
			
			
		  	if($result->ErrCode == '0') {

				$this->session->set_userdata('signup_success','step2');
				$this->session->set_userdata('acc_id',$result->AccountId);
				$this->session->set_userdata('pin_code',$result->AccessCode);
				$this->session->set_userdata('common_accessno', $result->AccessNo);
				
				$uri_login = 'http://sws.vectone.com/api/CTPLogin';
			  
				$params_login = array('login' => $email, 
									  'password' => $password,
									  'Site' => $this->config->item('site_code_web'),
									  'IpAddr' => $this->input->ip_address(),
									  'UserAgent' => $this->input->user_agent()
  									  );

				$this->rest->format('application/json');
			  
				$result_login = $this->rest->post($uri_login, $params_login);
			  
				
				if($result_login->ErrCode == '0') {
				   
				   $this->session->set_userdata('username', $email);
				   $this->session->set_userdata('password', $password);
				   $this->session->set_userdata('title', $result_login->Title);
				   $this->session->set_userdata('firstname', $result_login->FirstName);
				   $this->session->set_userdata('surname', $result_login->Surname);
				   $this->session->set_userdata('balance', $result_login->Balance);
				   $this->session->set_userdata('cust_id', $result_login->CustId);
				   $this->session->set_userdata('mobile_phone', $result_login->MobilePhone);
				   $this->session->set_userdata('account_id', $result_login->AccId);
				   $this->session->set_userdata('sec_id', $result_login->SecId);
				   $this->session->set_userdata('id_login', uniqid(rand()));
				   
				   $uri_mail_signup = 'http://sws.vectone.com/api/CTPSendHTMLMail';
				   $params_mail_signup = array("Step" => 1,
											   "Email" => $email,
											   "MobileNo" => $this->config->item('prefix_phone_web').$phone_number,
											   "AccessNumber" => $result->AccessNo,
											   "FriendName" => "",
											   "FriendNumber" => "",
											   "LocalNumber" => "",
											   "Balance" => $this->session->userdata('balance')
											   );
					$this->rest->format('application/json');
					  
					$result_mail_signup = $this->rest->post($uri_mail_signup, $params_mail_signup);
				   
				    if($this->session->userdata('bundles') != '') {
						redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/step2');
				    }else{
						redirect(base_url().$this->session->userdata('lang').'/sign_up/step1/');
				    }
			  
				}
			
				if($this->session->userdata('logout_success') != '') {
				   $this->session->unset_userdata('logout_success');
			   	}
				
			}else{
				
				$this->session->set_flashdata('signup_failed', $result->ErrMsg);
				
				redirect(base_url().$this->session->userdata('lang').'/sign_up');
			}

		}else{

			if(validation_errors()){

				//redirect(base_url().$this->session->userdata('lang').'/sign_up');

			}
		}
		
		$data = array('title' => 'Sign Up', 'content' => 'sign_up/sign_up');
		$this->load->view('template/wrapper', $data);
		
		
		
		
	}
	
	public function step1() {
		
		header("HTTP/1.1 200 OK");
		//$this->session->unset_userdata('signup_success');
		if($this->session->userdata('signup_success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/sign_up');
		}
		
		$this->session->set_userdata('step_sign_up', base_url().$this->session->userdata('lang').'/sign_up/step1');
		
		$data = array('title' => 'Sign Up','content' => 'sign_up/sign_up_step1');
		$this->load->view('template/wrapper', $data);
	}
	
	public function step2() {
		
		header("HTTP/1.1 200 OK");
		//$this->session->unset_userdata('signup_success');
		if($this->session->userdata('signup_success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/sign_up');
		}
		
		$this->session->set_userdata('step_sign_up', base_url().$this->session->userdata('lang').'/sign_up/step2');
		
		$valid = $this->form_validation;
		
		$country       = $this->input->post('country');
		$friend_number = $this->input->post('friend_number');
		$friend_name   = $this->input->post('friend_name');
		
		$valid->set_rules('friend_number','Friend Number','required|numeric|min_length[4]');
		$valid->set_rules('friend_name','Friend Name','required|min_length[4]');
			
		
		if($valid->run()) {
			
			$uri_prefix = 'http://sws.vectone.com/api/CTPCountryPrefix?countryCode2='.$country;
			$this->rest->format('application/json');
			$result_prefix = $this->rest->get($uri_prefix);
			
			if(preg_match('/'.$result_prefix->Prefix.'/i', $friend_number)) {
				$dest_no = ltrim($friend_number,0);
			}else{
				$dest_no = $result_prefix->Prefix.ltrim($friend_number,0);
			}
			
			
			$uri2 = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id');
		    
			$params2 = array('City' => '',
							 'DestNo' => $dest_no,
							 'DestName' => $friend_name,
							 'Country'  => $this->config->item('country_code2_web')
							 );
							 
			$this->rest->format('application/json');
		  
			
			$uri_rates = 'http://sws.vectone.com/api/CTARate?accountID='.$this->session->userdata('account_id').'&destNo='.$dest_no;
			
			$this->rest->format('application/json');

			$result2 = $this->rest->post($uri2, $params2);
			$result_rates = $this->rest->get($uri_rates);
			
			print_r($result2).'<br/>';
			print_r($result_rates);
			
			if($result2->ErrCode == '0') {
				
				if($result_rates->errCode == '0') {
					$this->session->set_userdata('step2_success','step3');
					$this->session->set_userdata('signup_success','step2');
					$this->session->set_userdata('dest_no',$dest_no);
					$this->session->set_userdata('local_no',$result2->LocalNo);
					$this->session->set_userdata('dest_name',$friend_name);
					$this->session->set_userdata('country', $country);
					$this->session->set_userdata('rates',$result_rates->callRate);
					
					$uri_mail_signup2 = 'http://sws.vectone.com/api/CTPSendHTMLMail';
					$params_mail_signup2 = array("Step" => 1,
												"Email" => $this->session->userdata('email'),
												"MobileNo" => $this->session->userdata('mobile_phone'),
												"AccessNumber" => $this->session->userdata('access_no'),
												"FriendName" => $friend_name,
												"FriendNumber" => $dest_no,
												"LocalNumber" => $result2->LocalNo,
												"Balance" => $this->session->userdata('total_bal')
												);
					$this->rest->format('application/json');
					  
					$result_mail_signup2 = $this->rest->post($uri_mail_signup2, $params_mail_signup2);
					
					
					
					redirect(base_url().$this->session->userdata('lang').'/sign_up/step3/');
				}else{
					$this->session->set_userdata('signup_failed',$result_rates->errMsg);
					redirect(base_url().$this->session->userdata('lang').'/sign_up/step2/');
				}
				
			}else{
				
				$this->session->set_userdata('signup_failed',$result2->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/sign_up/step2/');
			}
			
		}

		$data = array('title' => 'Sign Up Step 2', 'content' => 'sign_up/sign_up_step2');
		$this->load->view('template/wrapper', $data);
		
		/*if($this->uri->segment('2') == 'step2') {
			$this->session->unset_userdata('signup_success');
		}*/
		
	}
	
	
	public function step3() {
		header("HTTP/1.1 200 OK");
		//$this->session->unset_userdata('signup_success');
		if($this->session->userdata('step2_success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/sign_up');
		}
		
		$this->session->set_userdata('step_sign_up', base_url().$this->session->userdata('lang').'/sign_up/step3');
		
		$data = array('title' => 'Sign Up Step 3', 'content' => 'sign_up/sign_up_step3');
		$this->load->view('template/wrapper', $data);
		
		/*if($this->uri->segment('2') == 'step3') {
			$this->session->unset_userdata('step2_success');
		}*/
	}
	
	public function step4() {
		header("HTTP/1.1 200 OK");
		//$this->session->unset_userdata('signup_success');
		if($this->session->userdata('signup_success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/sign_up');
		}
		
		$this->session->set_userdata('step_sign_up', base_url().$this->session->userdata('lang').'/sign_up/step4');
		
		$data = array('title' => 'Sign Up Step 3', 'content' => 'sign_up/sign_up_step4');
		$this->load->view('template/wrapper', $data);
		
		/*if($this->uri->segment('2') == 'step3') {
			$this->session->unset_userdata('step2_success');
		}*/
	}
	
	public function welcome() {
		header("HTTP/1.1 200 OK");
		//$this->session->unset_userdata('signup_success');
		
		
		$this->session->set_userdata('step_sign_up', base_url().$this->session->userdata('lang').'/sign_up/welcome');
		
		$data = array('title' => 'Sign Up Step 3', 'content' => 'sign_up/sign_up_credit_failed');
		$this->load->view('template/wrapper', $data);
		
		/*if($this->uri->segment('2') == 'step3') {
			$this->session->unset_userdata('step2_success');
		}*/
	}
	
	
	
	
}