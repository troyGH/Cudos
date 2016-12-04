<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employee_model extends CI_Model {
	// constructor for the user_model
	function __construct() {
		parent::__construct();
	}

	function get_employees($gID){
		$query = $this->db->query("SELECT t3.employee_id, CONCAT_WS(' ', t3.first_name, CONCAT(LEFT(t3.last_name,1),'.')) AS employee_name, t3.title, t3.about_me, t3.img_url FROM business t1, businessemployee t2, employee t3
WHERE t1.google_id = '$gID' AND t1.business_id = t2.business_id AND t2.employee_id = t3.employee_id;");

		return $query->result();
	}

	function get_employees_reviews($gID){
		$query = $this->db->query(
		"SELECT t3.employee_id, t7.customer_id, CONCAT_WS(' ', t7.first_name, CONCAT(LEFT(t7.last_name,1),'.')) AS customer_name, t7.city, t7.state, t5.*
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

		$new_arr['review_id'] = $arr['review_id'];
		$new_arr['employee_id'] = $info['employee_id'];
		$this->db->insert('employeereview',$new_arr);
	}

	function is_review_exist($eID, $cID){
		$query = $this->db->query("SELECT count(customerreview.review_id) AS reviews_found FROM customerreview JOIN employeereview
ON employeereview.review_id = customerreview.review_id
AND customerreview.customer_id = $cID
AND employeereview.employee_id = $eID");
		return $query->result()[0];
	}

	function create_anon_employee($bID){
		$this->db->query("INSERT INTO employee (first_name, img_url) VALUES ('Anonymous', 'http://localhost/Cudos/assets/img/employee_default.jpg');");
		$eID = $this->db->insert_id();
		$this->db->query("INSERT INTO businessemployee (business_id, employee_id) VALUES ($bID, $eID);");
		return $eID;
	}

	function edit_review($eID, $description, $stars, $cID, $ts){
		$this->db->query("UPDATE review a
		JOIN employeereview b ON a.review_id = b.review_id
		JOIN customerreview c ON a.review_id = c.review_id
		SET a.stars = $stars, a.description = '$description', a.IsModified = 'True', a.timestamp = '$ts'  WHERE b.employee_id = $eID AND c.customer_id = $cID;");
	}

	function validate_vote($rID, $cID){
		$query = $this->db->query("SELECT * FROM customervote t1, vote t2, reviewvote t3
			WHERE t1.customer_id = $cID AND t1.vote_id = t2.vote_id AND t2.vote_id = t3.vote_id AND t3.review_id = $rID");
		return $query->result();
	}

	function update_vote($rID, $vID, $vote){
		$this->db->query("UPDATE vote SET is_helpful = $vote WHERE vote_id = $vID;");

		if($vote == 1){ //thumbsup
			$this->db->query("UPDATE review SET ThumbsUp = ThumbsUp + 1, ThumbsDown = ThumbsDown - 1 WHERE review_id = $rID;");
		}else{
			$this->db->query("UPDATE review SET ThumbsUp = ThumbsUp - 1, ThumbsDown = ThumbsDown + 1 WHERE review_id = $rID;");
		}
	}

	function insert_vote($cID, $rID, $vote){
		$this->db->query("INSERT INTO vote (is_helpful) VALUES ($vote);");
		$vID = $this->db->insert_id();
		$this->db->query("INSERT INTO customervote (customer_id, vote_id) VALUES ($cID, $vID);");
		$this->db->query("INSERT INTO reviewvote (review_id, vote_id) VALUES ($rID, $vID);");

		if($vote == 1){ //thumbsup
			$this->db->query("UPDATE review SET ThumbsUp = ThumbsUp + 1 WHERE review_id = $rID;");
		}else{
			$this->db->query("UPDATE review SET ThumbsDown = ThumbsDown + 1 WHERE review_id = $rID;");
		}
	}

	function remove_vote($cID, $rID, $vID, $vote){
		$this->db->query("DELETE FROM vote WHERE vote_id = $vID;");
		$this->db->query("DELETE FROM reviewvote WHERE vote_id = $vID AND review_id = $rID;");
		$this->db->query("DELETE FROM customervote WHERE vote_id = $vID AND customer_id = $cID;");

		if($vote == 1){ //thumbsup
			$this->db->query("UPDATE review SET ThumbsUp = ThumbsUp - 1 WHERE review_id = $rID;");
		}else{
			$this->db->query("UPDATE review SET ThumbsDown = ThumbsDown - 1 WHERE review_id = $rID;");
		}
	}

}?>
