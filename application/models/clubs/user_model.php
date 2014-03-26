<?php 

class User_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function patientinfo($uid) {
        $this->db->select("u.*,p.*,u.uid As userid");
		$this->db->from("tbl_med_users u");
		$this->db->join('tbl_med_user_personal p', 'u.uid = p.uid', 'LEFT');
		$this->db->where("u.uid",$uid);
		$query=$this->db->get();
		
        if($query != null)
			{			
			   if ($query->num_rows() > 0)
			   {
				return $query->result();
			   }else
			   {
				return array();
			   }
			}
    }
	
	public function user_count() {
        return $this->db->count_all("tbl_med_users");
    }
	
	public function user_filtered_count($filter) {
        $this->db->select("*");
		$this->db->from("tbl_med_users");
		$this->db->like('fullName', $filter);
		$query = $this->db->get();
		return $query->num_rows();
    }
	
	function get_all_users($heId,$limit, $start){
		$this->db->select("o.uid,o.CheckinTime,u.fullName,u.email,u.phone,u.mobile,hi.HICompany,hi.HIPlan,u.cardpic,u.docpic,u.attachment");
		$this->db->from("tbl_online_users o");
		$this->db->join("tbl_med_users u","u.uid=o.uid","LEFT");
		$this->db->join("tbl_med_user_hi hi","hi.uid=o.uid","LEFT");
		$this->db->where("o.HeId",$heId);
		$this->db->limit($limit, $start);
		$query=$this->db->get();
		
        if($query != null)
			{			
			   if ($query->num_rows() > 0)
			   {
				return $query->result();
			   }else
			   {
				return array();
			   }
			}
	}
	
	function get_filtered_users($heId,$limit, $start, $filter){
		
		$this->db->select("o.uid,o.CheckinTime,u.fullName,u.email,u.phone,u.mobile,hi.HICompany,hi.HIPlan,u.cardpic,u.docpic,u.attachment");
		$this->db->from("tbl_online_users o");
		$this->db->join("tbl_med_users u","u.uid=o.uid","LEFT");
		$this->db->join("tbl_med_user_hi hi","hi.uid=o.uid","LEFT");
		$this->db->where("o.HeId",$heId);
		$this->db->like('fullName', $filter);
		$this->db->limit($limit, $start);
		$query=$this->db->get();
        if($query != null)
			{			
			   if ($query->num_rows() > 0)
			   {
				return $query->result();
			   }else
			   {
				return array();
			   }
			}
	}
	
	function delete_user($id)
	{
		$this->db->where('uid', $id);
		$this->db->delete('tbl_med_users');
		echo 1;
	}
	
	function get_user_info($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_med_users");
		$this->db->where("uid",$id);
		$query=$this->db->get();
		$userDetails = $query->result();
		return '{"email": "'.$userDetails[0]->email.'","firstName": "'.$userDetails[0]->firstName.'","lastName": "'.$userDetails[0]->lastName.'","nickname": "'.$userDetails[0]->nickname.'"}';
	}
	
}
?>