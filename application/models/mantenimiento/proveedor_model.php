<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proveedor_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function insert($pv){
		if ($this->db->insert('proveedor',$pv)){
			return true;
		}else{
			return false;
		}
	}
	
	function update($id,$data){
		$this->db->where('nProvCodigo',$id);
		if ($this->db->update('proveedor',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function delete($id){

		$data = array('estado' => '0');
		$this->db->where('nProvCodigo',$id);
		if ($this->db->update('proveedor',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function select_all_proveedor(){
		$this->db->where('estado !=','0');
		$query = $this->db->get('proveedor');
		return $query->result();
	}
}
