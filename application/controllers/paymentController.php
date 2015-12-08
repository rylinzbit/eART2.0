<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentController extends CI_Controller {

	public function index()
	{
		$this->load->view('payment');
	}
	public function submit()
	{
		$this->load->view('submit');
	}	
	public function landing()
	{
		$this->load->view('landing');
	}
	public function main()
	{
		$this->load->view('main_content');
	}
}