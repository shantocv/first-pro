<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cities extends CI_Controller {
	
	/**
	 * The Index Page.
	 * The controller which shows options to register new patient.
	 */
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('city_model');
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
	public function index(){
		$this->show_cities();	
	}
	
	public function show_cities($page=0){
		
		$data['active']='state';
		$data['sub_active']='cities';
		
		if($this->session->userdata(''))
			$this->session->unset_userdata('');
		
		$config = array();
        $config["base_url"] = base_url() . "cities/show_cities";
        $config["total_rows"] = $this->city_model->cities_count();
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
 
		$data['cities'] = $this->city_model->get_cities($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		$this->load->view('city',$data);
	}

	public function change_active(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->city_model->change_active($id);
	}

	public function delete_city(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->city_model->delete_city($id);
	}

	public function edit_city_info(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$id = $this->input->get('id',TRUE);
		$data['city_datas'] = $this->city_model->get_city_info($id);
		$this->load->view('edit_city',$data);
	}

	public function edit_info_submit(){
			$id=$this->input->post('city_id');
			$state_name=$this->input->post('city_name');
			echo $state_name;
			$arr = array('city_name'=>$state_name);
			
			$result = $this->city_model->edit_city_info($id,$arr);
			if($result == 1){
				header('Location: '.base_url().'cities');	
			}
	}
	
	public function add_city(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$data['state_names']=$this->city_model->get_state_names();
		$this->load->view('add_city',$data);
	}
	
	public function add_cities(){
		$state_id=$this->input->post('state_name',TRUE);
		$city_name=$this->input->post('city',TRUE);
		$result=$this->city_model->add_city($state_id,$city_name);
		if($result == 1){
			redirect('cities');
		}
	}
	
	public function filtered_cities($page=0){
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
        $config["base_url"] = base_url() . "cities/filtered_cities";
        $config["total_rows"] = $this->city_model->cities_filtered_count($filter);
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
 
		$data['cities'] = $this->city_model->get_filtered_cities($config["per_page"], $page, $filter);
        $data["links"] = $this->pagination->create_links();
		
		$data['active']='hi_companies';
		$this->load->view('city',$data);
	}
	
}