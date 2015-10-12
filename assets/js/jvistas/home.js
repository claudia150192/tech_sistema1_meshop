$(document).ready(function(){

	$("#generar_venta").click(function(){
		$(location).attr("href",base_url+'view/registro_venta/?formapago=1');
	});

	$("#pagos_pendientes").click(function(){
		$(location).attr("href",base_url+'view/registro_venta/?formapago=2');
	});

	/*$("#stock_producto").click(function(){
		$(location).attr("href",base_url+'view/registro_venta/');
	});*/

	$("#reporte_cuentas").click(function(){
		$(location).attr("href",base_url+'home/reporte_cuentas/');
	});

	$("#estadistica").click(function(){
		$(location).attr("href",base_url+'estadistica/grafico');
		/*$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Muy Pronto estará disponible está opción",
			container : 'floating',
			timer : 3000
		});*/
	});

	$("#cuadre_caja").click(function(){
		$("#modal-cuadrecaja").modal();
	});

	$('#fecha').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
	});

	$('#btn-generar').click(function(){
		if($("#fecha").val()!=""){
			fecha = new Date($("#fecha").datepicker("getDates"));
			fecha = fechaFormatoSQL(fecha);
			window.open(base_url+"home/cuadre_caja/"+fecha,'_blank');
		}
	});

	
});
