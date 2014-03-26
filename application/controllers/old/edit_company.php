<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_company extends CI_Controller {
	
	/**
	 * The Index Page.
	 * The controller which shows options to register new patient.
	 */
	 
	function  __construct() {
		parent::__construct();
		$this->load->model('company_model');
	}
	
	public function index()
	{
		$data['comapny_data'] = $this->company_model->get_companies();
		$this->load->view('edit_company',$data);
	}
	
	public function change_active()
	{
		$id = $this->input->post('id', TRUE);
		$userExist = $this->company_model->change_active($id);
	}
	
	public function edit_company_info()
	{
		$id = $this->input->post('id', TRUE);
		$data['comapny_data'] = $this->company_model->get_company_info($id);
		$this->load->view('edit_company_info',$data);
	}
	
	public function edit_info_submit()
	{
			$HICompanyId  = $this->input->post('HICompanyId', TRUE);
			$HIGovNum  = $this->input->post('HIGovNum', TRUE);
			$HINationalCompanyID   = $this->input->post('HINationalCompanyID', TRUE);
			$HIOfficialName   = $this->input->post('HIOfficialName', TRUE);
			$HIFantasyName  = $this->input->post('HIFantasyName', TRUE);
			$HIMedSquareInternalObs   = $this->input->post('HIMedSquareInternalObs', TRUE);
		
			$arr = array('HIGovNum'=>$HIGovNum,'HINationalCompanyID'=>$HINationalCompanyID,'HIOfficialName' =>$HIOfficialName,'HIFantasyName'=>$HIFantasyName,'HIMedSquareInternalObs'=>$HIMedSquareInternalObs);
			
			$userReqResult = $this->company_model->edit_company_info($HICompanyId,$arr);
			
			header('Location: http://localhost/medsquare/index.php/edit_company');
	}
	
	public function edit_company_address()
	{
		$id = $this->input->post('id', TRUE);
		$data['companyname'] = $this->input->post('companyname', TRUE);
		$data['comapny_data'] = $this->company_model->get_company_address($id);
		$this->load->view('edit_company_address',$data);
	}
	
	public function edit_address_submit()
	{
			$HICompanyId  = $this->input->post('HICompanyId', TRUE);
			$HIAddress  = $this->input->post('HIAddress', TRUE);
			$HIAddressNum   = $this->input->post('HIAddressNum', TRUE);
			$HIComplement   = $this->input->post('HIComplement', TRUE);
			$HINeighborhood  = $this->input->post('HINeighborhood', TRUE);
			$HICity   = $this->input->post('HICity', TRUE);
			$HIState  = $this->input->post('HIState', TRUE);
			$HIZipcode  = $this->input->post('HIZipcode', TRUE);
			$HICountry   = $this->input->post('HICountry', TRUE);
			$HIPhoneCode   = $this->input->post('HIPhoneCode', TRUE);
			$HIPhoneNum  = $this->input->post('HIPhoneNum', TRUE);
			$HIFaxNumber   = $this->input->post('HIFaxNumber', TRUE);
			$HIEmail   = $this->input->post('HIEmail', TRUE);
		
			$arr = array('HIAddress'=>$HIAddress,'HIAddressNum'=>$HIAddressNum,'HIComplement' =>$HIComplement,'HINeighborhood'=>$HINeighborhood,'HICity'=>$HICity,'HIState'=>$HIState,'HIZipcode'=>$HIZipcode,'HICountry'=>$HICountry,'HIPhoneCode'=>$HIPhoneCode,'HIPhoneNum'=>$HIPhoneNum,'HIFaxNumber'=>$HIFaxNumber,'HIEmail'=>$HIEmail);
			
			$userReqResult = $this->company_model->edit_company_address($HICompanyId,$arr);
			
			header('Location: http://localhost/medsquare/index.php/edit_company');
	}
	
	public function delete_company()
	{
		$id = $this->input->post('id', TRUE);
		$userExist = $this->company_model->delete_company($id);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */