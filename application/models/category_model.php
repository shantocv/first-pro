<?php
	class Category_model extends CI_Model{
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		public function category_count(){
			return $this->db->count_all("category");
		}

		function get_category($limit, $start){
			$this->db->select("*");
			$this->db->from("category");
			$this->db->order_by('category_id',"ASC");
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
			$this->db->from("category");
			$this->db->where('category_id', $id);
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
			$this->db->where('category_id', $id);
			$this->db->update('category', $data);
		}

		function delete_category($id){
			$this->db->where('category_id', $id);
			$this->db->delete('category');
			echo 1;
		}

		function get_category_info($id){
			$this->db->select("*");
			$this->db->from("category");
			$this->db->where('category_id', $id);
			$query=$this->db->get();
			return $query->result();
		}

		function edit_category_info($id,$arr){
			$this->db->where('category_id', $id);
			if($this->db->update('category', $arr)){
				return 1;
			}
			
		}

		public function add_categories($category_name){
			$data=array('category_name'=>$category_name,'status'=>1);
			if($this->db->insert('category',$data)){
				return 1;
			}
			
		}

		public function categorys_filtered_count($filter){
			$this->db->select("*");
			$this->db->from("category");
			$this->db->like('category_name', $filter);
			$query = $this->db->get();
			return $query->num_rows();
		}

		function get_filtered_categorys($limit, $start, $filter){
			$this->db->select("*");
			$this->db->from("category");
			$this->db->like('category_name', $filter);
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