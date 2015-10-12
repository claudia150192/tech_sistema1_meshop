<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kardex_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	public function insert_bloque($data)
	{	
		$this->db->insert_batch('kardex', $data);		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}
		
	function get_kardex_movimiento_all($tipo,$fechaI,$fechaF){
		$add="";
    	if($tipo!="Todos"){
    		$add= "where tipooperacion ='".$tipo."'";
    	}
    	if($fechaI!=-1 && $fechaF!=-1){
    		if($add!=""){
    			$add= $add." and DATE(fecha) between '".$fechaI."' and '".$fechaF."'";
    		}else{
    			$add="where DATE(fecha) between '".$fechaI."' and '".$fechaF."'";
    		}
    	}

    	$query = $this->db->query("SELECT kardex.*, producto.nombre as producto_nombre, producto.descripcion as producto_descripcion FROM kardex inner join producto on kardex.producto=producto.nProCodigo ".$add." order by 3,7 ,6");
        return $query->result_array();
	}
	
}