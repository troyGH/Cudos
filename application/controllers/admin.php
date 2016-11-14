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

		//$this->data['posts'] = $this->adminModel->getPosts('admin_id');
		//$this->load->view('admin_view', $this->data);
//echo $this->session->userdata('admin_id');
		    	$result['posts'] = $this->adminModel->getPosts($this->session->userdata('admin_id'));
//print_r($result['posts']);
$this->load->view('admin_view', $result);
		    //$bData= explode('%7C',$adminID);
		//$arr['posts'] = $this->adminModel->getPosts($bData[0]);
    //$arr['id'] = urldecode($bData[0]);
        //$arr['name'] = urldecode($bData[1]);

    //$this->load->view('admin_view', $arr);


//$data['newEmployee'] = $this->adminModel->insertData($this->session->userdata('admin_id'));

//$this->db->insertData('employee', $data); 

//$this->load->view('admin_view', $data);

	    $empName = $this->input->post('employeeName');
    $empTitle = $this->input->post('employeeTitle');

        if($empName && $empTitle){
        //insert by passing an array to insert_user function
        $result = $this->adminModel->insertEmployee(array('first_name' => $fempName,'last_name' => NULL,'title' => $empTitle,'about_me' => NULL, 'img_url' => NULL));
        $this->load->view('admin_view', $result);
    }



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

				$sess_data = array('adminlogin' => TRUE, 'fname' => $result[0]->first_name, 'lname' => $result[0]->last_name, 'admin_id' => $result[0]->admin_id);
				$this->session->set_userdata($sess_data);


				redirect("admin"); 
			} else {
				$this->session->set_flashdata('lg_err', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
			}
	}




}
?>
