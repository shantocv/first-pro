<?php 
class Dashboard_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function total_users() {
		$query=$this->db->count_all('users');
		return $query;
    }
	
	public function total_posts() {
		$this->db->where('status',1);
		$this->db->from('post');
		$query=$this->db->count_all_results();
		return $query;
    }
	
	public function new_users(){
		$curdate=date('Y-m-d');
		$startDate = $curdate." 00:00:00";
		$endDate = $curdate." 23:59:59";
		$this->db->from('users');
		$this->db->where('date >=',$startDate);
		$this->db->where('date <=',$endDate);
		$query=$this->db->count_all_results();
		return $query;
	}
	
	public function new_posts(){
		$curdate=date('Y-m-d');
		$startDate = $curdate." 00:00:00";
		$endDate = $curdate." 23:59:59";
		$this->db->where('status',1);
		$this->db->from('post');
		$this->db->where('date >=',$startDate);
		$this->db->where('date <=',$endDate);
		$query=$this->db->count_all_results();
		return $query;
	}


}

?>