<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Checkin extends CI_Controller {
	
	/**
	 * The Index Page.
	 * The controller which shows options to register new patient.
	 */
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('he_model');
	}
	
	public function index()
	{
		
	}
	
	public function checkingin()
	{
		$heid  = $this->input->post('heid', TRUE);
		$uid  = $this->input->post('uid', TRUE);
		
		$date = date('Y-m-d H:i:s');
		$curdate = $date;
			
		$arr = array('Heid'=>($heid),'uid'=>($uid),'CheckinTime' => ($curdate));
		
		$userReqResult = $this->he_model->checkin($arr);
		
		echo $userReqResult;
	}
	
	public function check_online()
	{
		$heid  = $this->input->post('heid', TRUE);
		$uid  = $this->input->post('uid', TRUE);
		
		$userReqResult = $this->he_model->check_online($uid,$heid);
		
		echo '{ "success": '.$userReqResult.'}';
	}
	
	public function check_online_2()
	{
		$uid  = $this->input->post('uid', TRUE);
		
		$userReqResult = $this->he_model->check_online_2($uid);
		
		echo $userReqResult;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */