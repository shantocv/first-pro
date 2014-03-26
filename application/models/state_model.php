<?php
	class State_model extends CI_Model{
		function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		public function states_count(){
			return $this->db->count_all("state");
		}
		
		function get_states($limit, $start){
			$this->db->select("*");
			$this->db->from("state");
			$this->db->order_by('state_id',"ASC");
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
		
		function get_state_info($id){
			$this->db->select("*");
			$this->db->from("state");
			$this->db->where('state_id', $id);
			$query=$this->db->get();
			return $query->result();
		}
		
		
		function delete_state($id){
			$this->db->where('state_id', $id);
			$this->db->delete('state');
			echo 1;
		}
	
		function change_active($id){
			$this->db->select("*");
			$this->db->from("state");
			$this->db->where('state_id', $id);
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
			$this->db->where('state_id', $id);
			$this->db->update('state', $data);
		}
		
		public function add_state($state_name){
			$data=array('state_name'=>$state_name,'status'=>1);
			if($this->db->insert('state',$data)){
				return 1;
			}
			
		}
		
		function edit_state_info($id,$arr){
			$this->db->where('state_id', $id);
			if($this->db->update('state', $arr)){
				return 1;
			}
			
		}
		public function states_filtered_count($filter){
			$this->db->select("*");
			$this->db->from("state");
			$this->db->like('state_name', $filter);
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function get_filtered_states($limit, $start, $filter){
			$this->db->select("*");
			$this->db->from("state");
			$this->db->like('state_name', $filter);
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