<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function insert($data){
		if ($this->db->insert('usuario',$data)){
			return true;
		}else{
			return false;
		}
	}

	function update($id,$data){
		$this->db->where('nUsuCodigo',$id);
		if ($this->db->update('usuario',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function delete($id){
		$data = array('estado' => '0');
		$this->db->where('nUsuCodigo',$id);
		if ($this->db->update('usuario',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_perfil($data,$id_usuario)
	{	
		$query = $this->db->query("select o.nOpcion, o.menu, o.submenu, pu.estado from opcion_usuario pu inner join opcion o on o.nopcion = pu.opcion where pu.usuario =".$id_usuario);
		$accesos = $query->result_array();
		if(count($accesos)>0){
			$this->db->where('Usuario', $id_usuario);
			$this->db->update_batch('opcion_usuario', $data, 'Opcion');
		}else{
			$this->db->insert_batch('opcion_usuario', $data);
		}
	}

	public function select_all_user(){
		$this->db->select('nUsuCodigo,name,cargo,descripcion,personal.nombre,personal.nPerCodigo');
		$this->db->from('usuario');
		$this->db->join('personal','personal.nPerCodigo=usuario.nPerCodigo');
		$this->db->join('constante','constante.valor=usuario.cargo');
		$this->db->where('usuario.estado !=','0');
		$this->db->where('constante.clase',8);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function select_lista_local($id_user){
		$query = $this->db->query("SELECT l.int_local_id as id_local, l.var_local_nombre as name_local, 
								   IFNULL((select lu.var_detLocal_estado from local_has_usuario lu 
										   where l.int_local_id = lu.int_local_id and lu.nUsuCodigo =".$id_user."),0) as estado 
								   FROM local l");
		return $query->result_array();
	}

	public function get_accesos_byperfil($id_usuario)
	{
		$query = $this->db->query("select o.nOpcion, o.menu, o.submenu, pu.estado from opcion_usuario pu inner join opcion o on o.nopcion = pu.opcion where pu.usuario =".$id_usuario);
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{	
			$accesos = $query->result_array();
			if(count($accesos)>0){
				foreach ($accesos as $key => $value) {
				$check = '<input role="checkbox" type="checkbox" class="cbox"><span class="desc"> Sin acceso</span>';
				if($value["estado"]==1)
					$check = '<input role="checkbox" type="checkbox" class="cbox" checked="checked"><span class="desc"> Con acceso</span>';

					$accesos[$key]["check"] = $check;
				}
			}else{
				$query = $this->db->query("select o.nOpcion,o.menu,o.submenu,'0' as estado from opcion o");
				$accesos = $query->result_array();
				foreach ($accesos as $key => $value) {
				$check = '<input role="checkbox" type="checkbox" class="cbox"><span class="desc"> Sin acceso</span>';
				if($value["estado"]==1)
					$check = '<input role="checkbox" type="checkbox" class="cbox" checked="checked"><span class="desc"> Con acceso</span>';

					$accesos[$key]["check"] = $check;
				}
			}
			return $accesos;
		}
	}

	public function get_login_byperfil($id_usuario)
	{
		$query = $this->db->query("select o.nOpcion, o.menu, o.submenu, pu.estado from opcion_usuario pu inner join opcion o on o.nopcion = pu.opcion where pu.usuario =".$id_usuario);
		if ($this->db->trans_status() === FALSE)
		{
			return false;
		}
		else
		{	
			$accesos = $query->result_array();
			return $accesos;
		}
	}

	public function get_login_byperfil_all($id_usuario)
	{
		$query = $this->db->query("select count(o.nOpcion) as contador_perfiles from opcion_usuario pu inner join opcion o on o.nopcion = pu.opcion where pu.usuario =".$id_usuario);
		return $query->row_array();
	}
	
}