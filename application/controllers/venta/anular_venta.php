<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anular_venta extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_ventas_anuladas()
	{
		$this->load->model('venta/anular_venta_model','mod');
		$result = $this->mod->select_venta_anular();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function anular(){

		$this->load->model('venta/anular_venta_model','mod');
		$band=false;
		
		$id_venta = $this->input->post('id_venta');
		$Comentarios = $this->input->post('comentarios');
		$total_apagar_actual = $this->input->post('tp_actual');

		$data = array(
			'nVenCodigo' =>$id_venta,
			'descripcion' => "Venta Anulada: ".$Comentarios,
			'nUsuCodigo' => $this->session->userdata('persona')["nUsuCodigo"]
		);

		$this->load->model('venta/registrar_venta_model','rv');
		$data_impuesto = $this->rv->obtener_venta3($id_venta);
		$total_pagar_impuesto=$total_apagar_actual+$data_impuesto["impuestoporcentaje"];

        //Anular venta
		$band = $this->mod->anular_venta($id_venta,$data,$total_pagar_impuesto,$total_apagar_actual);
		if($band){
			$return = array("responseCode"=>200, "datos"=>"ok");
		}else{
			$return = array("responseCode"=>400, "datos"=>"bad");
		}

		$return = json_encode($return);
		echo $return;
	}


	public function kardex_anular(){

		$this->load->model('mantenimiento/producto_model','mod');
		$band=false;
        $form = $this->input->post('formulario');

		if ($form!=null){
	    $id_producto = $form["id_producto"];
	    $id_venta = $form["id_venta"];
	    $cantidad = $form["cantidad"];
	    $preciounidad = $form["preciounidad"];
	    $importe = $form["importe"];

		$data = array(
			'cantidad' =>($this->mod->get_stock($id_producto)["cantidad"]+$cantidad)
		);

        //Actualizar Stock de Productos
		if(!$this->mod->update($id_producto,$data)){
		 $band=false;
		}


        $this->load->model('venta/registrar_venta_model','rv');
		$data_documento = $this->rv->obtener_kardex($id_venta,$id_producto);

        $lista3 = array();
		$list_kard = array(
							'fecha' => date('Y-m-d'),
							'documento' => $data_documento["serie"]."-".$data_documento["numero"],
							'detalle' => 'Entrada por Devolución pactada por el cliente, Nro. '.$id_venta,
							'tipooperacion' => 'Ingreso',
							'producto'=> $id_producto,
							'cantidad' => $cantidad,
							'preciounitario' => $preciounidad,
							'importe' => $importe,
							'local' => 1,
							'id_usuario' => $this->session->userdata('persona')["nUsuCodigo"]
		);

		array_push($lista3,$list_kard);

		//insertar kardex
		$this->load->model('kardex/kardex_model','km');
		if(!$this->km->insert_bloque($lista3)){
		$band=false;
		}
        //eliminar transaccion
		if(!$this->rv->deleteDetalle($id_producto,$id_venta)){
		$band=false;
		}

		if($band){
					$this->db->trans_commit();
					$return = array("responseCode"=>200, "datos"=>array('status' => "ok",'idventa' =>$id_venta));
				}else{
					$this->db->trans_rollback();
				 	$return = array("responseCode"=>400, "datos"=>"bad");
				 }

		}else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 

		$return = json_encode($return);
		echo $return;
	}


}