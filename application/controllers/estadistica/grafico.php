<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafico extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		//if($this->session->userdata('persona') == null){
		//redirect('/welcome', 'refresh');
		//}
	}

	public function index()
	{
		$dataheader['title'] = 'Grafico';
		$this->load->view('templates/header.php',$dataheader);
		$this->load->view('templates/menu.php');
		$this->load->view('estadistico/grafico');
		$datafooter['jsvista'] = base_url().'assets/js/jvistas/estadistica/grafico.js';
		$datafooter['active'] = '';
		$datafooter['dropactive'] = '';
		$datafooter['subactive'] = '';
		$this->load->view('templates/footer.php',$datafooter);
	}

	public function get_grafico($anio)
	{
		$this->load->model('estadistica/grafico_model','p');
		$result = $this->p->get_grafico($anio);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($result));
	}

}