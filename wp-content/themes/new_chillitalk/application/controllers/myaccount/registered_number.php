<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Registered_number extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
		$this->load->helper('string');
	}
	
	public function index() {
		
		header("HTTP/1.1 200 OK");
		// SERVICES REST CLIENT UNTUK MENDAPATKAN DAFTAR NOMOR YANG TERDAFTAR
		
		$uri = 'http://sws.vectone.com/api/CTPPinLess?accId='.$this->session->userdata('account_id').'&langCode=ENG';
		  
		
		$this->rest->format('application/json');
		  
		$result = $this->rest->get($uri);
		
		$this->lang->load('myaccount/register_number');
		
		$data = array('title' => 'Registered Number',
					  'isi'   => 'registered_number/list',
					  'result' => $result
					  );
					  
        
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function add() {
		
		header("HTTP/1.1 200 OK");

		$nickname = $this->input->post('nickname');
		$number = $this->input->post('number');

				
		$valid = $this->form_validation;
		
		// SET RULES VALIDATION UNTUK NICKNAME dan NUMBER
		$valid->set_rules('nickname','Nick Name','required');
		$valid->set_rules('number','Number','required|numeric');
		
		// IF BUTTON ADD DI KLIK
		
		if($valid->run()) {
			
			// SERVICES REST CLIENT MEMANGGIL API UNTUK ADD NUMBER
			
			$uri2 = 'http://sws.vectone.com/api/CTPPinLess?accId='.$this->session->userdata('account_id');
		    
			
			// PARAMETER API
			$params2 = array('Cli' => $number,
							 'NickName' => $nickname,
							 
							 );
			// FORMAT API
			$this->rest->format('application/json');
		  
		    // EKSEKUSI API POST
			$result2 = $this->rest->post($uri2, $params2);
			
			print_r($result2);
			
			// JIKA CALLBACK API RETURN ErrCode = '1' maka gagal yang lainnya sukses tambah data
			if($result2->ErrCode == '-1') {
				$this->session->set_flashdata('failed',$result2->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/registered_number');
			}else{
				$this->session->set_flashdata('success','The number is registered successfully');
				redirect(base_url().$this->session->userdata('lang').'/myaccount/registered_number');
			}
		}
		
		$uri = 'http://sws.vectone.com/api/CTPPinLess?accId='.$this->session->userdata('account_id').'&langCode=ENG';
		  
	
		$this->rest->format('application/json');
		  
		$result = $this->rest->get($uri);
		
		
		$data = array('title' => 'Add Number',
					  'isi'   => 'registered_number/add',
					  'result' => $result
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function update() {
		
		header("HTTP/1.1 200 OK");
		$old_cli = $this->uri->segment('4');
		$name = str_replace('%20',' ',$this->uri->segment('5'));
		$cli = $this->uri->segment('6');
		
		if(! preg_match('/^[0-9]+$/', $cli)) {
			
			echo '
			<script type="text/javascript">
				alert("please insert with numeric value");	
			</script>
			';
			redirect(base_url().$this->session->userdata('lang').'/myaccount/registered_number/');
			
		}else{
		
			$uri = 'http://sws.vectone.com/api/CTPPinLess?accId='.$this->session->userdata('account_id').'&oldCli='.$old_cli;
			  
			$params = array('Cli' => $cli, 'NickName' => $name);
			$this->rest->format('application/json');
			  
			$result = $this->rest->put($uri, $params);
			
			
			//print_r($result);
					
			$this->session->set_flashdata('success','update data successfull');
			redirect(base_url().$this->session->userdata('lang').'/myaccount/registered_number');
		}
		
	}
	
	public function delete() {
		header("HTTP/1.1 200 OK");
		$id = $this->uri->segment('4');
		$uri = 'http://sws.vectone.com/api/CTPPinLess?accId='.$this->session->userdata('account_id');
		  
		$params = array('Cli' => $id);
		$this->rest->format('application/json');
		  
		$result = $this->rest->delete($uri, $params);
		
		
		
		$this->session->set_flashdata('success',$result->ErrMsg);
	    redirect(base_url().$this->session->userdata('lang').'/myaccount/registered_number');
		
		
	}
	
	public function favorite() {
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
		
	    redirect(base_url().$this->session->userdata('lang').'/myaccount/local_number');
		
		
	}
	
}