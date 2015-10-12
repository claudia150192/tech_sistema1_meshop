<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class view extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function categoria()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Categoria';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('mantenimiento/categoria');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/mantenimiento/categoria.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function cliente()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Cliente';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('mantenimiento/cliente');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/mantenimiento/cliente.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function personal()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Personal';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('mantenimiento/personal');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/mantenimiento/personal.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function proveedor()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Proveedor';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('mantenimiento/proveedor');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/mantenimiento/proveedor.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function usuario()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Usuario';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('mantenimiento/usuario');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/mantenimiento/usuario.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function producto()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Producto';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('mantenimiento/producto');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/mantenimiento/producto.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	//Sección Ventas
	public function anular_venta()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Anular Venta';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('venta/anular_venta');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/venta/anular_venta.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function registro_movimiento()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Movimiento';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('venta/registro_movimiento');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/venta/registro_movimiento.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function registro_venta()
	{
		//Cargar Data tabla Impuesto
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$this->load->model('venta/registrar_venta_model','mod');
			$result = $this->mod->obtenerImpuestoVenta();
			
			if($result!=null){
			$data['nombreVentaImp'] = $result->nombre;
			$data['igvVentaImp'] = $result->porcentaje;}
			else{$data['nombreVentaImp'] = "IVA No disponible";
			$data['igvVentaImp'] = 0;}

            $result2 = $this->mod->obtenermonedalocal();
			$data['signo'] = $result2->signo;

			$dataheader['title'] = 'Venta';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
            
			$this->load->view('venta/registrar_venta',$data);
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/venta/registrar_venta.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function registro_compra()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Compra';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('venta/registrar_compra');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/venta/registrar_compra.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function consultar_venta()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Consultar Ventas';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('venta/consultar_venta');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/venta/consultar_venta.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function ver_venta($venta_id)
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$data['venta_id']=$venta_id;
			$dataheader['title'] = 'Visualizar Ventas';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('venta/ver_venta',$data);
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/venta/ver_venta.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	/* Sección Configuración */
	public function conf_empresa()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$this->load->model('configuracion/empresa_model','mod');
			$data['empresa'] = $this->mod->select_byFirstElement();
			$dataheader['title'] = 'Empresa';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('configuracion/empresa',$data);
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/configuracion/empresa.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function conf_impuesto()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$this->load->model('configuracion/impuesto_model','mod');
			$data['impuesto'] = $this->mod->select_byFirstElement();
			$dataheader['title'] = 'Impuesto';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('configuracion/impuesto',$data);
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/configuracion/impuesto.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function conf_moneda()
	{
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$this->load->model('configuracion/moneda_model','mod');
			$data['moneda'] = $this->mod->select_byFirstElement();
			$dataheader['title'] = 'Moneda';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('configuracion/moneda',$data);
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/configuracion/impuesto.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function conf_cajachica(){
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$this->load->model('configuracion/cajachica_model','mod');
			$data['cajachica'] = $this->mod->get_caja(1);
			$dataheader['title'] = 'Cajachica';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('configuracion/cajachica',$data);
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/configuracion/cajachica.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function conf_unidmedida(){
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'UnidadMedida';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('configuracion/unidades');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/configuracion/unidades.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	/* --------------------- */
	public function saldosactuales(){
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Saldos Actuales';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('kardex/saldosactuales');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/kardex/saldosactuales.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

	public function kardex(){
		if($this->session->userdata('persona') == null){
			redirect('/welcome', 'refresh');
		}else{
			$dataheader['title'] = 'Kardex';
			$this->load->view('templates/header.php',$dataheader);
			$this->load->view('templates/menu.php');
			$this->load->view('kardex/kardex');
			$datafooter['jsvista'] = base_url().'assets/js/jvistas/kardex/kardex.js';
			$datafooter['active'] = '';
			$datafooter['dropactive'] = '';
			$datafooter['subactive'] = '';
			$this->load->view('templates/footer.php',$datafooter);
		}
	}

}