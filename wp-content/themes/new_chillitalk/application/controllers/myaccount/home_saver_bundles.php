<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Home_saver_bundles extends MY_Controller{
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == '') {
			redirect(base_url().$this->session->userdata('lang').'/login_member');
		}
		$this->load->library('recaptcha');
		$this->lang->load('myaccount/topup');
	}
	
	public function index() {
		
		$this->session->set_userdata('bundles','Sri Lanka');
		header("HTTP/1.1 200 OK");
		
		$uri = 'http://sws.vectone.com/api/CTPBundle?appCode='.$this->config->item('app_code_web').'&accId='.$this->session->userdata('account_id');
		  
		
		$this->rest->format('application/json');
	  
		$result = $this->rest->get($uri);
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/home_saver_bundles',
					  'result' => $result
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
		
	}
	
	public function sri_lanka() {
		$this->session->set_userdata('bundles','Sri Lanka');
		header("HTTP/1.1 200 OK");
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/countrysaver_sri_lanka',
					 
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function philippines() {
		$this->session->set_userdata('bundles','Philippines');
		header("HTTP/1.1 200 OK");
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/countrysaver_philli',
					 
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
		
	}
	
	public function buy() {
		header("HTTP/1.1 200 OK");
		$valid = $this->form_validation;
				
		if($this->session->userdata('bundles') == 'Sri Lanka') {
			$country_code = 1;
		}else{
			$country_code = 2;
		}
		
		$destination_number = $this->input->post('destination_number');
		$confirm_destination_number = $this->input->post('confirm_destination_number');
		$mobile_number = $this->input->post('mobile_number');
		$add_number1 = $this->input->post('add_number1');
		$add_number2 = $this->input->post('add_number2');
		$add_number3 = $this->input->post('add_number3');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$post_code = $this->input->post('postcode');
		$street = $this->input->post('street');
		$town = $this->input->post('town');
		$step = $this->input->post('step');
		$promo_code = $this->input->post('promo_code');
		$payment = $this->input->post('payment');
		
		if($add_number1 == '') {
			$add_number1 = null;
		}
		if($add_number2 == '') {
			$add_number2 = null;
		}
		if($add_number3 == '') {
			$add_number3 = null;
		}
		
		
		$valid->set_rules('destination_number','Destination Number', 'required|numeric|min_length[4]');
		$valid->set_rules('confirm_destination_number','Confirm Destination Number','matches[destination_number]');
		$valid->set_rules('mobile_number','Mobile Number','numeric');
		$valid->set_rules('first_name','First Name','required');
		$valid->set_rules('last_name','Last Name','required');
		$valid->set_rules('postcode','Post Code','required');
		$valid->set_rules('street','Street','required');
		$valid->set_rules('town','Town','required');
		
		if($valid->run()) {
			
			/*$uri_prefix = 'http://sws.vectone.com/api/CTPCountryPrefix?countryCode2='.$country;
			$this->rest->format('application/json');
			$result_prefix = $this->rest->get($uri_prefix);*/
			
			if(preg_match('/'.$this->config->item('prefix_phone_web').'/i', $mobile_number)) {
				$mobile_number_pref = ltrim($mobile_number,0);
			}else{
				$mobile_number_pref = $this->config->item('prefix_phone_web').ltrim($mobile_number,0);
			}
			
			if($add_number1 != null) {
				if(preg_match('/'.$this->config->item('prefix_phone_web').'/i', $add_number1)) {
					$add_number1_pref = ltrim($add_number1,0);
				}else{
					$add_number1_pref = $this->config->item('prefix_phone_web').ltrim($add_number1,0);
				}
			}
			
			if($add_number2 != null) {
				if(preg_match('/'.$this->config->item('prefix_phone_web').'/i', $add_number2)) {
					$add_number2_pref = ltrim($add_number2,0);
				}else{
					$add_number2_pref = $this->config->item('prefix_phone_web').ltrim($add_number2,0);
				}
			}
			
			if($add_number3 != null) {
				if(preg_match('/'.$this->config->item('prefix_phone_web').'/i', $add_number1)) {
					$add_number3_pref = ltrim($add_number3,0);
				}else{
					$add_number3_pref = $this->config->item('prefix_phone_web').ltrim($add_number3,0);
				}
			}
			
			
			$uri1 = 'http://sws.vectone.com/api/CTPHomeSaver';
						
			$params1 = array('Id' => 1, 
							'SiteCode' => $this->config->item('site_code_web'),
							'ApplicationCode' => $this->config->item('app_code_web'),
							'Country' => $country_code,
							'Step' => $step,
							'FirstName' => $this->session->userdata('firstname'),
							'LastName' => $this->session->userdata('surname'),
							'Email'   => $this->session->userdata('email'),
							'Prefix' => '',
							'LocalNumber' => '',
							'Password' => $this->session->userdata('password'),
							'IsAgree' => true,
							'DestinationNumber' => $destination_number,
							'MainNumber' => $mobile_number_pref,
							'AdditionalNumber1' => $add_number1_pref,
							'AdditionalNumber2' => $add_number2_pref,
							'AdditionalNumber3' => $add_number3_pref,
							'DestinationFirstName' => $first_name,
							'DestinationLastName' => $last_name,
							'DestinationPostCode' => $post_code,
							'DestinationStreet' => $street,
							'DestinationTown'	=> $town,
							'PromoCode' => $promo_code,
							'CardFirstName' => '',
							'CardLastName' => '',
							'CardNumber' => '',
							'CardExpireMonth'=> '',
							'CardExpireYear'=> '',
							'CardCVV'=> '',
							'CardPhone'=> '',
							'CardCountry'=> '',
							'CardBillAddress'=> '',
							'CardCity'=> '',
							'CardPostCode'=> '',
							'CostAdditionalNumber'=> '',
							'CostTotal'=> '',
							'AccountId'=> $this->session->userdata('account_id'),
							'Username'=> $this->session->userdata('email'),
							'Currency'=> $this->config->item('currency_web'),
							'SourceReg'=> '',
							'ErrCode'=> '',
							'ErrMsg'=> '',
							'Bypass3Ds' => false
							);
			
							
			$this->rest->format('application/json');
		  
			$result1 = $this->rest->post($uri1, $params1);
			
			//print_r($result1);
			if($result1->ErrCode == 0) {
				
				$this->session->set_userdata('country_saver',$result1->Country);
				$this->session->set_userdata('destination_number', $result1->DestinationNumber);
				$this->session->set_userdata('main_number', $result1->MainNumber);
				$this->session->set_userdata('add_number1', $result1->AdditionalNumber1);
				$this->session->set_userdata('add_number2', $result1->AdditionalNumber2);
				$this->session->set_userdata('add_number3', $result1->AdditionalNumber3);
				$this->session->set_userdata('dest_firstname', $first_name);
				$this->session->set_userdata('dest_lastname', $last_name);
				$this->session->set_userdata('dest_postcode', $post_code);
				$this->session->set_userdata('dest_street', $street);
				$this->session->set_userdata('dest_town', $town);
				$this->session->set_userdata('promo_code', $promo_code);
				$this->session->set_userdata('home_saver', $result1->CostHomeSaver);
				$this->session->set_userdata('add_number', $result1->CostAdditionalNumber);
				$this->session->set_userdata('promo_code_discount', $result1->CostDiscount);
				$this->session->set_userdata('total', $result1->CostTotal);
				
				if($payment == 'card') {
					
					$this->session->set_userdata('card','card');
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/card');
					
				}else{
					
					$this->session->set_userdata('credit','credit');
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/credit');
				}
				
			}else{
				
					$this->session->set_flashdata('failed',$result1->ErrMsg);
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/buy');
			}
			
		}
		
		
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/buy',
					 
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function card() {
		
		header("HTTP/1.1 200 OK");
		
		if($this->session->userdata('card') == '') {
			redirect(base_url().'myaccount/home_saver_bundles/buy');
		}
		
		if($this->session->userdata('bundles') == 'Sri Lanka') {
			$country_code = 1;
		}else{
			$country_code = 2;
		}
		
		$sess_add_number1 = $this->session->userdata('add_number1');
		$sess_add_number2 = $this->session->userdata('add_number2');
		$sess_add_number3 = $this->session->userdata('add_number3');
		
		if($sess_add_number1 == '') {
			$sess_add_number1 = null;
		}
		
		if($sess_add_number2 == '') {
			$sess_add_number2 = null;
		}
		
		if($sess_add_number3 == '') {
			$sess_add_number3 = null;
		}
				
		$valid = $this->form_validation;
		
		$valid->set_rules('first_name','First Name', 'required');
		$valid->set_rules('last_name','Last Name', 'required');
		$valid->set_rules('credit_card_number','Credit card number', 'required|numeric|min_length[5]');
		$valid->set_rules('month','Exp Month', 'required|numeric|exact_length[2]');
		$valid->set_rules('cvv','CVV', 'required');
		$valid->set_rules('billing_phone','Billing Phone No', 'required|numeric|min_length[4]');
		$valid->set_rules('country','Country', 'required');
		$valid->set_rules('address','Address', 'required');
		$valid->set_rules('zip','ZIP', 'required');
		
		
		
		if($valid->run()) {
			
			/*$this->recaptcha->recaptcha_check_answer();
			
			if($this->recaptcha->getIsValid()) {*/
				
				$uri2 = 'http://sws.vectone.com/api/CTPHomeSaver';
			
				$amount = $this->input->post('amount');
				$auto_recharge = $this->input->post('auto_recharge');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$credit_card_number = $this->input->post('credit_card_number');
				$month = $this->input->post('month');
				$year = $this->input->post('year');
				$cvv = $this->input->post('cvv');
				$billing_phone = $this->input->post('billing_phone');
				$country = $this->input->post('country');
				$city = $this->input->post('city');
				$address = $this->input->post('address');
				$zip = $this->input->post('zip');
				  
				$params2 = array('Id' => 1, 
								'SiteCode' => $this->config->item('site_code_web'),
								'ApplicationCode' => $this->config->item('app_code_web'),
								'Country' => $country_code,
								'Step' => 10,
								'FirstName' => $this->session->userdata('firstname'),
								'LastName' => $this->session->userdata('surname'),
								'Email'   => $this->session->userdata('email'),
								'Prefix' => '',
								'LocalNumber' => '',
								'Password' => $this->session->userdata('password'),
								'IsAgree' => true,
								'DestinationNumber' => $this->session->userdata('destination_number'),
								'MainNumber' => $this->session->userdata('main_number'),
								'AdditionalNumber1' => $this->session->userdata('add_number1'),
								'AdditionalNumber2' => $this->session->userdata('add_number2'),
								'AdditionalNumber3' => $this->session->userdata('add_number3'),
								'DestinationFirstName' => $this->session->userdata('dest_firstname'),
								'DestinationLastName' => $this->session->userdata('dest_lastname'),
								'DestinationPostCode' => $this->session->userdata('dest_postcode'),
								'DestinationStreet' => $this->session->userdata('dest_street'),
								'DestinationTown' => $this->session->userdata('dest_town'),
								'PromoCode' => $this->session->userdata('promo_code'),
								'CardFirstName' => $first_name,
								'CardLastName' => $last_name,
								'CardNumber' => $credit_card_number,
								'CardExpireMonth' => $month,
								'CardExpireYear' => $year,
								'CardCVV' => $cvv,
								'CardPhone' => $billing_phone,
								'CardCountry' => $country,
								'CardBillAddress' => $address,
								'CardCity' => $city,
								'CardPostCode' => $zip,
								'CostAdditionalNumber' => $this->session->userdata('add_number'),
								'CostTotal' => $this->session->userdata('total'),
								'AccountId' => $this->session->userdata('account_id'),
								'Username' => $this->session->userdata('email'),
								'Currency' => $this->config->item('currency_web'),
								'SourceReg' => '',
								'ErrCode' => '',
								'ErrMsg' => '',
								'ipAdd' => $this->input->ip_address()
								);
				
								
				$this->rest->format('application/json');
			  
				$result2 = $this->rest->post($uri2, $params2);
				//print_r($result2);
				
				
				if($result2->ErrCode == 0 || $result2->ReasonCode == 475) {
					
					
					$this->session->set_userdata('success', 'success');
					$this->session->set_userdata('country_saver', $country_code);
					$this->session->set_userdata('card_firstname',$first_name);
					$this->session->set_userdata('card_lastname',$last_name);
					$this->session->set_userdata('card_number', $credit_card_number);
					$this->session->set_userdata('card_month', $month);
					$this->session->set_userdata('card_year', $year);
					$this->session->set_userdata('card_cvv', $cvv);
					$this->session->set_userdata('card_phone', $billing_phone);
					$this->session->set_userdata('card_country', $country);
					$this->session->set_userdata('card_address',$address);
					$this->session->set_userdata('card_city', $city);
					$this->session->set_userdata('card_postcode', $zip);
					$this->session->set_userdata('amount_credit', $result2->AmountCredit);
					$this->session->set_userdata('current_balance', $result2->CurrentBalance);
					$this->session->set_userdata('acs_url_saver', $result2->AcsURL);
					$this->session->set_userdata('pareq_saver', $result2->PaReq);
					$this->session->set_userdata('ref_code_saver', $result2->MerchantRefCode);
					
					
					//redirect(base_url()."myaccount/home_saver_bundles/form3ds");
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/success_credit');
				}else{
					
					$this->session->set_userdata('failed', 'failed');
					$this->session->set_userdata('ref_code_saver', $result2->MerchantRefCode);
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/failed');
				}
			
			/*}else{
				$this->session->set_flashdata('captcha_error','incorrect captcha');
			}*/
			
			
			
		}
		
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/card',
					  'captcha' => $this->recaptcha->recaptcha_get_html()
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
		
	}
	
	
	public function form3ds() {
		$data = array('title' => 'Add Credit Card',
					  'isi'   => 'home_saver/form3ds'
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
	}
	
	public function process_credit_card() {
		
		$uri_p = 'http://sws.vectone.com/api/CTPHomeSaver';
			
			$params_p = array('Id' => 1, 
							'SiteCode' => $this->config->item('site_code_web'),
							'ApplicationCode' => $this->config->item('app_code_web'),
							'Country' => $this->session->userdata('country_saver'),
							'Step' => 103,
							'FirstName' => $this->session->userdata('firstname'),
							'LastName' => $this->session->userdata('surname'),
							'Email'   => $this->session->userdata('email'),
							'Prefix' => '',
							'LocalNumber' => '',
							'Password' => $this->session->userdata('password'),
							'IsAgree' => true,
							'DestinationNumber' => $this->session->userdata('destination_number'),
							'MainNumber' => $this->session->userdata('main_number'),
							'AdditionalNumber1' => $this->session->userdata('add_number1'),
							'AdditionalNumber2' => $this->session->userdata('add_number2'),
							'AdditionalNumber3' => $this->session->userdata('add_number3'),
							'DestinationFirstName' => $this->session->userdata('dest_firstname'),
							'DestinationLastName' => $this->session->userdata('dest_lastname'),
							'DestinationPostCode' => $this->session->userdata('dest_postcode'),
							'DestinationStreet' => $this->session->userdata('dest_street'),
							'DestinationTown' => $this->session->userdata('dest_town'),
							'PromoCode' => $this->session->userdata('promo_code'),
							'CardFirstName' => $this->session->userdata('card_firstname'),
  							'CardLastName' => $this->session->userdata('card_lastname'),
							'CardNumber' => $this->session->userdata('card_number'),
							'CardExpireMonth'=> $this->session->userdata('card_month'),
							'CardExpireYear'=> $this->session->userdata('card_year'),
							'CardCVV'=> $this->session->userdata('card_cvv'),
							'CardPhone'=> $this->session->userdata('card_phone'),
							'CardCountry'=> $this->session->userdata('card_country'),
							'CardBillAddress'=> $this->session->userdata('card_address'),
							'CardCity'=> $this->session->userdata('card_city'),
							'CardPostCode'=> $this->session->userdata('card_postcode'),
							'CostAdditionalNumber'=> $this->session->userdata('add_number'),
							'CostTotal'=> $this->session->userdata('total'),
							'CostDiscount' => $this->session->userdata('promo_code_discount'),
							'AccountId'=> $this->session->userdata('account_id'),
							'Username'=> $this->session->userdata('email'),
							'Currency'=> $this->config->item('currency_web'),
							'SourceReg'=> '',
							'ErrCode'=> '',
							'ErrMsg'=> '',
							'referenceCode' => $this->session->userdata('ref_code_saver'),
							'PaRes' => $_POST['PaRes'],
							'ipAdd' => $this->input->ip_address()
							);
				
		  
			$result_p = $this->rest->post($uri_p, $params_p);
			
			if($result_p->ErrCode == '0') { 
			
				redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/success_credit');
			
			}else{
				
				$this->session->set_userdata('failed', 'failed');
				$this->session->set_userdata('ref_code', $result_p->MerchantRefCode);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/failed');
			}
		
	}
	
	public function credit() {
		
		header("HTTP/1.1 200 OK");
		
		if($this->session->userdata('credit') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/buy');
		}
		
		if($this->session->userdata('bundles') == 'Sri Lanka') {
			$country_code = 1;
		}else{
			$country_code = 2;
		}
		
		$valid = $this->form_validation;
		
		$valid->set_rules('total','Total','required');
		
		$sess_add_number1 = $this->session->userdata('add_number1');
		$sess_add_number2 = $this->session->userdata('add_number2');
		$sess_add_number3 = $this->session->userdata('add_number3');
		
		if($sess_add_number1 == '') {
			$sess_add_number1 = null;
		}
		
		if($sess_add_number2 == '') {
			$sess_add_number2 = null;
		}
		
		if($sess_add_number3 == '') {
			$sess_add_number3 = null;
		}
		
		
		
		
		if($valid->run()) {
			
			$uri3 = 'http://sws.vectone.com/api/CTPHomeSaver';
			
			$params3 = array('Id' => 1, 
							'SiteCode' => $this->config->item('site_code_web'),
							'ApplicationCode' => $this->config->item('app_code_web'),
							'Country' => $country_code,
							'Step' => 11,
							'FirstName' => $this->session->userdata('firstname'),
							'LastName' => $this->session->userdata('surname'),
							'Email'   => $this->session->userdata('email'),
							'Prefix' => '',
							'LocalNumber' => '',
							'Password' => $this->session->userdata('password'),
							'IsAgree' => true,
							'DestinationNumber' => $this->session->userdata('destination_number'),
							'MainNumber' => $this->session->userdata('main_number'),
							'AdditionalNumber1' => $sess_add_number1,
							'AdditionalNumber2' => $sess_add_number1,
							'AdditionalNumber3' => $sess_add_number1,
							'DestinationFirstName' => $this->session->userdata('dest_firstname'),
							'DestinationLastName' => $this->session->userdata('dest_lastname'),
							'DestinationPostCode' => $this->session->userdata('dest_postcode'),
							'DestinationStreet' => $this->session->userdata('dest_street'),
							'DestinationTown' => $this->session->userdata('dest_town'),
							'PromoCode' => $this->session->userdata('promo_code'),
							'CardName' => '',
							'CardNumber' => '',
							'CardExpireMonth'=> '',
							'CardExpireYear'=> '',
							'CardCVV'=> '',
							'CardPhone'=> '',
							'CardCountry'=> '',
							'CardBillAddress'=> '',
							'CardCity'=> '',
							'CardPostCode'=> '',
							'CostAdditionalNumber'=> $this->session->userdata('add_number'),
							'CostTotal'=> $this->session->userdata('total'),
							'CostDiscount' => $this->session->userdata('promo_code_discount'),
							'AccountId'=> $this->session->userdata('account_id'),
							'Username'=> $this->session->userdata('email'),
							'Currency'=> $this->config->item('currency_web'),
							'SourceReg'=> '',
							'ErrCode'=> '',
							'ErrMsg'=> ''
							);
				
		  
			$result3 = $this->rest->post($uri3, $params3);
			
			//print_r($result3);
			if($result3->ErrCode >= 0) {
								
				$this->session->set_userdata('success', 'success');
				$this->session->set_userdata('amount_credit', $result3->AmountCredit);
				$this->session->set_userdata('current_balance', $result3->CurrentBalance);
				
				redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/success_credit');
			
			}else{
				
					$this->session->set_flashdata('failed',$result3->ErrMsg);
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/buy');
			}
			
		}
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/credit',
					 
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
	}
	
	public function success_card() {
		
		if($this->session->userdata('success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles');
		}
		
		$data = array('title' => 'Home Saver Bundles',
					 
					  );
		
		$this->load->view('myaccount/home_saver/success_card',$data);
		
	}
	
	public function success_credit() {
		
		if($this->session->userdata('success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles');
		}
		
		$data = array('title' => 'Home Saver Bundles',
					  );
		
		$this->load->view('myaccount/home_saver/success_credit',$data);
		
	}
	
	public function failed() {
		
		if($this->session->userdata('failed') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles');
		}
		
		$data = array('title' => 'Home Saver Bundles',
					 
					  );
		
		$this->load->view('myaccount/home_saver/failed',$data);
		
	}
	
	// --------------------------------------  SIGN UP -> HOME SAVER BUNDLES ----------------------------------- //
	
	public function step2() {
		header("HTTP/1.1 200 OK");
		$valid = $this->form_validation;
				
		if($this->session->userdata('bundles') == 'Sri Lanka') {
			$country_code = 1;
		}else{
			$country_code = 2;
		}
		
		$destination_number = $this->input->post('destination_number');
		$confirm_destination_number = $this->input->post('confirm_destination_number');
		$mobile_number = $this->input->post('mobile_number');
		$add_number1 = $this->input->post('add_number1');
		$add_number2 = $this->input->post('add_number2');
		$add_number3 = $this->input->post('add_number3');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$post_code = $this->input->post('postcode');
		$street = $this->input->post('street');
		$town = $this->input->post('town');
		$step = $this->input->post('step');
		$promo_code = $this->input->post('promo_code');
		$payment = $this->input->post('payment');
		
		if($add_number1 == '') {
			$add_number1 = null;
		}
		if($add_number2 == '') {
			$add_number2 = null;
		}
		if($add_number3 == '') {
			$add_number3 = null;
		}
		
		
		$valid->set_rules('destination_number','Destination Number', 'required|numeric|min_length[4]');
		$valid->set_rules('confirm_destination_number','Confirm Destination Number','matches[destination_number]');
		$valid->set_rules('mobile_number','Mobile Number','numeric');
		$valid->set_rules('first_name','First Name','required');
		$valid->set_rules('last_name','Last Name','required');
		$valid->set_rules('postcode','Post Code','required');
		$valid->set_rules('street','Street','required');
		$valid->set_rules('town','Town','required');
		
		if($valid->run()) {
			
			/*$uri_prefix = 'http://sws.vectone.com/api/CTPCountryPrefix?countryCode2='.$country;
			$this->rest->format('application/json');
			$result_prefix = $this->rest->get($uri_prefix);*/
			
			if(preg_match('/'.$this->config->item('prefix_phone_web').'/i', $mobile_number)) {
				$mobile_number_pref = ltrim($mobile_number,0);
			}else{
				$mobile_number_pref = $this->config->item('prefix_phone_web').ltrim($mobile_number,0);
			}
			
			if($add_number1 != null) {
				if(preg_match('/'.$this->config->item('prefix_phone_web').'/i', $add_number1)) {
					$add_number1_pref = ltrim($add_number1,0);
				}else{
					$add_number1_pref = $this->config->item('prefix_phone_web').ltrim($add_number1,0);
				}
			}
			
			if($add_number2 != null) {
				if(preg_match('/'.$this->config->item('prefix_phone_web').'/i', $add_number2)) {
					$add_number2_pref = ltrim($add_number2,0);
				}else{
					$add_number2_pref = $this->config->item('prefix_phone_web').ltrim($add_number2,0);
				}
			}
			
			if($add_number3 != null) {
				if(preg_match('/'.$this->config->item('prefix_phone_web').'/i', $add_number1)) {
					$add_number3_pref = ltrim($add_number3,0);
				}else{
					$add_number3_pref = $this->config->item('prefix_phone_web').ltrim($add_number3,0);
				}
			}
			
			
			$uri_step1 = 'http://sws.vectone.com/api/CTPHomeSaver';
						
			$params_step1 = array('Id' => 1, 
							'SiteCode' => $this->config->item('site_code_web'),
							'ApplicationCode' => $this->config->item('app_code_web'),
							'Country' => $country_code,
							'Step' => $step,
							'FirstName' => $this->session->userdata('firstname'),
							'LastName' => $this->session->userdata('surname'),
							'Email'   => $this->session->userdata('email'),
							'Prefix' => '',
							'LocalNumber' => '',
							'Password' => $this->session->userdata('password'),
							'IsAgree' => true,
							'DestinationNumber' => $destination_number,
							'MainNumber' => $mobile_number_pref,
							'AdditionalNumber1' => $add_number1_pref,
							'AdditionalNumber2' => $add_number2_pref,
							'AdditionalNumber3' => $add_number3_pref,
							'DestinationFirstName' => $first_name,
							'DestinationLastName' => $last_name,
							'DestinationPostCode' => $post_code,
							'DestinationStreet' => $street,
							'DestinationTown'	=> $town,
							'PromoCode' => $promo_code,
							'CardFirstName' => '',
							'CardLastName' => '',
							'CardNumber' => '',
							'CardExpireMonth'=> '',
							'CardExpireYear'=> '',
							'CardCVV'=> '',
							'CardPhone'=> '',
							'CardCountry'=> '',
							'CardBillAddress'=> '',
							'CardCity'=> '',
							'CardPostCode'=> '',
							'CostAdditionalNumber'=> '',
							'CostTotal'=> '',
							'AccountId'=> $this->session->userdata('account_id'),
							'Username'=> $this->session->userdata('email'),
							'Currency'=> $this->config->item('currency_web'),
							'SourceReg'=> '',
							'ErrCode'=> '',
							'ErrMsg'=> '',
							'ipAdd' => $this->input->ip_address()
							);
			
							
			$this->rest->format('application/json');
		  
			$result_step1 = $this->rest->post($uri_step1, $params_step1);
			
			//print_r($result1);
			if($result_step1->ErrCode == 0) {
				
				$this->session->set_userdata('country_saver',$result_step1->Country);
				$this->session->set_userdata('destination_number', $result_step1->DestinationNumber);
				$this->session->set_userdata('main_number', $result_step1->MainNumber);
				$this->session->set_userdata('add_number1', $result_step1->AdditionalNumber1);
				$this->session->set_userdata('add_number2', $result_step1->AdditionalNumber2);
				$this->session->set_userdata('add_number3', $result_step1->AdditionalNumber3);
				$this->session->set_userdata('dest_firstname', $first_name);
				$this->session->set_userdata('dest_lastname', $last_name);
				$this->session->set_userdata('dest_postcode', $post_code);
				$this->session->set_userdata('dest_street', $street);
				$this->session->set_userdata('dest_town', $town);
				$this->session->set_userdata('promo_code', $promo_code);
				$this->session->set_userdata('home_saver', $result_step1->CostHomeSaver);
				$this->session->set_userdata('add_number', $result_step1->CostAdditionalNumber);
				$this->session->set_userdata('promo_code_discount', $result_step1->CostDiscount);
				$this->session->set_userdata('total', $result_step1->CostTotal);
									
				$this->session->set_userdata('card','card');
				redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/step3');
				
			}else{
				
				$this->session->set_flashdata('failed',$result_step1->ErrMsg);
				redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/step2');
				
			}
			
		}
		
		
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/buy_alone',
					 
					  );
		
		$this->load->view('myaccount/template/wrapper_full', $data);
	}
	
	public function step3() {
		
		header("HTTP/1.1 200 OK");
		
		if($this->session->userdata('card') == '') {
			redirect(base_url().'myaccount/home_saver_bundles/step2');
		}
		
		if($this->session->userdata('bundles') == 'Sri Lanka') {
			$country_code = 1;
		}else{
			$country_code = 2;
		}
		
		$sess_add_number1 = $this->session->userdata('add_number1');
		$sess_add_number2 = $this->session->userdata('add_number2');
		$sess_add_number3 = $this->session->userdata('add_number3');
		
		if($sess_add_number1 == '') {
			$sess_add_number1 = null;
		}
		
		if($sess_add_number2 == '') {
			$sess_add_number2 = null;
		}
		
		if($sess_add_number3 == '') {
			$sess_add_number3 = null;
		}
				
		$valid = $this->form_validation;
		
		$valid->set_rules('first_name','First Name', 'required');
		$valid->set_rules('last_name','Last Name', 'required');
		$valid->set_rules('credit_card_number','Credit card number', 'required|numeric|min_length[5]');
		$valid->set_rules('month','Exp Month', 'required|numeric|exact_length[2]');
		$valid->set_rules('cvv','CVV', 'required');
		$valid->set_rules('billing_phone','Billing Phone No', 'required|numeric|min_length[4]');
		$valid->set_rules('country','Country', 'required');
		$valid->set_rules('address','Address', 'required');
		$valid->set_rules('zip','ZIP', 'required');
		
		
		
		if($valid->run()) {
			
			/*$this->recaptcha->recaptcha_check_answer();
			
			if($this->recaptcha->getIsValid()) {*/
				
				$uri_step2 = 'http://sws.vectone.com/api/CTPHomeSaver';
			
				$amount = $this->input->post('amount');
				$auto_recharge = $this->input->post('auto_recharge');
				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$credit_card_number = $this->input->post('credit_card_number');
				$month = $this->input->post('month');
				$year = $this->input->post('year');
				$cvv = $this->input->post('cvv');
				$billing_phone = $this->input->post('billing_phone');
				$country = $this->input->post('country');
				$city = $this->input->post('city');
				$address = $this->input->post('address');
				$zip = $this->input->post('zip');
				  
				$params_step2 = array('Id' => 1, 
								'SiteCode' => $this->config->item('site_code_web'),
								'ApplicationCode' => $this->config->item('app_code_web'),
								'Country' => $country_code,
								'Step' => 10,
								'FirstName' => $this->session->userdata('firstname'),
								'LastName' => $this->session->userdata('surname'),
								'Email'   => $this->session->userdata('email'),
								'Prefix' => '',
								'LocalNumber' => '',
								'Password' => $this->session->userdata('password'),
								'IsAgree' => true,
								'DestinationNumber' => $this->session->userdata('destination_number'),
								'MainNumber' => $this->session->userdata('main_number'),
								'AdditionalNumber1' => $this->session->userdata('add_number1'),
								'AdditionalNumber2' => $this->session->userdata('add_number2'),
								'AdditionalNumber3' => $this->session->userdata('add_number3'),
								'DestinationFirstName' => $this->session->userdata('dest_firstname'),
								'DestinationLastName' => $this->session->userdata('dest_lastname'),
								'DestinationPostCode' => $this->session->userdata('dest_postcode'),
								'DestinationStreet' => $this->session->userdata('dest_street'),
								'DestinationTown' => $this->session->userdata('dest_town'),
								'PromoCode' => $this->session->userdata('promo_code'),
								'CardFirstName' => $first_name,
								'CardLastName' => $last_name,
								'CardNumber' => $credit_card_number,
								'CardExpireMonth' => $month,
								'CardExpireYear' => $year,
								'CardCVV' => $cvv,
								'CardPhone' => $billing_phone,
								'CardCountry' => $country,
								'CardBillAddress' => $address,
								'CardCity' => $city,
								'CardPostCode' => $zip,
								'CostAdditionalNumber' => $this->session->userdata('add_number'),
								'CostTotal' => $this->session->userdata('total'),
								'AccountId' => $this->session->userdata('account_id'),
								'Username' => $this->session->userdata('email'),
								'Currency' => $this->config->item('currency_web'),
								'SourceReg' => '',
								'ErrCode' => '',
								'ErrMsg' => '',
								'Bypass3Ds' => false,
								'ipAdd' => $this->input->ip_address()
								);
				
								
				$this->rest->format('application/json');
			  
				$result_step2 = $this->rest->post($uri_step2, $params_step2);
				//print_r($result2);
				
				
				if($result_step2->ErrCode == 0 || $result_step2->ReasonCode == 475) {
					
					
					$this->session->set_userdata('success', 'success');
					$this->session->set_userdata('country_saver', $country_code);
					$this->session->set_userdata('card_firstname',$first_name);
					$this->session->set_userdata('card_lastname',$last_name);
					$this->session->set_userdata('card_number', $credit_card_number);
					$this->session->set_userdata('card_month', $month);
					$this->session->set_userdata('card_year', $year);
					$this->session->set_userdata('card_cvv', $cvv);
					$this->session->set_userdata('card_phone', $billing_phone);
					$this->session->set_userdata('card_country', $country);
					$this->session->set_userdata('card_address',$address);
					$this->session->set_userdata('card_city', $city);
					$this->session->set_userdata('card_postcode', $zip);
					$this->session->set_userdata('amount_credit', $result_step2->AmountCredit);
					$this->session->set_userdata('current_balance', $result_step2->CurrentBalance);
					$this->session->set_userdata('acs_url_saver', $result_step2->AcsURL);
					$this->session->set_userdata('pareq_saver', $result_step2->PaReq);
					$this->session->set_userdata('ref_code_saver', $result_step2->MerchantRefCode);
					
					
					//redirect(base_url()."myaccount/home_saver_bundles/form3ds");
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/success_home_saver');
				}else{
					
					$this->session->set_userdata('failed', 'failed');
					$this->session->set_userdata('ref_code_saver', $result_step2->MerchantRefCode);
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/failed_home_saver');
				}
				
			/*}else{
				$this->session->set_flashdata('captcha_error','incorrect captcha');
			}*/
			
			
			
		}
		
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/card_alone',
					  'captcha' => $this->recaptcha->recaptcha_get_html()
					  );
		
		$this->load->view('myaccount/template/wrapper_full',$data);
		
		
	}
	
	
	public function success_home_saver() {
		
		if($this->session->userdata('success') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles');
		}
		
		$data = array('title' => 'Home Saver Bundles',
					  );
		
		$this->load->view('myaccount/home_saver/success_alone',$data);
		
	}
	
	public function failed_home_saver() {
		
		if($this->session->userdata('failed') == '') {
			redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles');
		}
		
		$data = array('title' => 'Home Saver Bundles',
					 
					  );
		
		$this->load->view('myaccount/home_saver/failed_alone',$data);
		
	}
	
	public function existing_card() {
		
		header("HTTP/1.1 200 OK");
		
		if($this->session->userdata('card') == '') {
			redirect(base_url().'myaccount/home_saver_bundles/buy');
		}
		
		if($this->session->userdata('bundles') == 'Sri Lanka') {
			$country_code = 1;
		}else{
			$country_code = 2;
		}
		
		$sess_add_number1 = $this->session->userdata('add_number1');
		$sess_add_number2 = $this->session->userdata('add_number2');
		$sess_add_number3 = $this->session->userdata('add_number3');
		
		if($sess_add_number1 == '') {
			$sess_add_number1 = null;
		}
		
		if($sess_add_number2 == '') {
			$sess_add_number2 = null;
		}
		
		if($sess_add_number3 == '') {
			$sess_add_number3 = null;
		}
				
		$valid = $this->form_validation;
		
		$valid->set_rules('first_name','First Name', 'required');
		$valid->set_rules('last_name','Last Name', 'required');
		$valid->set_rules('credit_card_number','Credit card number', 'required|numeric|min_length[5]');
		$valid->set_rules('month','Exp Month', 'required|numeric|exact_length[2]');
		$valid->set_rules('cvv','CVV', 'required');
		$valid->set_rules('billing_phone','Billing Phone No', 'required|numeric|min_length[4]');
		$valid->set_rules('country','Country', 'required');
		$valid->set_rules('address','Address', 'required');
		$valid->set_rules('zip','ZIP', 'required');
		
		
		
		if($valid->run()) {
			
			/*$this->recaptcha->recaptcha_check_answer();
			
			if($this->recaptcha->getIsValid()) {*/
				
				$uri2 = 'http://sws.vectone.com/api/CTPHomeSaver';
			
				$amount = $this->input->post('amount2');
				$cvv = $this->input->post('cvv2');
				  
				$params2 = array('Id' => 1, 
								'SiteCode' => $this->config->item('site_code_web'),
								'ApplicationCode' => $this->config->item('app_code_web'),
								'Country' => $country_code,
								'Step' => 105,
								'FirstName' => $this->session->userdata('firstname'),
								'LastName' => $this->session->userdata('surname'),
								'Email'   => $this->session->userdata('email'),
								'Prefix' => '',
								'LocalNumber' => '',
								'Password' => $this->session->userdata('password'),
								'IsAgree' => true,
								'DestinationNumber' => $this->session->userdata('destination_number'),
								'MainNumber' => $this->session->userdata('main_number'),
								'AdditionalNumber1' => $this->session->userdata('add_number1'),
								'AdditionalNumber2' => $this->session->userdata('add_number2'),
								'AdditionalNumber3' => $this->session->userdata('add_number3'),
								'DestinationFirstName' => $this->session->userdata('dest_firstname'),
								'DestinationLastName' => $this->session->userdata('dest_lastname'),
								'DestinationPostCode' => $this->session->userdata('dest_postcode'),
								'DestinationStreet' => $this->session->userdata('dest_street'),
								'DestinationTown' => $this->session->userdata('dest_town'),
								'PromoCode' => $this->session->userdata('promo_code'),
								'CardFirstName' => '',
								'CardLastName' => '',
								'CardNumber' => $this->session->userdata('cvv'),
								'CardExpireMonth' => '',
								'CardExpireYear' => '',
								'CardCVV' => $cvv,
								'CardPhone' => '',
								'CardCountry' => '',
								'CardBillAddress' => '',
								'CardCity' => '',
								'CardPostCode' => '',
								'CostAdditionalNumber' => $this->session->userdata('add_number'),
								'CostTotal' => $this->session->userdata('total'),
								'AccountId' => $this->session->userdata('account_id'),
								'Username' => $this->session->userdata('email'),
								'Currency' => $this->config->item('currency_web'),
								'SourceReg' => '',
								'ErrCode' => '',
								'ErrMsg' => '',
								'ipAdd' => $this->input->ip_address()
								);
				
								
				$this->rest->format('application/json');
			  
				$result2 = $this->rest->post($uri2, $params2);
				//print_r($result2);
				
				
				if($result2->ErrCode == 0 || $result2->ReasonCode == 475) {
					
					
					$this->session->set_userdata('success', 'success');
					$this->session->set_userdata('country_saver', $country_code);
					$this->session->set_userdata('card_firstname',$first_name);
					$this->session->set_userdata('card_lastname',$last_name);
					$this->session->set_userdata('card_number', $credit_card_number);
					$this->session->set_userdata('card_month', $month);
					$this->session->set_userdata('card_year', $year);
					$this->session->set_userdata('card_cvv', $cvv);
					$this->session->set_userdata('card_phone', $billing_phone);
					$this->session->set_userdata('card_country', $country);
					$this->session->set_userdata('card_address',$address);
					$this->session->set_userdata('card_city', $city);
					$this->session->set_userdata('card_postcode', $zip);
					$this->session->set_userdata('amount_credit', $result2->AmountCredit);
					$this->session->set_userdata('current_balance', $result2->CurrentBalance);
					$this->session->set_userdata('acs_url_saver', $result2->AcsURL);
					$this->session->set_userdata('pareq_saver', $result2->PaReq);
					$this->session->set_userdata('ref_code_saver', $result2->MerchantRefCode);
					
					
					//redirect(base_url()."myaccount/home_saver_bundles/form3ds");
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/success_credit');
				}else{
					
					$this->session->set_userdata('failed', 'failed');
					$this->session->set_userdata('ref_code_saver', $result2->MerchantRefCode);
					redirect(base_url().$this->session->userdata('lang').'/myaccount/home_saver_bundles/failed');
				}
			
			/*}else{
				$this->session->set_flashdata('captcha_error','incorrect captcha');
			}*/
			
			
			
		}
		
		
		$data = array('title' => 'Home Saver Bundles',
					  'isi'   => 'home_saver/card',
					  'captcha' => $this->recaptcha->recaptcha_get_html()
					  );
		
		$this->load->view('myaccount/template/wrapper',$data);
		
		
	}
	
}