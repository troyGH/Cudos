<?php
//about_view.php controller

class About extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
	}
	function index() {
		$this->load->view('about_view');
	}
}
?>
