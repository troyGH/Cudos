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
			$fname = $this->input->post("fname");
			$lname = $this->input->post("lname");
			$email = $this->input->post("email");
			$city = $this->input->post("city");
			$state = $this->input->post("state");
			$country = $this->input->post("country");
			$about = $this->input->post("about");
			$img= $this->input->post("img");
			$password = $this->input->post("password");

			if($fname && $lname && $email && $city && $state && $country && $password && $about){
				$data = array(
        'first_name' => $fname,
        'last_name' => $lname,
        'email' => $email,
				'city' => $city,
				'state' => $state,
				'country' => $country,
				'about_me' => $about,
				'img_url' => $img,
				'password' => $password
			);
				$this->user_model->update_user($this->session->userdata('customer_id'), $data);
				$result = $this->user_model->get_public_user_by_id($this->session->userdata('customer_id'));
				$arr['user_data'] = $result[0];
				$this->session->set_flashdata('edit_msg', '<div class="alert alert-success text-center alert-info">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<span class="glyphicon glyphicon-ok"></span> <strong> Success!</strong> Profile Editted!</div>');
				$this->load->view('editprofile_view', $arr);

			}else{
				$result = $this->user_model->get_public_user_by_id($this->session->userdata('customer_id'));
				$arr['user_data'] = $result[0];
				$this->load->view('editprofile_view', $arr);
			}
	}else{
		redirect("home");
		}
	}
	
	function delete(){
		if($this->session->userdata('login')){
			$this->user_model->delete_user($this->session->userdata('customer_id'));
			$this->session->sess_destroy();
			redirect("home");
		}else{
			redirect("home");
		}
	}

}
?>
