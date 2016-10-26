<?php
//contact_view.php controller

class Admin extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
    $this->load->helper(array('form','url','html'));
		$this->load->library(array('session'));
		$this->load->database();
		$this->load->model('adminModel');
	}
	function index() {
		$this->data['posts'] = $this->adminModel->getPosts();
		$this->load->view('admin_view', $this->data);
	}

		function logout(){
		$this->session->sess_destroy();
		redirect("home");
	}


}
?>


