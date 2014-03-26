<?php
	class Sub_type_model extends CI_Model {
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		function sub_types_count(){
			return $this->db->count_all("sub_type");
		}
		
		function get_sub_types($limit, $start){
			$this->db->select("*");
			$this->db->from("sub_type");
			$this->db->order_by('sub_type_id',"DESC");
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
		
		function get_types(){
			$this->db->select('*');
			$this->db->from('type');
			$query=$this->db->get();
			return $query->result();
		}
		
		function add_sub_type($sub_type_name,$type_id){
			$data=array('sub_type_name'=>$sub_type_name,'type_id' =>$type_id );
			if($this->db->insert('sub_type',$data)){
				return 1;
			}
			
		}
		
		function get_sub_type_info($id){
			$this->db->select("*");
			$this->db->from("sub_type");
			$this->db->where('sub_type_id', $id);
			$query=$this->db->get();
			return $query->result();
		}
		
		function edit_sub_type_info($id,$arr){
			$this->db->where('sub_type_id', $id);
			if($this->db->update('sub_type', $arr)){
				return 1;
			}
			
		}
		
		function delete_sub_type($id){
			$this->db->where('sub_type_id', $id);
			$this->db->delete('sub_type');
			echo 1;
		}
		
		function sub_types_filtered_count($filter){
			$this->db->select("*");
			$this->db->from("sub_type");
			$this->db->like('sub_type_name', $filter);
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function get_filtered_sub_types($limit, $start, $filter){
			$this->db->select("*");
			$this->db->from("sub_type");
			$this->db->like('sub_type_name', $filter);
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