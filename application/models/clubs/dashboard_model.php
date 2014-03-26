<?php 

class Dashboard_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function load_TodaysStatistics($heID) {
	
		$curdate = date('Y-m-d');
		$startDate = $curdate." 00:00:00";
		$endDate = $curdate." 23:59:59";
        $sql=	"SELECT COUNT(uid) As total_users FROM tbl_online_users where HeId = $heID AND CheckinTime BETWEEN '$startDate' AND '$endDate'";
		
		
		$sqlresult =  $this->db->query($sql);
			if($sqlresult != null && $sqlresult != ''){	
				$out = $sqlresult->result();
				return $out[0];				
			}else{
                            return array();
			}
			
    }
	
	public function load_statistics($heID) {
	
        $sql=	"SELECT COUNT(uid) As total_users FROM tbl_online_users WHERE HeId = $heID";
		
		$sqlresult =  $this->db->query($sql);
			if($sqlresult != null && $sqlresult != ''){	
				$out = $sqlresult->result();
				return $out[0];				
			}else{
                            return array();
			}
    }
	
}
?>