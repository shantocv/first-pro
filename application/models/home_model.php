<?php
	class Home_model extends CI_Model{
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	function get_categories(){
		$this->db->select('category_id,category_name');
		$query=$this->db->get_where('category',array('status'=>1),7,0);
		return $query->result();
	}
	
	function top_ads(){
		$this->db->select('post_id,post_title');
		$this->db->order_by('date','desc');
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$query=$this->db->get_where('post',array('status'=>1),12,0);
		}else{
			$query=$this->db->get_where($state_name,array('status'=>1,'city_id'=>$city_id),12,0);
		}
		return $query->result();
	}	
	
	
	function get_top_cities(){
		$this->db->select('city_id,city_name,state_id');
		$query=$this->db->get_where('city',array('status'=>1),12,0);
		return $query->result();
	}

	function get_cities(){
		$this->db->select('city_id,city_name,state_id');
		$this->db->order_by("city_name", "asc");
		$query=$this->db->get_where('city',array('status'=>1));
		return $query->result();
	}
	
	function get_bottom_cities(){
		$this->db->select('city_id,city_name,state_id');
		$query=$this->db->get_where('city',array('status'=>1),12,12);
		return $query->result();
	}

	function get_top_hoods(){
		$this->db->select('hood_id,hood_name,city_id');
		$query=$this->db->get_where('hood',array('city_id'=>26),12,0);
		return $query->result();
	}
	
	function get_bottom_hoods(){
		$this->db->select('hood_id,hood_name,city_id');
		$query=$this->db->get_where('hood',array('city_id'=>26),12,12);
		return $query->result();
	}

	function get_hoods($city_id){
		$this->db->select('hood_id,hood_name');
		$this->db->order_by("hood_name", "asc");
		$query=$this->db->get_where('hood',array('city_id'=>$city_id),30,0);
		return $query->result();
	}
	
	function get_top_states(){
		$this->db->select('state_id,state_name');
		$query=$this->db->get_where('state',array('status'=>1),14,0);
		return $query->result();
	}
	
	function get_bottom_states(){
		$this->db->select('state_id,state_name');
		$query=$this->db->get_where('state',array('status'=>1),14,14);
		return $query->result();
	}
	
	function states(){
		$this->db->select('state_id,state_name');
		$query=$this->db->get_where('state',array('status'=>1),30,0);
		return $query->result();
	}
	
	function cities1($state_id){
		$this->db->select('city_id,city_name');
		$query=$this->db->get_where('city',array('status'=>1,'state_id'=>$state_id),5,0);
		return $query->result();
	}
	
	function cities2($state_id){
		$this->db->select('city_id,city_name');
		$query=$this->db->get_where('city',array('status'=>1,'state_id'=>$state_id),10,5);
		return $query->result();
	}
	
	function cities3($state_id){
		$this->db->select('city_id,city_name');
		$query=$this->db->get_where('city',array('status'=>1,'state_id'=>$state_id),15,10);
		return $query->result();
	}
	
	function cities4($state_id){
		$this->db->select('city_id,city_name');
		$query=$this->db->get_where('city',array('status'=>1,'state_id'=>$state_id),15,20);
		return $query->result();
	}
	
	function get_popular_cities(){
		$this->db->select('city_id,city_name,state_id');
		$query=$this->db->get_where('city',array('status'=>1),16,0);
		return $query->result();
	}
	
	function list_ads($category_id){
		$this->db->select('post_id,post_title');
		$query=$this->db->get_where('post',array('status'=>1,'category_id'=>$category_id));
		return $query->result();
	}
	
	function get_sub_categories($categroy_id){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('status'=>1,'category_id'=>$categroy_id));
		return $query->result();
	}

	function get_mobile_phones_sub_categories(){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('category_id'=>6));
		return $query->result();
	}
	
	function get_automobiles_sub_categories(){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('category_id'=>7));
		return $query->result();
	}
	
	function get_electronics_sub_categories(){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('category_id'=>8));
		return $query->result();
	}
	
	function get_jobs_sub_categories(){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('category_id'=>9),12,0);
		return $query->result();
	}
	
	function get_jobs_sub_categories1(){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('category_id'=>9),24,12);
		return $query->result();
	}
	
	function get_classes_sub_categories(){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('category_id'=>10));
		return $query->result();
	}
	
	function get_real_estate_sub_categories(){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('category_id'=>11));
		return $query->result();
	}
	
	function get_life_style_sub_categories(){
		$this->db->select('sub_category_id,sub_category_name');
		$query=$this->db->get_where('sub_category',array('category_id'=>12));
		return $query->result();
	}
	
	function get_others(){
		$this->db->select('category_id,category_name');
		$query=$this->db->get_where('category',array('status'=>1),12,7);
		return $query->result();
	}

	function get_category_name($category_id){
		$this->db->select('category_name,seo_title,seo_keyword,seo_desc');
		$query=$this->db->get_where('category',array('category_id'=>$category_id),1,0);
		return $query->row();
	}
	
	function get_ads($category_id,$limit,$start){
		$state_name = $this->session->userdata('state_name');
		$city_id = $this->session->userdata('city_id');
		$state_name=str_replace('-', '',$state_name);
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('category_id',$category_id);
			$this->db->where('status',1);
			$this->db->order_by('date','desc');
			$this->db->limit($limit, $start);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();

		}else{
			$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
			$this->db->from($state_name);
			$this->db->join('files', "$state_name.post_id = files.post_id");
			$this->db->where('category_id',$category_id);
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
			$this->db->order_by('date','desc');
			$this->db->limit($limit, $start);
			$this->db->group_by('post_title');
			$this->db->group_by("$state_name.description");
			$query = $this->db->get();
			return $query->result();

		}
		
	}
	
	function ads_count($category_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('category_id',$category_id);
			$this->db->where('status',1);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}else{
			$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
			$this->db->from($state_name);
			$this->db->join('files', "$state_name.post_id = files.post_id");
			$this->db->where('category_id',$category_id);
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}
		
	}
	
	function sub_category_ads_count($sub_category_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('sub_category_id',$sub_category_id);
			$this->db->where('status',1);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}else{
			$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
			$this->db->from("$state_name");
			$this->db->join('files', "$state_name.post_id = files.post_id");
			$this->db->where('sub_category_id',$sub_category_id);
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}
		
	}
	
	function similar_ads($category_id,$sub_category_id,$state_id,$city_id,$id,$limit,$start){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('category_id',$category_id);
			$this->db->where('sub_category_id',$sub_category_id);
			$this->db->where('status',1);
			$this->db->limit($limit, $start);
			$this->db->where('post.post_id !=',$id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();
		}else{
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('category_id',$category_id);
			$this->db->where('sub_category_id',$sub_category_id);
			$this->db->where('city_id',$city_id);
			$this->db->where('status',1);
			$this->db->limit($limit, $start);
			$this->db->where('post.post_id !=',$id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();		
		}
		
	}
	
	function similar_ads_count($category_id,$sub_category_id,$state_id,$city_id,$id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('category_id',$category_id);
			$this->db->where('sub_category_id',$sub_category_id);
			$this->db->where('status',1);
			$this->db->where('post.post_id !=',$id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}else{
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('category_id',$category_id);
			$this->db->where('sub_category_id',$sub_category_id);
			$this->db->where('city_id',$city_id);
			$this->db->where('status',1);
			$this->db->where('post.post_id !=',$id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();			
		}
		
	}
	
	function get_category($sub_category_id){
		$this->db->select('category.category_id,category.category_name,sub_category.sub_category_name,sub_category.seo_title,sub_category.seo_keyword,sub_category.seo_desc');
		$this->db->from('category');
		$this->db->join('sub_category','category.category_id = sub_category.category_id');
		$this->db->where('sub_category.sub_category_id',$sub_category_id);
		$query=$this->db->get();
		return $query->row();
	}
	
	function get_sub_category_ads($sub_category_id,$limit, $start){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$this->db->where('sub_category_id',$sub_category_id);
			$this->db->where('status',1);
			$this->db->order_by('date','desc');
			$this->db->limit($limit, $start);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();

		}else{
			$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
			$this->db->from("$state_name");
			$this->db->join('files', "$state_name.post_id = files.post_id");
			$this->db->where('sub_category_id',$sub_category_id);
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
			$this->db->order_by('date','desc');
			$this->db->limit($limit, $start);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();

		}
		
	}
	
	function get_all_categories(){
		$this->db->select('category_id,category_name');
		$query=$this->db->get_where('category',array('status'=>1));
		return $query->result();
	}
	
	function get_location($city_id){
		$this->db->select('state.state_id,state.state_name,city.city_name');
		$this->db->from('state');
		$this->db->join('city','state.state_id = city.state_id');
		$this->db->where('city.city_id',$city_id);
		$query=$this->db->get();
		return $query->row();
	}
				
	
	function get_location_state($state_id){
		$this->db->select('state_id,state_name');
		$this->db->from('state');
		$this->db->where('state_id',$state_id);
		$query=$this->db->get();
		return $query->row();
	}
	
	
	
	function minmax($min,$max,$category_id,$seller_type,$sort_by,$limit, $start,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				$this->db->group_by('post_id');
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				$this->db->group_by('post_id');
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}else if($seller_type == 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('status',1);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->limit($limit, $start);
				$this->db->group_by('post_id');
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->where('seller_type',$seller_type);
				$this->db->limit($limit, $start);
				$this->db->group_by('post_id');
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}
			

		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		       		$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else if($seller_type == 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
					
				}
			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		       		$this->db->where('city_id',$city_id);
		       		$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else if($seller_type == 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
					
				}
			}
		}

		
		
	}

	function get_hood_id($located_in){
		$this->db->select('hood_id');
		$query = $this->db->get_where('hood', array('hood_name' => $located_in), 1, 0);
		if($query->num_rows() == 0){
			return 0;
		}else{
			return $query->row()->hood_id;
		}
	}

	function minmax_ads_count($min,$max,$category_id,$seller_type,$sort_by,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			}else if($seller_type == 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('status',1);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('status',1);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			
			}

			
		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		    	    $this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else if($seller_type == 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}

			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		    	    $this->db->where('city_id',$city_id);
		    	    $this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
					$this->db->where('hood_id',$hood_id);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else if($seller_type == 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		       		$this->db->where('city_id',$city_id);
		       		$this->db->where('hood_id',$hood_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}
			}
		}
		
		
	}
	
	function get_sub_category_minmax_ads($min,$max,$sub_category_id,$seller_type,$sort_by,$product_type,$limit, $start,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('status',1);
				$this->db->where('type_id',$product_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('type_id',$product_type);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}else if($seller_type == 'any' && $product_type =='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
			
			}else if($seller_type !== 'any' && $product_type =='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->where('seller_type',$seller_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
			
			}else if($seller_type == 'any' && $product_type !=='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->where('type_id',$product_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
			
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->where('type_id',$product_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}
		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($seller_type == 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else if($seller_type !== 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else if($seller_type == 'any' && $product_type !=='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}
			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($seller_type == 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else if($seller_type !== 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else if($seller_type == 'any' && $product_type !=='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('type_id',$product_type);
					$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('type_id',$product_type);
					$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}
			}
		}
		
		
	}

	function get_sub_category_minmax_ads_count($min,$max,$sub_category_id,$seller_type,$sort_by,$product_type,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('type_id',$product_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('type_id',$product_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}else if($seller_type == 'any' && $product_type =='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			
			}else if($seller_type !== 'any' && $product_type =='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->where('seller_type',$seller_type);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			
			}else if($seller_type == 'any' && $product_type !=='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->where('type_id',$product_type);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('sub_category_id',$sub_category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('type_id',$product_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}

			

		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($seller_type == 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else if($seller_type !== 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else if($seller_type == 'any' && $product_type !=='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('type_id',$product_type);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}

			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($seller_type == 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else if($seller_type !== 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else if($seller_type == 'any' && $product_type !=='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->where('type_id',$product_type);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('sub_category_id',$sub_category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}
			}
		}
		
		
	}

	function minmax_search_ads($min,$max,$category_id,$seller_type,$sort_by,$limit, $start,$key,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxx%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,post.seller_type,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxx%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}else if($seller_type == 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$this->db->where('category_id',$category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->where('seller_type',$seller_type);
				$this->db->group_by('post_id');
				$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}

		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select('$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext');
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else if($seller_type == 'any'){
					$this->db->select('$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext');
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else{
					$this->db->select('$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext');
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}


			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select('$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext');
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else if($seller_type == 'any'){
					$this->db->select('$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext');
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else{
					$this->db->select('$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext');
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$this->db->where('seller_type',$seller_type);
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}

			}
		}
			
	}
	
	function minmax_search_ads_count($min,$max,$category_id,$seller_type,$sort_by,$key,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' ){
				$this->db->select('post_id');
				$this->db->from('post');
				$this->db->where('category_id',$category_id);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$query = $this->db->get();
				return $query->num_rows();
			}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
				$this->db->select('post_id');
				$this->db->from('post');
				$this->db->where('category_id',$category_id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$query = $this->db->get();
				return $query->num_rows();
			}else if($seller_type == 'any'){
				$this->db->select('post_id');
				$this->db->from('post');
				$this->db->where('category_id',$category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$query = $this->db->get();
				return $query->num_rows();
			}else{
				$this->db->select('post_id');
				$this->db->from('post');
				$this->db->where('category_id',$category_id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->where('seller_type',$seller_type);
				$this->db->group_by('post_id');
				$string ="`post_title` LIKE \"%%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$query = $this->db->get();
				return $query->num_rows();
			}
			

		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select('post_id');
					$this->db->from("$state_name");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$query = $this->db->get();
					return $query->num_rows();
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select('post_id');
					$this->db->from("$state_name");
					$this->db->where('category_id',$category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$query = $this->db->get();
					return $query->num_rows();
				}else if($seller_type == 'any'){
					$this->db->select('post_id');
					$this->db->from("$state_name");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$query = $this->db->get();
					return $query->num_rows();
				}else{
					$this->db->select('post_id');
					$this->db->from("$state_name");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$query = $this->db->get();
					return $query->num_rows();
				}
			

			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select('post_id');
					$this->db->from("$state_name");
					$this->db->where('category_id',$category_id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$query = $this->db->get();
					return $query->num_rows();
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select('post_id');
					$this->db->from("$state_name");
					$this->db->where('category_id',$category_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$query = $this->db->get();
					return $query->num_rows();
				}else if($seller_type == 'any'){
					$this->db->select('post_id');
					$this->db->from("$state_name");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$query = $this->db->get();
					return $query->num_rows();
				}else{
					$this->db->select('post_id');
					$this->db->from("$state_name");
					$this->db->where('category_id',$category_id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->where('seller_type',$seller_type);
					$this->db->group_by('post_id');
					$string ="`post_title` LIKE \"%%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$query = $this->db->get();
					return $query->num_rows();
				}
			
			}
		}
		
	}
	
	function get_ad_details($id){
		$query=$this->db->get_where('post',array('post_id'=>$id));
		return $query->result();
	}
	
	function get_ad_images($id){
		$query=$this->db->get_where('files',array('post_id'=>$id),5,0);
		return $query->result();
	}

	function get_sub_category_name($id){
		$this->db->select('sub_category_name');
		$query=$this->db->get_where('sub_category',array('sub_category_id'=>$id),1,0);
		return $query->row();
		
	}
	
	function get_state_name($state_id){
		$this->db->select('state_name');
		$query=$this->db->get_where('state',array('state_id'=>$state_id),1,0);
		return $query->row();
	}

	function get_state_id($city_id){
		$this->db->select('state_id');
		$query = $this->db->get_where('city', array('city_id' => $city_id));
		return $query->row();
	}
	
	function get_city_name($city_id){
		$this->db->select('city_name');
		$query=$this->db->get_where('city',array('city_id'=>$city_id),1,0);
		return $query->row();
	}

	
	
	function follow($category_id,$user_id,$category_name){
		$data=array(
			'category_id' => $category_id,
			'user_id' => $user_id,
			'category_name' => $category_name
		);
		$query=$this->db->get_where('follow',$data);
		if($query->num_rows() > 0){
			
		}else{
			$this->db->insert('follow',$data);
				
		}
		
	}
	
	function follow_sub_category($sub_category_id,$user_id,$sub_category_name){
		$data=array(
			'sub_category_id' => $sub_category_id,
			'user_id' => $user_id,
			'sub_category_name' => $sub_category_name
		);
		$query=$this->db->get_where('follow',$data);
		if($query->num_rows() > 0){
			
		}else{
			$this->db->insert('follow',$data);
				
		}
		
	}
	
	function unfollow($category_id,$user_id,$category_name){
		$data=array(
			'category_id' => $category_id,
			'user_id' => $user_id,
			'category_name' => $category_name
		);
		$query=$this->db->get_where('follow',$data);
		if($query->num_rows() == 1){
			$this->db->delete('follow',$data);
			
		}else{
			
		}
		
	}
	
	function unfollow_sub_category($sub_category_id,$user_id,$sub_category_name){
		$data=array(
			'sub_category_id' => $sub_category_id,
			'user_id' => $user_id,
			'sub_category_name' => $sub_category_name
		);
		$query=$this->db->get_where('follow',$data);
		if($query->num_rows() == 1){
			$this->db->delete('follow',$data);
			
		}else{
			
		}
		
	}
	
	function follow_exist($category_id,$user_id){
		$query=$this->db->get_where('follow',array('category_id'=>$category_id,'user_id'=>$user_id));
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 0;
		}
	}
	
	function follow_exist_sub_category($sub_category_id,$user_id){
		$query=$this->db->get_where('follow',array('sub_category_id'=>$sub_category_id,'user_id'=>$user_id));
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 0;
		}
		
	}
	
	function adfav($post_id,$user_id){
		$data=array(
			'post_id' => $post_id,
			'user_id' => $user_id
		);
		$query=$this->db->get_where('favourite',$data);
		if($query->num_rows() > 0){
			
		}else{
			$this->db->insert('favourite',$data);	
		}
		
	}
	
	function unfav($post_id,$user_id){
		$data=array(
			'post_id' => $post_id,
			'user_id' => $user_id
		);
		$query=$this->db->get_where('favourite',$data);
		if($query->num_rows() == 1){
			$this->db->delete('favourite',$data);
			
		}else{
			
		}
		
	}
	
	function fav_exist($post_id,$user_id){
		$query=$this->db->get_where('favourite',array('post_id'=>$post_id,'user_id'=>$user_id));
		if($query->num_rows() > 0){
			return 1;
		}else{
			return 0;
		}
		
	}
	
	function type_exist($sub_category_id){
		$this->db->order_by("type_name", "asc");
		$query=$this->db->get_where('type',array('sub_category_id'=>$sub_category_id));
		return $query->result();
	}
	
	function get_all_ads($key,$limit,$start){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.category_id,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$string ="`post_title` LIKE \"%xxxxxxxxx%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");	
			$this->db->order_by('date','desc');
			$this->db->limit($limit, $start);
			$this->db->where('status',1);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();
		}else{
			$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.category_id,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
			$this->db->from("$state_name");
			$this->db->join('files', "$state_name.post_id = files.post_id");
			$string ="`post_title` LIKE \"%xxxxxxxxx%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");	
			$this->db->order_by('date','desc');
			$this->db->limit($limit, $start);
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();
		}

		
	}
	
	function search_ads_count($key){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post_id');
			$this->db->from('post');
			$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('status',1);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}else{
			$this->db->select('post_id');
			$this->db->from("$state_name");
			$string ="`post_title` LIKE \"%xxxxxxxx%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
	        $this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();		
		}
		
	}
	
	function insearch_category_ads_count($key,$id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post_id');
			$this->db->from('post');
			$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('category_id',$id);
			$this->db->where('status',1);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}else{
			$this->db->select('post_id');
			$this->db->from("$state_name");
			$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('category_id',$id);
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
	        $this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}		
		
	}
	
	function insearch_filter_category_ads_count($key,$id,$min,$max,$flag,$seller_type,$sort_by,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('category_id',$id);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('category_id',$id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			}else if($seller_type == 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}

			
		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		       		$this->db->where('city_id',$city_id);
		       		$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else if($seller_type == 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}

			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		       		$this->db->where('city_id',$city_id);
		       		$this->db->where('hood_id',$hood_id);
		       		$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else if($seller_type == 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}
			}
		}
		
	}
	
	function insearch_filter_category_ads($key,$id,$min,$max,$flag,$seller_type,$sort_by,$limit,$start,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			
			if($min == 0 && $max == 0 && $seller_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('category_id',$id);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$this->db->where('status',1);
				$query = $this->db->get();
				return $query->result();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('category_id',$id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				$this->db->group_by('post_id');
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}else if($seller_type == 'any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				$this->db->group_by('post_id');
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				$this->db->group_by('post_id');
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$query = $this->db->get();
				return $query->result();
				
			}

		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else if($seller_type == 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
					
				}

			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else if($seller_type == 'any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					$this->db->group_by('post_id');
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$query = $this->db->get();
					return $query->result();
					
				}
			}
		}
		
	}
	
	
	function insearch_category_ads($key,$id,$limint,$start){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('category_id',$id);
			$this->db->where('status',1);
			$this->db->group_by('post_id');
			$this->db->limit($limint,$start);
			$query = $this->db->get();
			return $query->result();
		}else{
			$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
			$this->db->from("$state_name");
			$this->db->join('files', "$state_name.post_id = files.post_id");
			$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('category_id',$id);
			$this->db->where('status',1);
	    	$this->db->where('city_id',$city_id);
	    	$this->db->group_by('post_id');
			$this->db->limit($limint,$start);
			$query = $this->db->get();
			return $query->result();			
		}

			
	}
	
	function insearch_sub_category_ads($key,$id,$limint,$start){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
			$this->db->from('post');
			$this->db->join('files', 'post.post_id = files.post_id');
			$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('sub_category_id',$id);
			$this->db->where('status',1);
			$this->db->limit($limint,$start);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->result();
		}else{
			$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
			$this->db->from("$state_name");
			$this->db->join('files', "$state_name.post_id = files.post_id");
			$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('sub_category_id',$id);
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
	        $this->db->group_by('post_id');
			$this->db->limit($limint,$start);
			$query = $this->db->get();
			return $query->result();
		}

		
	}
	
	function insearch_sub_category_ads_count($key,$id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			$this->db->select('post_id');
			$this->db->from('post');
			$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('sub_category_id',$id);
			$this->db->where('status',1);
			$this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}else{
			$this->db->select('post_id');
			$this->db->from("$state_name");
			$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
			foreach ($key as $ke) {
				# code...
				$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

			}
			$this->db->where("($string)");
			$this->db->where('sub_category_id',$id);
			$this->db->where('status',1);
	        $this->db->where('city_id',$city_id);
	        $this->db->group_by('post_id');
			$query = $this->db->get();
			return $query->num_rows();
		}

		
	}
	
	function insearch_filter_sub_category_ads_count($key,$id,$min,$max,$flag,$seller_type,$sort_by,$product_type,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('type_id',$product_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('type_id',$product_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}else if($seller_type == 'any' && $product_type =='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			
			}else if($seller_type !== 'any' && $product_type =='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			
			}else if($seller_type == 'any' && $product_type !=='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('type_id',$product_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
			
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('type_id',$product_type);
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->num_rows();
				
			}

			
		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($seller_type == 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else if($seller_type !== 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else if($seller_type == 'any' && $product_type !=='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}

			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}else if($seller_type == 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else if($seller_type !== 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else if($seller_type == 'any' && $product_type !=='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
				
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
		        	$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->num_rows();
					
				}
			}
		}
		
	}

	function insearch_filter_sub_category_ads($key,$id,$min,$max,$flag,$seller_type,$sort_by,$product_type,$limit,$start,$located_in,$hood_id){
		$state_name = $this->session->userdata('state_name');
		$state_name=str_replace('-', '',$state_name);
		$city_id = $this->session->userdata('city_id');
		if($this->session->userdata('city') == 'yuplee' ){
			if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('status',1);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('seller_type',$seller_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('type_id',$product_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('type_id',$product_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}else if($seller_type == 'any' && $product_type =='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
			
			}else if($seller_type !== 'any' && $product_type =='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
			
			}else if($seller_type == 'any' && $product_type !=='any'){
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('type_id',$product_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
			
			}else{
				$this->db->select('post.post_id,post.post_title,post.description,post.price,post.date,post.expire,files.id,files.ext');
				$this->db->from('post');
				$this->db->join('files', 'post.post_id = files.post_id');
				$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
				foreach ($key as $ke) {
					# code...
					$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

				}
				$this->db->where("($string)");
				$this->db->where('sub_category_id',$id);
				$this->db->where('price >=',$min);
				$this->db->where('price <=',$max);
				$this->db->where('seller_type',$seller_type);
				$this->db->where('type_id',$product_type);
				$this->db->limit($limit, $start);
				if($sort_by == 1){
					$this->db->order_by('price','asc');
				}else if($sort_by == 2){
					$this->db->order_by('price','desc');
				}else if($sort_by == 3){
					$this->db->order_by('date','desc');
				}
				$this->db->where('status',1);
				$this->db->group_by('post_id');
				$query = $this->db->get();
				return $query->result();
				
			}

		}else{
			if($located_in == 'any'){
				if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($seller_type == 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else if($seller_type !== 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else if($seller_type == 'any' && $product_type !=='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}

			}else{
				if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type == 'any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type =='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type == 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($min == 0 && $max == 0 && $seller_type !== 'any' && $product_type !=='any' ){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}else if($seller_type == 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else if($seller_type !== 'any' && $product_type =='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else if($seller_type == 'any' && $product_type !=='any'){
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
				
				}else{
					$this->db->select("$state_name.post_id,$state_name.post_title,$state_name.description,$state_name.price,$state_name.date,$state_name.expire,files.id,files.ext");
					$this->db->from("$state_name");
					$this->db->join('files', "$state_name.post_id = files.post_id");
					$string ="`post_title` LIKE \"%xxxxxxxxs%\" ";
					foreach ($key as $ke) {
						# code...
						$string=$string . " OR `post_title` LIKE \"%$ke%\"  ";

					}
					$this->db->where("($string)");
					$this->db->where('sub_category_id',$id);
					$this->db->where('price >=',$min);
					$this->db->where('price <=',$max);
					$this->db->where('seller_type',$seller_type);
					$this->db->where('type_id',$product_type);
					$this->db->limit($limit, $start);
					if($sort_by == 1){
						$this->db->order_by('price','asc');
					}else if($sort_by == 2){
						$this->db->order_by('price','desc');
					}else if($sort_by == 3){
						$this->db->order_by('date','desc');
					}
					$this->db->where('status',1);
		        	$this->db->where('city_id',$city_id);
		        	$this->db->where('hood_id',$hood_id);
					$this->db->group_by('post_id');
					$query = $this->db->get();
					return $query->result();
					
				}
			}
		}
		
	}


	function get_category_id($key){
		$result =  array();
		foreach ($key as $ke) {
			# code...
			$this->db->select('category_id');
			$this->db->from('post');
			$this->db->like('post_title',$ke);
			$this->db->limit(20,0);
			$query = $this->db->get();
			$result[]= $query->result();
		}
		return $result;
	}

	function send_message($message,$from_name,$from_email,$phone,$to_email,$title){
			$data=array(
				'message' => $message,
				'from_name' => $from_name,
				'from_email' => $from_email,
				'from_phone_number' => $phone,
				'to_email' =>$to_email,
				'title' => $title,
			);
			if($this->db->insert('messages',$data)){
				return 1;
			}else{
				return 0;
			}
			
	}

	function get_city_id($session_city){
		$this->db->select('city_id');
		$query = $this->db->get_where('city', array('city_name' => $session_city), 1, 0);
		return $query->row();
	}

	function get_prodcut_type_details($product_type){
		$this->db->select('seo_title,seo_keyword,seo_desc');
		$query = $this->db->get_where('type', array('type_id' => $product_type), 1, 0);
		return $query->row();
	}



	}
?>
