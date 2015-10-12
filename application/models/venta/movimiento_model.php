<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class movimiento_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function insert($data){
		if ($this->db->insert('movimiento',$data)){
			return true;
		}else{
			return false;
		}
	}

	function upload($data,$id){
		$this->db->where('int_Movimiento_id', $id);
		if ($this->db->upload('movimiento',$data)){
			return true;
		}else{
			return false;
		}
	}

	function reporte_cuadre_caja($fecha){
		$consulta="SELECT IFNULL(DATE(v.fecregistro),'') FecReg, v.local as id_local, v.formaPago as FormaPago, IFNULL((CASE WHEN (v.formaPago=1) THEN SUM(IFNULL(v.montoTotal,0.00)) END ),0.00) as Ref_Contado, IFNULL((CASE WHEN (v.formaPago=2) THEN SUM(IFNULL(v.montoTotal,0.00)) END ),0.00) as Ref_Credito, 0.00 as Monto, (select IFNULL(SUM(IFNULL(cp.pagorecibido,0.00)),0.00) from cronogramapago cp where cp.nVenCodigo = v.nVenCodigo) as CobroCuota, 1 as Tipo FROM venta v where DATE (v.fecregistro) = '".$fecha."' group by v.fecregistro,v.formaPago UNION ALL ( select  IFNULL(DATE(mov.fechaRegistro),'') as FecReg, 
			mov.local as id_local, 0.00 as Ref_Contado,0.00 as Ref_Credito,0 as FormaPago, IFNULL(SUM(mov.monto),0.00) as Monto, 0.00 as CobroCuota,mov.tipoOperacion as Tipo 
			from movimiento mov where DATE (mov.fechaRegistro) = ".$fecha." group by mov.tipoOperacion )";
		$query = $this->db->query($consulta);
		return $query->result();
	}

	function get_select_all(){
		$consulta="select m.*,c.descripcion as desc_mediopago,c1.descripcion as desc_tipooperacion 
		from movimiento m inner join constante c on c.valor = m.medioPago and c.clase=6 
		inner join constante c1 on c1.valor = m.tipoOperacion and c1.clase=7 order by 1 desc, 4 asc";
		$query = $this->db->query($consulta);
		return $query->result();
	}

	function get_total_caja(){
		$query = $this->db->query("SELECT IFNULL(sum(case tipoOperacion when 1 then (monto*-1) else monto end),0) as totalcaja FROM movimiento");
		return $query->row_array();
	}


	
	function delete($id){
		$this->db->where('int_Movimiento_id', $id);
		if ($this->db->delete('movimiento')){
			return true;
		}else{
			return false;
		}
	}

}
