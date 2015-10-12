<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class personal_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function insert($pe){
		if ($this->db->insert('personal',$pe)){
			return true;
		}else{
			return false;
		}
	}
	
	function update($id,$data){
		$this->db->where('nPerCodigo',$id);
		if ($this->db->update('personal',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function delete($id){
		$data = array('estado' => '0');
		$this->db->where('nPerCodigo',$id);
		if ($this->db->update('personal',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function buscar_id($id){
		$this->db->select('*');
		$this->db->from('personal');
		$this->db->join('constante','constante.int_constante_valor=personal.int_personal_tipotelefono');
		$this->db->where('constante.int_constante_clase','1');
		$this->db->where('nPerCodigo',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
		
	function select_all_personal(){
		$this->db->where("estado !=",'0');
		$query = $this->db->get('personal');
		return $query->result();
	}
	
	
}