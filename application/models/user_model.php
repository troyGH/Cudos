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

	// insert new user into DB
	function insert_user($signup_data) {
			// insert values into user
			$user_success = $this->db->insert('customer', $signup_data);

			// return true only if all inserts were successful
			return ($user_success);

	}

}?>
