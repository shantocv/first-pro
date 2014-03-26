<?php
	class Categories 
  	{
    protected $CI;

    public function __construct()
    {
      $this->CI =& get_instance(); // Existing Code Igniter Instance
	  
		$this->load->model('home_model');
    }

    public function categories($category_name,$category_id){
		/*take category name from data base for displaying in the page.*/
		$data['category_name']=$this->home_model->get_category_name($category_id);
		$this->session->set_userdata('category_name',$category_id);
		/*$data['ads']=$this->home_model->list_ads($category_id);*/
		$data['sub_categories']=$this->home_model->get_sub_categories($category_id);
		$data['states']=$this->home_model->states();
		$data['ads']=$this->home_model->get_ads($category_id);
		$data['category_id']=$category_id;
		return $data;
	}
 }
?>