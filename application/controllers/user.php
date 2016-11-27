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

	function profile($cID){
		$user =	$this->user_model->get_public_user_by_id($cID);
		$arr['user_info'] = $user[0];
		$reviews =	$this->user_model->get_user_reviews_by_id($cID);
		$arr['reviews'] =  $reviews;

		$this->load->view('profilehome_view', $arr);
	}


  function login(){
		if( $this->session->userdata('login')){
			redirect("home");
		}else if($this->session->userdata('adminlogin')){
			redirect("admin");
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
		if( $this->session->userdata('login')){
			redirect("home");
		}else if($this->session->userdata('adminlogin')){
			redirect("admin");
		}

	  $this->load->view('signup_view');

    $fname = $this->input->post('reg_fname');
    $lname = $this->input->post('reg_lname');
    $email = $this->input->post('reg_email');
		$zip = $this->input->post('reg_zip');
    $password = $this->input->post('reg_password');

		if(isset($zip)){
			$json = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($zip)); //http request, output is a json object
			$match = json_decode($json);//decode json object into a php variable

			if(empty($match->results)){
				$this->session->set_flashdata('reg_msg', '<div class="alert alert-danger text-center">Wrong Zip Code. Try Again.</div>');
				redirect("user/signup");
			}else{
				foreach($match->results[0]->address_components as $component){
					foreach($component->types as $type){
						if($type == 'locality'){
							$city = $component->long_name;
						}else if($type == 'administrative_area_level_1'){
						$state = $component->long_name;
					}else if($type == 'country'){
					$country = $component->long_name;
				}
			}
		}
	}
}
    if($fname && $lname && $email && $password && $zip && !empty($match->results)){
        //insert by passing an array to insert_user function
        $result = $this->user_model->insert_user(array('first_name' => $fname,'last_name' => $lname,'email' => $email,'password' => $password, 'city' => $city, 'state' => $state, 'country' => $country, 'img_url' => 'https://www.kirkleescollege.ac.uk/wp-content/uploads/2015/09/default-avatar.png'));
        if ($result) {
          $this->session->set_flashdata('reg_msg', '<div class="alert alert-success text-center">Registration Successful. <a href="http://localhost/Cudos/user/login">Login</a> to access your profile!</div>');
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
