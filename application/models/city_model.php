<?php
	class City_model extends CI_Model {
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
	
		public function cities_count(){
			return $this->db->count_all("city");
		}
		
		
		function get_cities($limit, $start){
			$this->db->select("*");
			$this->db->from("city");
			$this->db->order_by('city_name',"ASC");
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
			$this->db->from("city");
			$this->db->where('city_id', $id);
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
			$this->db->where('city_id', $id);
			$this->db->update('city', $data);
		}

		function delete_city($id){
			$this->db->where('city_id', $id);
			$this->db->delete('city');
			echo 1;
		}
		
		function get_city_info($id){
			$this->db->select("*");
			$this->db->from("city");
			$this->db->where('city_id', $id);
			$query=$this->db->get();
			return $query->result();
		}
		
		function edit_city_info($id,$arr){
			$this->db->where('city_id', $id);
			if($this->db->update('city', $arr)){
				return 1;
			}
			
		}
		
		public function add_city($state_id,$city_name){
			$data=array('city_name'=>$city_name,'status'=>1,'state_id'=>$state_id);
			if($this->db->insert('city',$data)){
				return 1;
			}
			
			
		}
		
		function get_state_names(){
			$this->db->select('state_name,state_id');
			$this->db->from('state');
			$query=$this->db->get();
			return $query->result();
		}
		
		public function cities_filtered_count($filter){
			$this->db->select("*");
			$this->db->from("city");
			$this->db->like('city_name', $filter);
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function get_filtered_cities($limit, $start, $filter){
			$this->db->select("*");
			$this->db->from("city");
			$this->db->like('city_name', $filter);
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