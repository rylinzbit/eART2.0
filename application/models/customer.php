<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Model {

	public function customer_login($email, $password) 
	{

		$query = "SELECT * FROM customers WHERE email = ? AND password = ?";

		$this->db->query($query, [$email, md5($password)])->row_array();
	}

	public function customer_register($first_name, $last_name, $email, $password) 
	{

		$md5 = md5($password);

		$query = "INSERT INTO customers (first_name, last_name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, NOW(), NOW())";

		$value = [$first_name, $last_name, $email, $md5];

		return $this->db->query($query, $value);
	}

}
