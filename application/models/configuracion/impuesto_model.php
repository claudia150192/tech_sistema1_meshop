<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class impuesto_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	
	function update($id,$imp){
		$this->db->where('idimpuesto',$id);
		if ($this->db->update('impuesto',$imp)){
			return true;
		}else{
			return false;
		}
	}
	
	function select_byFirstElement(){
		$query = $this->db->query("SELECT * FROM impuesto limit 0,1");
		return $query->row_array();
	}
	
}
