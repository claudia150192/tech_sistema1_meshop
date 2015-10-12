$(document).ready(function(){

	$(".SelectAjax").SelectAjax();
	$("#btn-actualizar").hide();

	var successRegMovimiento = function(){
		$.unblockUI({
			onUnblock: function(){
				bootbox.dialog({
					title: "Notificación",
					message: "Registro correcto", 
					buttons: {
						success: {
						label: "OK!",
						className: "btn-success"
						}
					}
				});
			}			
		});
		$("#frm-registro").reset();
	}

	var errorRegMovimiento = function(){
		$.unblockUI({
		    onUnblock: function(){
				bootbox.dialog({
					title: "Notificación",
					message: "Error al Registrar", 
					buttons: {
						success: {
							label: "OK!",
							className: "btn-danger",
						}
					}
				});
		  	}
        });	
	}

	var successModMovimiento = function(){
		$.unblockUI({
			onUnblock: function(){
				bootbox.dialog({
					title: "Notificación",
					message: "Registro correcto", 
					buttons: {
						success: {
						label: "OK!",
						className: "btn-success"
						}
					}
				});
			}			
		});
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	}

	var errorModMovimiento = function(){
		$.unblockUI({
		    onUnblock: function(){
				bootbox.dialog({
					title: "Notificación",
					message: "Error al Registrar", 
					buttons: {
						success: {
							label: "OK!",
							className: "btn-danger",
						}
					}
				});
		  	}
        });	
	}

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successRegMovimiento, errorRegMovimiento);
			}
		});
	});

	$('#btn-actualizar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-registro").serializeObject()}, successModMovimiento, errorModMovimiento);
			}
		});
	});

	$('#btn-cancelar').click(function(event) {
		event.preventDefault();
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").trigger("reset");
	});


	var successEliminarMovimiento = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Eliminación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEliminarMovimiento = function(){
		$.niftyNoty({
			type: 'danger',
			icon : 'fa fa-times',
			message : "Se produjo un error al eliminar",
			container : 'floating',
			timer : 3000
		});
	}

	var movimientoTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					$("#descripcion").val(aData.descripcion);
					$("#monto").val(aData.monto);
					$("#cboMedioPago").val(aData.medioPago);
					$("#cboTipoIngreso").val(aData.tipoOperacion);
					$("#idmovimiento").val(aData.int_Movimiento_id);
					$("#btn-actualizar").show();
					$("#btn-guardar").hide();
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarMovimiento(aData.int_Movimiento_id,successEliminarMovimiento,errorEliminarMovimiento)
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		movimientoTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var movimientoOptions = {
		"aoColumns":[
			{ "mDataProp": "descripcion"},
			{ "mDataProp": "monto"},
			{ "mDataProp": "fechaRegistro"},
			{ "mDataProp": "desc_mediopago"},
			{ "mDataProp": "desc_tipooperacion"}
		],
		"sDom": 'T<"clear">lrtip',
		"fnCreatedRow": movimientoTA.RowCBFunction,
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
	};
	movimientoTable = createDataTable2('tbl_movimiento',movimientoOptions);

});

function eliminarMovimiento(id_movimiento,successMovimiento,errorEliminarMovimiento){
	enviar($("#frm-registro").attr("action-3"),{formulario:{"id_movimiento":id_movimiento}}, successMovimiento, errorEliminarMovimiento);	
}

function reloadTable(){
	movimientoTable.fnReloadAjax(base_url+"venta/movimiento/get_select_all");
}