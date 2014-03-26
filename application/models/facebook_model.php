<?php
	class Facebook_model extends CI_Model{
		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		function fb_details($email){
			$this->db->select('users_id,fb_id,email');
			$query=$this->db->get_where('users',array('email' => $email),1,0);
			return $query->row();
		}

		function insert_from_fb($array){
			$this->db->insert('users',$array);
			return $this->db->insert_id();
		}

		function get_city_id($user_id){
			$this->db->select('city_id');
			$query = $this->db->get_where('users', array('users_id' => $user_id),1,0);
			return $query->row();
		}
		
		function get_city_name($city_id){
			$query = $this->db->get_where('city', array('city_id' => $city_id), 1, 0);
			return $query->row();
		}

	}
?>