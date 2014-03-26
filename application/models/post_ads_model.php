<?php
	class Post_ads_model extends CI_Model{
		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		function get_categories(){
			$this->db->select('category_id,category_name');
			$query=$this->db->get_where('category',array('status'=>1),13,0);
			return $query->result();
		}
		
		function get_category_id($sub_category_id){
			$this->db->select('category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('sub_category_id'=>$sub_category_id),1,0);
			return $query->row();
		}
		
		function get_mobile_phones_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>6));
			return $query->result();
		}
		
		function get_category_name($category_id){
			$this->db->select('category_name');
			$query=$this->db->get_where('category',array('category_id'=>$category_id),1,0);
			return $query->row();
		}
		
		function get_automobiles_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>7));
			return $query->result();
		}
		
		function get_electronics_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>8));
			return $query->result();
		}
		
		function get_jobs_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>9));
			return $query->result();
		}
		
		function get_classes_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>10));
			return $query->result();
		}
		
		function get_real_estate_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>11));
			return $query->result();
		}
		
		function get_life_style_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>12));
			return $query->result();
		}
		
		function get_services_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>13));
			return $query->result();
		}
		
		function get_events_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>14));
			return $query->result();
		}
		
		function get_lists_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>15));
			return $query->result();
		}
		
		function get_schools_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>16));
			return $query->result();
		}
		
		function get_tours_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$query=$this->db->get_where('sub_category',array('category_id'=>17));
			return $query->result();
		}

		function get_cities(){
			$this->db->select('city_id,city_name,state_id');
			$this->db->order_by("city_name", "asc");
			$query=$this->db->get_where('city',array('status'=>1));
			return $query->result();
		}
		

	}
?>
