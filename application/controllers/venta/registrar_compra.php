<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registrar_compra extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('venta/registrar_compra_model','mod');

			$cod_proveedor = $form["cod_proveedor"];
			$proveedor = isset($form["proveedor"])?$form["proveedor"]:"";
			$direccion = isset($form["direccion"])?$form["direccion"]:"";

			$subtotal = $form["subtotal"];
			$igv_venta = $form["igv_venta"];
			$monto_igvventa = $form["monto_igvventa"];
			$tota_apagar = $form["tota_apagar"];
			$cboTipoDocumentoVenta = $form["cboTipoDocumentoVenta"];
			$serie_documento = $form["serie_documento"];
			$numero_documento = $form["numero_documento"];

			$fechaEmision = isset($form["fechaEmision"])? $form["fechaEmision"] : null;
			if($fechaEmision!=null){
				$fechaEmision = explode("/", $fechaEmision);
				$fechaEmision = $fechaEmision[2]."-".$fechaEmision[1]."-".$fechaEmision[0];
				//$fechaEmision = date('Y-m-d',strtotime($fechaEmision));
			}

			$detalle = $form["detalle"];
			$band=true;
			$this->db->trans_begin();

			$data_compra = array(
				'nProvCodigo' =>$cod_proveedor,
				'nPerCodigo' => $this->session->userdata('persona')["nPerCodigo"],
				'tipodocumento' => $cboTipoDocumentoVenta,
				'serie' => $serie_documento,
				'numero' => $numero_documento,
				'local'=> 1,
				'fechaemision' => $fechaEmision,
				'montoTotal' => $tota_apagar,
				'igvporcentaje' => $monto_igvventa,
				'igvmonto' => $igv_venta,
				'subTotal' => $subtotal,
				'estado'=>1
			);

			$id = $this->mod->insert($data_compra);

			if(!$id){
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			}else{

				if ($detalle!=null){
					
					$this->load->model('mantenimiento/producto_model','pm');

					$lista = array();
					$lista2 = array();
					$lista3 = array();

					foreach($detalle as $key => $row){
						
						$list_ind = array(
							'CodigoOrdenCompra' => $id,
							'ProductoCodigo' => $row["id"],
							'cantidadsolicitada' => $row["cantidad"],
							'preciocompra' => $row["preciounidad"],
							'cantidadrecibida' => $row["cantidad"],
							'cantidadrestante' => 0,
							'estado' => 1
						);
						array_push($lista,$list_ind);

						$list_prod = array(
							'preciocompra' => $row["preciounidad"],
							'cantidad' =>($this->pm->get_stock($row["id"])["cantidad"]+$row["cantidad"]),
							'nProCodigo' => $row["id"]
						);
						array_push($lista2,$list_prod);

						$list_kard = array(
							'fecha' => $fechaEmision==null?"":$fechaEmision,
							'documento' => $serie_documento."-".$numero_documento,
							'detalle' => 'Compra según Nro '.$id,
							'tipooperacion' => 'Ingreso',
							'producto'=> $row["id"],
							'cantidad' => $row["cantidad"],
							'preciounitario' => $row["preciounidad"],
							'importe' => $row["importe"],
							'local' => 1
						);

						array_push($lista3,$list_kard);

					}

					if(!$this->mod->insertDetalle($lista)){
						$band=false;
					}

					//Actualizar Productos
					if(!$this->pm->update_bloque($lista2)){
						$band=false;
					}

					//insertar kardex
					$this->load->model('kardex/kardex_model','km');
					if(!$this->km->insert_bloque($lista3)){
						$band=false;
					}
				}

				if($band){
					$this->db->trans_commit();
					$return = array("responseCode"=>200, "datos"=>$fechaEmision);
				}else{
					$this->db->trans_rollback();
					$return = array("responseCode"=>400, "datos"=>"bad");
				}

			}
		}
		else {
			$return = array("responseCode"=>400, "greeting"=>"Bad");
		} 
	
		$return = json_encode($return);
		echo $return;
	}

	public function get_compras_all()
	{
		$this->load->model('venta/registrar_compra_model','mod');
		$result = $this->mod->get_compras_all();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

}