<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Dashboard extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		
		// Bonus
		$uri_bonus = 'http://sws.vectone.com/api/CTPBonus?accId='.$this->session->userdata('account_id');
			  
							
		$this->rest->format('application/json');
		  
		$bonus = $this->rest->get($uri_bonus);
		
		
		//Registered Number
		$uri_registered_number = 'http://sws.vectone.com/api/CTPPinLess?accId='.$this->session->userdata('account_id').'&langCode=ENG';
		  
		$this->rest->format('application/json');
		  
		$registered_number = $this->rest->get($uri_registered_number);
		
		// Top Up
		$uri_topup = 'http://sws.vectone.com/api/CTPTopupHist?accId='.$this->session->userdata('account_id').'&mode=recent';
			  
							
		$this->rest->format('application/json');
		  
		$top_up = $this->rest->get($uri_topup);
		
		// Call History
		
		$uri_call_history = 'http://sws.vectone.com/api/CTPCallHistory?accId='.$this->session->userdata('account_id').'&mode=recent';
			  
							
		$this->rest->format('application/json');
		  
		$call_history = $this->rest->get($uri_call_history);
		
		// Local Number
		
		$uri_local_number = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id').'&mode=param&top=5';
		  
	
		$this->rest->format('application/json');
		  
		$local_number = $this->rest->get($uri_local_number);
		
		
		
		$data = array('title' => 'My Account',
					  'isi'   => 'dashboard/dashboard',
					  'bonus' => $bonus,
					  'registered' => $registered_number,
					  'top_up'  => $top_up,
					  'call_history' => $call_history,
					  'local_number' => $local_number
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function logout() {
		
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('bundles');
		$this->session->unset_userdata('id_login');
		$this->session->unset_userdata('login_failed');
		$this->session->unset_userdata('account_id');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('title');
		$this->session->unset_userdata('firstname');
		$this->session->unset_userdata('surname');
		$this->session->unset_userdata('balance');
		$this->session->unset_userdata('cust_id');
		$this->session->unset_userdata('mobile_phone');
		$this->session->unset_userdata('logout_success','Logout successful, thank you for using ChilliTalk');	
		redirect(base_url().$this->session->userdata('lang').'/login_member');
		
	}
	
	public function logout_not_redirect() {
		
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('bundles');
		$this->session->unset_userdata('id_login');
		$this->session->unset_userdata('login_failed');
		$this->session->unset_userdata('account_id');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('title');
		$this->session->unset_userdata('firstname');
		$this->session->unset_userdata('surname');
		$this->session->unset_userdata('balance');
		$this->session->unset_userdata('cust_id');
		$this->session->unset_userdata('mobile_phone');
		$this->session->unset_userdata('logout_success','Logout successful, thank you for using ChilliTalk');	
		redirect(base_url().$this->session->userdata('lang').'/apps');
	}
}