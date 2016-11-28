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
		    if( $this->session->userdata('adminlogin')){

					$result['employees'] = $this->adminModel->get_employees($this->session->userdata('business_id'));
					$this->load->view('admin_view', $result);
    }else{
			redirect('home'); // when they manually type admin
		}


	}

		function logout(){
		$this->session->sess_destroy();
		redirect("home");
	}

  function login(){
    if( $this->session->userdata('adminlogin') ){
			$this->load->view('admin_view');
		}
    $this->load->view('adminLogin_view');

		$previousurl = $this->input->get("previousurl");

		$email = $this->input->post("lg_email");
		$password = $this->input->post("lg_password");

		$result = $this->adminModel->get_user($email, $password);
		if ($result && $email && $password) {
			$businessInfo = $this->adminModel->get_business_info($result[0]->admin_id);

				$sess_data = array('adminlogin' => TRUE, 'fname' => $result[0]->first_name, 'lname' => $result[0]->last_name, 'admin_id' => $result[0]->admin_id,
				'business_id' => $businessInfo[0]->business_id, 'google_id' => $businessInfo[0]->google_id, 'business_address' => $businessInfo[0]->business_address,
				'business_name' => $businessInfo[0]->business_name, 'business_phone' => $businessInfo[0]->business_phone);
				$this->session->set_userdata($sess_data);

				redirect("admin");
			} else {
				$this->session->set_flashdata('lg_err', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
			}
	}

	function addemployees(){
		$first = $this->input->post("employeeFName");
		$last = $this->input->post("employeeLName");
		$title = $this->input->post("employeeTitle");
		$about = $this->input->post("employeeAbout");
		$img_url = $this->input->post("imgURL");
		$bID = $this->session->userdata('business_id');
		if($img_url == ""){
			$img_url = 'https://www.kirkleescollege.ac.uk/wp-content/uploads/2015/09/default-avatar.png';
		}
		$arr = array('first_name' => $first, 'last_name' => $last, 'title' => $title, 'about_me' => $about, 'img_url' => $img_url);
		$this->adminModel->insertEmployee($arr, $bID);
		redirect("admin");
	}

	

}
?>
