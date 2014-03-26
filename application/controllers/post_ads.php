<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Post_ads  extends CI_Controller {
	
	function  __construct() {
		parent::__construct();
		$this->load->model('post_ads_model');
	}
	
	public function index(){
		$data['key']="";
		$data['main_title']='Post Your Ad';
		$data['categories']=$this->post_ads_model->get_categories();
		$data['mobile_phones']=$this->post_ads_model->get_mobile_phones_sub_categories();
		$data['automobiles']=$this->post_ads_model->get_automobiles_sub_categories();
		$data['electronics']=$this->post_ads_model->get_electronics_sub_categories();
		$data['jobs']=$this->post_ads_model->get_jobs_sub_categories();
		$data['classes']=$this->post_ads_model->get_classes_sub_categories();
		$data['real_estates']=$this->post_ads_model->get_real_estate_sub_categories();
		$data['life_styles']=$this->post_ads_model->get_life_style_sub_categories();
		$data['services']=$this->post_ads_model->get_services_sub_categories();
		$data['events']=$this->post_ads_model->get_events_sub_categories();
		$data['lists']=$this->post_ads_model->get_lists_sub_categories();
		$data['schools']=$this->post_ads_model->get_schools_sub_categories();
		$data['tours']=$this->post_ads_model->get_tours_sub_categories();
		$data['cities'] = $this->post_ads_model->get_cities();
		$this->load->view('post_ads',$data);
	}
	
	public function get_sub_categories(){
		$sub_category=$this->input->post('sub_category');
		echo '<a href=',base_url(),'upload?id=9','>', $sub_category,'</a>';
	}
	
	public function form($sub_category_id){
		$data['sub_category']=$this->post_ads_model->get_category_id($sub_category_id);
		$data['category_name']=$this->post_ads_model->get_category_name($data['sub_category']->category_id);
		$data['cities'] = $this->post_ads_model->get_cities();
		$data['sub_category_id']=$sub_category_id;
		if($data['sub_category']->category_id == 6){
			$this->load->view('upload',$data);
		}
	}

	

}
