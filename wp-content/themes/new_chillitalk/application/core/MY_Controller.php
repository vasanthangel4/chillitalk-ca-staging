<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// CodeIgniter i18n library by Jérôme Jaglale
// http://maestric.com/en/doc/php/codeigniter_i18n
// version 10 - May 10, 2012

class MY_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		ob_start();
		$this->session->set_userdata('lang',$this->lang->lang());
		
		/*$this->session->set_userdata('country_name_web','United Kingdom');
		$this->session->set_userdata('country_code_web','GBR');
		$this->session->set_userdata('country_code2_web','UK');
		$this->session->set_userdata('rates_web','p/min');
		$this->session->set_userdata('call_rates_web','p/min');
		$this->session->set_userdata('sms_rates_web','p/SMS');
		$this->session->set_userdata('app_code_web','CTPUK');
		$this->session->set_userdata('prefix_phone_web','44');
		$this->session->set_userdata('currency_web','GBP');
		$this->session->set_userdata('currency_symbol_web','£');
		$this->session->set_userdata('site_code_web','LO2');
		$this->session->set_userdata('plan_id_web',146);
		$this->session->set_userdata('user_flag',get_template_directory_uri().'/img/chillitalkusers.jpg');
		$this->session->set_userdata('small_flag','ukflg');
		$this->session->set_userdata('big_flag', get_template_directory_uri().'/img/sign_up_flags/gb.png');
		
		$this->lang->load('header');
		$this->lang->load('footer');*/
		
		
		if($this->session->userdata('username') != '') {
			
			
			$uri_master = 'http://sws.vectone.com/api/CTPUserAcc?accId='.$this->session->userdata('account_id');
			  
			$this->rest->format('application/json');
		  
			$result_master = $this->rest->get($uri_master);
			
			$this->session->set_userdata('firstname', $result_master->FirstName);
			$this->session->set_userdata('surname', $result_master->Surname);
			$this->session->set_userdata('country_user', $result_master->Country);
			$this->session->set_userdata('email', $result_master->Email);
			$this->session->set_userdata('access_code', $result_master->AccessCode);
			$this->session->set_userdata('access_no', $result_master->AccessNo);
			$this->session->set_userdata('master_bal', $result_master->MasterBal);
			$this->session->set_userdata('pkg_bal', $result_master->PkgBal);
			$this->session->set_userdata('total_bal', $result_master->TotalBal);
			$this->session->set_userdata('cvv', $result_master->Last6digitsCC);
			$this->session->set_userdata('subc_id', $result_master->SubscriptionID);
			
			
		}
		
		$url_locater = 'http://freegeoip.net/json/202.169.57.187';
		$this->rest->format('application/json');		  
		$locater = $this->rest->get($url_locater); 
		
		
		if($locater->country_code == 'AT') {
			redirect('http://chillitalk.at');
		}elseif($locater->country_code == 'AU') {
			redirect('http://chillitalk.au');
		}elseif($locater->country_code == 'CA') {
			redirect('http://chillitalk.ca');
		}elseif($locater->country_code == 'DK') {
			redirect('http://chillitalk.dk');
		}elseif($locater->country_code == 'FR') {
			redirect('http://chillitalk.fr');
		}elseif($locater->country_code == 'DE') {
			redirect('http://chillitalk.de');
		}elseif($locater->country_code == 'IT') {
			redirect('http://chillitalk.it');
		}elseif($locater->country_code == 'NL') {
			redirect('http://chillitalk.nl');
		}elseif($locater->country_code == 'SE') {
			redirect('http://chillitalk.se');
		}elseif($locater->country_code == 'CH') {
			redirect('http://chillitalk.ch');
		}elseif($locater->country_code == 'US') {
			redirect('http://chillitalk.us');
		}
		
		
		
	}

}
