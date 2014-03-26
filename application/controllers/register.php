<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
	/**
	 * The Index Page.
	 * The controller which shows options to register new patient.
	 */
	 
	function  __construct() {
		parent::__construct();
		/*if($this->session->userdata('admin_logged') ) {
			if($this->session->userdata('admin_logged')=='yes') {
				
			}
			else {
				header("location:".base_url().'login');
			}
		}
		else {
			header("location:".base_url().'login');
		}*/
		$this->load->model('register_model');
		$this->load->library('email');
	}
	
	public function index()
	{
		$this->load->view('register_page');
	}
	
	public function add_new(){
			$username   = $this->input->post('username',TRUE);
			$password   = $this->input->post('password', TRUE);
			$password_temp= $password;
			$email 		= $this->input->post('email', TRUE);
			$password 	= passwordHash($password,substr($password,0,9));
			
			/*creating verify code*/
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < 8; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
		
			$verify_code=SHA1($randomString);
		
			
			$array = array('email'=>$email,'password'=>$password,'status'=>'0','user_type'=>'user','verify_code'=>$verify_code,'username'=>$username);
			
			$result = $this->register_model->add_user($array);
			if($result == 1){
				echo 1;
				
				$verifyUrl=base_url().'register/verify_email?verify_code='.$verify_code;
				$host = USER_HOST;
				$message =
				"Recently you have registered with Yuplee.in \n
				Email:  $email \n
				username:  $username \n
				Password:  $password_temp \n
				Click here to verify your account:  $verifyUrl \n
				Regards
				
				Yuplee Team
				
				______________________________________________________
				THIS IS AN AUTOMATED RESPONSE.
				***DO NOT RESPOND TO THIS EMAIL****
				";
				
				$this->email->from("admin@yuplee.in");
				$this->email->to($email);
				
				$this->email->subject('Email verification');
				$this->email->message($message);
				
				$this->email->send();
			}else if($result == 0){
				echo 0;
			}
			
	}
	
	public function verify_email() {
		$data['key']="";
		$data['main_title']='Verify Email';
		$verifyCode = $this->input->get('verify_code', TRUE);
		$verify = $this->register_model->verify_user($verifyCode);
		
		$this->load->view('verify_success_page',$data);	
	}
	
	public function select_city(){
		$state=$this->input->post('state');
		$this->load->model('register_model');
		$this->register_model->select_city($state);
	}

	/*public function add_new_mobile() {

			$firstname  = $this->input->post('firstname', TRUE); 
			$lastname   = $this->input->post('lastname', TRUE);
			$password   = $this->input->post('password', TRUE);				
			$password 	= passwordHash($password);
			$fullname   = $firstname.' '.$lastname;
			$userType   = 'Patient';
			$date = date('Y-m-d H:i:s');
			$curdate = $date;
			
			$arr = array('firstName'=>($firstname),'lastName' => ($lastname),'fullName'=>($fullname),'email'=>($email),'password'=>($password),'userType' => ($userType),'registeredDate' => ($curdate));

			$userReqResult = $this->register_model->add_user($arr);
			
			if (strpos($userReqResult,'true') !== false) {
				
				preg_match( '/\"uid": (.*?)\,/', $userReqResult, $match );
				$userid=$match[1];
			
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$randomString = '';
				for ($i = 0; $i < 8; $i++) {
					$randomString .= $characters[rand(0, strlen($characters) - 1)];
				}
			
				$verifyString=SHA1($randomString);
				
				$arr2 = array('verifyCode'=>($verifyString));

				$userReqResult2 = $this->register_model->add_verify_code($arr2,$userid);
				
				$verifyUrl=base_url().'register/verifyEmail?verifyCode='.$verifyString;
				
				$host = USER_HOST;
				
				$message =
				"Recently you have registered with Medsquare.\n
				
				Email:  $email \n
				
				Click here to verify your account:  $verifyUrl \n
				
				
				Regards
				
				Medsquare Team
				
				______________________________________________________
				THIS IS AN AUTOMATED RESPONSE.
				***DO NOT RESPOND TO THIS EMAIL****
				";
				
				$this->email->from("From: \"Medsquare\" <auto-reply@$host>\r\n" ."X-Mailer: PHP/" . phpversion());
				$this->email->to($email);
				
				$this->email->subject('Email verification');
				$this->email->message($message);
				
				$this->email->send();
			}
			
			echo $userReqResult;
	}
	
	public function facebookLogin() {
	
		require_once(APPPATH.'third_party/facebook/facebook.php');
		$facebook = new Facebook(array(
				'appId' => APP_ID,
				'secret' => APP_SECRET,
				'cookie' => true,
		));
		
		$token = $this->input->post('token', TRUE); 
		
		$facebook->setAccessToken($token);
		
		$user = $facebook->getUser();
		if ($user) {
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $facebook->api('/me');
				$friends = $facebook->api('/me/friends');
			} catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
			}
			
			//print_r($user_profile);
			
			$fullName = $user_profile['name'];
			$firstName = $user_profile['first_name'];
			$lastName = $user_profile['last_name'];
			$email = $user_profile['email'];
			$userType   = 'Patient';
			$date = date('Y-m-d H:i:s');
			$curdate = $date;
			
			$arr = array('firstName'=>($firstName),'lastName' => ($lastName),'fullName'=>($fullName),'email'=>($email),'userType' => ($userType),'fbUserID' => ($user),'registeredDate' => ($curdate),'isVerified' => (1));

			$userReqResult = $this->register_model->add_fb_user($arr);			
			
			preg_match( '/\"uid": (.*?)\,/', $userReqResult, $match );
			$userid=$match[1];
			
			$url='http://graph.facebook.com/'.$user.'/picture?type=large';
			$img = './images/user_avatars/'.$userid.'.jpg';
			
			if (file_exists($img)) {
			
			} else {
				file_put_contents($img, file_get_contents($url));
			}
			
			$addvatar = $this->register_model->add_fb_avatar($userid);
			
			echo $userReqResult;
			
			/* $friendsCount= count($friends['data']);
			
			for($i=0;$i<$friendsCount;$i++)
			{
				$friendId= $friends['data'][$i]['id'];
				$arr1 = array('fbUserID'=>($user),'fbFriendID' => ($friendId));
				$userReqResult = $this->register_model->add_fb_friends($arr1);
			} */
			
	/*	} else {
			echo "Not logged in ".$token;
		}
		
	}
	
	public function testregex() {
		$string='{"success": true, "uid": 32, "email": "gdgdfgfd"}';
		preg_match( '/\"uid": (.*?)\,/', $string, $match );
		print_r($match);
	}
	
	public function verifyEmail() {
		$verifyCode = $this->input->get('verifyCode', TRUE);
		
		$verify = $this->register_model->verifyUser($verifyCode);
		
		echo $verify;
	}*/
	
}