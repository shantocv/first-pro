<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	
	/**
	 * The Index Page.
	 * The controller which shows options to register new patient.
	 */
	 
	function  __construct() {
		parent::__construct();
		$this->shanto = $_SERVER['HTTP_HOST'];
		$sub_dom = explode('.',$this->shanto);
		$this->session->set_userdata('city',$sub_dom[0]);
		$this->config->set_item('base_url','http://' . $sub_dom[0] .'.zeromaze.dev') ;
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
		$this->load->model('category_model');
	}
	
	public function index(){
		$this->show_category();
	}
	
	public function show_category($page=0){
		
		$data['active']='category';
		
		if($this->session->userdata(''))
			$this->session->unset_userdata('');
		
		$config = array();
        $config["base_url"] = base_url() . "category/show_category";
        $config["total_rows"] = $this->category_model->category_count();
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
 
		$data['categories'] = $this->category_model->get_category($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		$this->load->view('category',$data);
	}

	public function change_active(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->category_model->change_active($id);
	}

	public function delete_category(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->category_model->delete_category($id);
	}

	public function edit_category_info(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$id = $this->input->get('id',TRUE);
		$data['category_datas'] = $this->category_model->get_category_info($id);
		$this->load->view('edit_category',$data);
	}

	public function edit_info_submit(){
			$id=$this->input->post('category_id');
			$category_name=$this->input->post('category_name');
			$seo_title=$this->input->post('seo_title',TRUE);
			$seo_keyword=$this->input->post('seo_keyword',TRUE);
			$seo_desc=$this->input->post('seo_desc',TRUE);
			$arr = array(
				'category_name'=>$category_name,
				'seo_title' => $seo_title,
				'seo_keyword' => $seo_keyword,
				'seo_desc' => $seo_desc
			);
			
			$result = $this->category_model->edit_category_info($id,$arr);
			if($result == 1){
				header('Location: '.base_url().'category');	
			}
	}

	public function add_category(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$this->load->view('add_category',$data);
	}

	public function add_categories(){
		$category_name=$this->input->post('category',TRUE);
		$result=$this->category_model->add_categories($category_name);
		if($result == 1){
			redirect('category');
		}
	}

	public function filtered_categorys($page=0){
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
        $config["base_url"] = base_url() . "category/filtered_categorys";
        $config["total_rows"] = $this->category_model->categorys_filtered_count($filter);
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
 
		$data['categories'] = $this->category_model->get_filtered_categorys($config["per_page"], $page, $filter);
        $data["links"] = $this->pagination->create_links();
		
		$data['active']='hi_companies';
		$this->load->view('category',$data);
	}
	
	

}