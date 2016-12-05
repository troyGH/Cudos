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
	function get_reviews($aID){
		$query = $this->db->query("SELECT CONCAT_WS(' ', t3.first_name, t3.last_name) AS employee_name, t3.title,date(t5.timestamp) as review_date, t5.*, CONCAT_WS(' ', t7.first_name, CONCAT(LEFT(t7.last_name,1),'.')) AS customer_name, t7.customer_id
		FROM  businessadmin t1, businessemployee t2, employee t3, employeereview t4, review t5, customerreview t6, customer t7
		WHERE $aID = t1.admin_id AND  t2.business_id = t1.business_id AND  t2.employee_id = t3.employee_id AND t3.employee_id = t4.employee_id AND t4.review_id = t5.review_id
		AND t5.review_id = t6.review_id AND t6.customer_id = t7.customer_id;");
		return $query->result();
	}

	function delete_employee($id){
			$this->db->delete('employee', array('employee_id' => $id));
			$this->db->delete('businessemployee', array('employee_id' => $id));
			$this->db->delete('employeereview', array('employee_id' => $id));
	}

}
?>
