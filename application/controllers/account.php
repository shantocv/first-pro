<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/facebook.php';
class Account extends CI_Controller {
	
	
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('account_model');
		$this->load->library('email');
		$this->config->load('facebook');
		if(!$this->session->userdata('user_id')){
				header('Location:'.base_url());
				exit();
		}
	}
	
	public function index($page=0){
		$data['key']="";
		$user_id=$this->session->userdata('user_id');
		$check_city=$this->account_model->check_city($user_id);
		$data['cities'] = $this->account_model->get_cities();
		$status=$this->account_model->check_status($user_id);
		if($status == 0){
			$data['main_title']='Verify Email';
			$this->session->unset_userdata('logged_in');
			$this->load->view('verify_email',$data);
		}else if($check_city == 0){
			if($this->session->userdata('logged_in') !== 'yes'){
				header('Location:'.base_url());
				exit();
			}
			$data['main_title']='Profile';
			$data['states']=$this->account_model->get_states();
			$this->load->view('pre_account',$data);
		}else{
			$data['main_title']='Profile';
			$data['city_id']=$this->account_model->get_city_id($user_id);
			$data['city_name']=$this->account_model->get_city_name($data['city_id']->city_id);
			$config["per_page"] = 20;
			$data['ads']=$this->account_model->get_ads($user_id);
			$data['favourite_ads']=$this->account_model->get_favourite_ads($user_id);
			$data['categories_following']=$this->account_model->get_categories_following($user_id);
			$data['date']=date("Y-m-d H:i:s");
			$data['curret_date'] = new Datetime($data['date']);
			
			$config["base_url"] = base_url() . "account";
	        $config["total_rows"] = $this->account_model->get_city_ads_count($data['city_id']->city_id);
	        
			$config['uri_segment'] = 2;
			
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';
			 
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';
			
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';
			 
			$config['cur_tag_open'] = '<li class="active"><a href="" style="color:red;">';
			$config['cur_tag_close'] = '</a></li>';
			 
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	 
	        $this->pagination->initialize($config);
			
			$data['city_ads']=$this->account_model->get_city_ads($data['city_id']->city_id,$config["per_page"],$page);
	        $data["links"] = $this->pagination->create_links();
			$this->load->view('account',$data);
		}
		
				
	}
	
	public function manage_ads(){
			$data['key']="";
			$data['main_title'] = 'Manage Ads';
			$user_id=$this->session->userdata('user_id');
			$data['ads']=$this->account_model->get_ads($user_id);
			$data['cities'] = $this->account_model->get_cities();
			$data['date']=date("Y-m-d H:i:s");
			$data['curret_date'] = new Datetime($data['date']);
			$this->load->view('manage_ads',$data);
	}
	public function update(){
		$phone=$this->input->post('phone');
		$state_id=$this->input->post('state_id');
		$city_id=$this->input->post('city_id');
		$gender=$this->input->post('gender');
		$age=$this->input->post('age');
		$address=$this->input->post('address');
		$seller_type=$this->input->post('seller_type');
		$user_id=$this->session->userdata('user_id');
		$data['cities'] = $this->account_model->get_cities();
		$result=$this->account_model->update($phone,$state_id,$city_id,$gender,$age,$address,$seller_type,$user_id);
		if($result == 1){
			$city_id = $this->account_model->get_city_id($user_id);
	        $city_name = $this->account_model->get_city_name($city_id->city_id);
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
			echo $city_name;
		}else{
			echo 0;
		}
	}
	
	public function messages(){
		$data['key']="";
		$data['main_title'] = 'Messages';
		$user_id=$this->session->userdata('user_id');
		$data['to_email']=$this->account_model->get_to_email($user_id);
		$to_email=$data['to_email']->email;
		$data['messages']=$this->account_model->get_messages($to_email);
		$data['cities'] = $this->account_model->get_cities();
		$this->load->view('messages',$data);

	}
	
	
	
	public function delete_ad(){
		$post_id=$this->input->post('post_id');
		$data['state_id'] = $this->account_model->get_state_id($post_id);
		$data['state_name'] = $this->account_model->get_state_name($data['state_id']->state_id);
		$state_name=str_replace(' ', '-',$data['state_name']->state_name);  
		$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
		$state_name=preg_replace('/--+/', '-', $state_name);
		$state_name=strtolower($state_name);
		$result=$this->account_model->delete_ad($post_id,$state_name);
		echo $result;
	}
	
	public function delete_message(){
		$ids =$this->input->post('check');
		if(!empty($ids)){
			foreach($ids as $id){
				$this->account_model->delete_message($id);
			}
		}
		
		redirect('messages');
	}

	public function settings(){
		$data['key']='';
		$data['main_title'] = 'Settings';
		$user_id = $this->session->userdata('user_id');
		$data['user_details'] = $this->account_model->get_user_details($user_id);
		$data['states']=$this->account_model->get_states();
		$data['cities'] = $this->account_model->get_cities();
		$this->load->view('settings',$data);
	}
	
	public function settings_edit(){
		$phone=$this->input->post('phone');
		$state_id=$this->input->post('state_id');
		$city_id=$this->input->post('city_id');
		$gender=$this->input->post('gender',TRUE);
		$age=$this->input->post('age');
		$address=$this->input->post('address');
		$seller_type=$this->input->post('seller_type',TRUE);
		$user_id=$this->session->userdata('user_id');
		$settings_email=$this->input->post('settings_email',TRUE);
		$settings_name=$this->input->post('settings_name',TRUE);
		$result=$this->account_model->update($phone,$state_id,$city_id,$gender,$age,$address,$seller_type,$user_id,$settings_email,$settings_name);
		if($result == 1){
			echo 1;
		}else{
			echo 0;
		} 
		
	}

	public function change_password(){
		$old_password=$this->input->post('old_password',TRUE);
		$new_password=$this->input->post('new_password',TRUE);
		$new_password_conf=$this->input->post('new_password_conf',TRUE);
		$result=$this->account_model->change_password($old_password,$new_password,$new_password_conf);
		if ($result == 1) {
			# code...
			echo 1;
		}else{
			echo 0;
		}
	}



}

?>