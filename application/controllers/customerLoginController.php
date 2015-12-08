<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CustomerLoginController extends CI_Controller {
	
	public function index()
	{
		$this->load->view('customerLogin');
	}

	public function customer_login()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		if(strlen($email) && strlen($password)){
			$this->load->model("customer");
			$returnedVal = $this->customer->customer_login($email, $password);

			if($returnedVal){
				$this->session->set_userdata("currentUser", $returnedVal);
				redirect("mainController");
			}
			else{
				$this->session->set_flashdata("error", "Invalid Log In");
				redirect("CustomerLoginController");
			}
		}
		else{
			$this->session->set_flashdata("error", "Please enter Email and Password");
			redirect("CustomerLoginController");
		}
	}
	public function customer_register()
	{
		$this->load->library("form_validation");
		$this->load->model("customer");

		$this->form_validation->set_rules("first_name", "First Name", "trim|required|alpha");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required|alpha");
		$this->form_validation->set_rules("email", "Email Address", "trim|required|vaild_email|is_unique[customers.email]");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|matches[confirm_password]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required");

		if($this->form_validation->run()){
			$first_name = $this->input->post("first_name");
			$last_name = $this->input->post("last_name");
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			$this->session->set_flashdata("success", "Registration Successful!");
			$this->customer->customer_register($first_name, $last_name, $email, $password);
			redirect("CustomerLoginController");
		}
		else{
			$this->session->set_flashdata("reg_errors", array(validation_errors()));
			redirect("CustomerLoginController");
		}
	}
}