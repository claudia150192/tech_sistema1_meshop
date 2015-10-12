<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class unidades extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/constante_model','mod');

			$descripcion = $form["descripcion"];

			if($this->mod->insert($descripcion)){
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

			$this->load->model('mantenimiento/constante_model','mod');

			$descripcion = $form["descripcion_edit"];
			
			$int_constante_id = $form["int_constante_id"];
			$data = array(
				'descripcion' =>$descripcion
			);	

			if($this->mod->update($int_constante_id,$data)){
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

}
