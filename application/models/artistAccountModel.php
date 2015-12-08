<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ArtistAccountModel extends CI_Model {

	public function get_profile_info($id)
	{
		$query = "SELECT * FROM artists WHERE id = ?";
		 return $this->db->query($query, $id)->row_array();
	}

	public function update_profile_pic($id, $new_name)
	{
		$query = "UPDATE artists SET profile_pic_id = ? WHERE id = ?";
		return $this->db->query($query, [$new_name, $id]);
	}

	public function update_bio_about($id, $bio, $about_art) 
	{
		$query = "UPDATE artists SET bio = ? , about_art = ? WHERE id = ?";
		$values = [$bio, $about_art, $id];

		return $this->db->query($query, $values);
	}

	public function new_artwork($artist_id, $title, $new_name, $terms, $price, $description) 
	{
		$query = "INSERT INTO artworks (artist_id, title, image_name, about, price, terms, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
		$values = [$artist_id, $title, $new_name, $description, $price, $terms];
		
		return $this->db->query($query, $values);
	}

	public function get_artwork($id)
	{
		$query = "SELECT * FROM artworks WHERE artist_id = ?";
		return $this->db->query($query, $id)->result_array();
	}
	

	public function delete_artwork($artwork_id)
	{
		$query = "DELETE FROM artworks WHERE id = ?";
		return $this->db->query($query, $artwork_id);
	}

	public function edit_artwork($artwork_id)
	{
		$query = "SELECT * FROM artworks WHERE id = ?";
		return $this->db->query($query, $artwork_id)->row_array();
	}

	public function update_edited_artwork($artwork_id, $title, $terms, $price, $description)
	{
		$query = "UPDATE artworks SET title = ?, about = ?, price = ?, terms = ? WHERE id = ?";
		$values = [$title, $description, $price, $terms, $artwork_id];  
		return $this->db->query($query, $values);
	} 
}