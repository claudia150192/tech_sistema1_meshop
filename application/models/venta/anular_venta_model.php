<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anular_venta_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function select_venta_anular(){
		$this->db->select('venta.nVenCodigo,cliente.nombre as cliente,personal.nombre as personal,DATE(venta.fecregistro) as fecregistro,venta.montoTotal,tipodocumento.serie,tipodocumento.numero,tipodocumento.descripcion as desc_documento,venta.estado as idEstado,ct1.descripcion as desc_estado,ct.descripcion as desc_formapago, u.name as usuario');
		$this->db->from('venta');
		$this->db->join('cliente','cliente.nCliCodigo=venta.nCliCodigo');
		$this->db->join('tipodocumento','tipodocumento.nTipDocumento=venta.nTipDocumento');
		$this->db->join('personal','personal.nPerCodigo=venta.nPerCodigo');
		$this->db->join('constante ct','ct.valor=venta.formaPago');
		$this->db->join('constante ct1','ct1.valor=venta.estado');
		$this->db->join('venta_anular va','va.nVenCodigo = venta.nVenCodigo');
		$this->db->join('usuario u','u.nUsuCodigo = va.nUsuCodigo');
		$this->db->where('ct.clase',3);
		$this->db->where('ct1.clase',4);
		$query = $this->db->get();
		return $query->result();
	}

	function anular_venta($idventa,$data){
		
		$this->db->trans_begin();

        $data_actualizar = array('estado' =>'2');
		$this->db->where('nVenCodigo',$idventa);
		$this->db->update('venta',$data_actualizar);

		$this->db->insert('venta_anular',$data);
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

}