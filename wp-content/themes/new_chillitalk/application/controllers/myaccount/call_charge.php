<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Call_charge extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
	}
	
	public function index() {
		header("HTTP/1.1 200 OK");
		
		// TOP UP
		
		$arr_month = array('01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', 
						   '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', 
						   '11' => 'November', '12' => 'December');
						   
		$this->session->unset_userdata('month_charge');
		$this->session->unset_userdata('year_charge');
		$this->session->unset_userdata('month_call');
		$this->session->unset_userdata('year_call');
		
		$month_charge = date('m');
		$year_charge = date('Y');
		
		
		
		$end_date_charge = cal_days_in_month(CAL_GREGORIAN, $month_charge, $year_charge);
		
		$uri_topup = 'http://sws.vectone.com/api/CTPTopupHist?accId='.$this->session->userdata('account_id').'&year='.$year_charge.'&month='.$month_charge.'&dateFrom=1&dateTo='.$end_date_charge;
			  			
		$this->rest->format('application/json');
		  
		$top_up = $this->rest->get($uri_topup);
		
		
				
		// Call History
		
		$month_call = date('m');
	
		$year_call = date('Y');
		
		
		$end_date_call = cal_days_in_month(CAL_GREGORIAN, $month_call, $year_call);
		
		$uri_call_history = 'http://sws.vectone.com/api/CTPCallHistory?accId='.$this->session->userdata('account_id').'&year='.$year_call.'&month='.$month_call.'&dateFrom=1&dateTo='.$end_date_call;
							
		$this->rest->format('application/json');
		  
		$call_history = $this->rest->get($uri_call_history);
				
		
		
		
		// Balance
		
		$uri_balance = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
		  
		$this->rest->format('application/json');
	  
		$result_balance = $this->rest->get($uri_balance);
		
		//print_r($result_balance);
		$data = array('title' => 'Calling & Charge History',
					  'isi'   => 'call_charge/list',
					  'topup' => $top_up,
					  'month_charge_name' => $arr_month[$month_charge],
					  'month_charge' => $month_charge,
					  'year_charge' => $year_charge,
					  'call'  => $call_history,
					  'month_call_name' => $arr_month[$month_call],
					  'month_call' => $month_call,
					  'year_call' => $year_call,
					  'balance' => $result_balance
					  );
		
		$this->session->unset_userdata('call_charge_select');
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function charge() {
		
		header("HTTP/1.1 200 OK");
		
		// TOP UP
		
		$arr_month = array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', 
						   '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', 
						   '11' => 'November', '12' => 'December');
		
		
		$this->session->set_userdata('month_charge', $this->uri->segment('5'));
		$this->session->set_userdata('year_charge', $this->uri->segment('6'));
		
		if($this->uri->segment('4') == 'charge') {
			$month_charge = $this->session->userdata('month_charge');
			$year_charge = $this->session->userdata('year_charge');
		}else{
			$month_charge = date('m');
			$year_charge = date('Y');
			
		}
		
		
		$month_name_charge = $arr_month[$month_charge];
		
		if($month_name_charge == 'December') {
			$prev_month_charge = $month_charge - 1;
			$next_month_charge = 1;
			$prev_year_charge = $this->session->userdata('year_charge');
			$next_year_charge = $this->session->userdata('year_charge') + 1;
		}elseif($month_name_charge == 'January') {
			$prev_month_charge = 12;
			$next_month_charge = $month_charge + 1;
			$prev_year_charge = $this->session->userdata('year_charge') - 1;
			$next_year_charge = $this->session->userdata('year_charge');
		}else{
			$prev_month_charge = $month_charge - 1;
			$next_month_charge = $month_charge + 1;
			$prev_year_charge = $this->session->userdata('year_charge');
			$next_year_charge = $this->session->userdata('year_charge');
		}
		
		$end_date_charge = cal_days_in_month(CAL_GREGORIAN, $month_charge, $year_charge);
		
		$uri_topup = 'http://sws.vectone.com/api/CTPTopupHist?accId='.$this->session->userdata('account_id').'&year='.$year_charge.'&month='.$month_charge.'&dateFrom=1&dateTo='.$end_date_charge;
			  			
		$this->rest->format('application/json');
		  
		$top_up = $this->rest->get($uri_topup);
		
		
				
		// Call History
		
		$this->session->set_userdata('month_call', $this->uri->segment('5'));
		$this->session->set_userdata('year_call', $this->uri->segment('6'));
		
		if($this->uri->segment('4') == 'call') {
			$month_call = $this->session->userdata('month_call');
			$year_call = $this->session->userdata('year_call');
		}else{
			$month_call = date('m');
			$year_call = date('Y');
		}
		
		$month_name_call = $arr_month[$month_call];
		
		if($month_name_call == 'December') {
			$prev_month_call = $month_call - 1;
			$next_month_call = 1;
			$prev_year_call = $this->session->userdata('year_call');
			$next_year_call = $this->session->userdata('year_call') + 1;
		}elseif($month_name_call == 'January') {
			$prev_month_call = 12;
			$next_month_call = $month_call + 1;
			$prev_year_call = $this->session->userdata('year_call') - 1;
			$next_year_call = $this->session->userdata('year_call');
		}else{
			$prev_month_call = $month_call - 1;
			$next_month_call = $month_call + 1;
			$prev_year_call = $this->session->userdata('year_call');
			$next_year_call = $this->session->userdata('year_call');
		}
		
		
		
		$end_date_call = cal_days_in_month(CAL_GREGORIAN, $month_call, $year_call);
		
		$uri_call_history = 'http://sws.vectone.com/api/CTPCallHistory?accId='.$this->session->userdata('account_id').'&year='.$year_call.'&month='.$month_call.'&dateFrom=1&dateTo='.$end_date_call;
							
		$this->rest->format('application/json');
		  
		$call_history = $this->rest->get($uri_call_history);
				
		
		
		
		// Balance
		
		$uri_balance = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
		  
		$this->rest->format('application/json');
	  
		$result_balance = $this->rest->get($uri_balance);
		
		//print_r($result_balance);
		$data = array('title' => 'Calling & Charge History',
					  'isi'   => 'call_charge/list_call_charge',
					  'month_charge_name' => $month_name_charge,
					  'month_charge' => $month_charge,
					  'next_month_charge' => $next_month_charge,
					  'prev_month_charge' => $prev_month_charge,
					  'year_charge' => $year_charge,
					  'next_year_charge' => $next_year_charge,
					  'prev_year_charge' => $prev_year_charge,
					  'topup' => $top_up,
					  'month_call_name' => $arr_month[$month_call],
					  'month_call' => $month_call,
					  'next_month_call' => $next_month_call,
					  'prev_month_call' => $prev_month_call,
					  'year_call' => $year_call,
					  'next_year_call' => $next_year_call,
					  'prev_year_call' => $prev_year_call,
					  'call'  => $call_history,
					  'balance' => $result_balance
					  );
		
		$this->session->unset_userdata('call_charge_select');
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function call() {
		
		header("HTTP/1.1 200 OK");
		
		// TOP UP
		
		$arr_month = array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', 
						   '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', 
						   '11' => 'November', '12' => 'December');
		
		
		$this->session->set_userdata('month_charge', $this->uri->segment('5'));
		$this->session->set_userdata('year_charge', $this->uri->segment('6'));
		
		if($this->uri->segment('4') == 'charge') {
			$month_charge = $this->session->userdata('month_charge');
			$year_charge = $this->session->userdata('year_charge');
		}else{
			$month_charge = date('m');
			$year_charge = date('Y');
			
		}
		
		
		$month_name_charge = $arr_month[$month_charge];
		
		if($month_name_charge == 'December') {
			$prev_month_charge = $month_charge - 1;
			$next_month_charge = 1;
			$prev_year_charge = $this->session->userdata('year_charge');
			$next_year_charge = $this->session->userdata('year_charge') + 1;
		}elseif($month_name_charge == 'January') {
			$prev_month_charge = 12;
			$next_month_charge = $month_charge + 1;
			$prev_year_charge = $this->session->userdata('year_charge') - 1;
			$next_year_charge = $this->session->userdata('year_charge');
		}else{
			$prev_month_charge = $month_charge - 1;
			$next_month_charge = $month_charge + 1;
			$prev_year_charge = $this->session->userdata('year_charge');
			$next_year_charge = $this->session->userdata('year_charge');
		}
		
		$end_date_charge = cal_days_in_month(CAL_GREGORIAN, $month_charge, $year_charge);
		
		$uri_topup = 'http://sws.vectone.com/api/CTPTopupHist?accId='.$this->session->userdata('account_id').'&year='.$year_charge.'&month='.$month_charge.'&dateFrom=1&dateTo='.$end_date_charge;
			  			
		$this->rest->format('application/json');
		  
		$top_up = $this->rest->get($uri_topup);
		
		
				
		// Call History
		
		$this->session->set_userdata('month_call', $this->uri->segment('5'));
		$this->session->set_userdata('year_call', $this->uri->segment('6'));
		
		if($this->uri->segment('4') == 'call') {
			$month_call = $this->session->userdata('month_call');
			$year_call = $this->session->userdata('year_call');
		}else{
			$month_call = date('m');
			$year_call = date('Y');
		}
		
		$month_name_call = $arr_month[$month_call];
		
		if($month_name_call == 'December') {
			$prev_month_call = $month_call - 1;
			$next_month_call = 1;
			$prev_year_call = $this->session->userdata('year_call');
			$next_year_call = $this->session->userdata('year_call') + 1;
		}elseif($month_name_call == 'January') {
			$prev_month_call = 12;
			$next_month_call = $month_call + 1;
			$prev_year_call = $this->session->userdata('year_call') - 1;
			$next_year_call = $this->session->userdata('year_call');
		}else{
			$prev_month_call = $month_call - 1;
			$next_month_call = $month_call + 1;
			$prev_year_call = $this->session->userdata('year_call');
			$next_year_call = $this->session->userdata('year_call');
		}
		
		
		
		$end_date_call = cal_days_in_month(CAL_GREGORIAN, $month_call, $year_call);
		
		$uri_call_history = 'http://sws.vectone.com/api/CTPCallHistory?accId='.$this->session->userdata('account_id').'&year='.$year_call.'&month='.$month_call.'&dateFrom=1&dateTo='.$end_date_call;
							
		$this->rest->format('application/json');
		  
		$call_history = $this->rest->get($uri_call_history);
				
		
		
		
		// Balance
		
		$uri_balance = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
		  
		$this->rest->format('application/json');
	  
		$result_balance = $this->rest->get($uri_balance);
		
		//print_r($result_balance);
		$data = array('title' => 'Calling & Charge History',
					  'isi'   => 'call_charge/list_call_charge',
					  'month_charge_name' => $month_name_charge,
					  'month_charge' => $month_charge,
					  'next_month_charge' => $next_month_charge,
					  'prev_month_charge' => $prev_month_charge,
					  'year_charge' => $year_charge,
					  'next_year_charge' => $next_year_charge,
					  'prev_year_charge' => $prev_year_charge,
					  'topup' => $top_up,
					  'month_call_name' => $arr_month[$month_call],
					  'month_call' => $month_call,
					  'next_month_call' => $next_month_call,
					  'prev_month_call' => $prev_month_call,
					  'year_call' => $year_call,
					  'next_year_call' => $next_year_call,
					  'prev_year_call' => $prev_year_call,
					  'call'  => $call_history,
					  'balance' => $result_balance
					  );
		
		$this->session->unset_userdata('call_charge_select');
		$this->load->view('myaccount/template/wrapper',$data);
	}
}