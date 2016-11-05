<?php
class Employee extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
    $this->load->helper(array('form','url','html'));
		$this->load->library(array('session'));
		$this->load->database();
		$this->load->model('employee_model');
	}
	function index() {
		redirect("home");
	}
  function review(){
		$eID = $this->input->post("eID");
		$description = $this->input->post("review");
		$stars = $this->input->post("stars");
		$cID = $this->session->userdata('customer_id');
		$this->employee_model->insert_review(array('employee_id' => $eID,'customer_id' => $cID,'description' => $description,'stars' => $stars));
  }
}
?>
