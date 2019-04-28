<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

	public function Login($username){
		$this->db->select('pass');
		$this->db->where('dni', $username);
		$q = $this->db->get('md_user');
		return $q->row();
	}

}

/* End of file .php */
