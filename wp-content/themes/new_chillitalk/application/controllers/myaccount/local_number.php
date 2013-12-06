<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Local_number extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
		$this->load->helper('string');
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
		$uri_r = 'http://sws.vectone.com/api/CTPRegisterRestOfWorld?accid='.$this->session->userdata('account_id');
			  
		$this->rest->format('application/json');
	  
		$result_r = $this->rest->get($uri_r);
		
		$uri = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id').'&countryCode2=GB&mode=param&top=5';
		  
	
		$this->rest->format('application/json');
		  
		$result = $this->rest->get($uri);
		
		$uri_c = 'http://sws.vectone.com/api/CTPCountry?langCode=ENG';
		$this->rest->format('application/json');
		$result_c = $this->rest->get($uri_c);
		
		//print_r($result);
		$this->lang->load('myaccount/local_number');
		
		$data = array('title' => 'Local Number',
					  'isi'   => 'local_number/list',
					  'result' => $result,
					  'countries' => $result_c
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function view_by_country(){
		
		header("HTTP/1.1 200 OK");
		
		$co = $this->uri->segment('5');
		
		$uri_co = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id').'&countryCode2='.$co.'&mode=param&top=5';
	  	
		$this->rest->format('application/json');

		$result_co = $this->rest->get($uri_co);
		
		$uri_c = 'http://sws.vectone.com/api/CTPCountry?langCode=ENG';
		$this->rest->format('application/json');
		$result_c = $this->rest->get($uri_c);
		
		$this->lang->load('myaccount/local_number');
		$data = array('title' => 'Local Number',
					  'isi'   => 'local_number/list',
					  'countries' => $result_c,
					  'result' => $result_co
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function add() {
		
		header("HTTP/1.1 200 OK");
		$number = $this->input->post('number');
		$name = $this->input->post('name');
		
		$valid = $this->form_validation;
		
		// SET RULES VALIDATION UNTUK NICKNAME dan NUMBER
		$valid->set_rules('number','Number','required|numeric');
		$valid->set_rules('name','Name','required');
		
		// IF BUTTON ADD DI KLIK
		
		if($valid->run()) {
			
			
			$uri2 = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id');
		    
			$params2 = array(
							 'DestNo' => $number,
							 'DestName' => $name
							 );
			$this->rest->format('application/json');
		  
			$result2 = $this->rest->post($uri2, $params2);
			
			//print_r($result2);
			
			if($result2->ErrCode == '-1') {
				$this->session->set_flashdata('failed',$result2->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/local_number');
			}else{
				$this->session->set_flashdata('success','Insert data successfull');
				redirect(base_url().$this->session->userdata('lang').'/myaccount/local_number');
			}
		}
		
		$uri = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id').'&mode=param&top=5';
		  
	
		$this->rest->format('application/json');
		  
		$result = $this->rest->get($uri);
		
		//print_r($result);
		$data = array('title' => 'Add Number',
					  'isi'   => 'local_number/add',
					  'result' => $result
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function update() {
		
		header("HTTP/1.1 200 OK");
		
		$local_no = $this->uri->segment('4');
		$dest_no = $this->uri->segment('5');
		$dest_name = str_replace('%20', ' ', $this->uri->segment('6'));
		
		if(! preg_match('/^[0-9]+$/', $dest_no)) {
			
			echo '
			<script type="text/javascript">
				alert("please insert with numeric value");	
			</script>
			';
			
			redirect(base_url().$this->session->userdata('lang').'/myaccount/local_number/');
			
		}else{
		
		
			$uri = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id').'&localNo='.$local_no;
			  
			$params = array('DestNo' => $dest_no, 
							'DestName' => $dest_name,
							);
							
			$this->rest->format('application/json');
			  
			$result = $this->rest->put($uri, $params);
			
			
			//print_r($result);
			$this->session->set_flashdata('success','update data successfull');
			redirect(base_url().$this->session->userdata('lang').'/myaccount/local_number');
		}
		
	}
	
	public function delete() {
		
		header("HTTP/1.1 200 OK");
		$id = $this->uri->segment('4');
		$uri = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id');
		  
		$params = array('LocalNo' => $id);
		$this->rest->format('application/json');
		  
		$result = $this->rest->delete($uri, $params);
		
		
		
		$this->session->set_flashdata('success','Delete data successfull');
	    redirect(base_url().$this->session->userdata('lang').'/myaccount/local_number');
		
		
	}
	
	/*public function favorite() {
		header("HTTP/1.1 200 OK");
		$local_no = $this->uri->segment('4');
		$starred  = $this->uri->segment('5');
		$uri = 'http://sws.vectone.com/api/CTPLocalNo?accId='.$this->session->userdata('account_id').'&localNo='.$local_no.'&starred='.$starred;
		
		$this->rest->format('application/json');
		  
		$result = $this->rest->get($uri);
		
		
		if($result->ErrCode == '0') {
			
			$this->session->set_flashdata('success','Successfull');
		}else{
			$this->session->set_flashdata('success',$result->ErrMsg);
		}
		
	    redirect(base_url().'myaccount/local_number');
		
		
	}*/
	
}