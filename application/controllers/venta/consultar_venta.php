<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class consultar_venta extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_ventas_all($fecha,$anio,$mes,$tipo)
	{	
		$this->load->model('venta/consultar_venta_model','mod');
		$result = $this->mod->get_venta_all($fecha,$anio,$mes,$tipo);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_cuenta_ventas_all($fechaInicio,$fechaFin,$cliente){
		$this->load->model('venta/consultar_venta_model','mod');
		if($cliente==-1){
			$result = $this->mod->select_venta_estadocuenta($fechaInicio,$fechaFin);
		}else if($cliente!=-1 && $fechaInicio!="null" && $fechaFin!="null"){
			$result = $this->mod->select_venta_estadocuenta_byCliente_Fechas($fechaInicio,$fechaFin,$cliente);
		}else {
			$result = $this->mod->select_venta_estadocuenta_byCliente($cliente);
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_detalle_pago_byIdVenta($idventa){
		$this->load->model('venta/consultar_venta_model','mod');
		$result = $this->mod->get_detalle_pago_byIdVenta($idventa);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_ventas_facturadas($idventa)
	{
		$this->load->model('venta/registrar_venta_model','mod');
		$result = $this->mod->obtener_venta2($idventa);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


}