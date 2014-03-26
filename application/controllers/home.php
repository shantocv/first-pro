<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'libraries/facebook.php';
class Home extends CI_Controller {
	
	
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('home_model');
		$this->config->load('facebook');
		$this->load->helper('cookie');
		$this->load->library('email');
		$this->shanto = $_SERVER['HTTP_HOST'];
		$sub_dom = explode('.',$this->shanto);
		$this->session->set_userdata('city',$sub_dom[0]);
		$this->config->set_item('base_url','http://' . $sub_dom[0] .'.zeromaze.dev') ;
		$this->config->set_item('base_url','http://thrissur.zeromaze.dev') ;
		if (get_cookie('location_name')) {
			if($sub_dom[0] == 'yuplee'){
				$location_name=get_cookie('location_name');
				if($location_name !== 'yuplee'){
					header("location:".'http://'.$location_name.'.zeromaze.dev'.$_SERVER["REQUEST_URI"]);
				}
				
			}
			
		}
		$cookie = array(
			    'name'   => 'location_name',
			    'value'  => $sub_dom[0],
			    'domain' => '.zeromaze.com',
			    'expire' => '2592000',
		); 
		$this->input->set_cookie($cookie);

	}
			
	public function index(){
			$data['main_title']='Free Online Indian Classifieds Ads Jobs Real Estate Dating';
			$data['key']="";

			
			$session_city= $this->session->userdata('city');
			$session_city = ucfirst($session_city);
			if($session_city !== 'Yuplee'){
				$data['city_id'] = $this->home_model->get_city_id($session_city);
				$this->session->set_userdata('city_id',$data['city_id']->city_id);
				$city_id = $this->session->userdata('city_id');
				$data['state_id'] = $this->home_model->get_state_id($city_id);
				$state=$this->home_model->get_state_name($data['state_id']->state_id);
				$state_name=str_replace(' ', '-',$state->state_name);  
				$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
				$state_name=preg_replace('/--+/', '-', $state_name);
				$state_name=strtolower($state_name);
				$this->session->set_userdata('state_name',$state_name);	
			}else{
				$this->session->set_userdata('city_id',0);
			}
			
			$data['categories']=$this->home_model->get_categories();
			$data['top_ads']=$this->home_model->top_ads();
			$data['top_cities']=$this->home_model->get_top_cities();
			$data['bottom_cities']=$this->home_model->get_bottom_cities();
			$data['cities'] = $this->home_model->get_cities();
			$data['popular_cities']=$this->home_model->get_popular_cities();
			$data['mobile_phones']=$this->home_model->get_mobile_phones_sub_categories();	
			$data['automobiles']=$this->home_model->get_automobiles_sub_categories();	
			$data['electronics']=$this->home_model->get_electronics_sub_categories();	
			$data['jobs']=$this->home_model->get_jobs_sub_categories();	
			$data['jobs1']=$this->home_model->get_jobs_sub_categories1();	
			$data['classes']=$this->home_model->get_classes_sub_categories();	
			$data['real_estates']=$this->home_model->get_real_estate_sub_categories();	
			$data['life_styles']=$this->home_model->get_life_style_sub_categories();	
			$data['others']=$this->home_model->get_others();	
			$this->load->view('home',$data);
		
				
	}
	
	public function categories($category_name,$category_id,$page=0){
		$data['key']="";
		$session_city= $this->session->userdata('city');
		$session_city = ucfirst($session_city);
		if($session_city !== 'Yuplee'){
			$data['city_id'] = $this->home_model->get_city_id($session_city);
			$this->session->set_userdata('city_id',$data['city_id']->city_id);
			$city_id = $this->session->userdata('city_id');
			$data['state_id'] = $this->home_model->get_state_id($city_id);
			$state=$this->home_model->get_state_name($data['state_id']->state_id);
			$state_name=str_replace(' ', '-',$state->state_name);  
			$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
			$state_name=preg_replace('/--+/', '-', $state_name);
			$state_name=strtolower($state_name);
			$this->session->set_userdata('state_name',$state_name);
		}else{
			$this->session->set_userdata('city_id',0);
		}
		$data['cities'] = $this->home_model->get_cities();
		$city_id = $this->session->userdata('city_id');
		$data['hoods'] = $this->home_model->get_hoods($city_id);
		/*take category name from data base for displaying in the page.*/
		$data['category_name']=$this->home_model->get_category_name($category_id);
		if($session_city !== 'Yuplee'){
			$data['main_title']=$data['category_name']->seo_title;
			$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
		}else{
			$data['main_title']=$data['category_name']->seo_title;
			$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
		}
		
		$data['sub_categories']=$this->home_model->get_sub_categories($category_id);
		$data['category_id']=$category_id;
		$user_id=$this->session->userdata('user_id');
		$data['follow']=$this->home_model->follow_exist($category_id,$user_id);
		$data['date']=date("Y-m-d H:i:s");
		$data['curret_date'] = new Datetime($data['date']);
		$config["base_url"] = base_url() . $category_name;
       	$config["total_rows"] = $this->home_model->ads_count($category_id);
        $config["per_page"] = 20;
		$config['uri_segment'] = 2;
		
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="" style="color:red;">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
 
        $this->pagination->initialize($config);
		
		$data['ads']=$this->home_model->get_ads($category_id,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$this->load->view('category_page',$data);
	}
	
	public function sub_category($sub_category_name,$sub_category_id,$page=0){
		$data['key']="";
		$session_city= $this->session->userdata('city');
		$session_city = ucfirst($session_city);
		if($session_city !== 'Yuplee'){
			$data['city_id'] = $this->home_model->get_city_id($session_city);
			$this->session->set_userdata('city_id',$data['city_id']->city_id);
			$city_id = $this->session->userdata('city_id');
			$data['state_id'] = $this->home_model->get_state_id($city_id);
			$state=$this->home_model->get_state_name($data['state_id']->state_id);
			$state_name=str_replace(' ', '-',$state->state_name);  
			$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
			$state_name=preg_replace('/--+/', '-', $state_name);
			$state_name=strtolower($state_name);
			$this->session->set_userdata('state_name',$state_name);
		}else{
			$this->session->set_userdata('city_id',0);
		}
		$city_id = $this->session->userdata('city_id');
		$data['hoods'] = $this->home_model->get_hoods($city_id);
		$data['cities'] = $this->home_model->get_cities();
		$data['category']=$this->home_model->get_category($sub_category_id);
		if($session_city !== 'Yuplee'){
			$data['main_title']=$data['category']->seo_title;
			$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
		}else{
			$data['main_title']=$data['category']->seo_title;
			$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
		}
		
		$data['sub_category_id']=$sub_category_id;
		$user_id=$this->session->userdata('user_id');
		$data['follow']=$this->home_model->follow_exist_sub_category($sub_category_id,$user_id);
		$data['types']=$this->home_model->type_exist($sub_category_id);
		$data['date']=date("Y-m-d H:i:s");
		$data['curret_date'] = new Datetime($data['date']);
		$config["base_url"] = base_url() . $sub_category_name;
        $config["total_rows"] = $this->home_model->sub_category_ads_count($sub_category_id);
        $config["per_page"] = 20;
		$config['uri_segment'] = 2;
		/*$config['num_links'] = 1;*/
		
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a href="" style="color:red;">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
 
        $this->pagination->initialize($config);
		
		$data['ads']=$this->home_model->get_sub_category_ads($sub_category_id,$config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
		$this->load->view('sub_category_page',$data);
	}
	
	public function city($city_name,$city_id){
		$data['key']="";
		$data['categories']=$this->home_model->get_all_categories();
		$data['location']=$this->home_model->get_location($city_id);
		$data['ads']=$this->home_model->get_city_ads($city_id);
		$data['city_id']=$city_id;
		$this->load->view('city_ads_page',$data);
	}
	
	public function ads($category_name,$category_id,$city_id){
		$data['key']="";
		$data['category_name']=$this->home_model->get_category_name($category_id);
		$data['sub_categories']=$this->home_model->get_sub_categories($category_id);
		$data['ads']=$this->home_model->get_ads_category_city($category_id,$city_id);
		$data['location']=$this->home_model->get_location($city_id);
		$data['city_id']=$city_id;
		$data['category_id']=$category_id;
		$this->load->view('ad_category_city_page',$data);
	}

	public function state($state_name,$state_id){
		$data['key']="";
		$data['categories']=$this->home_model->get_all_categories();
		$data['location']=$this->home_model->get_location_state($state_id);
		$data['states']=$this->home_model->states();
		$data['ads']=$this->home_model->get_state_ads($state_id);
		$data['state_id']=$state_id;
		$data['cities1']=$this->home_model->cities1($state_id);
		$data['cities2']=$this->home_model->cities2($state_id);
		$data['cities3']=$this->home_model->cities3($state_id);
		$data['cities4']=$this->home_model->cities4($state_id);
		$this->load->view('state_ads_page',$data);
	}
	
	public function ad($category_name,$category_id,$state_id){
		$data['key']="";
		$data['category_name']=$this->home_model->get_category_name($category_id);
		$data['sub_categories']=$this->home_model->get_sub_categories($category_id);
		$data['ads']=$this->home_model->get_ads_category_state($category_id,$state_id);
		$data['location']=$this->home_model->get_location_state($state_id);
		$data['cities1']=$this->home_model->cities1($state_id);
		$data['cities2']=$this->home_model->cities2($state_id);
		$data['cities3']=$this->home_model->cities3($state_id);
		$data['cities4']=$this->home_model->cities4($state_id);
		$data['category_id']=$category_id;
		$data['state_id']=$state_id;
		$this->load->view('ad_category_state_page',$data);
	}
	
	public function add($category_name,$sub_category_name,$sub_category_id,$city_id){
		$data['key']="";
		$data['category']=$this->home_model->get_category($sub_category_id);
		$data['ads']=$this->home_model->get_ads_sub_category_city($sub_category_id,$city_id);
		$data['location']=$this->home_model->get_location($city_id);
		$data['city_id']=$city_id;
		$this->load->view('ad_sub_category_city_page',$data);
	}
	
	public function addd($category_name,$sub_category_name,$sub_category_id,$state_id){
		$data['key']="";
		$data['category']=$this->home_model->get_category($sub_category_id);
		$data['ads']=$this->home_model->get_ads_sub_category_state($sub_category_id,$state_id);
		$data['location']=$this->home_model->get_location_state($state_id);
		$data['state_id']=$state_id;
		$this->load->view('ad_sub_category_state_page',$data);
	}
		
	
	public function filter($category_name,$located_in,$category_id,$min,$max,$flag,$seller_type,$sort_by,$product_type,$page=0){
		$data['key']="";
		$data['min']=$min;
		$data['max']=$max;
		$data['seller_type']=$seller_type;
		$data['product_type']=$product_type;
		$data['date']=date("Y-m-d H:i:s");
		$data['curret_date'] = new Datetime($data['date']);
		$this->session->set_userdata('seller_type',$seller_type);
		$user_id=$this->session->userdata('user_id');
		$session_city= $this->session->userdata('city');
		$session_city = ucfirst($session_city);
		if($session_city !== 'Yuplee'){
			$data['city_id'] = $this->home_model->get_city_id($session_city);
			$this->session->set_userdata('city_id',$data['city_id']->city_id);
			$city_id = $this->session->userdata('city_id');
			$data['state_id'] = $this->home_model->get_state_id($city_id);
			$state=$this->home_model->get_state_name($data['state_id']->state_id);
			$state_name=str_replace(' ', '-',$state->state_name);  
			$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
			$state_name=preg_replace('/--+/', '-', $state_name);
			$state_name=strtolower($state_name);
			$this->session->set_userdata('state_name',$state_name);
		}else{
			$this->session->set_userdata('city_id',0);
		}
		$city_id = $this->session->userdata('city_id');
		$data['hoods'] = $this->home_model->get_hoods($city_id);
		$data['cities'] = $this->home_model->get_cities();
		if($flag == 0){
			$data['category_name']=$this->home_model->get_category_name($category_id);

			if($session_city !== 'Yuplee'){
				$data['main_title']=$data['category_name']->seo_title;
				if($located_in == 'any'){
					$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
				}else{
					$located_in=explode('-', $located_in);
	       			$located_in=implode(' ', $located_in);
					$data['main_title'] = str_replace('{location-name}', "in ".$located_in . " " . $session_city , $data['main_title']) ;
				}
				
			}else{
				$data['main_title']=$data['category_name']->seo_title;
				$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
			}

			$data['sub_categories']=$this->home_model->get_sub_categories($category_id);
			$data['states']=$this->home_model->states();
			$data['category_id']=$category_id;
			$data['sort_by']=$sort_by;
			$data['follow']=$this->home_model->follow_exist_sub_category($category_id,$user_id);
			
			$config["base_url"] = base_url() .'filter/'. $located_in.'/'. $category_name.'/'. $category_id . '/' .$min . '/' . $max . '/' . $flag . '/' .$seller_type . '/' . $sort_by . '/' .$product_type ;
	       	$located_in=explode('-', $located_in);
	       	$located_in=implode(' ', $located_in);
	       	$data['located_in'] = $located_in;
	       	$hood_id=$this->home_model->get_hood_id($located_in);
	        $config["total_rows"] = $this->home_model->minmax_ads_count($min,$max,$category_id,$seller_type,$sort_by,$located_in,$hood_id);
	        $config["per_page"] = 20;
			$config['uri_segment'] = 11;
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			 
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			 
			$config['cur_tag_open'] = '<li><a href="" style="color:red;">';
			$config['cur_tag_close'] = '</a></li>';
			 
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	 
	        $this->pagination->initialize($config);
	        $data["links"] = $this->pagination->create_links();
			$data['ads']=$this->home_model->minmax($min,$max,$category_id,$seller_type,$sort_by,$config["per_page"], $page,$located_in,$hood_id);
			$this->load->view('minmax_page',$data);
			
		}else if($flag == 1){
			/*here $categiry_id is sub_category_id*/
			$data['category']=$this->home_model->get_category($category_id);
			$data['product_type'] = $product_type;
	       	if($product_type !== 'any'){
	       		$data['product_type_details'] = $this->home_model->get_prodcut_type_details($product_type);
	       	}
			if($session_city !== 'Yuplee'){
				if($product_type == 'any'){
					$data['main_title']=$data['category']->seo_title;
				}else{
					$data['main_title']=$data['product_type_details']->seo_title;
				}
				
				if($located_in == 'any'){
					$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
				}else{
					$located_in=explode('-', $located_in);
	       			$located_in=implode(' ', $located_in);
					$data['main_title'] = str_replace('{location-name}', "in ".$located_in . " " . $session_city , $data['main_title']) ;
				}
				
			}else{
				if($product_type == 'any'){
					$data['main_title']=$data['category']->seo_title;
				}else{
					$data['main_title']=$data['product_type_details']->seo_title;
				}
				$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
			}
			$data['sub_category_id']=$category_id;
			$data['states']=$this->home_model->states();
			$data['types']=$this->home_model->type_exist($category_id);
			$data['sort_by']=$sort_by;
			$data['states']=$this->home_model->states();
			$data['follow']=$this->home_model->follow_exist_sub_category($category_id,$user_id);
			
			$config["base_url"] = base_url() .'filter/'.$category_name .'/'. $located_in .'/'. $category_id . '/' .$min . '/' . $max . '/' . $flag . '/' .$seller_type . '/' . $sort_by . '/' .$product_type ;
	       	$located_in=explode('-', $located_in);
	       	$located_in=implode(' ', $located_in);
	       	$data['located_in'] = $located_in;
	       	$hood_id=$this->home_model->get_hood_id($located_in);
	        $config["total_rows"] = $this->home_model->get_sub_category_minmax_ads_count($min,$max,$category_id,$seller_type,$sort_by,$product_type,$located_in,$hood_id);
	        $config["per_page"] = 20;
			$config['uri_segment'] = 11;
			
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			 
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			 
			$config['cur_tag_open'] = '<li><a href="" style="color:red;">';
			$config['cur_tag_close'] = '</a></li>';
			 
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	 
	        $this->pagination->initialize($config);
	        $data["links"] = $this->pagination->create_links();
			$data['ads']=$this->home_model->get_sub_category_minmax_ads($min,$max,$category_id,$seller_type,$sort_by,$product_type,$config["per_page"], $page,$located_in,$hood_id);
			$this->load->view('minmax_sub_category_page',$data);
			
		}else{
			$category_name=explode('-', $category_name);
			$original_key=implode('-', $category_name);
			$display_key=implode(' ', $category_name);
			$data['key']=$display_key;
			$data['category_name']=$this->home_model->get_category_name($category_id);
			if($session_city !== 'Yuplee'){
				$data['main_title']=$data['category_name']->seo_title;
				if($located_in == 'any'){
					$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
				}else{
					$located_in=explode('-', $located_in);
	       			$located_in=implode(' ', $located_in);
					$data['main_title'] = str_replace('{location-name}', "in ".$located_in . " " . $session_city , $data['main_title']) ;
				}
				
			}else{
				$data['main_title']=$data['category_name']->seo_title;
				$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
			}

			$data['sub_categories']=$this->home_model->get_sub_categories($category_id);
			$data['states']=$this->home_model->states();
			$data['category_id']=$category_id;
			$data['sort_by']=$sort_by;
			$data['follow']=$this->home_model->follow_exist_sub_category($category_id,$user_id);
			
			$config["base_url"] = base_url() .'filter/'. $original_key .'/'. $located_in .'/'. $category_id . '/' .$min . '/' . $max . '/' . $flag . '/' .$seller_type . '/' . $sort_by . '/' .$product_type ;
	       	$located_in=explode('-', $located_in);
	       	$located_in=implode(' ', $located_in);
	       	$data['located_in'] = $located_in;
	       	$hood_id=$this->home_model->get_hood_id($located_in);

	        $config["total_rows"] = $this->home_model->minmax_search_ads_count($min,$max,$category_id,$seller_type,$sort_by,$category_name,$located_in,$hood_id);
	      
	        $config["per_page"] = 20;
			$config['uri_segment'] = 11;
			
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			 
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			 
			$config['cur_tag_open'] = '<li><a href="" style="color:red;">';
			$config['cur_tag_close'] = '</a></li>';
			 
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	 
	        $this->pagination->initialize($config);
	        $data["links"] = $this->pagination->create_links();
			
			
			$data['ads']=$this->home_model->minmax_search_ads($min,$max,$category_id,$seller_type,$sort_by,$config["per_page"], $page,$category_name,$located_in,$hood_id);
			
			$this->load->view('minmax_search_page',$data);
			
		}
		
	}
	
	public function ad_details($title,$id,$page=0){
		/*here $id is post id*/ 
		$data['key']="";
		$data['post_id']=$id;
		$data['ad_details']=$this->home_model->get_ad_details($id);
		$data['ad_images']=$this->home_model->get_ad_images($id);
		$data['category_name']=$this->home_model->get_category_name($data['ad_details'][0]->category_id);
		$data['sub_category_name']=$this->home_model->get_sub_category_name($data['ad_details'][0]->sub_category_id);
		$data['state_name']=$this->home_model->get_state_name($data['ad_details'][0]->state_id);
		$data['city_name']=$this->home_model->get_city_name($data['ad_details'][0]->city_id);
		$user_id=$this->session->userdata('user_id');
		$data['fav']=$this->home_model->fav_exist($id,$user_id);
		$data['main_title']=$data['ad_details'][0]->post_title.'-'.$data['city_name']->city_name.'-'.$data['sub_category_name']->sub_category_name;
		$data['date']=date("Y-m-d H:i:s");
		$data['current_date'] = new Datetime($data['date']);
		
		$category_id=$data['ad_details'][0]->category_id;
		$sub_category_id=$data['ad_details'][0]->sub_category_id;
		$state_id=$data['ad_details'][0]->state_id;
		$city_id=$data['ad_details'][0]->city_id;
		$config["base_url"] = base_url() .'ad_details/' . $title . '/' .$id;
        $config["total_rows"] = $this->home_model->similar_ads_count($category_id,$sub_category_id,$state_id,$city_id,$id);
        $config["per_page"] = 20;
		$config['uri_segment'] = 4;
		
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li><a href="" style="color:red;">';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
 
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
		$data['ads']=$this->home_model->similar_ads($category_id,$sub_category_id,$state_id,$city_id,$id,$config["per_page"],$page);
		$this->load->view('ad_details',$data);
	}
	
	public function change_image(){
		$image_id=$this->input->post('image_id',true);
		$ext=$this->input->post('ext',true);
echo '<img style="width:420px;height:300px;margin:10px;" ','src="','http://uploads.zeromaze.com/uploads/',$image_id,'.',$ext,'" >';
	}
	
	public function follow(){
		$category_id=$this->input->post('category_id');
		$user_id=$this->input->post('user_id');
		$category_name=$this->input->post('category_name');
		$this->home_model->follow($category_id,$user_id,$category_name);
		/*echo '<button id=unfollow_button onclick=unfollow(',$category_id,',',$user_id,')',' class="btn btn-small">Unfollow</button>';*/
		$data['category_id']=$category_id;
		$data['category_name']=$category_name;
		$this->load->view('unfollow_page',$data);
	}
	
	public function follow_sub_category(){
		$sub_category_id=$this->input->post('sub_category_id');
		$user_id=$this->input->post('user_id');
		$sub_category_name=$this->input->post('sub_category_name');
		$this->home_model->follow_sub_category($sub_category_id,$user_id,$sub_category_name);
		/*echo '<button id=unfollow_button onclick=unfollow_sub_category(',$sub_category_id,',',$user_id,')',' class="btn btn-small">Unfollow</button>';*/
		$data['sub_category_id']=$sub_category_id;
		$data['sub_category_name']=$sub_category_name;
		$this->load->view('unfollow_sub_category_page',$data);
	}
	
	public function unfollow(){
		$category_id=$this->input->post('category_id');
		$user_id=$this->input->post('user_id');
		$category_name=$this->input->post('category_name');
		$this->home_model->unfollow($category_id,$user_id,$category_name);
		/*echo '<button id=follow_button onclick=follow(',$category_id,',',$user_id,')',' class="btn btn-small">Follow</button>';*/
		$data['category_id']=$category_id;
		$data['category_name']=$category_name;
		$this->load->view('follow_page',$data);
	}
	
	public function unfollow_sub_category(){
		$sub_category_id=$this->input->post('sub_category_id');
		$user_id=$this->input->post('user_id');
		$sub_category_name=$this->input->post('sub_category_name');
		$this->home_model->unfollow_sub_category($sub_category_id,$user_id,$sub_category_name);
		/*echo '<button id=follow_button onclick=follow_sub_category(',$sub_category_id,',',$user_id,')',' class="btn btn-small">Follow</button>';*/
		$data['sub_category_id']=$sub_category_id;
		$data['sub_category_name']=$sub_category_name;
		$this->load->view('follow_sub_category_page',$data);
	}
	
	public function adfav(){
		$post_id=$this->input->post('post_id');
		$user_id=$this->input->post('user_id');
		$this->home_model->adfav($post_id,$user_id);
		$data['post_id']=$post_id;
		$this->load->view('unfav',$data);
	}
	
	public function unfav(){
		$post_id=$this->input->post('post_id');
		$user_id=$this->input->post('user_id');
		$this->home_model->unfav($post_id,$user_id);
		$data['post_id']=$post_id;
		$this->load->view('fav',$data);
	}
	
	public function search($key,$page=0){
		$key=explode('-', $key);
		$temp_key=$key;
		$data['category']=$this->home_model->get_category_id($key);
		$data['cities'] = $this->home_model->get_cities();
		$original_key=implode(' ', $key);// variable to display in global search bar
		$key=implode('-', $key);
		$data['key']=$original_key;
		$data['date']=date("Y-m-d H:i:s");
		$data['curret_date'] = new Datetime($data['date']);
		$data['states']=$this->home_model->states();
		$session_city= $this->session->userdata('city');
		$session_city = ucfirst($session_city);
		if($session_city !== 'Yuplee'){
			$data['city_id'] = $this->home_model->get_city_id($session_city);
			$this->session->set_userdata('city_id',$data['city_id']->city_id);
			$city_id = $this->session->userdata('city_id');
			$data['state_id'] = $this->home_model->get_state_id($city_id);
			$state=$this->home_model->get_state_name($data['state_id']->state_id);
			$state_name=str_replace(' ', '-',$state->state_name);  
			$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
			$state_name=preg_replace('/--+/', '-', $state_name);
			$state_name=strtolower($state_name);
			$this->session->set_userdata('state_name',$state_name);
		}else{
			$this->session->set_userdata('city_id',0);
		}
		$city_id = $this->session->userdata('city_id');
		$data['hoods'] = $this->home_model->get_hoods($city_id);
	
		$category_id = 0;
		$count=0;

		foreach ($data['category'] as $cat) {
			# code...
			if(!empty($cat)){
				if(count($cat) > $count){
					$category_id=$cat[0]->category_id;
					$count=count($cat);
				}
			}
		}

		if($category_id == 0){
			$data['main_title']=$key . ' in ' . $session_city;
			$data['categories']=$this->home_model->get_categories();
			$data['top_ads']=$this->home_model->top_ads();
			$data['top_cities']=$this->home_model->get_top_cities();
			$data['bottom_cities']=$this->home_model->get_bottom_cities();
			$data['top_states']=$this->home_model->get_top_states();
			$data['bottom_states']=$this->home_model->get_bottom_states();
			$data['popular_cities']=$this->home_model->get_popular_cities();
			$data['mobile_phones']=$this->home_model->get_mobile_phones_sub_categories();	
			$data['automobiles']=$this->home_model->get_automobiles_sub_categories();	
			$data['electronics']=$this->home_model->get_electronics_sub_categories();	
			$data['jobs']=$this->home_model->get_jobs_sub_categories();	
			$data['jobs1']=$this->home_model->get_jobs_sub_categories1();	
			$data['classes']=$this->home_model->get_classes_sub_categories();	
			$data['real_estates']=$this->home_model->get_real_estate_sub_categories();	
			$data['life_styles']=$this->home_model->get_life_style_sub_categories();	
			$data['others']=$this->home_model->get_others();
		    $this->load->view('no_result_page',$data); 
			
		}else{
			$data['category_id']=$category_id;
			$data['category_name']=$this->home_model->get_category_name($category_id);

			if($session_city !== 'Yuplee'){
				$data['main_title']=$data['category_name']->seo_title;
				$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
			}else{
				$data['main_title']=$data['category_name']->seo_title;
				$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
			}

			$data['sub_categories']=$this->home_model->get_sub_categories($category_id);
			$data['categories']=$this->home_model->get_all_categories();
			
			$config["base_url"] = base_url() . "search/" .$key;
	        $config["total_rows"] = $this->home_model->search_ads_count($temp_key);
			$config["per_page"] = 20;
			$config['uri_segment'] = 3;
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';
			 
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';
			
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';
			
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';
			 
			$config['cur_tag_open'] = '<li class="active"><a href="" style="color:red;">';
			$config['cur_tag_close'] = '</a></li>';
			 
			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';
			
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	 
	        $this->pagination->initialize($config);
			$data['ads']=$this->home_model->get_all_ads($temp_key,$config["per_page"],$page);
	        $data["links"] = $this->pagination->create_links();
			$this->load->view('search_page',$data);
		}
		
		
		
	}
	
	public function insearch($name,$local_search_key,$id,$flag,$page=0){
		$data['key']='';
		$local_search_key=explode('-', $local_search_key);
		$original_key=implode('-', $local_search_key);
		$display_key=implode(' ', $local_search_key);
		$data['local_search_key']=$display_key;
		$data['date']=date("Y-m-d H:i:s");
		$data['curret_date'] = new Datetime($data['date']);
		$data['states']=$this->home_model->states();
		$session_city= $this->session->userdata('city');
		$session_city = ucfirst($session_city);

		if($session_city !== 'Yuplee'){
			$data['city_id'] = $this->home_model->get_city_id($session_city);
			$this->session->set_userdata('city_id',$data['city_id']->city_id);
			$city_id = $this->session->userdata('city_id');
			$data['state_id'] = $this->home_model->get_state_id($city_id);
			$state=$this->home_model->get_state_name($data['state_id']->state_id);
			$state_name=str_replace(' ', '-',$state->state_name);  
			$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
			$state_name=preg_replace('/--+/', '-', $state_name);
			$state_name=strtolower($state_name);
			$this->session->set_userdata('state_name',$state_name);
		}else{
			$this->session->set_userdata('city_id',0);
		}
		$city_id = $this->session->userdata('city_id');
		$data['hoods'] = $this->home_model->get_hoods($city_id);
		$data['cities'] = $this->home_model->get_cities();
		$session_city= $this->session->userdata('city');
		$session_city = ucfirst($session_city);
		if($session_city !== 'Yuplee'){
			$data['city_id'] = $this->home_model->get_city_id($session_city);
			$this->session->set_userdata('city_id',$data['city_id']->city_id);	
		}else{
			$this->session->set_userdata('city_id',0);
		}
		if($flag == 0){
			$config["per_page"] = 20;
			$config["total_rows"] = $this->home_model->insearch_category_ads_count($local_search_key,$id);
			if(empty($config["total_rows"])){
				$data['main_title']=$display_key . ' in ' . $session_city;
				$data['categories']=$this->home_model->get_categories();
				$data['top_ads']=$this->home_model->top_ads();
				$data['top_cities']=$this->home_model->get_top_cities();
				$data['bottom_cities']=$this->home_model->get_bottom_cities();
				$data['top_states']=$this->home_model->get_top_states();
				$data['bottom_states']=$this->home_model->get_bottom_states();
				$data['popular_cities']=$this->home_model->get_popular_cities();
				$data['mobile_phones']=$this->home_model->get_mobile_phones_sub_categories();	
				$data['automobiles']=$this->home_model->get_automobiles_sub_categories();	
				$data['electronics']=$this->home_model->get_electronics_sub_categories();	
				$data['jobs']=$this->home_model->get_jobs_sub_categories();	
				$data['jobs1']=$this->home_model->get_jobs_sub_categories1();	
				$data['classes']=$this->home_model->get_classes_sub_categories();	
				$data['real_estates']=$this->home_model->get_real_estate_sub_categories();	
				$data['life_styles']=$this->home_model->get_life_style_sub_categories();	
				$data['others']=$this->home_model->get_others();
				$this->load->view('no_result_page',$data);
			}else{
				$data['category_id']=$id;
				$data['sub_categories']=$this->home_model->get_sub_categories($id);
				$data['category_name']=$this->home_model->get_category_name($id);
				if($session_city !== 'Yuplee'){
					$data['main_title']=$data['category_name']->seo_title;
					$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
				}else{
					$data['main_title']=$data['category_name']->seo_title;
					$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
				}
				/*$data['categories']=$this->home_model->get_all_categories();*/
				
				$config["base_url"] = base_url() . "insearch/" .$name . '/' . $original_key . '/' . $id . '/' . $flag;
				$config['uri_segment'] = 6;
				$config['full_tag_open'] = '<ul>';
				$config['full_tag_close'] = '</ul>';
				
				$config['first_tag_open'] = '<li class="prev page">';
				$config['first_tag_close'] = '</li>';
				 
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				
				$config['next_tag_open'] = '<li class="next page">';
				$config['next_tag_close'] = '</li>';
				
				$config['prev_tag_open'] = '<li class="prev page">';
				$config['prev_tag_close'] = '</li>';
				 
				$config['cur_tag_open'] = '<li class="active"><a href="" style="color:red;">';
				$config['cur_tag_close'] = '</a></li>';
				 
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';
				
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Prev';
		 
		        $this->pagination->initialize($config);
				$data['ads']=$this->home_model->insearch_category_ads($local_search_key,$id,$config["per_page"],$page);
		        $data["links"] = $this->pagination->create_links();
				$this->load->view('insearch_page',$data);
			}
			
		}else{
			$config["total_rows"] = $this->home_model->insearch_sub_category_ads_count($local_search_key,$id);
			if(empty($config["total_rows"])){
				$data['main_title']=$display_key . ' in ' . $session_city;
				$data['categories']=$this->home_model->get_categories();
				$data['top_ads']=$this->home_model->top_ads();
				$data['top_cities']=$this->home_model->get_top_cities();
				$data['bottom_cities']=$this->home_model->get_bottom_cities();
				$data['top_states']=$this->home_model->get_top_states();
				$data['bottom_states']=$this->home_model->get_bottom_states();
				$data['popular_cities']=$this->home_model->get_popular_cities();
				$data['mobile_phones']=$this->home_model->get_mobile_phones_sub_categories();	
				$data['automobiles']=$this->home_model->get_automobiles_sub_categories();	
				$data['electronics']=$this->home_model->get_electronics_sub_categories();	
				$data['jobs']=$this->home_model->get_jobs_sub_categories();	
				$data['jobs1']=$this->home_model->get_jobs_sub_categories1();	
				$data['classes']=$this->home_model->get_classes_sub_categories();	
				$data['real_estates']=$this->home_model->get_real_estate_sub_categories();	
				$data['life_styles']=$this->home_model->get_life_style_sub_categories();	
				$data['others']=$this->home_model->get_others();
				$this->load->view('no_result_page',$data);
				
			}else{
				$data['category']=$this->home_model->get_category($id);
				
				if($session_city !== 'Yuplee'){
					$data['main_title']=$data['category']->seo_title;
					$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
				}else{
					$data['main_title']=$data['category']->seo_title;
					$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
				}
				
				$data['sub_category_id']=$id;
				$user_id=$this->session->userdata('user_id');
				$data['types']=$this->home_model->type_exist($id);
				$config["base_url"] = base_url() . 'insearch/' .$name . '/' . $original_key . '/' . $id . '/' . $flag;
		        $config["per_page"] = 20;
				$config['uri_segment'] = 6;
				/*$config['num_links'] = 1;*/
				
				$config['full_tag_open'] = '<ul>';
				$config['full_tag_close'] = '</ul>';
				
				$config['first_tag_open'] = '<li class="prev page">';
				$config['first_tag_close'] = '</li>';
				 
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				
				$config['next_tag_open'] = '<li class="next page">';
				$config['next_tag_close'] = '</li>';
				
				$config['prev_tag_open'] = '<li class="prev page">';
				$config['prev_tag_close'] = '</li>';
				 
				$config['cur_tag_open'] = '<li class="active"><a href="" style="color:red;">';
				$config['cur_tag_close'] = '</a></li>';
				 
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';
				
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Prev';
		 
		        $this->pagination->initialize($config);
				
				$data['ads']=$this->home_model->insearch_sub_category_ads($local_search_key,$id,$config["per_page"], $page);
		        $data["links"] = $this->pagination->create_links();
				$this->load->view('insearch_sub_category_page',$data);
			
			}
		}
		
		
	}
	
	public function insearch_filter($name,$local_search_key,$located_in,$id,$temp,$min,$max,$flag,$seller_type,$sort_by,$product_type,$page=0){
		$local_search_key=explode('-', $local_search_key);
		$original_key=implode('-', $local_search_key);
		$display_key=implode(' ', $local_search_key);
		$data['local_search_key']=$display_key;
		$data['seller_type']=$seller_type;
		$data['product_type']=$product_type;
		$data['key']='';
		$data['min']=$min;
		$data['max']=$max;
		$data['date']=date("Y-m-d H:i:s");
		$data['curret_date'] = new Datetime($data['date']);
		$data['cities'] = $this->home_model->get_cities();
		$temp_locate=$located_in;
		$located_in=explode('-', $located_in);
       	$located_in=implode(' ', $located_in);
       	$data['located_in'] = $located_in;
	    $hood_id=$this->home_model->get_hood_id($located_in);
	    $session_city= $this->session->userdata('city');
		$session_city = ucfirst($session_city);
		if($session_city !== 'Yuplee'){
			$data['city_id'] = $this->home_model->get_city_id($session_city);
			$this->session->set_userdata('city_id',$data['city_id']->city_id);
			$city_id = $this->session->userdata('city_id');
			$data['state_id'] = $this->home_model->get_state_id($city_id);
			$state=$this->home_model->get_state_name($data['state_id']->state_id);
			$state_name=str_replace(' ', '-',$state->state_name);  
			$state_name=preg_replace('/[^A-Za-z0-9\-]/', '', $state_name);
			$state_name=preg_replace('/--+/', '-', $state_name);
			$state_name=strtolower($state_name);
			$this->session->set_userdata('state_name',$state_name);
		}else{
			$this->session->set_userdata('city_id',0);
		}
		$city_id = $this->session->userdata('city_id');
		$data['hoods'] = $this->home_model->get_hoods($city_id);

		if($temp == 0){
			$config["per_page"] = 20;
			$config["total_rows"] = $this->home_model->insearch_filter_category_ads_count($local_search_key,$id,$min,$max,$flag,$seller_type,$sort_by,$located_in,$hood_id);
				
				$data['category_id']=$id;
				$data['sub_categories']=$this->home_model->get_sub_categories($id);
				$data['category_name']=$this->home_model->get_category_name($id);
				if($session_city !== 'Yuplee'){
					$data['main_title']=$data['category_name']->seo_title;
					if($located_in == 'any'){
						$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
					}else{
						$located_in=explode('-', $located_in);
		       			$located_in=implode(' ', $located_in);
						$data['main_title'] = str_replace('{location-name}', "in ".$located_in . " " . $session_city , $data['main_title']) ;
					}
					
				}else{
					$data['main_title']=$data['category_name']->seo_title;
					$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
				}
				$config["base_url"] = base_url() . "insearch-filter/" .$name . '/' . $original_key . '/'. $temp_locate . '/' . $id . '/' . $temp . '/' .$min . '/'  . $max . '/' . $flag . '/' . $seller_type . '/' . $sort_by . '/' . $product_type ;
				$config['uri_segment'] = 13;
				$config['full_tag_open'] = '<ul>';
				$config['full_tag_close'] = '</ul>';
				
				$config['first_tag_open'] = '<li class="prev page">';
				$config['first_tag_close'] = '</li>';
				 
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				
				$config['next_tag_open'] = '<li class="next page">';
				$config['next_tag_close'] = '</li>';
				
				$config['prev_tag_open'] = '<li class="prev page">';
				$config['prev_tag_close'] = '</li>';
				 
				$config['cur_tag_open'] = '<li class="active"><a href="" style="color:red;">';
				$config['cur_tag_close'] = '</a></li>';
				 
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';
				
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Prev';
		 
		        $this->pagination->initialize($config);
				$data['ads']=$this->home_model->insearch_filter_category_ads($local_search_key,$id,$min,$max,$flag,$seller_type,$sort_by,$config["per_page"],$page,$located_in,$hood_id);
		        $data["links"] = $this->pagination->create_links();
				$data['sort_by']=$sort_by;
				$this->load->view('insearch_minmax_page',$data);
			
		}else{
				$config["total_rows"] = $this->home_model->insearch_filter_sub_category_ads_count($local_search_key,$id,$min,$max,$flag,$seller_type,$sort_by,$product_type,$located_in,$hood_id);
				$data['category']=$this->home_model->get_category($id);
				if($product_type !== 'any'){
	       			$data['product_type_details'] = $this->home_model->get_prodcut_type_details($product_type);
	       		}
				if($session_city !== 'Yuplee'){
					if($product_type == 'any'){
						$data['main_title']=$data['category']->seo_title;
					}else{
						$data['main_title']=$data['product_type_details']->seo_title;
					}
					if($located_in == 'any'){
						$data['main_title'] = str_replace('{location-name}',$session_city , $data['main_title']) ;
					}else{
						$located_in=explode('-', $located_in);
		       			$located_in=implode(' ', $located_in);
						$data['main_title'] = str_replace('{location-name}', "in ".$located_in . " " . $session_city , $data['main_title']) ;
					}
					
				}else{
					if($product_type == 'any'){
						$data['main_title']=$data['category']->seo_title;
					}else{
						$data['main_title']=$data['product_type_details']->seo_title;
					}
					$data['main_title'] = str_replace('{location-name}', 'India' , $data['main_title']) ;
				}
				$data['sub_category_id']=$id;
				$data['product_type']=$product_type;
				$data['sort_by']=$sort_by;
				$user_id=$this->session->userdata('user_id');
				$data['types']=$this->home_model->type_exist($id);
				$config["base_url"] = base_url() . "insearch-filter/" .$name . '/' . $original_key . '/' . $temp_locate . '/' . $id . '/' . $temp . '/' .$min . '/'  . $max . '/' . $flag . '/' . $seller_type . '/' . $sort_by . '/' . $product_type ;
		        $config["per_page"] = 20;
				$config['uri_segment'] = 13;
			
				
				$config['full_tag_open'] = '<ul>';
				$config['full_tag_close'] = '</ul>';
				
				$config['first_tag_open'] = '<li class="prev page">';
				$config['first_tag_close'] = '</li>';
				 
				$config['last_tag_open'] = '<li class="next page">';
				$config['last_tag_close'] = '</li>';
				
				$config['next_tag_open'] = '<li class="next page">';
				$config['next_tag_close'] = '</li>';
				
				$config['prev_tag_open'] = '<li class="prev page">';
				$config['prev_tag_close'] = '</li>';
				 
				$config['cur_tag_open'] = '<li class="active"><a href="" style="color:red;">';
				$config['cur_tag_close'] = '</a></li>';
				 
				$config['num_tag_open'] = '<li class="page">';
				$config['num_tag_close'] = '</li>';
				
				$config['next_link'] = 'Next';
				$config['prev_link'] = 'Prev';
		 
		        $this->pagination->initialize($config);
				
				$data['ads']=$this->home_model->insearch_filter_sub_category_ads($local_search_key,$id,$min,$max,$flag,$seller_type,$sort_by,$product_type,$config["per_page"],$page,$located_in,$hood_id);
		        $data["links"] = $this->pagination->create_links();
				
				$this->load->view('insearch_minmax_sub_category_page',$data);
					
		}


	
	}

	public function verify_ad(){
		$data['key']='';
		$data['main_title']='Verify Ad';
		$this->load->view('verify_ad_email',$data);
	}

	public function send_message(){
		$message=$this->input->post('message');
		$from_name=$this->input->post('from_name');
		$from_email=$this->input->post('from_email');
		$phone=$this->input->post('phone');
		$to_email=$this->input->post('to_email');
		$title=$this->input->post('title',TRUE);
		$result=$this->home_model->send_message($message,$from_name,$from_email,$phone,$to_email,$title);

		$mail_details =
				"You have recieved a message from  \n
				Name    :  $from_name \n
				Email   :  $from_email \n
				Mobile  :  $phone \n
				Message :  $message \n
				
				Yuplee Team
				
				______________________________________________________
				THIS IS AN AUTOMATED RESPONSE.
				***DO NOT RESPOND TO THIS EMAIL****
				";
				
				$this->email->from("admin@yuplee.in");
				$this->email->to($to_email);
				
				$this->email->subject('Response For Your Ad');
				$this->email->message($mail_details);
				
				$this->email->send();

		if($result == 1){
			echo 1;
		}else{
			echo 0;
		}
	}
}