<?php
//profile_view.php controller
//profile_edit.php controller
class Business extends CI_Controller {
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
  function search(){
		$arr['business'] = $this->input->get("business");
    $arr['location'] = $this->input->get("location");
    $this->load->view('businesssearch_view', $arr);
  }

	function display(){
    $arr['id'] = $this->input->get("bID");
    $arr['name'] = urldecode($this->input->get("bName"));
    $arr['phone'] = urldecode($this->input->get("bPhone"));
    $arr['address'] = urldecode($this->input->get("bAddress"));
		$arr['employees'] = $this->employee_model->get_employees($arr['id']);
		$arr['reviews'] = $this->employee_model->get_employees_reviews($arr['id']);

		$this->load->view('businessinfo_view', $arr);
	}
}
?>
