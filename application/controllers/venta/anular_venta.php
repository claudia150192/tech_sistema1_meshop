<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anular_venta extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_ventas_anuladas()
	{
		$this->load->model('venta/anular_venta_model','mod');
		$result = $this->mod->select_venta_anular();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function anular(){

		$this->load->model('venta/anular_venta_model','mod');
		$band=false;

		$id_venta = $this->input->post('id_venta');
		$data = array(
			'nVenCodigo' =>$id_venta,
			'descripcion' => "Venta Anulada",
			'nUsuCodigo' => 1
		);

		$band = $this->mod->anular_venta($id_venta,$data);
		if($band){
			$return = array("responseCode"=>200, "datos"=>"ok");
		}else{
			$return = array("responseCode"=>400, "datos"=>"bad");
		}

		$return = json_encode($return);
		echo $return;
	}


}