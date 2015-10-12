var tipo_documento;
var montoTotal=0.0;

$(document).ready(function(){

	cargaData_Impresion($("#nVenta_id").val());

	$("#imprimir").click(function(e){
		e.preventDefault();
		$("#resumen_venta").printThis({
        	importCSS: true,
	        printContainer: false,
	        pageTitle: "",
	        removeInline: true,
	        header: null,
         });
	});

	var successMensaje = function(data){
		bootbox.dialog({
			title: "Notificación",
			message: "Mensaje Enviado al correo", 
			buttons: {
				success: {
				label: "OK!",
				className: "btn-success"
				}
			}
		});
		$("#panel_formulario").show();
		$("#panel_documento").hide();
	}
	
	$('#btn_enviar_correo').click(function(event){
		event.preventDefault();
		$("#compose-modal").modal('hide');	
		enviar($("#EnviarForm").attr("action-1"),$("#EnviarForm").serializeObject(),successMensaje,null);	
	});	

});

function cargaData_Impresion(id_venta){
	//$("#nVenta_id").val(id_venta);
	var tbody = $("#detalle_contenido_producto");
	var nro_fil=0;
	$.ajax({
		type: 'GET',
		dataType: "json",
		url:base_url+'venta/registrar_venta/ver/'+id_venta,
		success:function(data){
			nro_fil = data.aaData.length;
			jQuery.each( data.aaData, function( key, value ) {
				$("#titulo_emp").text(value["RazonSocialEmpresa"]);
				$("#ruc_emp").text(value["RucEmpresa"]);
				$("#razonsocial_emp").text(value["RazonSocialEmpresa"]);
				$("#clienteR").text(value["cliente"]);
				$("#rucR").text(value["documento_cliente"]);
				$("#Telefono_emp").text(value["TelefonoEmpresa"]);
				$("#Email_emp").text(value["EmailEmpresa"]);
				$("#direccion_emp").text(value["DireccionEmpresa"]);
				$("#clienteR_direccion").text(value["direccion_cliente"]);
				tipo_documento = value["descripcion"];
				$("#tipdocR").text(tipo_documento);
				$("#sercomR").text(value["serie"]+" - "+value["numero"]);
				var fechaemision = value["fechaemision"];
				$("#fechaEmisionR_dia").text(fechaemision.substring(8,10));
				$("#fechaEmisionR_mes").text(fechaemision.substring(5,7));
				$("#fechaEmisionR_anio").text(fechaemision.substring(0,4));
				$("#vendedorR").text(value["vendedor"]);
				$("#tipoPagoR").text(value["tipopago"]);
				$("#subtotalR").text(value["subTotal"]);
				$("#nombimpuesto").text(value["impnombre"]);
				$("#igvR").text(value["impuestoporcentaje"]);
				$("#totalR").text(value["montoTotal"]);
				$("#email_to").val(value["email_cliente"]);
				montoTotal = value["montoTotal"];
				var igv = value["impuestoporcentaje"];
				var montoimpuesto = parseFloat(parseFloat(value["subTotal"])*(igv/100)).toFixed(2);
				$("#montoR").text(montoimpuesto);

				tbody.append(
		            '<tr style="height: 30px;font-size: 11px;">'+
		            '</td><td >' + value["cantidad"] +
		            '</td><td >' + "Unid" + 
		            '<td>' + value["nombre"] + 
		            '</td><td >' + value["preciounitario"] + 
		            '</td><td >' + value["importe"] + 
		            '</td></tr>'
		            );
			});

            jQuery.each( data.aaData2, function( key, value ) {
				$("#descripcion_moneda").text(value["descripcion"]);
				$(".signo_moneda").text(value["signo"]+" ");
				
			});

			if(tipo_documento=="BOLETA VENTA"){
				$("#tr_subtotal").hide();
				$("#tr_igv").hide();
			}

			$.ajax({
				type: 'POST',
				data: "monto="+montoTotal,
				dataType: "json",
				url:base_url+'venta/registrar_venta/convert_numero_letra/',
				success:function(data){
					$("#texto_letra").text(data);
				}
			});

			console.log(nro_fil);
			for (var i = nro_fil; i< 10; i++) {
				tbody.append(
				            '<tr style="height: 30px;font-size: 11px;">'+
				            '</td><td >'+
				            '</td><td >'+ 
				            '<td>'+ 
				            '</td><td >'+ 
				            '</td><td >'+ 
				            '</td></tr>'
				            );
			}

		}
	});

	
	/**/

}