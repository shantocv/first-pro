<?php 



class Register_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function add_user($array){
		$username=$array['username'];
		$email=$array['email'];
		$this->db->select("email");
		$this->db->from("users");
		$this->db->where('email', $email);
		$query=$this->db->get();
		if ($query->num_rows() > 0){
			return 0;
		}else{
			$id = $this->db->insert('users',$array);
			$user_id = $this->db->insert_id();
			$this->session->set_userdata('user_id',$user_id);
			return 1;
		}
	}

	function select_city($state){
		$this->db->select('city_name');
		$this->db->from('city');
		$this->db->join('state', 'state.state_id = city.state_id');
		$this->db->where('state_name',$state);
		$query = $this->db->get();
		echo '<td>City</td>
			  <td>
			  	<select name=city>
					<option value=null>Select your City</option>';
		foreach($query->result() as $raw){
			echo '<option value='.$raw->city_name.'>',$raw->city_name,'</option>';
		}
		echo '</select>','</td>';
	}

	function verify_user($verify){
		$data = array(
					'status' => 1
				);
		$this->db->where('verify_code', $verify);
		$this->db->update('users', $data); 

	}

	/*function add_fb_user($arr)

	{

		$email=$arr['email'];

		

		$this->db->select("*");

		$this->db->from("tbl_med_users");

		$this->db->where('email', $email);

		$query=$this->db->get();

		

		if ($query->num_rows() > 0) {

			$userDetails = $query->result();

			return '{"success": true, "uid": '.$userDetails[0]->uid.', "email": "'.$userDetails[0]->email.'" }';

		}

		else {

			$id = $this->db->insert('tbl_med_users',$arr);

			$req_id = $this->db->insert_id();

			return '{"success": true, "uid": '.$req_id.', "email": "'.$email.'" }';

		}

	}*/

	

	/*function add_fb_avatar($userid)

	{	

		$data = array(

               'avatar' => '/images/user_avatars/'.$userid.'.jpg'

            );

			

		$this->db->where('uid', $userid);

		$this->db->update('tbl_med_users', $data); 

	}*/

	

	/*function add_verify_code($arr,$userid)

	{

		$this->db->where('uid', $userid);

		$this->db->update('tbl_med_users', $arr); 

	}*/

	

	/*function verifyUser($verify)

	{

		$data = array(

               'isVerified' => 1

            );

		$this->db->where('verifyCode', $verify);

		$this->db->update('tbl_med_users', $data); 

		

		echo 'Verified. You may now login from app.';

	}*/

	

	/*function add_fb_friends($arr)

	{

			

		$id = $this->db->insert('tbl_fb_friendslist',$arr);

		$req_id = $this->db->insert_id();

		return $req_id; 

	}*/

	

}

?>