<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 

class Admin_auth {
	
	var $CI = NULL;
	
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function login($username, $password, $success_page, $fail_page) {
		
		$query = $this->CI->db->get_where('admin',	 array('username' => $username, 'password' => sha1($password)));
		
		
		if($query->num_rows() == 1) {
			$row = $this->CI->db->query('SELECT id_admin FROM admin Where username = "'.$username.'"');
			$admin = $row->row();
			$id = $admin->id_admin;
			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			redirect($success_page);
		}else{
			$this->CI->session->set_flashdata('failed_login','Login failed, Please fill username and password correctly');
			redirect($fail_page);
		}
		
		return false;
	}
	
	public function cek_login() {
		
		if($this->CI->session->userdata('username') == '') {
			redirect(base_url().'login/');
		}
	}
	
	public function logout($redirect) {
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('logout_success','Logout Success');
		redirect($redirect);
	}
}