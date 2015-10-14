<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class producto extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('mantenimiento/producto_model','mod');

			$codproveedor = $form["codproveedor"];
			$nombre = $form["nombre"];
			$descripcion = $form["descripcion"];
			$cboUnidadMedida = $form["cboUnidadMedida"];
			$cboCategoria = $form["cboCategoria"];
			$marca = $form["marca"];
			$stock = $form["stock"];
			$stock_minimo = $form["stock_minimo"];
			$precio_compra = $form["precio_compra"];
			$precio_venta = $form["precio_venta"];
			$utilidad_porcentaje = $form["utilidad_porcentaje"];
			$utilidad_monetaria = $form["utilidad_monetaria"];

			$data = array(
				'nombre' =>$nombre,
				'descripcion' =>$descripcion,
				'cantidad' =>$stock,
				'preciocompra' =>$precio_compra,
				'precioventa'=>$precio_venta,
				'nCatCodigo'=>$cboCategoria,
				'marca'=>$marca,
				'codproveedor'=>$codproveedor,
				'estado'=>'1',
				'stockminimo'=>$stock_minimo,
				'unidamedida'=>$cboUnidadMedida,
				'utilidadporcentaje'=>$utilidad_porcentaje,
				'utilidadmoneda'=>$utilidad_monetaria
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

			$this->load->model('mantenimiento/producto_model','mod');

			$id_producto = $form["id_producto"];
			$codproveedor = $form["codproveedor"];
			$nombre = $form["nombre"];
			$descripcion = $form["descripcion"];
			$cboUnidadMedida = $form["cboUnidadMedida"];
			$cboCategoria = $form["cboCategoria"];
			$marca = $form["marca"];
			$stock = $form["stock"];
			$stock_minimo = $form["stock_minimo"];
			$precio_compra = $form["precio_compra"];
			$precio_venta = $form["precio_venta"];
			$utilidad_porcentaje = $form["utilidad_porcentaje"];
			$utilidad_monetaria = $form["utilidad_monetaria"];

			$data = array(
				'nombre' =>$nombre,
				'descripcion' =>$descripcion,
				'cantidad' =>$stock,
				'preciocompra' =>$precio_compra,
				'precioventa'=>$precio_venta,
				'nCatCodigo'=>$cboCategoria,
				'marca'=>$marca,
				'codproveedor'=>$codproveedor,
				'estado'=>'1',
				'stockminimo'=>$stock_minimo,
				'unidamedida'=>$cboUnidadMedida,
				'utilidadporcentaje'=>$utilidad_porcentaje,
				'utilidadmoneda'=>$utilidad_monetaria
			);

			if($this->mod->update($id_producto,$data)){
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

			$this->load->model('mantenimiento/producto_model','mod');

			$id_producto = $form["id_producto"];

			if($this->mod->delete($id_producto)){
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

	public function get_producto_all()
	{
		$this->load->model('mantenimiento/producto_model','pm');
		$result = $this->pm->select_all_producto();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_producto_in_stock()
	{
		$this->load->model('mantenimiento/producto_model','pm');
		$result = $this->pm->select_producto_in_stock();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_marcas_all()
	{
		$this->load->model('mantenimiento/producto_model','pm');
		$result = $this->pm->select_marcas_producto();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_producto_por_venta($id)
	{
		$this->load->model('mantenimiento/producto_model','pm');
		$result = $this->pm->get_total_venta_por_producto($id);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_constante_unidadmedida()
	{
		$this->load->model('mantenimiento/constante_model','pm');
		$result = $this->pm->select_constante(2);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

 public function get_find()
	{
		$this->load->model('mantenimiento/producto_model','pm');
		$id = $this->input->post('autocomplete');
		$result = $this->pm->findData($id);

        if($result > 0)
        {
        	echo json_encode(array('res' => 'full', 'data' => $result));
        }
        else
        {
        	echo json_encode(array('res' => 'empty'));
        }
	}

}