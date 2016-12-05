<?php
//login_view.php controller
//forgotpassword_view.php controller
//signup_view.php controller

class User extends CI_Controller {
	// constructor used for needed initialization
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form','url','html', 'date'));
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
		if( $this->session->userdata('adminlogin')){
			$this->load->view('profilehome_adminview', $arr);
		}else{
			$this->load->view('profilehome_view', $arr);
		}
	}


  function login(){
		if( $this->session->userdata('login')){
			redirect("home");
		}else if($this->session->userdata('adminlogin')){
			redirect("admin");
		}
    $this->load->view('login_view');

	//	$previousurl = $this->input->get("previousurl");
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
			} else if(empty($result) && $email && $password){
				$this->session->set_flashdata('lg_err', '<div class="alert alert-danger text-center alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-warning-sign"></span> <strong> Error! </strong> Wrong Email or Password!</div>');
				redirect("user/login");
			}
	}


  function signup(){
		if( $this->session->userdata('login')){
			redirect("home");
		}else if($this->session->userdata('adminlogin')){
			redirect("admin");
		}

	  $this->load->view('login_view');

    $fname = $this->input->post('reg_fname');
    $lname = $this->input->post('reg_lname');
    $email = $this->input->post('reg_email');
		$zip = $this->input->post('reg_zip');
    $password = $this->input->post('reg_password');

		if(isset($zip)){
			$json = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($zip)); //http request, output is a json object
			$match = json_decode($json);//decode json object into a php variable

			if(empty($match->results)){
				$this->session->set_flashdata('reg_msg', '<div class="alert alert-danger text-center alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-warning-sign"></span> <strong> Error! </strong> Wrong Zip Code, Try again!</div>');
				redirect("user/login");
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
			$datestring = '%Y-%m-%d';
			$time = time();
        //insert by passing an array to insert_user function
        $result = $this->user_model->insert_user(array('first_name' => $fname,'last_name' => $lname,'email' => $email,'password' => $password, 'signup_date' => mdate($datestring, $time),
				'city' => $city, 'state' => $state, 'country' => $country, 'img_url' => 'https://www.kirkleescollege.ac.uk/wp-content/uploads/2015/09/default-avatar.png'));
        if ($result) {
          $this->session->set_flashdata('reg_msg', '<div class="alert alert-success text-center alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<span class="glyphicon glyphicon-ok"></span> <strong> Success! </strong>Now you can login!</div>');
          $this->session->set_flashdata('reg_success', true);

          redirect("user/login");
        } else {
          $this->session->set_flashdata('reg_msg', '<div class="alert alert-danger text-center alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<span class="glyphicon glyphicon-warning-sign"></span> <strong> Error! </strong> Try registering again!</div>');
        }
    }
  }

}

?>
