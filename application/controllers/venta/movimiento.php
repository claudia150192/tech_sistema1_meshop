<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class movimiento extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('venta/movimiento_model','mod');

			$descripcion = $form["descripcion"];
			$monto = $form["monto"];
			$cboMedioPago = $form["cboMedioPago"];
			$cboTipoIngreso = $form["cboTipoIngreso"];

			$data = array(
				'descripcion' =>$descripcion,
				'monto' => $monto,
				'medioPago' => $cboMedioPago,
				'tipoOperacion' => $cboTipoIngreso,
				'local'=>1
			);	

			$tipo=0;
			if($cboTipoIngreso==2){
				$tipo=1;
			}else{
				$tipo=2;
			}
			//actualizando caja
			$this->load->model('configuracion/cajachica_model','cmod');
			if(!$this->cmod->update(1,$monto,$tipo)){
					$band=false;
			}

			if($this->mod->insert($data)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			};
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	}

	public function actualizar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('venta/movimiento_model','mod');

			$idmovimiento = $form["idmovimiento"];
			$descripcion = $form["descripcion"];
			$monto = $form["monto"];
			$cboMedioPago = $form["cboMedioPago"];
			$cboTipoIngreso = $form["cboTipoIngreso"];

			$data = array(
				'descripcion' =>$descripcion,
				'monto' => $monto,
				'medioPago' => $cboMedioPago,
				'tipoOperacion' => $cboTipoIngreso,
				'local'=>1
			);

			if($this->mod->update($data,$idmovimiento)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			};
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	}

	function eliminar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('venta/movimiento_model','mod');

			$id_movimiento = $form["id_movimiento"];

			if($this->mod->delete($id_movimiento)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			};
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	}

	public function get_constante_formapago()
	{
		$this->load->model('mantenimiento/constante_model','c');
		$result = $this->c->select_constante(6);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_constante_tipoOperacion()
	{
		$this->load->model('mantenimiento/constante_model','c');
		$result = $this->c->select_constante(7);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_select_all(){
		$this->load->model('venta/movimiento_model','vm');
		$result = $this->vm->get_select_all();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}
	
}