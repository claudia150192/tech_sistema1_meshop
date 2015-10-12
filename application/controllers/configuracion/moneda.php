<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class moneda extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}


	public function actualizar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('configuracion/moneda_model','mod');
             
            $id = $form["idmoneda"];
			$descripcion = $form["descripcion"];
			$signo = $form["signo"];
			$valor_vigente = $form["valor_vigente"];
			
			$data = array(
				'descripcion' =>$descripcion,
				'signo'=>$signo,
				'valor_vigente'=>$valor_vigente
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