<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cajachica extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function actualizar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('configuracion/cajachica_model','mod');

			$montoinicial = $form["montoinicial"];

			$data = array(
				'idcajachica' =>1,
				'montoinicial' =>$montoinicial,
				'montoutilizado'=>0.0,
				'saldo'=>0.0,
				'fecharegistro'=>date("Y-m-d H:i:s"),
			);	

			if($this->mod->update_caja(1,$data)){
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