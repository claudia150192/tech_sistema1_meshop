var fecha=null,anio=0,mes=0,tipo=0;
$(document).ready(function(){

	$("#fechaDia").val(fechanow());
	$("#modal1").hide();
	
	$('#fechaDia').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
		});

	$("#btn-guardar_modal").click(function (e){
		enviar(base_url+"venta/anular_venta/anular",{id_venta:aData.nVenCodigo}, successAnularVenta, null);
	});

	$("#btn-cancelar_modal").click(function (e){
		$.niftyNoty({
								type: 'danger',
								icon : 'fa fa-times',
								message : "Operación cancelada",
								container : 'floating',
								timer : 3000
		 });
	});

	$("#btn-dia").click(function (e){
		e.preventDefault();
		tipo = $("#cboTipoDia").val();
		fecha = new Date($("#fechaDia").datepicker("getDates"));
		fecha = fechaFormatoSQL(fecha);
		anio =0;
		mes = 0;
		reloadTable(fecha,anio,mes,tipo);
	});

	$("#btn-mes").click(function (e){
		e.preventDefault();
		fecha=null;
		anio = $("#fechaMesAnio").val();
		mes=$("#cboSeleccionarMes").val();
		tipo = $("#cboTipoMes").val();;
		reloadTable(fecha,anio,mes,tipo);
	});

	$("#btn-anio").click(function (e){
		e.preventDefault();
		fecha=null;
		anio = $("#txt_anio").val();
		mes=0;
		tipo = $("#cboTipoAnio").val();;
		reloadTable(fecha,anio,mes,tipo);
	});

	var successAnularVenta = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Operación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
	}

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
				'icon':'fa fa-edit',
				'tooltip':'Anular Venta',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					$("#modal1").click();
					// bootbox.confirm("Desea Anular la Venta?", function(result){
					// 	if(result==true){
					// 		enviar(base_url+"venta/anular_venta/anular",{id_venta:aData.nVenCodigo}, successAnularVenta, null);
					// 	}else{
					// 		$.niftyNoty({
					// 			type: 'danger',
					// 			icon : 'fa fa-times',
					// 			message : "Operación cancelada",
					// 			container : 'floating',
					// 			timer : 3000
					// 		});
					// 	}
					// }); 
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
			{ "mDataProp": "fechaemision"},
			{ "mDataProp": "montoTotal"},
			{ "mDataProp": "descripcion"},
			{ "mDataProp": "tipopago"},
			{ "mDataProp": "vendedor"},
			{ "mDataProp": "estado"},
		]
		,"sDom": '<"H"Trl>t<"F"ip>',
		"fnCreatedRow":detalleTA.RowCBFunction
	};
	ventasTable = createDataTable2('tbl_venta',VentasOptions);


var arrayCheck = new Array();
	var accesosOptions = {
		"aoColumns":[
			{ "mDataProp": "producto"},
			{ "mDataProp": "total"},
			{ "mDataProp": "check"}
		],
		"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			arrayCheck.push($(nRow).find(".cbox"));
			$(nRow).find(".cbox").change(function(){
				if($(this).is(':checked'))
				{
					$(nRow).find(".desc").text(" Anulado");
					aData.estado = 1;
				}
				else
				{
					$(nRow).find(".desc").text(" No se Anula");
					aData.estado = 0;
				}
			});
		}
	};
	accesosTable = createDataTable2('tbl_anulado',accesosOptions);
});

function reloadTable(fecha,anio,mes,tipo){
	ventasTable.fnReloadAjax(base_url+"venta/consultar_venta/get_ventas_all/"+fecha+"/"+anio+"/"+mes+"/"+tipo);
}

function reloadPerfil(id_usuario){
	accesosTable.fnReloadAjax(base_url+"mantenimiento/usuario/get_accesos_byperfil/"+id_usuario);
}