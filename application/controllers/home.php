<?php
//home_view.php controller
class Home extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'form', 'html'));
		$this->load->library('session');
	}
	function index() {
		$this->load->view('home_view');
	}
}
?>
