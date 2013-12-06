<?php if(! defined('BASEPATH')) exit('Not Allowed');

class Invite_friends extends MY_Controller{
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}		
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
		
		$valid = $this->form_validation;
		
		$uri_list = 'http://sws.vectone.com/api/CTPInvite?accId='.$this->session->userdata('account_id');
		$this->rest->format('application/json');
		$result_list = $this->rest->get($uri_list);
		
		//print_r($result_list);
		$valid->set_rules('invite', 'Invite', 'required|valid_emails');
		
		if($valid->run()) {
			
			header("HTTP/1.1 200 OK");
		
			$uri = 'http://sws.vectone.com/api/CTPInvite';
			  
			$params = array("Id" => "sample string 1",
							"FirstName" => $this->session->userdata('firstname'),
							"LastName" => $this->session->userdata('surname'),
							"AccountId" => $this->session->userdata('account_id'),
							"Username" => $this->session->userdata('username'),
							"Password" => $this->session->userdata('password'),
							"Friends_Email" => $this->input->post('invite'),
							"Friends_Mobile" => "",
							"EmailContent" => "",
							"Step" => 1
						   );
			
			$this->rest->format('application/json');
		  
			$result = $this->rest->post($uri, $params);
			print_r($result);
			if($result->ErrCode == 0) {
				$this->session->set_userdata('friend_email', $this->input->post('invite'));
				$this->session->set_userdata('email_content', $result->EmailContent);
				$this->session->set_userdata('default_content', $result->DefaultContent);
				redirect(base_url().'myaccount/invite_friends/step2');
				
			}
		}
		
		$data = array('title' => 'Invite Friends',
					  'isi'   => 'invite_friends/list',
					  'result_list' => $result_list
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
	}
	
	public function step2() {
		header("HTTP/1.1 200 OK");
		
		$valid = $this->form_validation;
		
		$valid->set_rules('compose_invitation','Compose Invitation','required');
		
		
		
		if($valid->run()) {
			
			$compose_invitation = $this->input->post('compose_invitation');
			
			$uri2 = 'http://sws.vectone.com/api/CTPInvite';
			  
			$params2 = array("Id" => "1",
							"FirstName" => $this->session->userdata('firstname'),
							"LastName" => $this->session->userdata('surname'),
							"AccountId" => $this->session->userdata('account_id'),
							"Username" => $this->session->userdata('username'),
							"Password" => $this->session->userdata('password'),
							"Friends_Email" => $this->session->userdata('friend_email'),
							"Friends_Mobile" => "",
							"EmailContent" => $compose_invitation,
							"Step" => 2
						   );
			$this->rest->format('application/json');
		  
			$result2 = $this->rest->post($uri2, $params2);
			print_r($result2);
			
			if($result2->ErrCode == '0') {
				
				$this->session->set_userdata('content', $compose_invitation);
				$this->session->set_userdata('process_step2','process_step2');
				redirect(base_url().$this->session->userdata('lang').'/myaccount/invite_friends/process_step2');
			}
			
		}
		
		$data = array('title' => 'Invite Friends');
		$this->load->view('myaccount/invite_friends/step2',$data);
	}
	
	public function process_step2() {
		
		$uri3 = 'http://sws.vectone.com/api/CTPInvite';
			  
		$params3 = array("Id" => "1",
						"FirstName" => $this->session->userdata('firstname'),
						"LastName" => $this->session->userdata('surname'),
						"AccountId" => $this->session->userdata('account_id'),
						"Username" => $this->session->userdata('username'),
						"Password" => $this->session->userdata('password'),
						"Friends_Email" => $this->session->userdata('friend_email'),
						"Friends_Mobile" => "",
						"EmailContent" => $this->session->userdata('content'),
						"Step" => 3
					   );
		$this->rest->format('application/json');
	  
		$result3 = $this->rest->post($uri3, $params3);
		
		print_r($result3);
		
		if($result3->ErrCode == '0') {
			$this->session->set_userdata('success_invite','success_invite');
			$this->session->set_userdata('info_invitation',$result3->ErrMsg);
			redirect(base_url().$this->session->userdata('lang').'/myaccount/invite_friends/success_invite');
		}else{
			$this->session->set_userdata('failed_invite','failed_invite');
			redirect(base_url().$this->session->userdata('lang').'/myaccount/invite_friends/failed_invite');
		}
		
		
		$data = array('title' => 'Invite Friends');
		$this->load->view('myaccount/invite_friends/process_step2',$data);

	}
	
	
	public function success_invite() {
		if($this->session->userdata('success_invite') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/invite_friends/');
		}
		
		$data = array('title' => 'Invite Friends');
		$this->load->view('myaccount/invite_friends/success',$data);
	}
	
	public function failed_invite() {
		
		if($this->session->userdata('failed_invite') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/invite_friends/');
		}
		
		$data = array('title' => 'Invite Friends');
		$this->load->view('myaccount/invite_friends/failed',$data);
	}
}
	