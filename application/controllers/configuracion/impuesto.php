<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class impuesto extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function actualizar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('configuracion/impuesto_model','mod');
           
			$id = $form["id_impuesto"];
			$nombre = $form["nombre"];
			$porcentaje = $form["porcentaje"];
			$estado= isset($form["estado"]);
 
           
			$data = array(
				'nombre' =>$nombre,
				'porcentaje'=>$porcentaje,
				'estado'=>$estado
			);	

			if($this->mod->update($id,$data)){
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