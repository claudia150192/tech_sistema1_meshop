<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/usuario_model','mod');

			$id_persona = $form["cboPersona"];
			$id_cargo = $form["cboCargo"];
			$name_usuario = $form["name_usuario"];
			$clave = sha1($form["clave_usuario"]);

			$data = array(
				'name' =>$name_usuario,
				'nPerCodigo' =>$id_persona,
				'cargo' =>$id_cargo,
				'clave' => $clave,
				'estado' => 1
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

			$this->load->model('mantenimiento/usuario_model','mod');

			$id_usuario = $form["id_usuario"];
			$id_persona = $form["cboPersona"];
			$id_cargo = $form["cboCargo"];
			$name_usuario = $form["name_usuario"];

			if(isset($form["clave_usuario"])){
				$clave = sha1($form["clave_usuario"]);
				$data = array(
					'name' =>$name_usuario,
					'nPerCodigo' =>$id_persona,
					'cargo' =>$id_cargo,
					'clave' => $clave
				);	
			}else{
				$clave = "";
				$data = array(
					'name' =>$name_usuario,
					'nPerCodigo' =>$id_persona,
					'cargo' =>$id_cargo
				);
			}

			if($this->mod->update($id_usuario,$data)){
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

			$this->load->model('mantenimiento/usuario_model','mod');

			$id_usuario = $form["id_usuario"];

			if($this->mod->delete($id_usuario)){
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

	public function actualizar_perfil(){
		$form = $this->input->post('formulario');

		if ($form!=null){

			$this->load->model('mantenimiento/usuario_model','mod');

			$lista = $form['datos'];
			$usuario = $form['usuario'];

			if ($lista!=null){			
				$listaa = array();
				foreach($lista as $key => $row){
					$list_ind = array(
						'Usuario' => intval($usuario),
						'Opcion' => intval($row["nOpcion"]),
						'estado' => $row["estado"]
					);
					array_push($listaa,$list_ind);
				}

				$this->mod->update_perfil($listaa,$usuario);
				$return = array("responseCode"=>200, "datos"=>"ok");

			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			}

		}
			else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 

		$return = json_encode($return);
		echo $return;
	}

	public function get_usuario_all()
	{
		$this->load->model('mantenimiento/usuario_model','u');
		$result = $this->u->select_all_user();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_constante_cargo()
	{
		$this->load->model('mantenimiento/constante_model','c');
		$result = $this->c->select_constante(8);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_accesos_byperfil($id_usuario)
	{	
		$this->load->model('mantenimiento/usuario_model','mod');
		$result = $this->mod->get_accesos_byperfil($id_usuario);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

}