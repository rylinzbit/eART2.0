<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ArtistAccountController extends CI_Controller {
	
	public function index()
	{
		
		$currentUser = $this->session->userdata("currentUser");
		$id = $currentUser['id'];

		$this->load->model('artistAccountModel');

		$params = [
			"profile_info" => $this->artistAccountModel->get_profile_info($id),
			"artwork" => $this->artistAccountModel->get_artwork($id)
		];
		$this->load->helper('form');
		$this->load->view('artistAccount', $params);
	}

	public function upload_profile_pic()
	{
		$currentUser = $this->session->userdata('currentUser');
		$id = $currentUser['id'];
		$file_ext = strtolower(end(explode('.', $_FILES["userfile"]["name"])));
		$new_name = $id . substr(md5(time()), 0, 10) . '.' . $file_ext;

		$config = array(
			'upload_path' => 'assets/img/profile_pics/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'file_name' => $new_name,
			'max_size' => '1000',
			'max_width' => '2500',
			'max_height' => '2500',
			);
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload()){
			$this->session->set_flashdata("errors", $this->upload->display_errors());
			
			redirect('ArtistAccountController');
		}
		$this->load->model('artistAccountModel');
		$this->artistAccountModel->update_profile_pic($id, $new_name);
		redirect('ArtistAccountController');
	}

	public function update_bio_about()
	{
		$currentUser = $this->session->userdata("currentUser");
		$id = $currentUser['id'];

		$bio = $this->input->post('bio');
		$about_art = $this->input->post('about_art');

		$this->load->model('artistAccountModel');
		$this->artistAccountModel->update_bio_about($id, $bio, $about_art);
		redirect('ArtistAccountController');
	}

	public function upload_new_artwork()
	{
		$currentUser = $this->session->userdata("currentUser");
		$artist_id = $currentUser['id'];
		$this->load->library("form_validation");

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		$file_ext = strtolower(end(explode('.', $_FILES["userfile"]["name"])));
		$new_name = $artist_id . substr(md5(time()), 0, 10) . '.' . $file_ext;

		$config = array(
			'upload_path' => 'assets/img/',
			'allowed_types' => 'jpg|jpeg|png|gif',
			'file_name' => $new_name,
			'max_size' => '3000',
			'max_width' => '2500',
			'max_height' => '2500',
			);
		
		$this->load->library('upload', $config);

		if(!$this->form_validation->run() && !$this->upload->do_upload() || $this->form_validation->run() && !$this->upload->do_upload() || !$this->form_validation->run() && $this->upload->do_upload()){
			$this->session->set_flashdata("upload_errors", array(validation_errors()));
			$this->session->set_flashdata("image_errors", array($this->upload->display_errors()));
			redirect('artistAccountController');
		}
		else{
			$title = $this->input->post('title');
			$terms = $this->input->post('terms');
			$price = $this->input->post('price');
			$description = $this->input->post('description');

			$this->load->model('artistAccountModel');
			$this->artistAccountModel->new_artwork($artist_id, $title, $new_name, $terms, $price, $description);
			$this->session->set_flashdata("upload_success", "Upload Successful!");
			redirect('artistAccountController');
		}
	}

	public function delete_art()
	{
		$artwork_id = $this->input->post('artwork_id');

		$this->load->model('artistAccountModel');
		$this->artistAccountModel->delete_artwork($artwork_id);
		redirect('artistAccountController');
	}

	public function edit_page()
	{
		$artwork_id = $this->input->post('artwork_id');

		$this->load->model('artistAccountModel');
		$artwork_info = [
			'art' => $this->artistAccountModel->edit_artwork($artwork_id)
		];

		$this->load->view('accountEditArtwork', $artwork_info);
	}

	public function save_changes()
	{
		$this->load->model('artistAccountModel');
		$artwork_id = $this->input->post('artwork_id');
		$artwork_info = $this->artistAccountModel->edit_artwork($artwork_id);

		$title = $this->input->post('title');
		$terms = $this->input->post('terms');
		$price = $this->input->post('price');
		$description = $this->input->post('description');
		
		if(empty($title)){
			$title = $artwork_info['title'];
		}
		
		if(empty($price)){
			$price = $artwork_info['price'];
		}

		$this->artistAccountModel->update_edited_artwork($artwork_id, $title, $terms, $price, $description);
		$this->session->set_flashdata("edit", "Artwork successfully updated");
		redirect('artistAccountController');
	}
	
	public function log_off()
	{
			$this->session->unset_userdata('currentUser');
			$this->session->set_flashdata("logOff", "Log off successful!");
			redirect("artistLoginController");
	}
}