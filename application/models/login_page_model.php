<?php
	class Login_page_model extends CI_Model{
		function __construct() {
			parent::__construct();
			$this->load->helper('medsquare_helper');
			$this->load->database();
		}
		
		function login_user($email,$password){
			$this->db->select('users_id,email,password,username');
			$this->db->where('email',$email);
			$this->db->from('users');
			$query=$this->db->get();
			if($query){
				if($query->num_rows() == 1){
					$user=$query->result();
					if($user[0]->password === passwordHash($password,substr($password,0,9)) ){
						$this->session->set_userdata('username',$user[0]->username);
						$this->session->set_userdata('user_id',$user[0]->users_id);
						return 1;
					}else{
						return 0;
					}
				}
			}
		}
		
		function check_forgot_user($postValues){
			$this->db->select("users_id");
			$this->db->from("users");
			$this->db->where('email', $postValues['email']);
			$query=$this->db->get();
			if($query != null){
				if ($query->num_rows() == 1){
					$newPassword   = generatePassword(5);
					$passwordReset = passwordHash($newPassword,substr($newPassword,0,9));
					$updateUser = array('password' => $passwordReset);
					$this->db->update('users', $updateUser, array('email' => $postValues['email']));
					return $newPassword;
				}else{
					return null;
				}
			}
		}

		function get_city_id($user_id){
			$this->db->select('city_id');
			$query = $this->db->get_where('users', array('users_id' => $user_id),1,0);
			return $query->row();
		}
		
		function get_city_name($city_id){
			$query = $this->db->get_where('city', array('city_id' => $city_id), 1, 0);
			return $query->row();
		}

		
		
	}
?>