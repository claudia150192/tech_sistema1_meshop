<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categoria_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function insert($data){
		
		if ($this->db->insert('categoria',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function delete($id){
		$data = array('estado' => '0');
		$this->db->where('nCatCodigo',$id);
		if ($this->db->update('categoria',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update($id,$data){
		$this->db->where('nCatCodigo',$id);
		if ($this->db->update('categoria',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function buscar_id($id){
		$this->db->select('descripcion');
		$this->db->from('categoria');
		$this->db->where('nCatCodigo',$id);
		$query = $this->db->get();
		$row = $query->row();
		return $row->descripcion;
	}
	
	function select_all_categoria(){
		$this->db->where('estado !=','0');
		$query = $this->db->get('categoria');
		return $query->result();
	}
	
}
