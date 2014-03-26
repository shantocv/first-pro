<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sub_type extends CI_Controller {
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('sub_type_model');
		if($this->session->userdata('admin_logged') ) {
			if($this->session->userdata('admin_logged')=='yes') {
				
			}
			else {
				header("location:".base_url().'login');
			}
		}
		else {
			header("location:".base_url().'login');
		}
	}
	
	public function index()
	{
		$this->show_sub_types();
	}
	
	public function show_sub_types($page=0){
		$data['active']='sub_type';
		$config = array();
        $config["base_url"] = base_url() . "sub_type/show_sub_types";
        $config["total_rows"] = $this->sub_type_model->sub_types_count();
        $config["per_page"] = 10;
		$config['num_links'] = 3;
		
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
 
        $this->pagination->initialize($config);
 
		$data['sub_types'] = $this->sub_type_model->get_sub_types($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$this->load->view('sub_type',$data);
	}
	
	public function add_sub_types(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$data['types']=$this->sub_type_model->get_types();
		$this->load->view('add_sub_types',$data);
	}
	
	public function add_sub_type(){
		$sub_type_name=$this->input->post('sub_type',TRUE);
		$type_id=$this->input->post('type_id',TRUE);
		$result=$this->sub_type_model->add_sub_type($sub_type_name,$type_id);
		if($result == 1){
			redirect('sub_type');
		}
	}
	
	public function edit_sub_type_info(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$id = $this->input->get('id',TRUE);
		$data['sub_type_datas'] = $this->sub_type_model->get_sub_type_info($id);
		$this->load->view('edit_sub_types',$data);
	}
	
	public function edit_info_submit(){
			$id=$this->input->post('sub_type_id');
			$sub_type_name=$this->input->post('sub_type_name');
			$arr = array('sub_type_name'=>$sub_type_name);
			
			$result = $this->sub_type_model->edit_sub_type_info($id,$arr);
			if($result == 1){
				header('Location: '.base_url().'sub_type');	
			}
	}
	
	public function delete_sub_type(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->sub_type_model->delete_sub_type($id);
	}
	public function filtered_sub_types($page=0){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		
		if($this->input->post('filter', TRUE)) {
			$filter = $this->input->post('filter', TRUE);
			$this->session->set_userdata('filter', $filter);
		}
		else {
			$filter = $this->session->userdata('');
		}
	
		$config = array();
        $config["base_url"] = base_url() . "sub_type/filtered_sub_types";
        $config["total_rows"] = $this->sub_type_model->sub_types_filtered_count($filter);
        $config["per_page"] = 10;
		$config['num_links'] = 3;
		
		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
 
        $this->pagination->initialize($config);
 
		$data['sub_types'] = $this->sub_type_model->get_filtered_sub_types($config["per_page"], $page, $filter);
        $data["links"] = $this->pagination->create_links();
		
		$data['active']='hi_companies';
		$this->load->view('sub_type',$data);
	}

	
	
}