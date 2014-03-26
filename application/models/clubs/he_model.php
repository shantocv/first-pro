<?php 

class He_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function companies_count() {
        return $this->db->count_all("tbl_he_details");
    }
	
	public function companies_filtered_count($filter) {
        $this->db->select("*");
		$this->db->from("tbl_he_details");
		$this->db->like('HEname', $filter);
		$query = $this->db->get();
		return $query->num_rows();
    }
	
	function get_companies($limit, $start)
	{
			$this->db->select("*");
			$this->db->from("tbl_he_details");
			$this->db->limit($limit, $start);
			$this->db->order_by('HEid',"DESC");
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
	
	function get_filtered_companies($limit, $start, $filter){
		$this->db->select("*");
		$this->db->from("tbl_he_details");
		$this->db->like('HEname', $filter);
		$this->db->order_by('HEid',"DESC");
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
	function getResponsible_email($id)
	{
		$this->db->select("ResponsibleEmail");
		$this->db->from("tbl_he_address");
		$this->db->where('HEId', $id);
		$query=$this->db->get();
			
		if($query != null)
			{			
			   if ($query->num_rows() > 0)
			   {
				$result = $query->result();
				return $result[0];
			   }else
			   {
				return array();
			   }
			}
	}
	
	function set_club_user($HEId,$email)
	{
						$curdate = date('Y-m-d H:i:s');
						$newPassword   = generatePassword(5);
						$passwordReset = passwordHash($newPassword);
						$insertUser = array('HEid' => $HEId,'HEusername' => $email,'HEpassword' => $passwordReset,'HEcreatedDate' => $curdate);
						$id = $this->db->insert('tbl_he_user',$insertUser);
						return $newPassword;
			   
	}
	
	function reset_club_user($id)
	{
		$this->db->where('HEid', $id);
		$this->db->delete('tbl_he_user');
		return true;
	}
	
	function change_active($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_he_details");
		$this->db->where('HEId', $id);
		$query=$this->db->get();
			
		$result = $query->result();
		
		if($result[0]->Active==0) {
			$data = array(
               'Active' => 1
            );
			echo 1;
		}
		else {
			$data = array(
               'Active' => 0
            );
			echo 0;
		}		
		
		$this->db->where('HEId', $id);
		$this->db->update('tbl_he_details', $data); 
	}
	
	function get_company_info($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_he_details");
		$this->db->where('HEId', $id);
		$query=$this->db->get();
			
		return $query->result();
	}
	
	function edit_company_info($id,$arr)
	{
		$this->db->where('HEId', $id);
		$this->db->update('tbl_he_details', $arr);
	}
	
	function get_company_address($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_he_address");
		$this->db->where('HEId', $id);
		$query=$this->db->get();
			
		return $query->result();
	}
	
	function edit_company_address($id,$arr)
	{
		$this->db->where('HEId', $id);
		$this->db->update('tbl_he_address', $arr);
	}
	
	function delete_company($id)
	{
		$this->db->where('HEId', $id);
		$this->db->delete('tbl_he_address');
		echo 1;
	}
	
	
	function add_he($arr)
	{
		$id = $this->db->insert('tbl_he_details',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function add_he_address($arr)
	{
		$id = $this->db->insert('tbl_he_address',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function add_he_photo($arr)
	{
		$id = $this->db->insert('tbl_he_photos',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function get_last_detail()
	{
			$this->db->select("*");
			$this->db->from("tbl_he_details");
			$this->db->order_by("HEid", "desc"); 
			$query=$this->db->get();
			
			if($query != null)
			{			
			   if ($query->num_rows() > 0)
			   {
				return $query->result();
				//return $heDetails[0]->HEid;
			   }else
			   {
				return array();
			   }
			}
	}
	
	function get_HE_details($type)
	{
			$sql= 'SELECT d.HEname,d.HEid,d.HElogo,d.HEQueueTime,d.HELatitude,d.HELongitude,d.HEDescription,d.HEphoneNumber,d.HEfax,a.ResponsibleEmail, a.Address, a.City, a.Number, FLOOR(AVG(r.rating)) AS rating,ROUND(AVG(r.queue)) AS queue,ROUND(AVG(r.ambience)) AS ambience,ROUND(AVG(r.reception)) AS reception,ROUND(AVG(r.medical)) AS medical,ROUND(AVG(r.satisfaction)) AS satisfaction,COUNT(r.rating) AS rating_count,
			( 3959 * acos( cos( radians(12.980631484390598) ) * cos( radians( d.HELatitude ) ) * cos( radians( d.HELongitude) - radians(77.59449315807795) ) + sin( radians(12.980631484390598) ) * sin( radians( d.HELatitude ) ) ) ) AS distance FROM tbl_he_details AS d
				LEFT OUTER JOIN tbl_he_rating AS r ON d.HEid= r.HEId
				LEFT OUTER JOIN tbl_he_address AS a ON d.HEid= a.HEId
				WHERE d.HETypes LIKE "%'.$type.'%"
				GROUP BY d.HEid
				HAVING distance < 30';
			$sql=mysql_query($sql);
			
			$rows = array();
			while($r = mysql_fetch_assoc($sql)) {
				$rows[] = $r;
			}
			return json_encode($rows);
	}
	
	function search_he($searchPattern)
	{
			$sql= 'SELECT d.HEname,d.HEid,d.HElogo,d.HEQueueTime,d.HELatitude,d.HELongitude,d.HEDescription,d.HEphoneNumber,d.HEfax,a.ResponsibleEmail, a.Address, a.City, a.Number, FLOOR(AVG(r.rating)) AS rating,ROUND(AVG(r.queue)) AS queue,ROUND(AVG(r.ambience)) AS ambience,ROUND(AVG(r.reception)) AS reception,ROUND(AVG(r.medical)) AS medical,ROUND(AVG(r.satisfaction)) AS satisfaction,COUNT(r.rating) AS rating_count,
			( 3959 * acos( cos( radians(12.980631484390598) ) * cos( radians( d.HELatitude ) ) * cos( radians( d.HELongitude) - radians(77.59449315807795) ) + sin( radians(12.980631484390598) ) * sin( radians( d.HELatitude ) ) ) ) AS distance FROM tbl_he_details AS d
				LEFT OUTER JOIN tbl_he_rating AS r ON d.HEid= r.HEId
				LEFT OUTER JOIN tbl_he_address AS a ON d.HEid= a.HEId
				WHERE d.HEname REGEXP "'.$searchPattern.'"
				GROUP BY d.HEid
				HAVING distance < 1000';
			$sql=mysql_query($sql);
			
			$rows = array();
			while($r = mysql_fetch_assoc($sql)) {
				$rows[] = $r;
			}
			return json_encode($rows);
	}
	
	function get_HE_extra_details($heid)
	{
			$sql= 'SELECT d.HEDescription,d.HEphoneNumber,d.HEfax,a.ResponsibleEmail,ROUND(AVG(r.queue)) AS queue,ROUND(AVG(r.ambience)) AS ambience,ROUND(AVG(r.reception)) AS reception,ROUND(AVG(r.medical)) AS medical,ROUND(AVG(r.satisfaction)) AS satisfaction,
			(SELECT COUNT(comment) from tbl_he_comments As c Where d.HEid= c.HEId ) AS comments,
			(SELECT HEPhoto from tbl_he_photos As ph1 Where d.HEid= ph1.HEId LIMIT 0,1 ) As photo1,
			(SELECT HEPhoto from tbl_he_photos As ph1 Where d.HEid= ph1.HEId LIMIT 1,1 ) As photo2,
			(SELECT HEPhoto from tbl_he_photos As ph1 Where d.HEid= ph1.HEId LIMIT 2,1 ) As photo3,
			(SELECT HEPhoto from tbl_he_photos As ph1 Where d.HEid= ph1.HEId LIMIT 3,1 ) As photo4,
			(SELECT HEPhoto from tbl_he_photos As ph1 Where d.HEid= ph1.HEId LIMIT 4,1 ) As photo5,
			(SELECT comment from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 0,1 ) as comment1,
			(SELECT comment from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 1,1 ) as comment2,
			(SELECT comment from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 2,1 ) as comment3,
			(SELECT commentHead from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 0,1 ) as commentHead1,
			(SELECT commentHead from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 1,1 ) as commentHead2,
			(SELECT commentHead from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 2,1 ) as commentHead3,
			(SELECT commentTime from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 0,1 ) as commentTime1,
			(SELECT commentTime from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 1,1 ) as commentTime2,
			(SELECT commentTime from tbl_he_comments As ct Where d.HEid= ct.HEId LIMIT 2,1 ) as commentTime3,
			(SELECT rating from tbl_he_rating As r Where r.uid=(SELECT uid from tbl_he_comments as ct Where d.HEid= ct.HEId LIMIT 0,1) AND d.HEid= r.HEId ORDER BY ratingId DESC LIMIT 0,1 ) as rating1,
			(SELECT rating from tbl_he_rating As r Where r.uid=(SELECT uid from tbl_he_comments as ct Where d.HEid= ct.HEId LIMIT 1,1) AND d.HEid= r.HEId ORDER BY ratingId DESC LIMIT 0,1 ) as rating2,
			(SELECT rating from tbl_he_rating As r Where r.uid=(SELECT uid from tbl_he_comments as ct Where d.HEid= ct.HEId LIMIT 2,1) AND d.HEid= r.HEId ORDER BY ratingId DESC LIMIT 0,1 ) as rating3,
			(SELECT fullname from tbl_med_users As u Where u.uid=(SELECT uid from tbl_he_comments as ct Where d.HEid= ct.HEId LIMIT 0,1)) as username1,
			(SELECT fullname from tbl_med_users As u Where u.uid=(SELECT uid from tbl_he_comments as ct Where d.HEid= ct.HEId LIMIT 1,1)) as username2,
			(SELECT fullname from tbl_med_users As u Where u.uid=(SELECT uid from tbl_he_comments as ct Where d.HEid= ct.HEId LIMIT 2,1)) as username3
			FROM tbl_he_details AS d
				LEFT OUTER JOIN tbl_he_rating AS r ON d.HEid= r.HEId
				LEFT OUTER JOIN tbl_he_address AS a ON d.HEid= a.HEId
				LEFT OUTER JOIN tbl_he_comments AS c ON d.HEid= c.HEId
				WHERE d.HEid ="'.$heid.'"
				GROUP BY d.HEid';
			$sql=mysql_query($sql);
			
			$rows = array();
			while($r = mysql_fetch_assoc($sql)) {
				$rows[] = $r;
			}
			return json_encode($rows);
	}
	
	//specializations
	function add_specialization($arr)
	{
		$id = $this->db->insert('tbl_specializations',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function delete_specialization($ditem) {
		
		$this->db->where('specialID', $ditem);
		$this->db->delete('tbl_specializations');
		echo 1;
	}
	
	public function specials_count() {
        return $this->db->count_all("tbl_specializations");
    }
	
	public function specials_filtered_count($filter) {
        $this->db->select("*");
		$this->db->from("tbl_specializations");
		$this->db->like('specialName', $filter);
		$query = $this->db->get();
		return $query->num_rows();
    }
	
	function specializationlist_getall(){
		$this->db->select("*");
		$this->db->from("tbl_specializations");
		$this->db->order_by('specialID',"DESC");
		$query=$this->db->get();
        return $query->result();
	}
	
	function selectedSpecializationlist($heId)
	{
		$this->db->select("HESpecializations");
		$this->db->from("tbl_he_details");
		$this->db->where('HEid',$heId);
		$query=$this->db->get();
        $result = $query->result();
		$strResult = $result[0]->HESpecializations;
		$strResultArr = explode(",", $strResult);
		return $strResultArr;
	}

	function specializationlist_getall_foraddhe(){
		$this->db->select("*");
		$this->db->from("tbl_specializations");
		$this->db->where("Active","1");
		$this->db->order_by('specialID',"DESC");
		$query=$this->db->get();
        return $query->result();
	}
	
	function specializationlist_getall_filtered($limit, $start, $filter){
		$this->db->select("*");
		$this->db->from("tbl_specializations");
		$this->db->like('specialName', $filter);
		$this->db->limit($limit, $start);
		$query=$this->db->get();
        return $query->result();
	}
	
	function setSpecialization($heId,$specialId)
	{
		$arr = array('HESpecializations'=> $specialId);
		$this->db->where('HEid', $heId);
		$this->db->update('tbl_he_details', $arr);
	}
	
	function get_special_info($id){
		$this->db->select("*");
		$this->db->from("tbl_specializations");
		$this->db->where("specialID",$id);
		$query=$this->db->get();
        return $query->result();
	}
	
	function edit_special_info($id,$arr){
		$this->db->where('specialID', $id);
		$this->db->update('tbl_specializations', $arr);
	}
	
	function change_special_active($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_specializations");
		$this->db->where('specialID', $id);
		$query=$this->db->get();
		
		$result = $query->result();
		
		if($result[0]->Active==0) {
			$data = array(
               'Active' => 1
            );
			echo 1;
		}
		else {
			$data = array(
               'Active' => 0
            );
			echo 0;
		}		
		
		$this->db->where('specialID', $id);
		$this->db->update('tbl_specializations', $data); 
	}
	
	//services
	function add_services($arr)
	{
		$id = $this->db->insert('tbl_he_services',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function delete_services($ditem) {
		$this->db->where('serviceID', $ditem);
		$this->db->delete('tbl_he_services');
		echo 1;
	}
	
	function setServices($heId,$serviceId)
	{
		$arr = array('HEServices'=> $serviceId);
		$this->db->where('HEid', $heId);
		$this->db->update('tbl_he_details', $arr);
	}
	
	function servicelist_getall(){
		$this->db->select("*");
		$this->db->from("tbl_he_services");
		$this->db->order_by('serviceID',"DESC");
		$query=$this->db->get();
        return $query->result();
	}
	function selectedServicelist($heId)
	{
		$this->db->select("HEServices");
		$this->db->from("tbl_he_details");
		$this->db->where('HEid',$heId);
		$query=$this->db->get();
        $result = $query->result();
		$strResult = $result[0]->HEServices;
		$strResultArr = explode(",", $strResult);
		return $strResultArr;
	}
	
	
	public function services_count() {
        return $this->db->count_all("tbl_he_services");
    }
	
	public function services_filtered_count($filter) {
        $this->db->select("*");
		$this->db->from("tbl_he_services");
		$this->db->like('serviceName', $filter);
		$query = $this->db->get();
		return $query->num_rows();
    }
	
	function serviceslist_getall($limit, $start){
		$this->db->select("*");
		$this->db->from("tbl_he_services");
		$this->db->order_by('serviceID',"DESC");
		$this->db->limit($limit, $start);
		$query=$this->db->get();
        return $query->result();
	}
	
	function serviceslist_getall_foraddhe(){
		$this->db->select("*");
		$this->db->from("tbl_he_services");
		$this->db->order_by('serviceID',"DESC");
		$this->db->where("Active","1");
		$query=$this->db->get();
        return $query->result();
	}
	
	function serviceslist_getall_filtered($limit, $start, $filter){
		$this->db->select("*");
		$this->db->from("tbl_he_services");
		$this->db->like('serviceName', $filter);
		$this->db->limit($limit, $start);
		$query=$this->db->get();
        return $query->result();
	}
	
	function get_services_info($id){
		$this->db->select("*");
		$this->db->from("tbl_he_services");
		$this->db->where("serviceID",$id);
		$query=$this->db->get();
        return $query->result();
	}
	
	function edit_services_info($id,$arr){
		$this->db->where('serviceID', $id);
		$this->db->update('tbl_he_services', $arr);
	}
	
	function change_services_active($id)
	{
		$this->db->select("*");
		$this->db->from("tbl_he_services");
		$this->db->where('serviceID', $id);
		$query=$this->db->get();
		
		$result = $query->result();
		
		if($result[0]->Active==0) {
			$data = array(
               'Active' => 1
            );
			echo 1;
		}
		else {
			$data = array(
               'Active' => 0
            );
			echo 0;
		}		
		
		$this->db->where('serviceID', $id);
		$this->db->update('tbl_he_services', $data); 
	}
	
	public function checkin($arr) {
		$uid=$arr['uid'];
		$heid=$arr['Heid'];
		
		$this->db->select("*");
		$this->db->from("tbl_med_users");
		$this->db->where('uid', $uid);
		$query=$this->db->get();
		$userDetails = $query->result();
		
		if($userDetails[0]->isVerified==1){
			$this->db->select("*");
			$this->db->from("tbl_online_users");
			$this->db->where('uid', $uid);
			$this->db->where('Heid', $heid);
			$query=$this->db->get();
			
			if($query != null)
			{			
			   if ($query->num_rows() > 0) {
					$this->db->where('uid', $uid);
					$this->db->where('Heid', $heid);
					$this->db->delete('tbl_online_users');
					
					return '{ "success": "checkedOut" }';
			   }
			   else {
					$id = $this->db->insert('tbl_online_users',$arr);
					$req_id = $this->db->insert_id();
					return '{ "success": true }';
			   }
			}
		}
		else {
			return '{ "success": "notVerified" }';
		}
	}
	
	function check_online($uid,$heid) {
		$this->db->select("*");
		$this->db->from("tbl_online_users");
		$this->db->where('uid', $uid);
		$this->db->where('HeId', $heid);
		$query = $this->db->get();
		
		if($query != null)
			{			
			   if ($query->num_rows() > 0)
			   {
				return 1;
			   }else
			   {
				return 0;
			   }
			}
	}
	
	function addHICompanyForHE($arr)
	{
		$id = $this->db->insert('tbl_he_hiCompany',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function removeHICompanyForHE($heId,$companyId)
	{
		$this->db->where('heId', $heId);
		$this->db->where('hiCompanyId', $companyId);
		$this->db->delete('tbl_he_hiCompany');
	}
	
	function addHIPlanForHE($arr)
	{
		$id = $this->db->insert('tbl_he_hiPlan',$arr);
		$req_id = $this->db->insert_id();
		return $req_id; 
	}
	
	function removeHIPlanForHE($heId,$planId)
	{
		$this->db->where('heId', $heId);
		$this->db->where('hiPlanid', $planId);
		$this->db->delete('tbl_he_hiPlan');
	}
	
	public function getCurrentQueueTime($heId)
	{
		$this->db->select("HEQueueTime");
		$this->db->from("tbl_he_details");
		$this->db->where('HEid', $heId);
		$query = $this->db->get();
		
		if($query != null)
			{			
			   if ($query->num_rows() > 0)
			   {
				$result =  $query->result();
				return $result[0];
			   }
			   else
			   {
				return array();
			   }
			}
	}
	
	function updateQueueTime($heId,$arr)
	{
		$this->db->where('HEId', $heId);
		$this->db->update('tbl_he_details', $arr);
	}
}
?>