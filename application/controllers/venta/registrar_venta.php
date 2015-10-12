<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registrar_venta extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function registrar(){

		$form = $this->input->post('formulario');
	
		if ($form!=null){

			$this->load->model('venta/registrar_venta_model','mod');

			$cod_cliente = $form["cod_cliente"];
			$cliente = isset($form["cliente"])?$form["cliente"]:"";
			$direccion = isset($form["direccion"])?$form["direccion"]:"";
			$nro_documento = isset($form["nro_documento"])?$form["nro_documento"]:"";

			$subtotal = $form["subtotal"];
			$igv_venta = $form["igv_venta"];
			$tota_apagar = $form["tota_apagar"];
			$cboFormaPago = $form["cboFormaPago"];
			$cboTipoDocumentoVenta = $form["cboTipoDocumentoVenta"];

			$fecha_primerpago = isset($form["fecha_primerpago"])?date('Y-m-d',strtotime($form["fecha_primerpago"])):null;
			$nro_cuota = isset($form["nro_cuota"])?$form["nro_cuota"]:"";
			$monto_cuota = isset($form["monto_cuota"])?$form["monto_cuota"]:"";
			$cboNroDias = isset($form["cboNroDias"])?$form["cboNroDias"]:0;

			$detalle = $form["detalle"];

			$band=true;
			$this->db->trans_begin();
			
			$data_documento = $this->mod->obtenerSerieNumeroDocumento($cboTipoDocumentoVenta);

			$data_tipodocumento = array(
				'descripcion' =>$data_documento["documento"],
				'serie' => $data_documento["seriea"],
				'numero' => $data_documento["numeroa"],
				'cliente' => $cliente,
				'direccion' => $direccion,
				'documento'=> $nro_documento
			);

			$id_tipodoc = $this->mod->insert_tipodocumento($data_tipodocumento);

			if(!$id_tipodoc){
				$band=false;
			}

			$data_venta = array(
				'nCliCodigo' =>$cod_cliente,
				'nPerCodigo' => $this->session->userdata('persona')["nPerCodigo"],
				'montoTotal' => $tota_apagar,
				'nTipDocumento' => $id_tipodoc, //Id de la tabla documento generada
				'formaPago' => $cboFormaPago,
				'local'=> 1,
				'subTotal' => $subtotal,
				'impuestoporcentaje' => $igv_venta,
				'estado'=>1
			);

			$id = $this->mod->insert($data_venta);

			if(!$id){
				$return = array("responseCode"=>400, "greeting"=>"Bad");
			}else{

				if($cboFormaPago == 1){
					$contado = array(
						'nVenCodigo' => $id,
						'estado' =>'PagoCancelado',
						'montopagado' => $tota_apagar,
					);

					if(!$this->mod->insert_contado($contado)){
						$band=false;
					}

				}else{
					$credito = array(
						'nVenCodigo' => $id,
						'nrocuota' =>$nro_cuota,
						'montocuota' => $monto_cuota,
						'estado' => 'Debito',
						'montodebito' => 0.0
					);

					if(!$this->mod->insert_credito($credito)){
						$band=false;
					}
				}

				if ($detalle!=null){

					$this->load->model('mantenimiento/producto_model','pm');
					
					$lista = array();
					$lista2 = array();
					$lista3 = array();
					
					foreach($detalle as $key => $row){
						$list_ind = array(
							'nVenCodigo' => $id,
							'nProCodigo' => $row["id"],
							'preciounitario' => $row["preciounidad"],
							'cantidad' => $row["cantidad"],
							'importe' => $row["importe"]
						);
						array_push($lista,$list_ind);
						
						$list_prod = array(
							'cantidad' => ($this->pm->get_stock($row["id"])["cantidad"]-$row["cantidad"]),
							'nProCodigo' => $row["id"]
						);

						array_push($lista2,$list_prod);

						$list_kard = array(
							'fecha' => date('Y-m-d'),
							'documento' => $data_documento["seriea"]."-".$data_documento["numeroa"],
							'detalle' => 'Salida según Venta Nro '.$id,
							'tipooperacion' => 'Salida',
							'producto'=> $row["id"],
							'cantidad' => $row["cantidad"]*-1,
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


				if ($fecha_primerpago!=null && $nro_cuota!=null){
					$lista_cronpago = array();
					for ($i=0; $i < $nro_cuota ; $i++) {
						$list_cp = array(
							'nrocuota' => $i+1,
							'fecinicio' => $fecha_primerpago,
							'fecpago' => date('Y-m-d', strtotime($fecha_primerpago.' + '. $cboNroDias.' days')),
							'pagocuota' => $monto_cuota,
							'pagorecibido' => 0.0,
							'nVenCodigo'=>$id
						);
						array_push($lista_cronpago,$list_cp);
					}

					if(!$this->mod->insert_Cronogramapago($lista_cronpago)){
						$band=false;
					}
				}

				//actualizando caja
				$this->load->model('configuracion/cajachica_model','cmod');
				if(!$this->cmod->update(1,$tota_apagar,1)){
						$band=false;
				}

				if($band){
					$this->db->trans_commit();
					$return = array("responseCode"=>200, "datos"=>array('status' => "ok",'idventa' =>$id));
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

	public function get_constante_formapago()
	{
		$this->load->model('mantenimiento/constante_model','c');
		$result = $this->c->select_constante(6);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	//solo para ventas porque trae contado y credito
	public function get_constante_formapago2()
	{
		$this->load->model('mantenimiento/constante_model','c');
		$result = $this->c->select_constante(3);
		$result2=isset($_GET['formapago']);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_constante_tipoOperacion()
	{
		$this->load->model('mantenimiento/constante_model','c');
		$result = $this->c->select_constante(7);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function get_constante_tipoDocumento()
	{
		$this->load->model('mantenimiento/constante_model','c');
		$result = $this->c->select_constante(5);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function ver($idventa)
	{
		$this->load->model('venta/registrar_venta_model','mod');
		//$idventa = $this->input->post('idventa');
		$result = $this->mod->obtener_venta($idventa);
		$result2 = $this->mod->obtener_moneda_local();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result,'aaData2' => $result2)));
	}

	public function pagarcuota()
	{
		$this->load->model('venta/registrar_venta_model','mod');
		$result = $this->mod->obtenerImpuestoVenta();
		
		$idpago = $this->input->post('idpago');
		$nrocuota = $this->input->post('nrocuota');
		$pago_cuota = $this->input->post('pagocuota');
		
		if ($idpago!=null && $nrocuota!=null && $pago_cuota!=null){
			
			$band=true;
			$this->db->trans_begin();

			if(!$this->mod->pagar_cuota($pago_cuota,$idpago)){
				$band=false;
			}

			//Medio de Pago efectivo por defecto
			$datamov = array(
				'descripcion' =>"Pago de Cuota #".$idpago,
				'monto' => $pago_cuota,
				'medioPago' => 1,
				'tipoOperacion' => 2,
				'local'=>1
			);

			$this->load->model('venta/movimiento_model','modmv');
			if(!$this->modmv->insert($datamov)){
				$band=false;	
			}

			if($band){
				$this->db->trans_commit();
				$return = array("responseCode"=>200, "status"=>"ok");
			}else{
				$this->db->trans_rollback();
				$return = array("responseCode"=>400, "status"=>"bad");
			}

		}else{
			$return = array("responseCode"=>400, "status"=>$idpago." - ".$nrocuota." - ".$pago_cuota);
		}

		$return = json_encode($return);
		echo $return;
	}

	public function obtenerSerieNumeroDocumento()
	{
		$this->load->model('venta/registrar_venta_model','mod');
		$tipodocumento = $this->input->post('tipodocumento');
		$result = $this->mod->obtenerSerieNumeroDocumento($tipodocumento);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('aaData' => $result)));
	}

	public function convert_numero_letra()
	{
		$this->load->helper('nroletra_helper'); 
		$monto = $this->input->post('monto');
		$V=new NroEnLetra(); 
		$letra=strtoupper($V->ValorEnLetras($monto,'con'));
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($letra));
	}

}