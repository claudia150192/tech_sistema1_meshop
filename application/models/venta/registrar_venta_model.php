<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registrar_venta_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function insert($data){
		$this->db->insert('venta',$data);
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

	function insert_tipodocumento($data){
		$this->db->insert('tipodocumento',$data);
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

	public function insert_contado($data)
	{	
		$this->db->insert('contado', $data);
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function insert_credito($data)
	{	
		$this->db->insert('credito', $data);
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function insertDetalle($data)
	{	
		$this->db->insert_batch('transaccion', $data);		
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

	function insert_Cronogramapago($data)
	{	
		$this->db->insert_batch('cronogramapago', $data);		
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

	function pagar_cuota($pago_cuota,$idpago){
		
		$this->db->select('pagocuota,pagorecibido');
		$this->db->from('cronogramapago');
		$this->db->where('nCPagoCodigo',$idpago);
		$query = $this->db->get();
		$query = $query->row();
		$monto_cuota = $pago_cuota+$query->pagorecibido;

		if($monto_cuota>=$query->pagocuota){			
			return false;
		}else{

			$data = array(
				'pagorecibido' =>$monto_cuota
			);

			$this->db->where('nCPagoCodigo =',$idpago);
			$this->db->update('cronogramapago', $data);
			if ($this->db->trans_status() === FALSE)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		
	}

	function obtenerImpuestoVenta(){
		$this->db->select('nombre,porcentaje');
		$this->db->from('impuesto');
		$this->db->where('estado','1');
		$this->db->limit(1, 0);
		$query = $this->db->get();
		return $query->row();
	}

	function obtenerSerieNumeroDocumento($tipoDocumento){
		$query = $this->db->query("select (case when (t.`numero` = cfd.fincorrelativo) then convert( right(concat(cfd.inicioserie,(ifnull(t.`serie`,0) + 1)), cfd.ndigito_serie) using latin1) when (ifnull(t.`serie`,0) = 0) then cfd.serie else t.serie end) AS `seriea`, (case when (t.numero = cfd.fincorrelativo) then right(concat(t.numero + 2),cfd.ndigito_correlativo) else right(concat(cfd.iniciocorrelativo,(t.numero + 1)),cfd.ndigito_correlativo) end ) AS `numeroa`, t.descripcion AS `documento` 
			from `tipodocumento` as t , conf_documento as cfd 
			inner join constante c on c.clase = 5 and c.int_constante_id = cfd.tipo 
			where t.`descripcion` = c.descripcion and c.valor = ".$tipoDocumento." 
			order by t.serie, t.numero desc limit 0,1");
		return $query->row_array();
	}

	function obtener_venta($id_venta){
		$query = $this->db->query("select * from obtener_factura where nVenCodigo=".$id_venta." order by 1");

		return $query->result_array();
	}


	function obtener_moneda_local(){
		$query = $this->db->query("SELECT * FROM moneda limit 0,1");
		return $query->result_array();
	}

	function obtenermonedalocal(){
		$this->db->select('descripcion,signo');
		$this->db->from('moneda');
		$this->db->where('estado','V');
		$this->db->limit(1, 0);
		$query = $this->db->get();
		return $query->row();
	}

	function cabecera_venta($id_venta){
		$query = $this->db->query("select v.nVenCodigo, v.montoTotal, v.subTotal, v.impuestoporcentaje,c.descripcion as tipopago
,v.fecregistro as fechaemision,p.nombre as vendedor,t.descripcion,
t.serie, t.numero, e.RazonSocialEmpresa, e.DireccionEmpresa, e.EmailEmpresa, e.RucEmpresa, e.TelefonoEmpresa,
(case when v.nCliCodigo = 0 then t.cliente
	 when v.nCliCodigo <> 0 then (select nombre from cliente c where c.nCliCodigo = v.nCliCodigo)
end ) as cliente,(case when nCliCodigo = 0 then t.direccion
	 when nCliCodigo <> 0 then (select direccion from cliente c where c.nCliCodigo = v.nCliCodigo)
end ) as direccion_cliente,(case when nCliCodigo = 0 then t.documento
	 when nCliCodigo <> 0 then (select IF(STRCMP(c.ruc,''),CONCAT('Dni: ',c.dni),CONCAT('Ruc: ',c.ruc)) from cliente c where c.nCliCodigo = v.nCliCodigo)
end ) as documento_cliente from empresa as e, venta as v 
inner join personal p on p.nPerCodigo = v.nPerCodigo inner join tipodocumento t on t.nTipDocumento = v.nTipDocumento
inner join constante c on c.clase = 3 and c.valor = v.formapago where v.nVenCodigo=".$id_venta." order by 1");
		return $query->row_array();
	}

	function detalle_venta($id_venta){
		$query = $this->db->query("select v.nVenCodigo,pd.nombre,tr.cantidad,tr.preciounitario,tr.importe
from venta as v inner join personal p on p.nPerCodigo = v.nPerCodigo inner join tipodocumento t on t.nTipDocumento = v.nTipDocumento
inner join constante c on c.clase = 3 and c.valor = v.formapago inner join transaccion tr on tr.nVenCodigo = v.nVenCodigo
inner join producto pd on pd.nProCodigo = tr.nProCodigo where v.nVenCodigo=".$id_venta." order by 1");
		return $query->result_array();
	}


}