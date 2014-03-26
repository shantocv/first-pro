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

			

			$this->db->select("uid,password,avatar");

			$this->db->from("tbl_med_users"); 

			$this->db->where('email', $postValues['email']);

			$query=$this->db->get();

			

			if($query != null)

			{			

			   if ($query->num_rows() == 1)

			   {

					$userDetails = $query->result();

					if($userDetails[0]->password === passwordHash($postValues['password'], substr($userDetails[0]->password,0,9))) {

						return '{"success": true, "uid": '.$userDetails[0]->uid.', "avatar": "'.$userDetails[0]->avatar.'"}';

					}

					else

					   {

						return '{"success": false}';

					   }

			   }

			   else

			   {

				return false;

			   }

			}	

	}

	

	function check_user_admin($postValues)

	{

			$password = passwordHash($postValues['password']);

			

			$this->db->select("password,user_type");

			$this->db->from("users"); 

			$this->db->where('email', $postValues['email']);

			$query=$this->db->get();

			

			if($query != null)

			{			

			   if ($query->num_rows() == 1)

			   {

					$userDetails = $query->result();

					if($userDetails[0]->password === passwordHash($postValues['password'], substr($userDetails[0]->password,0,9))) {

						if($userDetails[0]->user_type==='Admin')

							return 1;

						else 

							return 2;

					}

					else

					   {

						return 3;

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

			$this->db->select("users_id");

			$this->db->from("users"); 

			$this->db->where('email', $postValues['email']);

			$query=$this->db->get();

			

			if($query != null)

			{			

			   if ($query->num_rows() == 1)

			   {
						
						$newPassword   = generatePassword(5);

						$passwordReset = passwordHash($newPassword);

						$updateUser = array('password' => $passwordReset);

						$this->db->update('users', $updateUser, array('email' => $postValues['email']));

						return $newPassword;

			   }

			   else

			   {

				return null;

			   }

			}	

	}
	function get_selected_users_profile($id)
	{
			$this->db->select("uid");

			$this->db->from("tbl_med_users"); 

			$this->db->where('email', $postValues['email']);

			$query=$this->db->get();
	}

}

?>