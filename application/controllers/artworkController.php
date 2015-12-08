<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ArtworkController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ArtworkModel');
	}

	public function index() {
		$this->load->view('artworkPage');
	}

	public function artwork_show_info($artwork_id) {
		$data['artwork'] = $this->ArtworkModel->get_artwork_info($artwork_id);

		$this->load->model('Artist');	
		$data['artist'] = $this->Artist->get_artist_info($data['artwork']['artist_id']);

		$this->load->view('artworkPage', $data);
	}



} // ends class ArtworkController