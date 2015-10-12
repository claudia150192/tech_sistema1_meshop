<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registrar_compra_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function insert($data){
		$this->db->insert('ordencompra',$data);
		$id = $this->db->insert_id();
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return $id;
		}
	}

	public function insertDetalle($data)
	{	
		$this->db->insert_batch('detalleordencompra', $data);		
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

	function get_compras_all(){
		/*$this->db->select('oc.CodigoOrdenCompra,oc.fecharegistro,oc.fechaemision,oc.montoTotal,oc.subTotal,oc.igvporcentaje,CONCAT( oc.serie ,"-", oc.numero ) as numero ,ct.descripcion as documento,pe.nombre,p.nombre as razonsocial ');
		$this->db->from('ordencompra oc');
		$this->db->join('proveedor p','p.nProvCodigo=oc.nProvCodigo');
		$this->db->join('personal pe','pe.nPerCodigo = pe.nPerCodigo');
		$this->db->join('constante ct','ct.int_constante_id = oc.tipodocumento');
		$this->db->where('oc.estado',1);
		$query = $this->db->get();*/
		$query = $this->db->query("SELECT `oc`.`CodigoOrdenCompra`, `oc`.`fecharegistro`, `oc`.`fechaemision`,`oc`.`montoTotal`, 
`oc`.`subTotal`, `oc`.`igvporcentaje`, CONCAT( oc.serie, '-', `oc`.`numero` ) as numero, `ct`.`descripcion` as documento, 
`pe`.`nombre`, `p`.`nombre` as razonsocial 
FROM (`ordencompra` oc) JOIN `proveedor` p 
ON `p`.`nProvCodigo`= `oc`.`nProvCodigo` JOIN `personal` pe 
ON `pe`.`nPerCodigo` = `oc`.`nPerCodigo` JOIN `constante` ct ON (`ct`.`valor` = `oc`.`tipodocumento`) and (`ct`.`clase`=5 )
WHERE `oc`.`estado` = 1 ORDER BY 2 DESC");
		return $query->result();
	}

}