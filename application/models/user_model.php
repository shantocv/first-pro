<?php
	class User_model extends CI_Model {
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
	
		public function user_count(){
        	return $this->db->count_all("users");
		}
		
		function get_all_users($limit, $start){
			$this->db->select("*");
			$this->db->from("users");
			$this->db->limit($limit, $start);
			$query=$this->db->get();
			if($query != null){
				if ($query->num_rows() > 0){
					return $query->result();
				}else{
					return array();
				}

			}
		}
		
		function delete_user($id){
			$this->db->where('users_id', $id);
			$this->db->delete('users');
			echo 1;
		}
		
		public function userinfo($users_id){
			$this->db->select("*");
			$this->db->from("users");
			$this->db->where("users_id",$users_id);
			$query=$this->db->get();
			if($query != null)
			{
				if ($query->num_rows() > 0){
					return $query->result();
				}else{
					return array();
				}

			}

    	}
		
		public function user_filtered_count($filter){
			$this->db->select("*");
			$this->db->from("users");
			$this->db->like('username', $filter);
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function get_filtered_users($limit, $start, $filter){
			$this->db->select("*");
			$this->db->from("users");
			$this->db->like('username', $filter);
			$this->db->limit($limit, $start);
			$query=$this->db->get();
			if($query != null){
				if ($query->num_rows() > 0){
					return $query->result();
				}else{
					return array();
				}

			}

		}

	}

?>