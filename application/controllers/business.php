<?php
//profile_view.php controller
//profile_edit.php controller
class Business extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
    $this->load->helper(array('form','url','html'));
		$this->load->library(array('session'));
		$this->load->database();
		$this->load->model('user_model');
	}
	function index() {
		redirect("home");
	}
  function search(){
		$arr['business'] = $this->input->get("business");
    $arr['location'] = $this->input->get("location");
    $this->load->view('businesssearch_view', $arr);
  }
	function display($businessInfo){
    $bData= explode('%7C',$businessInfo);
    $arr['id'] = urldecode($bData[0]);
    $arr['name'] = urldecode($bData[1]);
    $arr['phone'] = urldecode($bData[2]);
    $arr['address'] = urldecode($bData[3]);
    $this->load->view('businessinfo_view', $arr);
  }
}
?>
