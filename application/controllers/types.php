<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Types extends CI_Controller {
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('types_model');
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
		$this->show_types();
	}
	
	public function show_types($page=0){
		$data['active']='type';
		$config = array();
        $config["base_url"] = base_url() . "types/show_types";
        $config["total_rows"] = $this->types_model->types_count();
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
 
		$data['types'] = $this->types_model->get_types($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$this->load->view('types',$data);
	}

	public function add_types(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$data['sub_categories']=$this->types_model->get_sub_categories();
		$this->load->view('add_types',$data);
	}
	
	public function add_type(){
		$type_name=$this->input->post('type',TRUE);
		$sub_category_id=$this->input->post('sub_category_id',TRUE);
		$result=$this->types_model->add_type($type_name,$sub_category_id);
		if($result == 1){
			redirect('types');
		}
	}
	
	public function edit_type_info(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$id = $this->input->get('id',TRUE);
		$data['type_datas'] = $this->types_model->get_type_info($id);
		$this->load->view('edit_types',$data);
	}
	
	public function edit_info_submit(){
			$id=$this->input->post('type_id');
			$url = $this->session->userdata('url');
			$type_name=$this->input->post('type_name');
			$seo_title=$this->input->post('seo_title',TRUE);
			$seo_keyword=$this->input->post('seo_keyword',TRUE);
			$seo_desc=$this->input->post('seo_desc',TRUE);
			$arr = array(
				'type_name'=>$type_name,
				'seo_title' => $seo_title,
				'seo_keyword' => $seo_keyword,
				'seo_desc' => $seo_desc
			);
			
			$result = $this->types_model->edit_type_info($id,$arr);
			if($result == 1){
				header('Location: '.base_url(). $url);	
			}
	}
	
	public function delete_types(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->types_model->delete_type($id);
	}
	
	public function filtered_types($page=0){
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
        $config["base_url"] = base_url() . "types/filtered_types";
        $config["total_rows"] = $this->types_model->types_filtered_count($filter);
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
 
		$data['types'] = $this->types_model->get_filtered_types($config["per_page"], $page, $filter);
        $data["links"] = $this->pagination->create_links();
		
		$data['active']='hi_companies';
		$this->load->view('types',$data);
	}
	
	
}