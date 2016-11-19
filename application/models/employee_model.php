<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employee_model extends CI_Model {
	// constructor for the user_model
	function __construct() {
		parent::__construct();
	}

	function get_employees($gID){
		$query = $this->db->query("SELECT t3.employee_id, t3.first_name, t3.last_name, t3.title, t3.about_me, t3.img_url FROM business t1, businessemployee t2, employee t3
WHERE t1.google_id = '$gID' AND t1.business_id = t2.business_id AND t2.employee_id = t3.employee_id;");

		return $query->result();
	}

	function get_employees_reviews($gID){
		$query = $this->db->query(
		"SELECT t3.employee_id, t7.customer_id, t7.first_name, t7.last_name, t5.stars, t5.description, t5.thumbsup, t5.thumbsdown, t5.timestamp
			FROM business t1, businessemployee t2, employee t3, employeereview t4, review t5, customerreview t6, customer t7
WHERE t1.google_id = '$gID' AND t1.business_id = t2.business_id AND t2.employee_id = t3.employee_id
AND t3.employee_id = t4.employee_id AND t4.review_id = t5.review_id AND t6.review_id = t5.review_id AND t6.customer_id = t7.customer_id;");

		return $query->result();
	}

	function insert_review($info){
		$review['description'] = $info['description'];
		$review['stars'] = $info['stars'];
		$review['timestamp'] = $info['timestamp'];
		$this->db->insert('review',$review);
    $arr['review_id'] = $this->db->insert_id();
		$arr['customer_id'] = $info['customer_id'];

		$this->db->insert('customerreview',$arr);

		$ar['review_id'] = $arr['review_id'];
		$ar['employee_id'] = $info['employee_id'];
		$this->db->insert('employeereview',$ar);
	}

	function is_review_exist($eID, $cID){
		$query = $this->db->query("SELECT count(customerreview.review_id) AS reviews_found FROM customerreview JOIN employeereview
ON employeereview.review_id = customerreview.review_id
AND customerreview.customer_id = $cID
AND employeereview.employee_id = $eID");
		return $query->result()[0];
	}

}?>
