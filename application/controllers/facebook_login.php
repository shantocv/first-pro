<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/facebook.php';
class Facebook_login extends CI_Controller {
   public function __construct(){
            parent::__construct();  
            $this->config->load('facebook');
            $this->load->model('facebook_model');
            $this->load->helper('cookie');
    }
    public function index()
    {
    } 
 
    function logout(){
        $base_url=$this->config->item('base_url');
        $this->session->sess_destroy();
        header('Location: '.$base_url);
    }
    function fblogin(){
        $base_url=$this->config->item('base_url');
            
        $facebook = new Facebook(array(
        'appId'     =>  $this->config->item('appID'),
        'secret'    => $this->config->item('appSecret'),
        ));
        
        $user = $facebook->getUser();
        if($user){
            try{
                $profile = $facebook->api('/me');
                $data['fb_details']=$this->facebook_model->fb_details($profile['email']);
                if(empty($data['fb_details'])){
                    $array=array('username' => $profile['name'] , 'email' => $profile['email'], 'status' => 1 ,'user_type' => 'user');
                    $user_id=$this->facebook_model->insert_from_fb($array);
                    if($user_id){
                        $ses_user=array(
                            'user_id' => $user_id,
                            'username' => $profile['name'],
                            'logged_in' => 'yes'
                        );
                        $this->session->set_userdata($ses_user);
                        header('Location:'.$base_url . 'account');
                    }
                }else{
                    $city_id = $this->facebook_model->get_city_id($data['fb_details']->users_id);
                    $city_name = $this->facebook_model->get_city_name($city_id->city_id);
                    $city_name=str_replace(' ', '-',$city_name->city_name);  
                    $city_name=preg_replace('/[^A-Za-z0-9\-]/', '', $city_name);
                    $city_name=preg_replace('/--+/', '-', $city_name);
                    $city_name=strtolower($city_name);
                    $city_name=str_replace('-', '',$city_name);
                    $this->session->set_userdata('profile_city_name' , $city_name);
                    $cookie = array(
                        'name'   => 'location_name',
                        'value'  => $city_name,
                        'domain' => '.zeromaze.com',
                        'expire' => '2592000',
                    ); 
                    $this->input->set_cookie($cookie);
                    $ses_user=array(
                        'user_id' => $data['fb_details']->users_id,
                        'username' => $profile['name'],
                        'logged_in' => 'yes'
                    );
                    $this->session->set_userdata($ses_user);
                    header('Location:'. 'http://'. $city_name .  '.zeromaze.com/account');
                }
            }catch(FacebookApiException $e){
                error_log($e);
                $user = NULL;
            }       
        }else{
            echo $user;
        }   
    }
    
}