<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfileController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ProfileModel');
	}
	
	public function index()
	{
		$this->load->view('profileView');
	}

	public function artist_show_info($artist_id) {
		$data['artist'] = $this->ProfileModel->get_artist_info($artist_id);
		$data['artworks'] = $this->ProfileModel->get_artwork_info($artist_id);
		$this->load->view('profileView', $data);
	}
}