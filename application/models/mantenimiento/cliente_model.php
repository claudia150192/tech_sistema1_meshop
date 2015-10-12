<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cliente_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function insert($data){
		if ($this->db->insert('cliente',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update($id,$cl){
		$this->db->where('nCliCodigo',$id);
		if ($this->db->update('cliente',$cl)){
			return true;
		}else{
			return false;
		}
	}
	
	function delete($id){
		$data = array('estado' => '0');
		$this->db->where('nCliCodigo',$id);
		if ($this->db->update('cliente',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	/*function buscar_id($id){
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->join('constante','constante.int_constante_valor=cliente.int_cliente_tipotelefono');
		$this->db->where('constante.int_constante_clase','1');
		$this->db->where('nCliCodigo',$id);
		$query = $this->db->get();
		return $query->result_array();
	}*/
	
	function select_all_cliente(){
		$query = $this->db->query("SELECT c.nCliCodigo as id, dni, ruc, IFNULL(nombre,'') as cliente,telefono,email,otros,direccion
			FROM cliente c where estado ='1' ORDER BY 4 asc");
		return $query->result();
	}
	
	/*function select_consultar_cliente(){
		$query = $this->db->query("SELECT c.nCliCodigo as ID, IFNULL(var_cliente_ruc,'') as RUC, IFNULL(var_cliente_dni,'') as DNI, IFNULL(var_cliente_nombre,'') as Cliente, IFNULL(var_constante_descripcion,'') as TipoTelefono, IFNULL(var_cliente_telefono,'') as Telefono, 
				IFNULL(var_cliente_direccion,'') as Direccion, IFNULL(var_cliente_email,'') as Email, IFNULL(var_cliente_otros,'') as Otros FROM cliente c  JOIN constante ct ON ct.int_constante_valor = c.int_cliente_tipotelefono and ct.int_constante_clase = 1 WHERE var_Cliente_Estado ='1' ORDER BY 3 asc");
		return $query->result();
	}*/
	
	
}
