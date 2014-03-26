<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_page extends CI_Controller {
	
	
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('login_page_model');
		$this->load->helper('cookie');
		$this->load->library('email');
		if($this->session->userdata('logged_in') == 'yes'){
			header("location:".base_url().'home');
		}
	}
	
	public function index()
	{
		if(get_cookie('remember_me')){
			$this->session->set_userdata('logged_in' , 'yes');
			header("location:".base_url().'home');
		}
		$this->load->view('login_page');
	}

	public function login_user(){
		$email=$this->input->post('email',TRUE);
		$password=$this->input->post('password',TRUE);
		$remember_me=$this->input->post('remember_me',TRUE);
		$result=$this->login_page_model->login_user($email,$password);
		if($result == 1){
			if($remember_me == 'true'){
				$this->input->set_cookie('remember_me',$email,'2592000');
			}
			$this->session->set_userdata('logged_in' , 'yes');
			$user_id = $this->session->userdata('user_id');
			$city_id = $this->login_page_model->get_city_id($user_id);
			$city_name = $this->login_page_model->get_city_name($city_id->city_id);
			$city_name=str_replace(' ', '-',$city_name->city_name);  
	        $city_name=preg_replace('/[^A-Za-z0-9\-]/', '', $city_name);
	        $city_name=preg_replace('/--+/', '-', $city_name);
	        $city_name=strtolower($city_name);
	        $city_name=str_replace('-', '',$city_name);
	        $this->session->set_userdata('profile_city_name' , $city_name);
	        $cookie = array(
			    'name'   => 'location_name',
			    'value'  => $city_name,
			    'domain' => '.zeromaze.com',
			    'expire' => '2592000',
			); 
			$this->input->set_cookie($cookie); 
		    echo $this->session->userdata('profile_city_name');
		}else{
			echo 0;	
		}
		
		
	}
	
	public function forgotpass() {
			$postValues['email']  = $this->input->post('email', TRUE);
			$userEmail = $postValues['email'];
			$newPassword = $this->login_page_model->check_forgot_user($postValues);
			
			if($newPassword != null) {
				/* send password recovery mail */
				
				$host = USER_HOST;
				
				$message =
				"Your Password has been Reset...\n
				New Login details: \n
				Email:  $userEmail \n
				Password: $newPassword \n
				
				
				Regards
				
				Yuplee Team
				
				______________________________________________________
				THIS IS AN AUTOMATED RESPONSE.
				***DO NOT RESPOND TO THIS EMAIL****
				";
				
				$this->email->from("From: \"Yuplee\" <auto-reply@$host>\r\n" ."X-Mailer: PHP/" . phpversion());
				$this->email->to($userEmail);
				
				$this->email->subject('Password Recovery');
				$this->email->message($message);
				
				$this->email->send();
				echo 1;
			}
			else {
				echo 0;
			}
	}
	
	public function logout()
	{
		delete_cookie('remember_me');
		$this->session->sess_destroy();
		header("location:".base_url());
	}



}