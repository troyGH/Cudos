<?php
class Employee extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
    $this->load->helper(array('form','url','html', 'date'));
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

		//Check if customer already reviewed employee
		if($this->employee_model->is_review_exist($eID, $cID)->reviews_found == 0 ){

			$dateString = '%Y-%m-%d %H:%i:%s';
			$time = now('US/Pacific');

			$this->employee_model->insert_review(array('employee_id' => $eID,'customer_id' => $cID,'description' => $description,'stars' => $stars, 'timestamp' =>	mdate($dateString, $time)));
			$this->session->set_flashdata('review_success', TRUE);
			$this->session->set_flashdata('review_msg', '<div class="alert alert-success text-center alert-info">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<span class="glyphicon glyphicon-ok"></span> <strong> Success!</strong> Review sent!</div>');
		}
		else{
			$this->session->set_flashdata('review_success', FALSE);
			$this->session->set_flashdata('review_msg', '<div class="alert alert-danger text-center alert-info">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<span class="glyphicon glyphicon-warning-sign"></span> <strong> Error!</strong> You already reviewed this person, please click on edit!</div>');
		}

  }


}
?>
