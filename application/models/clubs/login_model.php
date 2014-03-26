<?php 

class Login_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('medsquare_helper');
		$this->load->database();
	}
	
	function check_user($postValues)
	{
			$password = passwordHash($postValues['password']);
			
			$this->db->select("HEuid,HEid,HEpassword");
			$this->db->from("tbl_he_user"); 
			$this->db->where('HEusername', $postValues['email']);
			$query=$this->db->get();
			
			if($query != null)
			{			
			   if ($query->num_rows() == 1)
			   {
					$userDetails = $query->result();
					if($userDetails[0]->HEpassword === passwordHash($postValues['password'], substr($userDetails[0]->HEpassword,0,9))) {
						return $userDetails[0]->HEid;
					}
					else
					   {
						return false;
					   }
			   }
			   else
			   {
				return false;
			   }
			}	
	}
	
	function check_forgot_user($postValues)
	{
			
			$this->db->select("HEuid");
			$this->db->from("tbl_he_user"); 
			$this->db->where('HEusername', $postValues['email']);
			$query=$this->db->get();
			
			if($query != null)
			{			
			   if ($query->num_rows() == 1)
			   {
						$newPassword   = generatePassword(5);
						$passwordReset = passwordHash($newPassword);
						$updateUser = array('HEpassword' => $passwordReset);
						$this->db->update('tbl_he_user', $updateUser, array('HEusername' => $postValues['email']));
						return $newPassword;
			   }
			   else
			   {
				return null;
			   }
			}	
	}
	
	
	
	
}
?>