<?php if(! defined('BASEPATH')) exit('Not Allowed');

class Support extends MY_Controller{
	
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
        $this->lang->load('contact');
		
		
		$valid = $this->form_validation;
		
		$valid->set_rules('existing', 'Existing Customer', 'required');
		$valid->set_rules('first_name', 'First Name', 'required');
		$valid->set_rules('last_name', 'Last Name', 'required');
		$valid->set_rules('email_address', 'Email Address', 'required|valid_email');
		$valid->set_rules('contact_number', 'Contact Number', 'required');
		$valid->set_rules('subject', 'Subject', 'required');
		$valid->set_rules('message', 'Message', 'required');
		
		$existing = $this->input->post('existing');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email_address');
		$contact_number = $this->input->post('contact_number');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		
		if($valid->run()) {

			$uri = 'http://sws.vectone.com/api/CTPCSReport';
			$params = array('AccId' => '',
							'ExistingCust' => $existing,
							'FirstName' => $first_name,
							'LastName' => $last_name,
							'Email' => $email,
							'PhoneNo' => $contact_number,
							'Country' => $this->session->userdata('country_code2_web'),
							'Subject' => $subject,
							'Content' => $message
							);
			$this->rest->format('application/json');
		  
			$result = $this->rest->post($uri, $params);
			
			if($result->ErrCode == 0) {
				$this->session->set_flashdata('success_send','Your request is successfully sent');
				redirect(base_url().$this->session->userdata('lang').'/support');
			}
		}
		
		
		$data = array('title' => 'Bundles','content' => 'support/list');
		
	
		
		$this->load->view('template/wrapper', $data);
		
	}
	
	public function why_chillitalk() {
		
		header("HTTP/1.1 200 OK");
	    $this->lang->load('why_chillitalk');
		$data = array('title' => 'Bundles','content' => 'support/why_chillitalk');
		$this->load->view('template/wrapper', $data);
		
	}
	
	public function joining_chillitalk() {
		
		header("HTTP/1.1 200 OK");
		
		  $this->lang->load('joining_chillitalk');
		$data = array('title' => 'Bundles', 'content' => 'support/joining_chillitalk');
		$this->load->view('template/wrapper', $data);
		
	}
	
	public function using_chillitalk() {
		
		header("HTTP/1.1 200 OK");
	
		  $this->lang->load('using_chillitalk');
		$data = array('title' => 'Bundles', 'content' => 'support/using_chillitalk');
		$this->load->view('template/wrapper', $data);
		
	}
		
	public function the_app() {
		
		header("HTTP/1.1 200 OK");
		
		  $this->lang->load('the_app');
		$data = array('title' => 'Bundles', 'content' => 'support/the_app');
		$this->load->view('template/wrapper', $data);
		
	}
	public function chillitalk_rates() {
		
		header("HTTP/1.1 200 OK");
		$this->lang->load('chillitalk_rates');
		$data = array('title' => 'Bundles', 'content' => 'support/chillitalk_rates');
		$this->load->view('template/wrapper', $data);
		
	}
		
	public function troubleshooting() {
		
		header("HTTP/1.1 200 OK");
		$this->lang->load('troubleshooting');
		$data = array('title' => 'Bundles', 'content' => 'support/troubleshooting');
		$this->load->view('template/wrapper', $data);
		
	}
	
	public function topping_up() {
		
		header("HTTP/1.1 200 OK");
		$data = array('title' => 'Bundles', 'content' => 'support/topping_up');
		$this->load->view('template/wrapper', $data);
		
	}
		public function about_us() {
		
		header("HTTP/1.1 200 OK");
		$data = array('title' => 'aboutus', 'content' => 'support/about_us');
		$this->load->view('template/wrapper', $data);
		
	}
	
	
	
}