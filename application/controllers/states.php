<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class States extends CI_Controller {
	
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
		$this->load->model('state_model');
	}
	
	public function index(){
		$this->show_states();
	}
	
	public function show_states($page=0){
		
		$data['active']='state';
		$data['sub_active']='states';
		
		if($this->session->userdata(''))
			$this->session->unset_userdata('');
		
		$config = array();
        $config["base_url"] = base_url() . "states/show_states";
        $config["total_rows"] = $this->state_model->states_count();
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
 
		$data['states'] = $this->state_model->get_states($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		$this->load->view('state',$data);
	}
	
	public function edit_state_info(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$id = $this->input->get('id',TRUE);
		$data['state_datas'] = $this->state_model->get_state_info($id);
		$this->load->view('edit_state',$data);
	}

	public function delete_state(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->state_model->delete_state($id);
	}

	public function change_active(){
		$id = $this->input->post('id', TRUE);
		$userExist = $this->state_model->change_active($id);
	}
	
	public function add_state(){
		$data['active']='hi_companies';
		$data['sub_active']='hi_companies';
		$this->load->view('add_state',$data);
	}
	
	public function add_states(){
		$state_name=$this->input->post('state',TRUE);
		$result=$this->state_model->add_state($state_name);
		if($result == 1){
			redirect('state');
		}
	}

	public function edit_info_submit(){
			$id=$this->input->post('state_id');
			$state_name=$this->input->post('state_name');
			echo $state_name;
			$arr = array('state_name'=>$state_name);
			
			$result = $this->state_model->edit_state_info($id,$arr);
			if($result == 1){
				header('Location: '.base_url().'state');	
			}
	}
	
	public function filtered_states($page=0){
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
        $config["base_url"] = base_url() . "state/filtered_states";
        $config["total_rows"] = $this->state_model->states_filtered_count($filter);
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
 
		$data['states'] = $this->state_model->get_filtered_states($config["per_page"], $page, $filter);
        $data["links"] = $this->pagination->create_links();
		
		$data['active']='hi_companies';
		$this->load->view('state',$data);
	}
	
}