<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProfileModel extends CI_Model {

	public function artist_login($email, $password)
	{
		$query = "SELECT * FROM artists WHERE email = ? AND password = ?";
		$this->db->query($query, [$email, md5($password)])->row_array();
	}

	public function artist_register($first_name, $last_name, $email, $password)
	{
		$md5 = md5($password);
		$query = "INSERT INTO artists (first_name, last_name, email, password, created_at, updated_at)";
		$value = [$first_name, $last_name, $email, $password];
		return $this->db->query($query, $value);
	}

	public function get_artist_info($id) {
		$query = "SELECT id, first_name, last_name, email, bio, about_art, profile_pic_id FROM artists WHERE id=?";
		$values = ($id);
		return $this->db->query($query, $values)->row_array();
	}

	public function get_artwork_info($id) {
		$query = "SELECT * FROM artworks";
		if($id>0) {
			$query .= " WHERE artist_id=".$id;
		}
		return $this->db->query($query)->result_array();
	}
}