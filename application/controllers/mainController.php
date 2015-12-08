<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('MainModel');
	}

	public function index() {
		$this->load->view('main_ajax_test');
	}

	public function artwork_json() {
		$this->MainModel->getAllArt();
	}

	public function artwork_html($id=0) {
		$data["artworks"] = $this->MainModel->get_art($id);
		$this->load->view("partials/artworksPartial", $data);
	}	
} //ends class MainController