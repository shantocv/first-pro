<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/facebook.php';
class Classes extends CI_Controller {
	
	
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('home_model');
		$this->config->load('facebook');
	}
	
	public function index($page=0){
		$category_id=10;
		$data['key']="";
		$data['main_title']='Classes';
		/*take category name from data base for displaying in the page.*/
		$data['category_name']=$this->home_model->get_category_name($category_id);
		/*$data['ads']=$this->home_model->list_ads($category_id);*/
		$data['sub_categories']=$this->home_model->get_sub_categories($category_id);
		$data['states']=$this->home_model->states();
		$data['category_id']=$category_id;
		$user_id=$this->session->userdata('user_id');
		$data['follow']=$this->home_model->follow_exist($category_id,$user_id);
		$config["base_url"] = base_url() . "classes";
        $config["total_rows"] = $this->home_model->ads_count($category_id);
        $config["per_page"] = 20;
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
		
		$data['ads']=$this->home_model->get_ads($category_id,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		
		$this->load->view('category_page',$data);
				
	}
	
	
}

?>