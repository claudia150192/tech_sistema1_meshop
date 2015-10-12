<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class consultar_venta_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_venta_all($fecha,$anio,$mes,$tipo){

		if($fecha!=null){
			$add = "and DATE(v.fecregistro)='".$fecha."'".($tipo!=3?" and v.formapago=".$tipo:"");
		}
		if($anio!=0 && $mes!=0){
			$add = "and YEAR(v.fecregistro)=".$anio." and MONTH(v.fecregistro)=".$mes.($tipo!=3?" and v.formapago=".$tipo:"");
		}elseif($anio!=0){
			$add = "and YEAR(v.fecregistro)=".$anio.($tipo!=3?" and v.formapago=".$tipo:"");
		}
		
		$query = $this->db->query("select v.nVenCodigo,v.montoTotal,YEAR(v.fecregistro) as anio,MONTH(v.fecregistro) as mes,v.fecregistro as fechaemision,v.formapago,c.descripcion as tipopago,t.descripcion,concat(t.serie,' - ',t.numero) as numero,p.nombre as vendedor,(case when v.nCliCodigo = 0 then t.cliente when v.nCliCodigo <> 0 then (select nombre from cliente c where c.nCliCodigo = v.nCliCodigo) end ) as cliente, v.estado from  venta as v 
			inner join personal p on p.nPerCodigo = v.nPerCodigo  inner join tipodocumento t on t.nTipDocumento = v.nTipDocumento inner join constante c on c.clase = 3 and c.valor = v.formapago where v.estado <> 2  ".$add." order by 1");
		return $query->result_array();
	}

	function select_venta_estadocuenta($fecInicio,$fecFin){
		$this->db->select('*');
		$this->db->from('v_consulta_estadocuenta_venta v');
		$this->db->where('v.fechaemision >= ',$fecInicio);
		$this->db->where('v.fechaemision <= ',$fecFin);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function select_venta_estadocuenta_byCliente_Fechas($fecInicio,$fecFin,$cliente){
		$this->db->select('*');
		$this->db->from('v_consulta_estadocuenta_venta v');
		$this->db->where('v.fechaemision >= ',$fecInicio);
		$this->db->where('v.fechaemision <= ',$fecFin);
		$this->db->where('v.Cliente_Id',$cliente);
		$query = $this->db->get();
		return $query->result_array();
	}

	function select_venta_estadocuenta_byCliente($cliente){
		$this->db->select('*');
		$this->db->from('v_consulta_estadocuenta_venta v');
		$this->db->where('v.Cliente_Id',$cliente);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_ventas(){
		$this->db->where('estado !=','2');
		$this->db->where('formapago =','1');
		$this->db->from('venta');
		return $this->db->count_all_results();
	}

	function count_credito(){
		$this->db->where('estado !=','2');
			$this->db->where('formapago =','2');
		$this->db->from('venta');
		return $this->db->count_all_results();
	}

	function get_detalle_pago_byIdVenta($id_venta){
		$this->db->where('nVenCodigo =',$id_venta);
		$this->db->from('cronogramapago');
		$query = $this->db->get();
		return $query->result_array();
	}



	function get_total_contado(){
		$query = $this->db->query("SELECT ifnull(sum(montototal),0) as totalcontado FROM venta where estado!=2 and formapago=1 and MONTH(fecregistro)=MONTH(now()) and YEAR(fecregistro)=YEAR(now())");
		return $query->row_array();
	}

	function get_total_credito(){
		$query = $this->db->query("SELECT ifnull(sum(montototal),0) as totalcredito FROM venta where estado!=2 and formapago=2 and MONTH(fecregistro)=MONTH(now()) and YEAR(fecregistro)=YEAR(now())");
		return $query->row_array();
	}

}