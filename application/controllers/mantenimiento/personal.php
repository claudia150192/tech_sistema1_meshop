<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class personal extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/personal_model','mod');

			$dni = $form["dni"];
			$apename = $form["apename"];
			$telefono = $form["telefono"];
			$direccion = $form["direccion"];

			$data = array(
				'dni' =>$dni,
				'nombre' =>$apename,
				'direccion' =>$direccion,
				'estado'=>'1',
				'tipotelefono'=>0,
				'telefono'=>$telefono
			);

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

			$this->load->model('mantenimiento/personal_model','mod');

			$id_persona = $form["id_persona"];
			$dni = $form["dni"];
			$apename = $form["apename"];
			$telefono = $form["telefono"];
			$direccion = $form["direccion"];

			$data = array(
				'dni' =>$dni,
				'nombre' =>$apename,
				'direccion' =>$direccion,
				'telefono'=>$telefono
			);	

			if($this->mod->update($id_persona,$data)){
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

			$this->load->model('mantenimiento/personal_model','mod');

			$id_persona = $form["id_persona"];

			if($this->mod->delete($id_persona)){
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

	public function get_personal_all()
	{
		$this->load->model('mantenimiento/personal_model','p');
		$result = $this->p->select_all_personal();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

}