<?php 

class Company_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function compayinfo($HICompanyId) {
        $this->db->select("u.*,p.*");
		$this->db->from("tbl_hi_companies u");
		$this->db->join('tbl_hi_company_address p', 'u.HICompanyId = p.HICompanyId', 'LEFT');
		$this->db->where("u.HICompanyId",$HICompanyId);
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
	
	public function planinfo($HIPlanId) {
        $this->db->select("*");
		$this->db->from("tbl_hi_plans");
		$this->db->where("HIPlanId",$HIPlanId);
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
	
	public function companies_count() {
        return $this->db->count_all("tbl_hi_companies");
    }
	
	public function companies_filtered_count($filter) {
        $this->db->select("*");
		$this->db->from("tbl_hi_companies");
		$this->db->like('HIOfficialName', $filter);
		$this->db->or_like('HIFantasyName', $filter);
		$query = $this->db->get();
		return $query->num_rows();
    }
	
	function get_companies($heId,$limit, $start)
	{
			$this->db->select("hi.*,he.heHICompanyId");
			$this->db->from("tbl_hi_companies hi");
			$this->db->join("tbl_he_hiCompany he","he.hiCompanyId = hi.HICompanyId AND he.heId = $heId","LEFT");
			$this->db->order_by('HICompanyId',"DESC");
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
	
	function get_filtered_companies($heId,$limit, $start, $filter){
		$this->db->select("hi.*,he.heHICompanyId");
		$this->db->from("tbl_hi_companies hi");
		$this->db->join("tbl_he_hiCompany he","he.hiCompanyId = hi.HICompanyId AND he.heId = $heId","LEFT");
		$this->db->like('HIOfficialName', $filter);
		$this->db->or_like('HIFantasyName', $filter);
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
	
	function get_hecompanies($heId,$limit, $start)
	{
			$this->db->select("hi.*,he.heHICompanyId");
			$this->db->from("tbl_he_hiCompany hihe");
			$this->db->join("tbl_hi_companies hi","hi.HICompanyId = hihe.hiCompanyId","LEFT");
			$this->db->join("tbl_he_hiCompany he","he.hiCompanyId = hi.HICompanyId AND he.heId = $heId","LEFT");
			$this->db->where("hihe.heid",$heId);
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
	
	public function hecompanies_count($heId) {
			$this->db->select("hi.*,he.heHICompanyId");
			$this->db->from("tbl_he_hiCompany hihe");
			$this->db->join("tbl_hi_companies hi","hi.HICompanyId = hihe.hiCompanyId","LEFT");
			$this->db->join("tbl_he_hiCompany he","he.hiCompanyId = hi.HICompanyId AND he.heId = $heId","LEFT");
			$this->db->where("hihe.heid",$heId);
			$query=$this->db->get();
			
			if($query != null)
			{			
			   return $query->num_rows();
			} 
    }
	
	function add_company($arr)
	{
		$id = $this->db->insert('tbl_hi_companies',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function add_company_address($arr)
	{
		$id = $this->db->insert('tbl_hi_company_address',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function change_active($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_hi_companies");
		$this->db->where('HICompanyId', $id);
		$query=$this->db->get();
			
		$result = $query->result();
		
		if($result[0]->HIActive==0) {
			$data = array(
               'HIActive' => 1
            );
			echo 1;
		}
		else {
			$data = array(
               'HIActive' => 0
            );
			echo 0;
		}		
		
		$this->db->where('HICompanyId', $id);
		$this->db->update('tbl_hi_companies', $data); 
	}
	
	function get_company_info($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_hi_companies");
		$this->db->where('HICompanyId', $id);
		$query=$this->db->get();
			
		return $query->result();
	}
	
	function edit_company_info($id,$arr)
	{
		$this->db->where('HICompanyId', $id);
		$this->db->update('tbl_hi_companies', $arr);
	}
	
	function get_company_address($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_hi_company_address");
		$this->db->where('HICompanyId', $id);
		$query=$this->db->get();
			
		return $query->result();
	}
	
	function edit_company_address($id,$arr)
	{
		$this->db->where('HICompanyId', $id);
		$this->db->update('tbl_hi_company_address', $arr);
	}
	
	function delete_company($id)
	{
		$this->db->where('HICompanyId', $id);
		$this->db->delete('tbl_hi_companies');
		echo 1;
	}
	
	//plans
	
	public function plans_count() {
        return $this->db->count_all("tbl_hi_plans");
    }
	
	
	
	public function plans_filtered_count($filter) {
        $this->db->select("*");
		$this->db->from("tbl_hi_plans");
		$this->db->like('HIPlanName', $filter);
		$query = $this->db->get();
		return $query->num_rows();
    }
	
	function get_plans($heId,$limit, $start)
	{
			$this->db->select("hi.*,he.heHIPlanId");
			$this->db->from("tbl_hi_plans hi");
			$this->db->join("tbl_he_hiPlan he","he.hiPlanid = hi.HIPlanId AND he.heId = $heId","LEFT");
			$this->db->order_by('HIPlanId',"DESC");
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
	function get_heplans($heId,$limit, $start)
	{
			$this->db->select("hi.*,he.heHIPlanId");
			$this->db->from("tbl_he_hiPlan hehi");
			$this->db->join("tbl_hi_plans hi","hi.HIPlanId = hehi.hiPlanid","LEFT");
			$this->db->join("tbl_he_hiPlan he","he.hiPlanid = hi.HIPlanId AND he.heId = $heId","LEFT");
			$this->db->where('hehi.heId',$heId);
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
	
	public function heplans_count($heId) {
       $this->db->select("hi.*,he.heHIPlanId");
			$this->db->from("tbl_he_hiPlan hehi");
			$this->db->join("tbl_hi_plans hi","hi.HIPlanId = hehi.hiPlanid","LEFT");
			$this->db->join("tbl_he_hiPlan he","he.hiPlanid = hi.HIPlanId AND he.heId = $heId","LEFT");
			$this->db->where('hehi.heId',$heId);
			$query=$this->db->get();
			
			if($query != null)
			{			
			   return $query->num_rows();
			   
			} 
    }
	
	function get_filtered_plans($heId,$limit, $start, $filter){
		$this->db->select("hi.*,he.heHIPlanId");
		$this->db->from("tbl_hi_plans hi");
		$this->db->join("tbl_he_hiPlan he","he.hiPlanid = hi.HIPlanId AND he.heId = $heId","LEFT");
		$this->db->like('HIPlanName', $filter);
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
	
	function add_plans($arr)
	{
		$id = $this->db->insert('tbl_hi_plans',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function add_plan($arr)
	{
		$id = $this->db->insert('tbl_hi_plans',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function change_active_plan($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_hi_plans");
		$this->db->where('HIPlanId', $id);
		$query=$this->db->get();
			
		$result = $query->result();
		
		if($result[0]->HIActive==0) {
			$data = array(
               'HIActive' => 1
            );
			echo 1;
		}
		else {
			$data = array(
               'HIActive' => 0
            );
			echo 0;
		}		
		
		$this->db->where('HIPlanId', $id);
		$this->db->update('tbl_hi_plans', $data); 
	}
	
	function get_plan_info($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_hi_plans");
		$this->db->where('HIPlanId', $id);
		$query=$this->db->get();
			
		return $query->result();
	}
	
	function edit_plan_info($id,$arr)
	{
		$this->db->where('HIPlanId', $id);
		$this->db->update('tbl_hi_plans', $arr);
	}
	
	function delete_plan($id)
	{
		$this->db->where('HIPlanId', $id);
		$this->db->delete('tbl_hi_plans');
		echo 1;
	}
	
}
?>