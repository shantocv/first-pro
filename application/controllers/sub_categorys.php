<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sub_categorys extends CI_Controller {
	
	/**
	 * The Index Page.
	 * The controller which shows options to register new patient.
	 */
	 
	function  __construct() {
		parent::__construct();
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
		$this->load->model('sub_category_model');
	}

	public function index(){
		$this->show_sub_categorys();	
	}
	
	public function show_sub_categorys($page=0){
		
		$data['active']='sub_categorys';
		
		if($this->session->userdata(''))
			$this->session->unset_userdata('');
		
		$config = array();
        $config["base_url"] = base_url() . "sub_categorys/show_sub_categorys";
        $config["total_rows"] = $this->sub_category_model->sub_categorys_count();
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
 
		$data['sub_categorys'] = $this->sub_category_model->get_sub_categorys($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		$this->load->view('sub_category',$data);
	}

	public function change_active(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->sub_category_model->change_active($id);
	}

	public function delete_sub_category(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->sub_category_model->delete_sub_category($id);
	}

	public function edit_sub_category_info(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$id = $this->input->get('id',TRUE);
		$data['sub_category_datas'] = $this->sub_category_model->get_sub_category_info($id);
		$this->load->view('edit_sub_category',$data);
	}

	public function edit_info_submit(){
			$id=$this->input->post('sub_category_id');
			$sub_category_name=$this->input->post('sub_category_name');
			$seo_title=$this->input->post('seo_title',TRUE);
			$seo_keyword=$this->input->post('seo_keyword',TRUE);
			$seo_desc=$this->input->post('seo_desc',TRUE);
			$arr = array(
				'sub_category_name'=>$sub_category_name,
				'seo_title' => $seo_title,
				'seo_keyword' => $seo_keyword,
				'seo_desc' => $seo_desc,
			);
			
			$result = $this->sub_category_model->edit_sub_category_info($id,$arr);
			if($result == 1){
				header('Location: '.base_url().'sub_categorys');	
			}
	}

	public function add_sub_category(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$data['category_names']=$this->sub_category_model->get_category_names();
		$this->load->view('add_sub_category',$data);
	}

	public function add_sub_categorys(){
		$category_id=$this->input->post('category_name',TRUE);
		$sub_category_name=$this->input->post('sub_category',TRUE);
		$result=$this->sub_category_model->add_sub_category($category_id,$sub_category_name);
		if($result == 1){
			redirect('sub_category');
		}
	}

	public function filtered_sub_categorys($page=0){
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
        $config["base_url"] = base_url() . "sub_category/filtered_sub_categorys";
        $config["total_rows"] = $this->sub_category_model->sub_categorys_filtered_count($filter);
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
 
		$data['sub_categorys'] = $this->sub_category_model->get_filtered_sub_categorys($config["per_page"], $page, $filter);
        $data["links"] = $this->pagination->create_links();
		
		$data['active']='hi_companies';
		$this->load->view('sub_category',$data);
	}
	
	
}