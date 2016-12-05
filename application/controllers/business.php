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
		$employees = $this->employee_model->get_employees($arr['id']);
		if(isset($employees)){
				$arr['employees'] = $employees;
		}
		$selected = $this->input->get("selectedEmp");
		if(isset($selected)){
			$arr['selected_employee'] = $selected;
		}
		$review_sort = urldecode($this->input->get("review_sort"));
		$star_filter = $this->input->get("star_filter");

		if(isset($review_sort)){
			if(isset($star_filter)){
				$arr['reviews'] = $this->employee_model->filter_employees_reviews($arr['id'], $star_filter, $review_sort);
			}else{
				$arr['reviews'] = $this->employee_model->filter_employees_reviews($arr['id'], 0, $review_sort);
			}
		}else{
			if(isset($star_filter)){
				$arr['reviews'] = $this->employee_model->filter_employees_reviews($arr['id'], $star_filter, 'oldest');
			}else{
				$arr['reviews'] = $this->employee_model->get_employees_reviews($arr['id']);
			}
		}

		if($arr['id'] && $arr['name'] && $arr['phone'] && $arr['address']){
			$this->load->view('employeeReview_view', $arr);
		}else{
			$this->load->view('error');
		}
	}

	function is_associated(){
		$id = $this->input->post("gID");
		$result = $this->business_model->is_associated($id);
		if($result){
			echo json_encode($result[0]);
		}else{
			$result['is_associated'] = 0;
			echo json_encode($result);
		}
	}
}
?>
