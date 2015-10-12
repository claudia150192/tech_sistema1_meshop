<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	public function login($data)
	{
		$query = $this->db->query("SELECT * FROM usuario where name='".$data['username']."' and clave='".$data['password']."'");
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $query->row_array();
		}
	}

}