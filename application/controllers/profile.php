<?php
//profile_view.php controller
//profile_edit.php controller

class Profile extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'html', 'form'));
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->database();

	}
	function index() {
		if($this->session->userdata('login')){
			$id = $this->session->userdata('customer_id');
			$result = $this->user_model->get_public_user_by_id($id);
			$reviews =	$this->user_model->get_user_reviews_by_id($id);
			$arr['user_info'] =  $result[0];
			$arr['reviews'] =  $reviews;
			$this->load->view('profilehome_view',$arr);
		}else{
			redirect("home");
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect("home");
	}

  function edit(){
		if($this->session->userdata('login')){
			$result = $this->user_model->get_public_user_by_id($this->session->userdata('customer_id'));
			$arr['user_data'] = $result[0];
			$this->load->view('editprofile_view', $arr);
	}else{
		redirect("home");
		}
	}

	function change(){
		
	}
}
?>
