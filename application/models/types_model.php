<?php
	class Types_model extends CI_Model {
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		
		function types_count(){
			return $this->db->count_all("type");
		}
		
		function get_types($limit, $start){
			$this->db->select("*");
			$this->db->from("type");
			$this->db->order_by('type_name',"ASC");
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
		
		function add_type($type_name,$sub_category_id){
			$data=array('type_name'=>$type_name,'sub_category_id' =>$sub_category_id );
			if($this->db->insert('type',$data)){
				return 1;
			}
			
		}
		
		function get_sub_categories(){
			$this->db->select('sub_category_id,sub_category_name');
			$this->db->from('sub_category');
			$query=$this->db->get();
			return $query->result();
		}
		
		function get_type_info($id){
			$this->db->select("*");
			$this->db->from("type");
			$this->db->where('type_id', $id);
			$query=$this->db->get();
			return $query->result();
		}
		
		function edit_type_info($id,$arr){
			$this->db->where('type_id', $id);
			if($this->db->update('type', $arr)){
				return 1;
			}
			
		}
		
		function delete_type($id){
			$this->db->where('type_id', $id);
			$this->db->delete('type');
			echo 1;
		}
		
		function types_filtered_count($filter){
			$this->db->select("*");
			$this->db->from("type");
			$this->db->like('type_name', $filter);
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function get_filtered_types($limit, $start, $filter){
			$this->db->select("*");
			$this->db->from("type");
			$this->db->like('type_name', $filter);
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