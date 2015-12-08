<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MainModel extends CI_Model {
	public function get_art($id=0) {
		$query = "SELECT * FROM artworks";
		if($id>0) {
			$query .= " WHERE artist_id=".$id;
		}
		return $this->db->query($query)->result_array();
	}

} // End class mainModel

