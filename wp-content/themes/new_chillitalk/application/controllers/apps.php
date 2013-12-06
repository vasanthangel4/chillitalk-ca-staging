<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Apps extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		/*if($this->session->userdata('username') != '') {
			redirect(base_url().'myaccount/dashboard/logout_not_redirect');
		}*/
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		
		$valid = $this->form_validation;
		$input_post = $this->input;
		
		$valid->set_rules('phone_number','Phone Number','required|numeric');
		
		if($valid->run()) {
			
			$device       = $input_post->post('device');
			$phone_number = $input_post->post('phone_number');
			
			$uri3 = 'http://sws.vectone.com/api/CTPMobileSignUp';
		    
		  	$params3 = array('Device' 	=> $device, 
							 'MobileNo'  => $this->config->item('prefix_phone_web').$phone_number,
							 'Country'   => $this->config->item('country_name_web'),
							 'PlanId'    => $this->sesion->userdata('plan_id_web')
							 );
							
		  	$this->rest->format('application/json');
		  
		 	$result3 = $this->rest->post($uri3, $params3);
		  	//print_r($result3);
			
		  	if($result3->ErrCode == '0') {
				$this->session->set_userdata('account_id', $result3->AccountId);
				$this->session->set_userdata('mobile_signup_success','mobile_signup_success');
				$this->session->set_userdata('mobile_no',$this->config->item('prefix_phone_web').$phone_number);
				$this->session->set_userdata('device', 'android');
				redirect(base_url().$this->session->userdata('lang').'/apps/android_success/');
				
				
			}elseif($result3->ErrCode == '-10') {
				
				$this->session->set_userdata('device','android');
				$this->session->set_userdata('signup_failed',$result3->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/apps');
				
			}elseif($result3->ErrCode == '-11') {
				
				$this->session->set_userdata('device','android');
				$this->session->set_userdata('signup_failed','Number already registered, please type with another number');
				redirect(base_url().$this->session->userdata('lang').'/apps');
				
			}else{
				
				$this->session->set_userdata('device','android');
				$this->session->set_userdata('signup_failed',$result3->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/apps');
			}
		}
		
		$data = array('title' => 'Sign Up',
					  'content' => 'apps/app'
					  );
		$this->load->view('template/wrapper', $data);
		$this->session->unset_userdata('signup_failed');
		$this->session->unset_userdata('device');
		
	}
	
	public function invalid() {
		header("HTTP/1.1 200 OK");
		
		$valid = $this->form_validation;
		$input_post = $this->input;
		
		$valid->set_rules('phone_number','Phone Number','required|numeric');
		
		if($valid->run()) {
			
			$device       = $input_post->post('device');
			$phone_number = $input_post->post('phone_number');
			
			$uri3 = 'http://sws.vectone.com/api/CTPMobileSignUp';
		    
		  	$params3 = array('Device' 	=> $device, 
							 'MobileNo'  => $this->config->item('prefix_phone_web').$phone_number,
							 );
							
		  	$this->rest->format('application/json');
		  
		 	$result3 = $this->rest->post($uri3, $params3);
		  	//print_r($result3);
			
		  	if($result3->ErrCode == '0') {
				$this->session->set_userdata('account_id', $result3->AccountId);
				$this->session->set_userdata('mobile_signup_success','mobile_signup_success');
				$this->session->set_userdata('mobile_no',$this->config->item('prefix_phone_web').$phone_number);
				$this->session->set_userdata('device', $device);
				//redirect(base_url().$this->session->userdata('lang').'/apps/android_success/');
				
				$this->session->set_userdata('success_signup','success');
				if($device == 'android') {
					redirect(base_url().$this->session->userdata('lang').'/apps/android_success');
				}else{
					redirect(base_url().$this->session->userdata('lang').'/apps/iphone_success');
				}
				
			}elseif($result3->ErrCode == '-10') {
				
				$this->session->set_userdata('device',$device);
				$this->session->set_userdata('signup_failed',$result3->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/apps/invalid');
				
			}elseif($result3->ErrCode == '-11') {
				
				$this->session->set_userdata('device',$device);
				$this->session->set_userdata('signup_failed','Number already registered, please type with another number');
				redirect(base_url().$this->session->userdata('lang').'/apps/invalid');
				
			}else{
				
				$this->session->set_userdata('device',$device);
				$this->session->set_userdata('signup_failed',$result3->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/apps/invalid');
			}
		}
		
		$data = array('title' => 'Sign Up',
					  'content' => 'apps/app_invalid'
					  );
		$this->load->view('template/wrapper', $data);
		$this->session->unset_userdata('signup_failed');
		$this->session->unset_userdata('device');
		
	}
		
	public function iphone_success() {
		if($this->session->userdata('mobile_signup_success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/apps');
		}	
		
		$data = array('title' => 'Sign Up', 'content' => 'apps/iphone_success');
		$this->load->view('template/wrapper', $data);
		
		if($this->uri->segment('2') == 'iphone_success') {
			$this->session->unset_userdata('mobile_signup_success');
		}
		
	}
	
	public function android_success() {
		if($this->session->userdata('mobile_signup_success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/apps');
		}	
		
		$data = array('title' => 'Sign Up', 'content' => 'apps/android_success');
		$this->load->view('template/wrapper', $data);
		
		if($this->uri->segment('2') == 'android_success') {
			$this->session->unset_userdata('mobile_signup_success');
		}
	}

}