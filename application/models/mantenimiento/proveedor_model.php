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

	function insert_marca($pv){
		if ($this->db->insert('constante',$pv)){
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
	

	function update_marca($id,$data){
		$this->db->where('int_constante_id',$id);
		if ($this->db->update('constante',$data)){
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

	function delete_marca($id){
		$this->db->where('int_constante_id',$id);
		$this->db->where('clase',9);
		if ($this->db->delete('constante')){
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

	function select_all_marca($id_prod){
		$this->db->select('int_constante_id,descripcion');
		$this->db->from('constante');
		$this->db->where('clase','9');
		$this->db->where('valor',$id_prod);
	
		$query = $this->db->get();
		return $query->result();
	}
}
