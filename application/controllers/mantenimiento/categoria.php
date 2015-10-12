<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categoria extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/categoria_model','mod');

			$descripcion = $form["descripcion"];

			$data = array(
				'descripcion' =>$descripcion
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

			$this->load->model('mantenimiento/categoria_model','mod');

			$descripcion = $form["descripcion_edit"];
			
			$id_categoria = $form["id_categoria"];
			$data = array(
				'descripcion' =>$descripcion
			);	

			if($this->mod->update($id_categoria,$data)){
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

			$this->load->model('mantenimiento/categoria_model','mod');

			$id_categoria = $form["id_categoria"];

			if($this->mod->delete($id_categoria)){
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

	public function get_categorias_all()
	{
		$this->load->model('mantenimiento/categoria_model','ca');
		$result = $this->ca->select_all_categoria();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

}