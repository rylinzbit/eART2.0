<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	
	public function index()
	{
		$this->load->view('cartView');
	}
	public function stripe_pay()
	{
		$this->load->library('form_validation');
		$this->load->model('cartModel');

		$this->form_validation->set_rules("first_name", "First Name", "trim|required|alpha");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required|alpha");
		$this->form_validation->set_rules("email", "Email Address", "trim|required|vaild_email|is_unique[artists.email]");
		$this->form_validation->set_rules("address", "Address", "trim|required|");
		$this->form_validation->set_rules("city", "City", "trim|required|");
		$this->form_validation->set_rules("state", "State", "trim|required|");
		$this->form_validation->set_rules("zip", "Zip", "trim|required|");

	
		if($this->form_validation->run()){

			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$address = $this->input->post('address');
			$address2 = $this->input->post('address2');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$zip = $this->input->post('zip');

			$this->cartModel->billingInfo($first_name, $last_name, $email, $address, $address2, $city, $state, $zip);
			redirect('paymentController');
	
		}
		else {
			$this->session->set_flashdata('billingError', array(validation_errors()));
		}

	}
}