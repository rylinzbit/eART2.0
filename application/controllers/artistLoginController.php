<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ArtistLoginController extends CI_Controller {
	
	public function index()
	{
		$this->load->view('artistLogin');
	}

	public function artist_login()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		if(strlen($email) && strlen($password)){
			$this->load->model("artist");
			$returnedVal = $this->artist->artist_login($email, $password);

			if($returnedVal){
				$this->session->set_userdata("currentUser", $returnedVal);
				redirect("artistAccountController");
			}
			else{
				$this->session->set_flashdata("error", "Invalid Log In");
				redirect("ArtistLoginController");
			}
		}
		else{
			$this->session->set_flashdata("error", "Please enter Email and Password");
			redirect("ArtistLoginController");
		}
	}

	public function artist_register()
	{
		$this->load->library("form_validation");
		$this->load->model("artist");

		$this->form_validation->set_rules("first_name", "First Name", "trim|required|alpha");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required|alpha");
		$this->form_validation->set_rules("email", "Email Address", "trim|required|vaild_email|is_unique[artists.email]");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|matches[confirm_password]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "trim|required");

		if($this->form_validation->run()){
			$first_name = $this->input->post("first_name");
			$last_name = $this->input->post("last_name");
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			$this->session->set_flashdata("success", "Registration Successful!");
			$this->artist->artist_register($first_name, $last_name, $email, $password);
			redirect("ArtistLoginController");
		}
		else{
			$this->session->set_flashdata("reg_errors", array(validation_errors()));
			redirect("ArtistLoginController");
		}
	}
}