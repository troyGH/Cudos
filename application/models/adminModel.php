<?php
class adminModel extends CI_Model {


		function __construct() {
		parent::__construct();
	}

	// get user for for login validation
	function get_user($email, $pwd) {
		$this->db->where('email', $email);
		$this->db->where('password', $pwd);
		$query = $this->db->get('admin');
		return $query->result();
	}

	// get user by ID
	function get_user_by_id($id) {
		$this->db->where('admin_id', $id);
		$query = $this->db->get('admin');
		return $query->result();
	}

 function get_employees($businessID){
 	$query = $this->db->query("SELECT t2.* FROM  businessemployee t1, employee t2 WHERE $businessID = t1.business_id AND t1.employee_id = t2.employee_id");
 	return $query->result();
 }

 function get_business_info($adminID){
	 $query = $this->db->query("SELECT t2.* FROM  businessadmin t1, business t2 WHERE $adminID = t1.admin_id AND t1.business_id = t2.business_id");
	 return $query->result();
 }


  function insertEmployee($data, $bID){
		  $this->db->insert('employee',$data);
			$employeeID = $this->db->insert_id();
			$this->db->query("INSERT INTO businessemployee (business_id, employee_id) VALUES ($bID, $employeeID);");
 }
 	/*
  $this->db->select("admin_id");
  $this->db->from('admin');
  $query = $this->db->get();

  foreach ($query as &$adminID){
  $this->db->select("business_id");
  $this->db->from('businessadmin');
$this->db->where('business_id', $query->business_id);
  $res = $this->db->get();


  foreach ($res as &$businessID){
  $this->db->select("employee_id");
  $this->db->from('businessemployee');
  $this->db->where('business_id', $res->business_id);
  $employee_result = $this->db->get();

  foreach ($employee_result as &$employee){
  	  $this->db->select("first_name");
  $this->db->from('employee');
  $this->db->where('employee_id', $employee_result->employee_id);
  $name_result[]= $this->db->get();
  }
}
}

 if(isset($name_result)){
			return $name_result;
		}
		return '';

}*/
}
?>
