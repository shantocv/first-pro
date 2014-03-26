<?php
	class Post_model extends CI_Model{
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		public function posts_count(){
			return $this->db->count_all("post");
		}
		
		function get_posts($limit, $start){
			$this->db->select("*");
			$this->db->from("post");
			$this->db->order_by('post_id',"ASC");
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

		function change_active($id){
			$this->db->select("*");
			$this->db->from("post");
			$this->db->where('post_id', $id);
			$query=$this->db->get();
			$result = $query->result();
			if($result[0]->status==0){
				$data = array(
					'status' => 1
				);
				echo 1;
			}else{
				$data = array(
				'status' => 0
				);
				echo 0;
			}		
			$this->db->where('post_id', $id);
			$this->db->update('post', $data);
		}

		function delete_post($id){
			$this->db->where('post_id', $id);
			$this->db->delete('post');
			echo 1;
		}
		
		public function posts_filtered_count($filter){
			$this->db->select("*");
			$this->db->from("post");
			$this->db->like('post_title', $filter);
			$query = $this->db->get();
			return $query->num_rows();
		}

		function get_filtered_posts($limit, $start, $filter){
			$this->db->select("*");
			$this->db->from("post");
			$this->db->like('post_title', $filter);
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