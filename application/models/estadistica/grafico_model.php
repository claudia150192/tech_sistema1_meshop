<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grafico_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function get_grafico($anio){
		$query = $this->db->query('select case month(fecregistro) 
when "1" then "Enero" when "2" then "Febrero" when "3" then "Marzo" when "4" then "Abril"
when "5" then "Mayo" when "6" then "junio" when "7" then "julio" when "8" then "Agosto"
when "9" then "Septiembre" when "10" then "Octubre" when "11" then "Noviembre" when "12" then "Diciembre" end as period, SUM(montoTotal) as dl from venta where year(fecregistro) = '.$anio.' and estado<>2 group by year(fecregistro), period order by 2');
		
		return $query->result();
	}
	
}
