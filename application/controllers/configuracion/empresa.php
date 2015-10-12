<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class empresa extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function actualizar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('configuracion/empresa_model','mod');

			$id = $form["id_empresa"];
			$razonsocial = $form["razonsocial"];
			$ruc = $form["ruc"];
			$telefono = $form["telefono"];
			$direccion = $form["direccion"];
			$email = $form["email"];
			$representante = $form["representante"];

			$data = array(
				'RucEmpresa' =>$ruc,
				'RazonSocialEmpresa' =>$razonsocial,
				'TelefonoEmpresa'=>$telefono,
				'DireccionEmpresa' =>$direccion,
				'EmailEmpresa'=>$email,
				'RepresentanteEmpresa'=>$representante
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