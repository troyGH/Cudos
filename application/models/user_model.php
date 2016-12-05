<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//User_model.php is the model for the user

class User_model extends CI_Model {
	// constructor for the user_model
	function __construct() {
		parent::__construct();
	}

	// get user for for login validation
	function get_user($email, $pwd) {
		$this->db->where('email', $email);
		$this->db->where('password', $pwd);
		$query = $this->db->get('customer');
		return $query->result();
	}

	// get user by ID
	function get_user_by_id($id) {
		$this->db->where('customer_id', $id);
		$query = $this->db->get('customer');
		return $query->result();
	}

	// get non-sensitive information from user by ID
	function get_public_user_by_id($id) {
		$query = $this->db->query("SELECT * FROM customer WHERE customer_id = $id;");
		return $query->result_array();
	}

	function get_user_reviews_by_id($id){
		$query = $this->db->query("SELECT t1.stars, t1.description, t1.timestamp, t1.ThumbsUp, t1.ThumbsDown, t4.first_name, t4.last_name, t6.*
			FROM review t1, customerreview t2, employeereview t3, employee t4, businessemployee t5, business t6
			WHERE t2.customer_id = $id AND t2.review_id = t1.review_id AND t3.review_id = t1.review_id AND t3.employee_id = t4.employee_id AND t4.employee_id = t5.employee_id AND t5.business_id = t6.business_id
			ORDER BY t1.timestamp DESC;");
		return $query->result_array();

	}

	// insert new user into DB
	function insert_user($signup_data) {
			// insert values into user
			$user_success = $this->db->insert('customer', $signup_data);

			// return true only if all inserts were successful
			return ($user_success);

	}

	function update_user($id,$data){
		$this->db->where('customer_id', $id);
		$this->db->update('customer', $data);
	}


}?>
