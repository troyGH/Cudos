<?php
class Employee extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
    $this->load->helper(array('form','url','html', 'date'));
		$this->load->library(array('session'));
		$this->load->database();
		$this->load->model('employee_model');
		$this->load->model('business_model');

	}
	function index() {
		redirect("home");
	}

  function review(){
		$eID = $this->input->post("eID");
		$description = $this->input->post("review");
		$stars = $this->input->post("stars");
		$cID = $this->session->userdata('customer_id');
		$bID = $this->input->post("bID");
		$bName = $this->input->post("bName");
		$bAddress = $this->input->post("bAddress");
		$bPhone = $this->input->post("bPhone");


		$is_assoc = $this->business_model->is_associated($bID);
		if(empty($is_assoc)== true){
			$insert_id = $this->business_model->create_business(array('google_id' => $bID,'business_name' => $bName,'business_address' => $bAddress,'business_phone' => $bPhone));
			$new_eID = $this->employee_model->create_anon_employee($insert_id);
			$eID = $new_eID;
		}


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
	function edit_review(){
		$eID = $this->input->post("edit-eID");
		$description = $this->input->post("edit-review");
		$stars = $this->input->post("edit-stars");
		$cID = $this->session->userdata('customer_id');
		$dateString = '%Y-%m-%d %H:%i:%s';
		$time = now('US/Pacific');
		$ts = mdate($dateString, $time);
		$this->employee_model->edit_review($eID, $description, $stars, $cID, $ts);
  }

}
?>
