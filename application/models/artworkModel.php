<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ArtworkModel extends CI_Model {
	public function get_artwork_info($id) {
		$query = "SELECT id, artist_id, title, image_name, about, price, terms FROM artworks WHERE id=?";
		$values = ($id);
		return $this->db->query($query, $values)->row_array();
	}

} // End class mainModel

