<?php
//login_view.php controller
//forgotpassword_view.php controller
//signup_view.php controller

class User extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session'));
		$this->load->database();
		$this->load->model('user_model');
	}
  function index(){
    //This is only called when user manually enter the url
    redirect("home");
  }

  function login(){
    if( $this->session->userdata('login') ){
			redirect("home");
		}
    $this->load->view('login_view');

		$previousurl = $this->input->get("previousurl");
		// get form input from the view
		$email = $this->input->post("lg_email");
		$password = $this->input->post("lg_password");

		// check for user credentials
		$result = $this->user_model->get_user($email, $password);
			if ($result && $email && $password) {
				// set session data if user exists
				$sess_data = array('login' => TRUE, 'fname' => $result[0]->first_name, 'lname' => $result[0]->last_name, 'customer_id' => $result[0]->customer_id);
				$this->session->set_userdata($sess_data);


				redirect("home"); //cannot resolve $previousurl, don't know why
			} else {
				$this->session->set_flashdata('lg_err', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
			}
	}


  function signup(){
    if( $this->session->userdata('login') ){
			redirect("home");
		}
    $this->load->view('signup_view');

    $fname = $this->input->post('reg_fname');
    $lname = $this->input->post('reg_lname');
    $email = $this->input->post('reg_email');
    $password = $this->input->post('reg_password');

    if($fname && $lname && $email && $password){
        //insert by passing an array to insert_user function
        $result = $this->user_model->insert_user(array('first_name' => $fname,'last_name' => $lname,'email' => $email,'password' => $password));
        if ($result) {
          $this->session->set_flashdata('reg_msg', '<div class="alert alert-success text-center">Registration Successful. Login to access your profile!</div>');
          $this->session->set_flashdata('reg_success', true);

          redirect("user/signup");
        } else {
          $this->session->set_flashdata('reg_msg', '<div class="alert alert-danger text-center">Error Registering. Try Again.</div>');
        }
    }
  }

  function forgotpassword(){
    if( $this->session->userdata('login') ){
			redirect("home");
		}
    $this->load->view('forgotpassword_view');
		$email = $this->input->post('fp_email');

		if($email){
			$this->session->set_flashdata('fp_msg', '<div class="alert alert-success text-center">Successful. Check your email.</div>');
			$this->session->set_flashdata('fp_success', true);
			redirect("user/forgotpassword");
		}
  }
}

?>
