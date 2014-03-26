<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('files_model');
		$this->load->helper('captcha');
	}

	function index()
	{
		/*create captcha*/
		/*$vals = array(
		    'img_path'	 => './captcha/',
		    'img_url'	 => base_url().'/captcha/',
		    'img_width'	 => '150',
		    'img_height' => 50,
		    'expiration' => 7200
	    );
		
		$data['cap'] = create_captcha($vals);
		$array = array(
		    'captcha_time'	=> $data['cap']['time'],
		    'ip_address'	=> $this->input->ip_address(),
		    'word'	 => $data['cap']['word']
    	);*/

		/*$query = $this->db->insert_string('captcha', $array);
		$this->db->query($query);*/
		
		/*captcha creation ends here*/
		
		$sub_category_id=$this->input->get('id');
		$data['sub_category']=$this->files_model->get_sub_category($sub_category_id);
		$category_id=$data['sub_category']->category_id;
		$data['sub_category_id']=$sub_category_id;
		$data['category']=$this->files_model->get_category($category_id);
		$data['states']=$this->files_model->get_states();
		$data['types']=$this->files_model->type_exist($sub_category_id);
		if($sub_category_id == 30){
			$this->load->view('upload',$data);
		}else if($category_id == 7 ){
			$this->load->view('upload_automobile',$data);
		}else if($category_id == 9 ){
			$this->load->view('upload_jobs',$data);
		}else{
			$this->load->view('upload',$data);	
		}
		
	}

	function do_upload(){
		if($this->session->userdata('post_id') == 0){
			$post_id=$this->files_model->insert_post_id();
			$this->session->set_userdata('post_id',$post_id);
		}else{
			$post_id = $this->session->userdata('post_id');	
		}
		$status=" ";
		$name=explode('.',$_FILES['userfile']['name']);
		$ext=end($name);
		
		$id=$this->files_model->insert_image($ext,$post_id);
		$config['upload_path'] = './uploads/';
		$config['file_name'] = $id;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '1024';
		$config['max_width']  = '1500';
		$config['max_height']  = '1200';
		
		$source_path= $_SERVER['DOCUMENT_ROOT'] .'yuplee/uploads/'.$id.'.'.$ext;
		$target_path=$_SERVER['DOCUMENT_ROOT'].'yuplee/uploads/';
		$thumb='uploads/'.$id.'_thumb'.'.'.$ext;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$data['error'] = array('error' => $this->upload->display_errors());

			$this->load->view('upload', $data);
		}
		else
		{
			$config['image_library'] = 'gd2';
			$config['source_image']	= $source_path;
			$config['new_image']	= $target_path;
			$config['thumb_marker']	= '_thumb';
			$config['create_thumb'] = TRUE;
			$config['width']	 = 160;
			$config['height']	= 115;

			$this->load->library('image_lib', $config); 
			$this->image_lib->resize();
			
		}
		echo json_encode(array('status' => $status, 'msg' => $thumb ,'id'=>$id));
	}

	public function post(){
		if($this->session->userdata('post_id') == 0){
			$post_id=$this->files_model->insert_post_id();
			$this->session->set_userdata('post_id',$post_id);
		}else{
			$post_id = $this->session->userdata('post_id');	
		}
		$user_id=0;
		$post_id=$this->session->userdata('post_id',TRUE);
		$category_id=$this->input->post('category_id',TRUE);
		$sub_category_id=$this->input->post('sub_category_id',TRUE);
		$title=$this->input->post('title',TRUE);
		$description=$this->input->post('description',TRUE);
		$price=$this->input->post('price',TRUE);
		$seller_type=$this->input->post('seller_type',TRUE);
		$contact_name=$this->input->post('contact_name',TRUE);
		$contact_email=$this->input->post('contact_email',TRUE);
		$phone=$this->input->post('phone',TRUE);
		$state_id=$this->input->post('state_id',TRUE);
		$city_id=$this->input->post('city_id',TRUE);
		$expire=$this->input->post('expire',TRUE);
		$user_id=$this->session->userdata('user_id',TRUE);
		if($sub_category_id == 30){
			$type_id =$this->input->post('type_id');
			$sub_type_id =$this->input->post('sub_type_id');
			$result=$this->files_model->insert_post_mobile($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$type_id,$sub_type_id,$expire);
			echo $result;
			
		}else if($category_id == 7){
			$type_id =$this->input->post('type_id',TRUE);
			$sub_type_id =$this->input->post('sub_type_id',TRUE);
			$body_style =$this->input->post('body_style',TRUE);
			$year =$this->input->post('year',TRUE);
			$kilometer =$this->input->post('kilometer',TRUE);
			$colour =$this->input->post('colour',TRUE);
			$fuel_type =$this->input->post('fuel_type',TRUE);
			$condition =$this->input->post('condition',TRUE);
			$result=$this->files_model->insert_post_automobile($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$type_id,$sub_type_id,$body_style,$year,$kilometer,$colour,$fuel_type,$condition,$expire);
			echo $result;
			
		}else if($category_id == 9){
			$comapany_name=$this->input->post('company_name',TRUE);
			$job_type=$this->input->post('job_type');
			$exp_from=$this->input->post('exp_from',TRUE);
			$exp_to=$this->input->post('exp_to',TRUE);
			$salary_from=$this->input->post('salary_from',TRUE);
			$salary_to=$this->input->post('salary_to',TRUE);
			$designation=$this->input->post('designation',TRUE);
			$result=$this->files_model->insert_post_jobs($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$comapany_name,$job_type,$exp_from,$exp_to,$salary_from,$salary_to,$designation,$expire);
			echo $result;
			
			
		}else{
			$type_id =$this->input->post('type_id');
			$sub_type_id =$this->input->post('sub_type_id');
			$result=$this->files_model->insert_post_mobile($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$type_id,$sub_type_id,$expire);
		echo $result;
			
		}
		
	}
	
	public function select_city(){
		$state=$this->input->post('state');
		$this->files_model->select_city($state);	
	}
	
	public function select_sub_type(){
		$type_id=$this->input->post('type_id');
		$this->files_model->select_sub_type($type_id);	
	}
	
	public function remove(){
		$id=$this->input->post('id',TRUE);
		$this->files_model->remove($id);
	}
}
?>