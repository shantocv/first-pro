<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Success extends CI_Controller {
	
	/**
	 * The Index Page.
	 * The controller which shows options to register new patient.
	 */
	 
	function  __construct() {
		parent::__construct();
		/*if($this->session->userdata('admin_logged') ) {
			if($this->session->userdata('admin_logged')=='yes') {
				
			}
			else {
				header("location:".base_url().'login');
			}
		}
		else {
			header("location:".base_url().'login');
		}*/
	}
	
	public function index()
	{
		$this->load->view('success');
	}
	
	
}