<?php
	class Files_model extends CI_Model{
		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		public function insert_image($ext,$post_id){
		      $data = array(
		         'ext'     => $ext,
				 'post_id' => $post_id
		      );
		      $this->db->insert('files', $data);
		      return $this->db->insert_id();
   		}
		
		public function insert_post_id(){
			$data = array(
		         'status'     => 0,
		      );
			  $this->db->insert('post', $data);
		      return $this->db->insert_id();
		}
		
		function get_sub_category($sub_category_id){
			$this->db->select('sub_category_name,category_id');
			$query=$this->db->get_where('sub_category',array('sub_category_id'=>$sub_category_id));
			return $query->row();
		}
		
		function get_category($category_id){
			$this->db->select('category_name');
			$query=$this->db->get_where('category',array('category_id'=>$category_id));
			return $query->row();
		}
		
		function get_states(){
			$this->db->select('state_id,state_name');
			$query=$this->db->get('state');
			return $query->result();
		}
		
		function remove($id){
			$this->db->delete('files', array('id' => $id));
		}
		
		function select_city($state_id){
			$this->db->select('city_id,city_name');
			$this->db->order_by("city_name", "asc");
			$this->db->from('city');
			$this->db->where('state_id',$state_id);
			$query = $this->db->get();
			
			
			echo '<p style="width:575px;font-size:15px;">',' <span style="display:inline-block;width:230px;">City</span>';
			
			echo '<select class="form-control" ', ' style="width:220px;margin-left:230px;margin-top:-20px;" name=city id=city_name onchange="hood(this.value);">
						<option value=" ">Select your City</option>';
			foreach($query->result() as $raw){
				echo '<option value='.$raw->city_id.'>',$raw->city_name,'</option>';
			}
			echo '</select></p>';
		}

		function select_hood($city_id){
			$this->db->select('hood_id,hood_name');
			$this->db->order_by("hood_name", "asc");
			$this->db->from('hood');
			$this->db->where('city_id',$city_id);
			$query = $this->db->get();
			
			
			echo '<p style="width:575px;font-size:15px;margin-top:-15px">',' <span style="display:inline-block;width:230px;">Neighbourhood</span>';
			
			echo '<select class="form-control" ', ' style="width:220px;margin-left:230px;margin-top:-35px;" name=hood id=hood_name >
						<option value=" ">Neighbourhood</option>';
			foreach($query->result() as $raw){
				echo '<option value='.$raw->hood_id.'>',$raw->hood_name,'</option>';
			}
			echo '</select></p>';
		}

		
		function select_sub_type($type_id){
			$this->db->select('sub_type_id,sub_type_name');
			$this->db->from('sub_type');
			$this->db->where('type_id',$type_id);
			$query = $this->db->get();
			
			/*<p style="width:575px;font-size:15px;"> <span style="display:inline-block;width:225px;">Current City</span><select style="width:220px;"><option>Delhi</option>
                         <option>Mumbai</option></select></p>*/
			echo '<p style="width:575px;font-size:15px;margin:20px 0 10px 0">',' <span style="display:inline-block;width:230px;">Model :</span>';
			
			echo '<select class="form-control" ',' style="width:220px;margin-left:230px;margin-top:-30px;" name=city id=sub_type_name>
						<option value=" ">Select Model</option>';
			foreach($query->result() as $raw){
				echo '<option value='.$raw->sub_type_id.'>',$raw->sub_type_name,'</option>';
			}
			echo '</select></p>';
		}
		
		function insert_post($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$expire,$verify_code){
			$this->db->select('id');
			$query=$this->db->get_where('files',array('post_id'=>$post_id),1,0);
			if($query->num_rows() < 1){
				$data=array(
						'post_id'=>$post_id
						);
				$this->db->insert('files',$data);
			}
			
			$data=array(
					'category_id'=>$category_id,
					'sub_category_id'=>$sub_category_id,
					'post_title'=>$title,
					'description'=>$description,
					'price'=>$price,
					'seller_type'=>$seller_type,
					'posted_by'=>$contact_name,					
					'email'=>$contact_email,
					'phone_number'=>$phone,					
					'state_id'=>$state_id,
					'city_id'=>$city_id,
					'status'=>0,
					'user_id' => $user_id,
					'expire' => ( 7 * $expire),
					'verify_code' => $verify_code,
				  );
			if($this->db->update('post',$data,array('post_id'=>$post_id))){
				return 1;
			}else{
				return 0;
			}
		}
		
		function insert_post_mobile($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$type_id,$sub_type_id,$expire,$state_name,$verify_code,$hood_name){
			$state_name=str_replace('-', '',$state_name);
			$this->db->select('id');
			$query=$this->db->get_where('files',array('post_id'=>$post_id),1,0);
			if($query->num_rows() < 1){
				$data=array(
						'post_id'=>$post_id
						);
				$this->db->insert('files',$data);
			}
			
			$this->db->insert($state_name,array('post_id' => $post_id));

			$data=array(
					'category_id'=>$category_id,
					'sub_category_id'=>$sub_category_id,
					'post_title'=>$title,
					'description'=>$description,
					'price'=>$price,
					'seller_type'=>$seller_type,
					'posted_by'=>$contact_name,					
					'email'=>$contact_email,
					'phone_number'=>$phone,					
					'state_id'=>$state_id,
					'city_id'=>$city_id,
					'status'=>0,
					'user_id' => $user_id,
					'type_id' => $type_id,
					'sub_type_id' => $sub_type_id,
					'expire' => ( 7 * $expire),
					'verify_code' => $verify_code,
					'hood_id' => $hood_name
				  );
			if($this->db->update('post',$data,array('post_id'=>$post_id))){
				$this->db->update($state_name,$data,array('post_id'=>$post_id));
				return 1;
			}else{
				return 0;
			}
		}
		
		function insert_post_automobile($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$type_id,$sub_type_id,$body_style,$year,$kilometer,$colour,$fuel_type,$condition,$expire,$state_name,$expire,$verify_code,$hood_name){
			$state_name=str_replace('-', '',$state_name);
			$this->db->select('id');
			$query=$this->db->get_where('files',array('post_id'=>$post_id),1,0);
			if($query->num_rows() < 1){
				$data=array(
						'post_id'=>$post_id
						);
				$this->db->insert('files',$data);
			}
			
			$this->db->insert($state_name,array('post_id' => $post_id));

			$data=array(
					'category_id'=>$category_id,
					'sub_category_id'=>$sub_category_id,
					'post_title'=>$title,
					'description'=>$description,
					'price'=>$price,
					'seller_type'=>$seller_type,
					'posted_by'=>$contact_name,					
					'email'=>$contact_email,
					'phone_number'=>$phone,					
					'state_id'=>$state_id,
					'city_id'=>$city_id,
					'status'=>0,
					'user_id' => $user_id,
					'type_id' => $type_id,
					'sub_type_id' => $sub_type_id,
					'body_style' => $body_style,
					'year' => $year,
					'kilometer' => $kilometer,
					'colour' => $colour,
					'fuel_type' => $fuel_type,
					'condition' => $condition,
					'expire' => ( 7 * $expire),
					'verify_code' => $verify_code,
					'hood_id' => $hood_name,
				  );
			if($this->db->update('post',$data,array('post_id'=>$post_id))){
				$this->db->update($state_name,$data,array('post_id'=>$post_id));
				return 1;
			}else{
				return 0;
			}
		}
		
		function insert_post_jobs($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$comapany_name,$job_type,$exp_from,$exp_to,$salary_from,$salary_to,$designation,$expire,$state_name,$verify_code,$hood_name){
			$state_name=str_replace('-', '',$state_name);
			$this->db->select('id');
			$query=$this->db->get_where('files',array('post_id'=>$post_id),1,0);
			if($query->num_rows() < 1){
				$data=array(
						'post_id'=>$post_id
						);
				$this->db->insert('files',$data);
			}
			
			$this->db->insert($state_name,array('post_id' => $post_id));

			$data=array(
					'category_id'=>$category_id,
					'sub_category_id'=>$sub_category_id,
					'post_title'=>$title,
					'description'=>$description,
					'price'=>$price,
					'seller_type'=>$seller_type,
					'posted_by'=>$contact_name,					
					'email'=>$contact_email,
					'phone_number'=>$phone,					
					'state_id'=>$state_id,
					'city_id'=>$city_id,
					'status'=>0,
					'user_id' => $user_id,
					'company_name' =>$comapany_name,
					'job_type' =>$job_type,
					'exp_from' =>$exp_from,
					'exp_to' =>$exp_to,
					'salary_from' =>$salary_from,
					'salary_to' =>$salary_to,
					'designation' =>$designation,
					'expire' => ( 7 * $expire),
					'verify_code' => $verify_code,
					'hood_id' => $hood_name,
				  );
			if($this->db->update('post',$data,array('post_id'=>$post_id))){
				$this->db->update($state_name,$data,array('post_id'=>$post_id));
				return 1;
			}else{
				return 0;
			}
		}

		function insert_post_real_estate($post_id,$category_id,$sub_category_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$user_id,$furnished,$bedrooms,$bathrooms,$pets,$broker_fee,$square_meters,$state_name,$expire,$verify_code,$hood_name){
			$state_name=str_replace('-', '',$state_name);
			$this->db->select('id');
			$query=$this->db->get_where('files',array('post_id'=>$post_id),1,0);
			if($query->num_rows() < 1){
				$data=array(
						'post_id'=>$post_id
						);
				$this->db->insert('files',$data);
			}
			
			$this->db->insert($state_name,array('post_id' => $post_id));

			$data=array(
					'category_id'=>$category_id,
					'sub_category_id'=>$sub_category_id,
					'post_title'=>$title,
					'description'=>$description,
					'price'=>$price,
					'seller_type'=>$seller_type,
					'posted_by'=>$contact_name,					
					'email'=>$contact_email,
					'phone_number'=>$phone,					
					'state_id'=>$state_id,
					'city_id'=>$city_id,
					'status'=>0,
					'user_id' => $user_id,
					'furnished' => $furnished,
					'bedrooms' => $bedrooms,
					'bathrooms' => $bathrooms,
					'pets' => $pets,
					'broker_fee' => $broker_fee,
					'square_meters' => $square_meters,
					'expire' => ( 7 * $expire),
					'verify_code' => $verify_code,
					'hood_id' => $hood_name,
					
				  );
			if($this->db->update('post',$data,array('post_id'=>$post_id))){
				$this->db->update($state_name,$data,array('post_id'=>$post_id));
				return 1;
			}else{
				return 0;
			}
		}
		
		function type_exist($sub_category_id){
			$query=$this->db->get_where('type',array('sub_category_id'=>$sub_category_id));
			return $query->result();
		}
		
		function get_ad_details($post_id){
			$this->db->select('post_title,description,price,expire,email,posted_by,phone_number,seller_type');
			$query=$this->db->get_where('post',array('post_id'=> $post_id),1,0);
			return $query->row();
		}
		
		function update_details($post_id,$title,$description,$price,$seller_type,$contact_name,$contact_email,$phone,$state_id,$city_id,$expire){
			$data=array(
					'post_title'=>$title,
					'description'=>$description,
					'price'=>$price,
					'seller_type'=>$seller_type,
					'posted_by'=>$contact_name,					
					'email'=>$contact_email,
					'phone_number'=>$phone,					
					'state_id'=>$state_id,
					'city_id'=>$city_id,
					'expire' => ( 7 * $expire),
				  );
			if($this->db->update('post',$data,array('post_id'=>$post_id))){
				return 1;
			}else{
				return 0;
			}
		}

		function get_state_name($state_id){
			$this->db->select('state_name');
			$query=$this->db->get_where('state',array('state_id' => $state_id),1,0);
			return $query->row();
		}

		function get_state_id_verify($verifyCode){
			$this->db->select('state_id');
			$query=$this->db->get_where('post',array('verify_code' => $verifyCode),1,0);
			return $query->row();
		}
		
		function get_user_details($user_id){
			$this->db->select('username,email');
			$query = $this->db->get_where('users', array('users_id' => $user_id));
			return $query->row();
		}

		function verify_ad($verifyCode){
			$datas = array(
				'status' => 1
			);
			$data['state_id']=$this->get_state_id_verify($verifyCode);
			$data['state_name']=$this->get_state_name($data['state_id']->state_id);
			$state_name=str_replace(' ', '-',$data['state_name']->state_name);  
			$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
			$state_name=preg_replace('/--+/', '-', $state_name);
			$state_name=strtolower($state_name);
			$state_name=str_replace('-', '',$state_name);
			$this->db->where('verify_code', $verifyCode);
			$this->db->update('post', $datas);
			$this->db->update($state_name, $datas);
		}

		function verified_ad_details($verifyCode){
			$this->db->select('post_id,post_title');
			$query = $this->db->get_where('post', array('verify_code' => $verifyCode), 1, 0);
			return $query->row();
		}

		function get_cities(){
			$this->db->select('city_id,city_name,state_id');
			$this->db->order_by("city_name", "asc");
			$query=$this->db->get_where('city',array('status'=>1));
			return $query->result();
		}

	}
?>
