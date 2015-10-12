<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}
	}
	
	public function index()
	{
		$this->load->model('mantenimiento/producto_model','mod');
		$this->load->model('venta/consultar_venta_model','mod2');
		$this->load->model('venta/registrar_venta_model','mod3');
		$data['cant_producto']=$this->mod->count_productos();
		$data['nro_venta']=$this->mod2->count_ventas();
		$data['nro_credito']=$this->mod2->count_credito();

		$result2 = $this->mod3->obtenermonedalocal();
		$data['signo'] = $result2->signo;
        $this->session->set_userdata('signo',$result2->signo);
	//$contado=$this->mod2->get_total_contado()["totalcontado"];
        //$credito=$this->mod2->get_total_credito()["totalcredito"];
		//$this->session->set_userdata('total_contado',$contado);
		//$this->session->set_userdata('total_credito',$credito);
		$dataheader['title'] = 'HOME';
		$this->load->view('templates/header.php',$dataheader);
		$this->session->set_userdata('rol',$this->session->userdata('persona')["cargo"]);
		$this->load->view('templates/menu.php');
		$this->load->view('home',$data);
		$datafooter['jsvista'] = base_url().'assets/js/jvistas/home.js';
		$datafooter['active'] = '';
		$datafooter['dropactive'] = '';
		$datafooter['subactive'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function pagos_pendientes()
	{
		$dataheader['title'] = 'Pagos pendientes';
		$this->load->view('templates/header.php',$dataheader);
		$this->load->view('templates/menu.php');
		$this->load->view('venta/pagospendientes_venta');
		$datafooter['jsvista'] = '';
		$datafooter['active'] = '';
		$datafooter['dropactive'] = '';
		$datafooter['subactive'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function reporte_cuentas()
	{
		$this->load->model('mantenimiento/cliente_model','cl');
		$data['lista_clientes'] = $this->cl->select_all_cliente();
		$dataheader['title'] = 'Reporte Cuentas';
		$this->load->view('templates/header.php',$dataheader);
		$this->load->view('templates/menu.php');
		$this->load->view('venta/reporte_cuentas_venta',$data);
		$datafooter['jsvista'] = base_url().'assets/js/jvistas/venta/reporte_cuentas.js';
		$datafooter['active'] = '';
		$datafooter['dropactive'] = '';
		$datafooter['subactive'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function cuadre_caja($fecha)
	{
		if(isset($fecha)){
			$sumRefContado=0.0;
			$sumRefCredito=0.0;
			$sumCobroCuota=0.0;
			$sumMontoR=0.0;
			$sumMontoD=0.0;
			$totalIngreso=0.0;
			$this->load->model('venta/movimiento_model','md');
			$resultado= $this->md->reporte_cuadre_caja($fecha);
			if(count($resultado)>0){
		  		foreach ($resultado as $cj){
		  			if($cj->FormaPago == 1.00){
		  				$sumRefContado += $cj->Ref_Contado;
		  			}
		  			if($cj->FormaPago == 2.00){
		  				$sumRefCredito += $cj->Ref_Credito;
		  			}
		  			if($cj->Tipo == 1){
		  				$sumMontoD += $cj->Monto; 
		  				$sumRefCredito += $cj->Ref_Credito;
		  				$sumCobroCuota += $cj->CobroCuota;
		  			}
		  			if($cj->Tipo == 0){
		  				$sumMontoR += $cj->Monto;
		  			}
		  			$fecha = $cj->FecReg;
		  			$totalIngreso=$sumMontoD+$sumRefContado+$sumCobroCuota;
		  		}
			}
			$data['sumRefContado'] = $sumRefContado;
			$data['sumRefCredito'] = $sumRefCredito;
			$data['sumCobroCuota'] = $sumCobroCuota;
			$data['sumMontoR'] = $sumMontoR;
			$data['sumMontoD'] = $sumMontoD;
			$data['totalIngreso'] = $totalIngreso;
			$dataheader['title'] = 'Cuadre Caja';
			$this->load->view('venta/cuadre_caja',$data);
		}
	}

}