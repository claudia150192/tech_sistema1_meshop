<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class producto_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function insert($data){
		if ($this->db->insert('producto',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function update($id,$pd){
		$this->db->where('nProCodigo',$id);
		if ($this->db->update('producto',$pd)){
			return true;
		}else{
			return false;
		}
	}
	
	public function update_bloque($data)
	{	
		$this->db->update_batch('producto', $data, 'nProCodigo'); 	
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}
	}

	function delete($id){
		$data = array('estado' => '0');
		$this->db->where('nProCodigo',$id);
		if ($this->db->update('producto',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	function buscar_id($id){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->join('categoria','categoria.nCatCodigo=producto.nCatCodigo');
		$this->db->join('constante','constante.valor=producto.unidamedida');
		$this->db->where('constante.clase','2');
		$this->db->where('nProCodigo',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function get_stock($id){
		$this->db->select('cantidad');
		$this->db->from('producto');
		$this->db->where('nProCodigo',$id);
		$query = $this->db->get();
		return $query->row_array();
	}

	function select_all_producto(){
		$this->db->select('nProCodigo,nombre,cantidad,producto.descripcion as prod_descripcion,codproveedor,marca,preciocompra,precioventa,
			categoria.descripcion as cat_descripcion,constante.descripcion as const_descripcion,categoria.nCatCodigo,producto.unidamedida,
			producto.utilidadporcentaje,producto.utilidadmoneda');
		$this->db->from('producto');
		$this->db->join('categoria','categoria.nCatCodigo=producto.nCatCodigo');
		$this->db->join('constante','constante.valor=producto.unidamedida');
		$this->db->where('constante.clase','2');
		$this->db->where('producto.estado !=','0');
		$query = $this->db->get();
		return $query->result();
	}

	function select_producto_in_stock(){
		$this->db->select('nProCodigo,nombre,cantidad,producto.descripcion as prod_descripcion,codproveedor,marca,preciocompra,precioventa,
			categoria.descripcion as cat_descripcion,constante.descripcion as const_descripcion,categoria.nCatCodigo,producto.unidamedida,
			producto.utilidadporcentaje,producto.utilidadmoneda');
		$this->db->from('producto');
		$this->db->join('categoria','categoria.nCatCodigo=producto.nCatCodigo');
		$this->db->join('constante','constante.valor=producto.unidamedida');
		$this->db->where('constante.clase','2');
		$this->db->where('producto.estado !=','0');
		$this->db->where('producto.cantidad >','0');
		$query = $this->db->get();
		return $query->result();
	}
	
	function autocomplete_marca($term){
		$this->db->select('marca as label');
		$this->db->from('producto');
		$this->db->like('marca',$term);
		$query = $this->db->get();
		return $query->result_array();
	}

	function count_productos(){
		$this->db->where('estado !=','0');
		$this->db->from('producto');
		return $this->db->count_all_results();
	}

	function select_marcas_producto(){
		$query = $this->db->query("SELECT DISTINCT marca FROM producto");
        return $query->result_array();
	}
		
	function get_producto_all_bycondicion($producto,$categoria,$marca){
		$add="";
    	if($producto!="-1"){
    		$add= "where concat(producto.nombre,' ',producto.descripcion) like '%".$producto."%'";
    	}
    	if($categoria!=-1){
    		if($add!=""){
    			$add= $add." and nCatCodigo =".$categoria;	
    		}else{
    			$add="where nCatCodigo =".$categoria;
    		}
    	}
    	if($marca!=-1){
    		if($add!=""){
    			$add= $add." and marca ='".$marca."' ";	
    		}else{
    			$add= "where marca ='".$marca."' ";	
    		}
    	}

    	$query = $this->db->query("SELECT producto.*, categoria.descripcion as desc_categoria FROM producto inner join categoria on categoria.nCatCodigo=producto.nCatCodigo and categoria.estado='1'".$add);
        return $query->result_array();
	}

	function get_total_venta_por_producto($id){
        $query = $this->db->query("select count(t.`nVenCodigo`) as contaventa FROM `transaccion` t
        inner join producto p on p.nProCodigo=t.`nProCodigo` where p.nProCodigo=".$id);
        return $query->result_array();
	}


	public function findData($search)
	{
		$query = $this->db->query("sELECT ruc,nombre FROM proveedor WHERE nombre LIKE '%".$search."%'");
       return $query->result_array();
	}
	
}