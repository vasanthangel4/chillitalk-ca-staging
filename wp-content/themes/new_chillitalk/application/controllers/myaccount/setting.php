<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Setting extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
		
		$uri = 'http://sws.vectone.com/api/CTPUserAcc';
		  
		$params = array('accId' => $this->session->userdata('account_id'));
		$this->rest->format('application/json');
	  
		$result = $this->rest->get($uri, $params);
		
		// Auto Top UP
		
		$uri_top_up = 'http://sws.vectone.com/api/CTPAutoTopupSetting?accId='.$this->session->userdata('account_id');
		  
		$this->rest->format('application/json');
	  
		$result_topup = $this->rest->get($uri_top_up);
		
		//print_r($result_topup);
		
		$valid = $this->form_validation;
		
		$valid->set_rules('min_amount','Min Amount','required');
		
		if($valid->run()) {
			$uri_setting = 'http://sws.vectone.com/api/CTPAutoTopupSetting';
			
			$param_setting = array("TopupSettingStep" => 2,
								  "SubscriptionID" => $this->session->userdata('subc_id'),
								  "AccountID" => $this->session->userdata('account_id'),
								  "Currency" => $this->config->item('currency_web'),
								  "Amount" => $this->input->post('topup_amount'),
								  "LastOrderId" => $result_topup->LastOrderId,
								  "MinimumLevel" => $this->input->post('min_amount')
							      );
							  
			$this->rest->format('application/json');
			$result_setting = $this->rest->post($uri_setting, $param_setting);
			
			if($result_setting->ErrCode == '0') {
				redirect(base_url().$this->session->userdata('lang').'/myaccount/setting');
			}else{
				redirect(base_url().$this->session->userdata('lang').'/myaccount/setting');
			}
			
		}
		
		$data = array('title' => 'Personal Info',
					  'isi'   => 'setting/setting',
					  'row'   => $result,
					  'topup' => $result_topup
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
		
	}
	
	public function change_personal_info() {
		
		header("HTTP/1.1 200 OK");
		// Auto Top UP
		
		$uri_top_up = 'http://sws.vectone.com/api/CTPAutoTopupSetting?accId='.$this->session->userdata('account_id');
		  
		$this->rest->format('application/json');
	  
		$result_topup2 = $this->rest->get($uri_top_up);
		
		$firstname = $this->input->post('first_name');
		$lastname  = $this->input->post('last_name');
		$email 	 = $this->input->post('email_address');

		$valid = $this->form_validation;
		
		$valid->set_rules('first_name','Firstname','required');
		$valid->set_rules('last_name','Lastname','required');
		$valid->set_rules('email_address','Email Address','required|valid_emails');
		
		if($valid->run()) {
			$uri = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
		  
			$params = array(
						    'FirstName' => $firstname,
							'Surname'   => $lastname,
							'Email'	 => $email,
							
							);
			$this->rest->format('application/json');
		  
			$result = $this->rest->post($uri, $params);
			
			
			if($result->ErrCode == 0) {
				echo '
				<script type="text/javascript">
					alert("Update personal info successfull");
					window.location.href = "'.base_url().$this->session->userdata('lang').'/myaccount/setting/";
				</script>
				';
			}else{
				echo '
				<script type="text/javascript">
					alert("'.$result->ErrMsg.'");
					window.location.href = "'.base_url().$this->session->userdata('lang').'/myaccount/setting/";
				</script>
				';
				
			}			
			
			
		}
		
		$uri = 'http://sws.vectone.com/api/CTPUserAcc';
		  
		$params = array('accId' => $this->session->userdata('account_id'));
		$this->rest->format('application/json');
	  
		$result = $this->rest->get($uri, $params);
		
		$data = array('title' => 'Change Personal Info',
					  'isi'   => 'setting/setting',
					  'row'   => $result,
					  'topup' => $result_topup2
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function change_password() {
		
		header("HTTP/1.1 200 OK");
		
		// Auto Top UP
		
		$uri_top_up = 'http://sws.vectone.com/api/CTPAutoTopupSetting?accId='.$this->session->userdata('account_id');
		  
		$this->rest->format('application/json');
	  
		$result_topup3 = $this->rest->get($uri_top_up);

		$uri_a = 'http://sws.vectone.com/api/CTPUserAcc';
		  
		$params_a = array('accId' => $this->session->userdata('account_id'));
		$this->rest->format('application/json');
	  
		$result_a = $this->rest->get($uri_a, $params_a);
		
		
		
		$valid = $this->form_validation;
		
		$current_password = $this->input->post('current_password');
		$new_password     = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');
		
		$valid->set_rules('current_password','Current Password','required');
		$valid->set_rules('new_password','New Password','required');
		$valid->set_rules('confirm_password','Confirm Password','required|matches[new_password]');
		
		if($valid->run()) {
			if($current_password != $this->session->userdata('password')) {
				
				echo '
				<script type="text/javascript">
					alert("Current password wrong, Please enter valid current password");
					window.location.href = "'.base_url().$this->session->userdata('lang').'/myaccount/setting/";
				</script>
				';
				
			}else{
				
				$username = $this->session->userdata('username');
				$accid    = $this->session->userdata('account_id');
				$uri2 = 'http://sws.vectone.com/api/CTPPassword?userName='.$username.'&accId='.$accid;
			    
				$params2 = array('OldPassword' => $current_password,
								 'NewPassword' => $new_password
								 );
								
				$this->rest->format('application/json');
			    
				$result2 = $this->rest->post($uri2, $params2);
				
				
				
				echo '
				<script type="text/javascript">
					alert("Change password successfull, you must login again with your new password");
					window.location.href = "'.base_url().$this->session->userdata('lang').'/myaccount/dashboard/logout";
				</script>
				';
			}

		}
		
		$data = array('title' => 'Change Password',
					  'isi'   => 'setting/setting',
					  'row' => $result_a,
					  'topup' => $result_topup3
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function inactive_autotopup() {
		$uri = 'http://sws.vectone.com/api/CTPUserAcc';
		  
		$params = array('accId' => $this->session->userdata('account_id'));
		$this->rest->format('application/json');
	  
		$result_c = $this->rest->get($uri, $params);
		
		// Auto Top UP
		
		$uri_top_up = 'http://sws.vectone.com/api/CTPAutoTopupSetting?accId='.$this->session->userdata('account_id');
		  
		$this->rest->format('application/json');
	  
		$result_topup = $this->rest->get($uri_top_up);
		
		if(isset($_POST['submit'])) {
			
			$uri_sett = 'http://sws.vectone.com/api/CTPAutoTopupSetting';
			
			$param_sett = array("TopupSettingStep" => 1,
							  "SubscriptionID" => $this->session->userdata('subc_id'),
							  "AccountID" => $this->session->userdata('account_id'),
							  "Currency" => $this->config->item('currency_web'),
							  "Amount" => $result_topup->TopupAmt,
							  "LastOrderId" => $result_topup->LastOrderId,
							  "MinimumLevel" => $result_topup->MinLevelID
							  );
			$this->rest->format('application/json');
			$result_sett = $this->rest->post($uri_sett, $param_sett);
			if($result_sett->ErrCode == '0') {
				redirect(base_url().$this->session->userdata('lang').'/myaccount/setting');
			}else{
				redirect(base_url().$this->session->userdata('lang').'/myaccount/setting');
			}
		}
		
		$data = array('title' => 'Change Password',
					  'topup' => $result_topup,
					  'row'   => $result_c
					  );
		
		$this->load->view('myaccount/setting/inactive',$data);
	}
	
	
}