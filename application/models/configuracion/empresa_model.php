<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class empresa_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	
	function update($id,$emp){
		$this->db->where('CodigoEmpresa',$id);
		if ($this->db->update('empresa',$emp)){
			return true;
		}else{
			return false;
		}
	}
	
	function select_byFirstElement(){
		$query = $this->db->query("SELECT * FROM empresa limit 0,1");
		return $query->row_array();
	}
	
}
