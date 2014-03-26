<?php
	class Account_model extends CI_Model{
		function __construct() {
			parent::__construct();
			$this->load->helper('medsquare_helper');
			$this->load->database();
		}
		
		function check_city($user_id){
			$this->db->select('city_id');
			$this->db->from('users');
			$this->db->where('users_id',$user_id);
			$query=$this->db->get();
			/*$query=$this->db->get_where('users',array('users_id',$user_id),1,0);*/
			$result=$query->result();
			if($result[0]->city_id == 0){
				return 0;
			}else{
				return 1;
			}
		}
		
		function check_status($user_id){
			$this->db->select('status');
			$this->db->from('users');
			$this->db->where('users_id',$user_id);
			$query=$this->db->get();
			$result=$query->result();
			if($result[0]->status == 0){
				return 0;
			}else{
				return 1;
			}
		}
		
		function get_states(){
			$this->db->select('state_id,state_name');
			$query=$this->db->get('state');
			return $query->result();
		}
		
		function update($phone,$state_id,$city_id,$gender,$age,$address,$seller_type,$user_id){
			$data=array(
				'phone_number' =>$phone,
				'state_id' => $state_id,
				'city_id' => $city_id,
				'gender' => $gender,
				'age' => $age,
				'address' => $address,
				'seller_type' => $seller_type,
			);
			$this->db->where('users_id',$user_id);
			if($this->db->update('users',$data)){
				return 1;
			}
		}

		function settings_edit($phone,$state_id,$city_id,$gender,$age,$address,$seller_type,$user_id,$settings_email,$settings_name){
			$data=array(
				'phone_number' =>$phone,
				'state_id' => $state_id,
				'city_id' => $city_id,
				'gender' => $gender,
				'age' => $age,
				'address' => $address,
				'seller_type' => $seller_type,
				'settings_email' => $settings_email,
				'settings_name' => $settings_name
			);
			$this->db->where('users_id',$user_id);
			if($this->db->update('users',$data)){
				return 1;
			}
		}
		
		function get_ads($user_id){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('user_id',$user_id);
			$this->db->order_by('date','desc');
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();
		}
		
		function get_ads_count($user_id){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('user_id',$user_id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function get_city_id($user_id){
			$this->db->select('city_id');
			$query=$this->db->get_where('users',array('users_id'=>$user_id),1,0);
			return $query->row();
		}
		
		function get_city_name($city_id){
			$this->db->select('city_name');
			$query=$this->db->get_where('city',array('city_id'=>$city_id),1,0);
			return $query->row();
		}
		
		function get_categories_following($user_id){
			$this->db->select('*');
			$query=$this->db->get_where('follow',array('user_id'=>$user_id));
			return $query->result();
		}
		
		function get_city_ads($city_id,$limit,$start){
		    $this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('city_id',$city_id);
			$this->db->limit($limit,$start);
			$this->db->order_by('date','desc');
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();
		}
		
		function get_city_ads_count($city_id){
		   $this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('city_id',$city_id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}
		
		function get_favourite_ads($user_id){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext,favourite.user_id');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->join('favourite', 'post.post_id = favourite.post_id');
			$this->db->where('favourite.user_id',$user_id);
			$this->db->order_by('date','desc');
			$this->db->group_by('post_title');
			$this->db->group_by('post.description');
			$query = $this->db->get();
			return $query->result();
			
		}
		
				
		function get_to_email($user_id){
			$this->db->select('email');
			$query=$this->db->get_where('users',array('users_id'=>$user_id),1,0);
			return $query->row();
		}
		
		function get_messages($to_email){
			$query=$this->db->get_where('messages',array('to_email'=>$to_email));
			return $query->result();
		}
		
		function delete_ad($post_id,$state_name){
			if($this->db->delete('post', array('post_id' => $post_id))){
				$this->db->delete($state_name, array('post_id' => $post_id));
				return 1;
			}else{
				return 0;
			}
			
		}
		
		function delete_message($message_id){
			$this->db->delete('messages', array('message_id' => $message_id));
		}

		function get_user_details($user_id){
			$query = $this->db->get_where('users', array('users_id' => $user_id), 1, 0);
			return $query->row();
		}

		function get_state_id($post_id){
			$this->db->select('state_id');
			$query = $this->db->get_where('post', array('post_id' => $post_id), 1, 0);
			return $query->row(); 
		}

		function get_state_name($state_id){
			$query = $this->db->get_where('state', array('state_id' => $state_id), 1, 0);
			return $query->row();
		}

		function get_cities(){
			$this->db->select('city_id,city_name,state_id');
			$this->db->order_by("city_name", "asc");
			$query=$this->db->get_where('city',array('status'=>1));
			return $query->result();
		}

		function change_password($old_password,$new_password,$new_password_conf){
			$old_password = passwordHash($old_password,substr($old_password,0,9));
			$new_password = passwordHash($new_password,substr($new_password,0,9));
			$this->db->select('users_id');
			$query = $this->db->get_where('users', array('password' => $old_password), 1, 0);
			$result = $query->row();
			if($query->num_rows == 1){
				$data =array(
				           'password' => $new_password,
				        );
				
				$this->db->where('users_id', $result->users_id);
				$this->db->update('users', $data);
				return 1;
			}else{
				return 0;
			}
		}
		
	}
?>
