<?php if(! defined('BASEPATH')) exit('Not Allowed');

class Customer_service extends MY_Controller{
	
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}		
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		
		$valid = $this->form_validation;
		
		$problem = $this->input->post('problem');
		$subject = $this->input->post('subject');
		
		$valid->set_rules('problem','Problem','required');
		
		if($valid->run()) {
			
			$uri = 'http://sws.vectone.com/api/CTPCSReport';
			
			$params = array('AccId' => $this->session->userdata('account_id'),
							'Subject' => $subject,
							'Content' => $problem
							);
			$this->rest->format('application/json');
		  
			$result = $this->rest->post($uri, $params);
			print_r($result);
			
			if($result->ErrCode == 0) {
				$this->session->set_flashdata('success_send','Your request is successfully sent');
				redirect(base_url().$this->session->userdata('lang').'/myaccount/customer_service');
			}
		}
		
		$data = array('title' => 'Customer Service',
					  'isi'   => 'customer_service/list'
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
		
	}
}
	