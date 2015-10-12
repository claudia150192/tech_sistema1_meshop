<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class servicios extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_producto_all_bycondicion($producto,$categoria,$marca)
	{
		$this->load->model('mantenimiento/producto_model','pd');
		$result = $this->pd->get_producto_all_bycondicion($producto,$categoria,$marca);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_kardex_movimiento_all($tipo,$fechaI,$fechaF)
	{
		$this->load->model('kardex/kardex_model','pd');
		$result = $this->pd->get_kardex_movimiento_all($tipo,$fechaI,$fechaF);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

}