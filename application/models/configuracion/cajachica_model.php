<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cajachica_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function update($id,$monto,$opcion){
		$query = $this->db->query("SELECT * FROM caja_chica where idcajachica=".$id." limit 0,1");
		$data = $query->row_array();
		if($opcion==1){
			$dataarray = array('montoutilizado' => $data["montoutilizado"]+$monto);
		}else{
			$dataarray = array('montoutilizado' => $data["montoutilizado"]-$monto);
		}
		$this->db->where('idcajachica',$id);
		if ($this->db->update('caja_chica',$dataarray)){
			return true;
		}else{
			return false;
		}
	}

	function update_caja($id,$data){
		$query = $this->db->query("SELECT * FROM caja_chica where idcajachica=".$id." limit 0,1");
		
		if(count($query->row_array())){
			$dataarray = array('montoinicial' =>$data["montoinicial"]);
			$this->db->where('idcajachica',$id);
			if ($this->db->update('caja_chica',$dataarray)){
				return true;
			}else{
				return false;
			}
		}else{
			if ($this->db->insert('caja_chica', $data)){
				return true;
			}else{
				return false;	
			}
		}
	}

	function get_caja($id){
		$query = $this->db->query("SELECT * FROM caja_chica where idcajachica=".$id." limit 0,1");
		if(count($query->row_array())>0){
			return $query->row_array();
		}else{
			return "";
		}
	}
	
}
