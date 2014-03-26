<?php
	class sub_category_model extends CI_Model {
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		public function sub_categorys_count(){
			return $this->db->count_all("sub_category");
		}
		
		function get_sub_categorys($limit, $start){
			$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->order_by('sub_category_id',"ASC");
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
			$this->db->from("sub_category");
			$this->db->where('sub_category_id', $id);
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
			$this->db->where('sub_category_id', $id);
			$this->db->update('sub_category', $data);
		}

		function delete_sub_category($id){
			$this->db->where('sub_category_id', $id);
			$this->db->delete('sub_category');
			echo 1;
		}

		function get_sub_category_info($id){
			$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('sub_category_id', $id);
			$query=$this->db->get();
			return $query->result();
		}

		function edit_sub_category_info($id,$arr){
			$this->db->where('sub_category_id', $id);
			if($this->db->update('sub_category', $arr)){
				return 1;
			}
			
		}

		function get_category_names(){
			$this->db->select('category_name,category_id');
			$this->db->from('category');
			$query=$this->db->get();
			return $query->result();
		}

		public function add_sub_category($category_id,$sub_category_name){
			$data=array('sub_category_name'=>$sub_category_name,'status'=>1,'category_id'=>$category_id);
			if($this->db->insert('sub_category',$data)){
				return 1;
			}
			
			
		}

		public function sub_categorys_filtered_count($filter){
			$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->like('sub_category_name', $filter);
			$query = $this->db->get();
			return $query->num_rows();
		}

		function get_filtered_sub_categorys($limit, $start, $filter){
			$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->like('sub_category_name', $filter);
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