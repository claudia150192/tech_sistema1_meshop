<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class constante_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function insert($desc){
		
		$query = $this->db->query("SELECT (max(valor)+1) as valor FROM constante where clase=2");

		$data = array(
			'descripcion' =>$desc,
			'clase' => '2',
			'valor' => $query->row_array()['valor']
		);

		if ($this->db->insert('constante',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update($id,$data){
		$this->db->where('int_constante_id',$id);
		if ($this->db->update('constante',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function select_constante($clase){
		$this->db->where("valor !=",'0');
		$this->db->where("clase",$clase);
		$query = $this->db->get('constante');
		return $query->result();
	}
	
}