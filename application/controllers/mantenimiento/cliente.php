<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cliente extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/cliente_model','mod');

			$ruc = $form["ruc"];
			$dni = $form["dni"];
			$apename = $form["apename"];
			$telefono = $form["telefono"];
			$direccion = $form["direccion"];
			$email = $form["email"];
			$otros = $form["otros"];

			$data = array(
				'ruc' =>$ruc,
				'dni' =>$dni,
				'nombre' =>$apename,
				'direccion' =>$direccion,
				'email'=>$email,
				'otros'=>$otros,
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

			$this->load->model('mantenimiento/cliente_model','mod');

			$id_cliente = $form["id_cliente"];
			$ruc = $form["ruc"];
			$dni = $form["dni"];
			$apename = $form["apename"];
			$telefono = $form["telefono"];
			$direccion = $form["direccion"];
			$email = $form["email"];
			$otros = $form["otros"];

			$data = array(
				'ruc' =>$ruc,
				'dni' =>$dni,
				'nombre' =>$apename,
				'direccion' =>$direccion,
				'email'=>$email,
				'otros'=>$otros,
				'estado'=>'1',
				'tipotelefono'=>0,
				'telefono'=>$telefono
			);	

			if($this->mod->update($id_cliente,$data)){
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

			$this->load->model('mantenimiento/cliente_model','mod');

			$id_cliente = $form["id_cliente"];

			if($this->mod->delete($id_cliente)){
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

	public function get_cliente_all()
	{
		$this->load->model('mantenimiento/cliente_model','cl');
		$result = $this->cl->select_all_cliente();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

}