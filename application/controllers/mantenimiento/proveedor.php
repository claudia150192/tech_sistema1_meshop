<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class proveedor extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/proveedor_model','mod');

			$ruc = $form["ruc"];
			$pageweb = $form["pageweb"];
			$apename = $form["apename"];
			$telefono = $form["telefono"];
			$direccion = $form["direccion"];
			$email = $form["email"];
			$observacion = $form["observacion"];

			$data = array(
				'ruc' =>$ruc,
				'paginaweb' =>$pageweb,
				'nombre' =>$apename,
				'direccion' =>$direccion,
				'email'=>$email,
				'observacion'=>$observacion,
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


	public function registrar_marca(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/proveedor_model','mod');

			$descripcion = $form["descripcion"];
			$idproveedor = $form["idproveedor"];
			
			$data = array(
				'clase' =>9,
				'descripcion' =>$descripcion,
				'valor' =>$idproveedor
			);	

			if($this->mod->insert_marca($data)){
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

			$this->load->model('mantenimiento/proveedor_model','mod');

			$id_proveedor = $form["id_proveedor"];
			$ruc = $form["ruc"];
			$pageweb = $form["pageweb"];
			$apename = $form["apename"];
			$telefono = $form["telefono"];
			$direccion = $form["direccion"];
			$email = $form["email"];
			$observacion = $form["observacion"];

			$data = array(
				'ruc' =>$ruc,
				'paginaweb' =>$pageweb,
				'nombre' =>$apename,
				'direccion' =>$direccion,
				'email'=>$email,
				'observacion'=>$observacion,
				'telefono'=>$telefono
			);	

			if($this->mod->update($id_proveedor,$data)){
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


	public function actualizar_marca(){

		 $form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/proveedor_model','mod');

			$id_marca = $form["id_marca"];
			$descripcion = $form["descripcion"];
			$idproveedor = $form["idproveedor"];
		
			$data = array(
				'clase' =>9,
				'descripcion' =>$descripcion,
				'valor'=>$idproveedor
			);	

			if($this->mod->update_marca($id_marca,$data)){
				$return = array("responseCode"=>200, "datos"=>"ok");
			}else{
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			};
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad2");
		} 
	
		$return = json_encode($return);
		echo $return;
	}

	function eliminar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/proveedor_model','mod');

			$id_proveedor = $form["id_proveedor"];

			if($this->mod->delete($id_proveedor)){
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


function eliminar_marca(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/proveedor_model','mod');

			$id_marca = $form["id_marca"];

			if($this->mod->delete_marca($id_marca)){
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

	public function get_proveedor_all()
	{
		$this->load->model('mantenimiento/proveedor_model','cl');
		$result = $this->cl->select_all_proveedor();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_marca_all($id)
	{
		$this->load->model('mantenimiento/proveedor_model','cl');
		$result = $this->cl->select_all_marca($id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}


}