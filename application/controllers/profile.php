<?php
//profile_view.php controller
//profile_edit.php controller

class Profile extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
	}
	function index() {
		$this->load->view('profilehome_view');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect("home");
	}
  function edit(){
    $this->load->view('editprofile_view');
  }
}
?>
