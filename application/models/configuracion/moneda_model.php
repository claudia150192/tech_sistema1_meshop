<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class moneda_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	
	function update($id,$imp){
		$this->db->where('idmoneda',$id);
		if ($this->db->update('moneda',$imp)){
			return true;
		}else{
			return false;
		}
	}
	
	function select_byFirstElement(){
		$query = $this->db->query("SELECT * FROM  moneda limit 0,1");
		return $query->row_array();
	}
	
}
