var id_venta_temp=0;
$(document).ready(function(){
	
	$('#datepicker').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
		todayHighlight: true
	});

	$("#btn-buscar").click(function (e){
		e.preventDefault();
		var fecha1,fecha2;
		var cliente = $("#cboCliente").val();
		if($("#start").val()!="" && $("#end")!="" ){
			fecha1 = new Date($("#start").datepicker("getDates"));
			fecha2 = new Date($("#end").datepicker("getDates"));
			fecha1 = fechaFormatoSQL(fecha1);
			fecha2 = fechaFormatoSQL(fecha2);
		}else{
			fecha1=null;
			fecha2=null;
		}
		reloadTable(fecha1,fecha2,cliente);
	});

	var detalleTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-search',
				'tooltip':'Visualizar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					window.open(base_url+"view/ver_venta/"+aData.nVenCodigo,'_blank');
				},
			},
			{
				'icon':'fa fa-money',
				'tooltip':'Pagar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					if(aData.id_tipopago=="2"){
						id_venta_temp=aData.nVenCodigo;
						reloadTable_detallePago(aData.nVenCodigo);
						$("#modal-pago").modal();
					}
					/*bootbox.confirm("Desea Anular la Venta?", function(result){
						if(result==true){
							enviar(base_url+"venta/anular_venta/anular",{id_venta:aData.nVenCodigo}, successAnularVenta, null);
						}else{
							$.niftyNoty({
								type: 'danger',
								icon : 'fa fa-times',
								message : "Operación cancelada",
								container : 'floating',
								timer : 3000
							});
						}
					}); */

				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		detalleTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var VentasOptions = {
		"aoColumns":[
			{ "mDataProp": "nVenCodigo"},
			{ "mDataProp": "cliente"},
			{ "mDataProp": "vendedor"},
			{ "mDataProp": "fechaemision"},
			{ "mDataProp": "montoTotal"},
			{ "mDataProp": "MontoCancelado"},
			{ "mDataProp": "SaldoPendiente"},
			{ "mDataProp": "TipoDocumento"},
			{ "mDataProp": "tipopago"},
			{ "mDataProp": "estado"},
		]
		,"sDom": '<"H"Trl>t<"F"ip>',
		"fnCreatedRow":detalleTA.RowCBFunction
	};
	ventasTable = createDataTable2('tabla_cuentas_ventas',VentasOptions);

	var DetallePagoOptions = {
		"aoColumns":[
			{ "mDataProp": "nrocuota"},
			{ "mDataProp": "fecinicio"},
			{ "mDataProp": "fecpago"},
			{ "mDataProp": "pagocuota"},
			{ "mDataProp": "pagorecibido"}
		],
		"sDom": 'T<"clear">rtip',
		"fnCreatedRow":function(nRow,aData,iDisplayIndex){
			$(nRow).click( function() {
				if ( $(this).hasClass('row_selected') ) {
		            $(this).removeClass('row_selected');
		        }else {
					$(nRow).closest('table').find('tr.row_selected').removeClass('row_selected');
		            $(this).addClass('row_selected');
		            $("#id").val(aData.nCPagoCodigo);
		            $("#nro_cuota").val(aData.nrocuota);
		        }
			});
		}
	};
	detallePagoTable = createDataTable2('tbl_detalle_pago',DetallePagoOptions);

	var successPagoCuota = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Pago se registro correctamente",
			container : 'floating',
			timer : 3000
		});
		reloadTable_detallePago(id_venta_temp);
		$("#id").val("");
		$("#nro_cuota").val("");
		$("#pago_cuota").val("");
	}

	$("#btn-pagar").click(function(e){
		e.preventDefault();
		enviar(base_url+"venta/registrar_venta/pagarcuota",{idpago:$("#id").val(),nrocuota:$("#nro_cuota").val(),pagocuota:$("#pago_cuota").val()}, successPagoCuota, null);
	});

});

function reloadTable(fechaInicio,fechaFin,cliente){
	ventasTable.fnReloadAjax(base_url+"venta/consultar_venta/get_cuenta_ventas_all/"+fechaInicio+"/"+fechaFin+"/"+cliente);
}

function reloadTable_detallePago(id_venta){
	detallePagoTable.fnReloadAjax(base_url+"venta/consultar_venta/get_detalle_pago_byIdVenta/"+id_venta);
}