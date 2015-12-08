<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CartModel extends CI_Model {

	public function billingInfo($first_name, $last_name, $email, $address, $address2, $city, $state, $zip)
	{
		$query = "INSERT INTO billing_info (first_name, last_name, email, address, address2, city, state, zip, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?, NOW(), NOW())";

		$value = [$first_name, $last_name, $email, $address, $address2, $city, $state,$zip];

		$this->db->query($query, $value);
	}

}