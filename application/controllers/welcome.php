<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller {

	public function index()
	{
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view('login',$this->data);
	}

	public function login(){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$this->load->model('acceso/login_model','mod');

			$data = array(
				'username' =>$_POST['username'],
				'password' =>sha1($_POST['password'])
			);//

			$return = $this->mod->login($data);
			//$remember = (bool) $this->input->post('remember');
			
			if(count($return)==0){
				$this->session->set_flashdata('message', "El usuario o contraseña no son válidos");
				redirect('/welcome', 'refresh');
			}else{
				$persona = $return;				
				$this->session->set_userdata('persona',$persona);
				$this->load->model('mantenimiento/usuario_model','umod');
				$perfiles = $this->umod->get_login_byperfil_all($persona['nUsuCodigo'])["contador_perfiles"];
				$this->session->set_userdata('perfiles',$perfiles);
				
				redirect('/home', 'refresh');
			}
		}else{
			$this->session->set_flashdata('message', "El usuario o contraseña no son válidos");
			redirect('/welcome', 'refresh');
		}
	}


	public function logout(){
		$this->session->unset_userdata('persona');
		redirect('/welcome', 'refresh');
	}

}