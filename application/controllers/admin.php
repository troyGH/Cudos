<?php
//contact_view.php controller

class Admin extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
    $this->load->helper(array('form','url','html', 'date'));
		$this->load->library(array('session', 'email'));
		$this->load->database();
		$this->load->model('adminModel');
	}
	function index() {
		    if( $this->session->userdata('adminlogin')){

					$result['employees'] = $this->adminModel->get_employees($this->session->userdata('business_id'));
					$result['reviews'] = $this->adminModel->get_reviews($this->session->userdata('admin_id'));
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

		$email = $this->input->post("admin_email");
		$password = $this->input->post("admin_password");

		$result = $this->adminModel->get_user($email, $password);
		if ($result && $email && $password) {
			$businessInfo = $this->adminModel->get_business_info($result[0]->admin_id);

				$sess_data = array('adminlogin' => TRUE, 'fname' => $result[0]->first_name, 'lname' => $result[0]->last_name, 'admin_id' => $result[0]->admin_id,
				'business_id' => $businessInfo[0]->business_id, 'google_id' => $businessInfo[0]->google_id, 'business_address' => $businessInfo[0]->business_address,
				'business_name' => $businessInfo[0]->business_name, 'business_phone' => $businessInfo[0]->business_phone);
				$this->session->set_userdata($sess_data);

				redirect("admin");
			}else if(empty($result) && $email && $password){
				$this->session->set_flashdata('admin_err', '<div class="alert alert-danger text-center alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-warning-sign"></span> <strong> Error! </strong> Wrong Email or Password!</div>');
				redirect("admin/login");
			}
	}

	function signup(){
		if( $this->session->userdata('adminlogin') ){
			$this->load->view("admin");
		}else{
			$config = Array(
				'protocol' => 'sendmail',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'sjsu.cudos@gmail.com',
				'smtp_pass' => 'cudossjsu16',
				'mailtype'  => 'text',
				'charset'   => 'iso-8859-1',
				'newline' 	=>	'\r\n');
			$this->email->initialize($config);

			$name = $this->input->post("name");
			$phone = $this->input->post("phone");
			$email = $this->input->post("email");
			$business = $this->input->post("business");
			$msg = $this->input->post("message");

			$this->email->from($email, $name);
			$this->email->to('sjsu.cudos@gmail.com');

			$this->email->subject('Admin Signup Inquiry from '.$business);
			$this->email->message('Phone: '.$phone.'\r\n'.$msg);
			$this->email->send();

			if($name && $phone && $email && $business && $msg){
				$this->session->set_flashdata('admin_email_msg', '<div class="alert alert-success text-center alert-info">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<span class="glyphicon glyphicon-ok"></span> <strong> Email Sent! </strong>A Cudos representative will contact you soon within 24-48 business hours!</div>');
			}
			$this->load->view("adminSignup_view");
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

	function deleteemployee(){
		if( $this->session->userdata('adminlogin') == false ){
			redirect("home");
		}else{
			$employee_id = $this->input->post("deleteEid");
			$this->adminModel->delete_employee($employee_id);
			$this->session->set_flashdata('employee_delete_msg', '<div class="alert alert-success text-center alert-info">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<span class="glyphicon glyphicon-ok"></span> <strong> Employee Deleted! </strong></div>');
			redirect("admin");
		}
	}

}
?>
