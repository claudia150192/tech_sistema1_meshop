var clienteTable;

$(document).ready(function(){

	$("#btn-actualizar").hide();

	$("#btn-cancelar").click(function(){
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	});

	var successEditcliente = function(){
		$.unblockUI({
			onUnblock: function(){
				$.niftyNoty({
					type: 'primary',
					icon : 'fa fa-check',
					message : "Actualización Correcta",
					container : 'floating',
					timer : 3000
				});
			}			
		});	
		reloadTable();
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	}

	var errorEditcliente = function(){
		$.unblockUI({
			onUnblock: function(){
				$.niftyNoty({
					type: 'danger',
					icon : 'fa fa-times',
					message : "Se produjo un error al actualizar",
					container : 'floating',
					timer : 3000
				});
			}			
		});
	}

	var successcliente = function(){
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
		reloadTable();
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	}

	var errorcliente = function(){
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

	var successEliminarcliente = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Eliminación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEliminarcliente = function(){
		$.niftyNoty({
			type: 'danger',
			icon : 'fa fa-times',
			message : "Se produjo un error al eliminar",
			container : 'floating',
			timer : 3000
		});
	}

	$('#btn-actualizar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-registro").serializeObject()}, successEditcliente, errorEditcliente);
			}
		});
	});

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successcliente, errorcliente);
			}
		});
	});

	var clienteTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					$("#id_cliente").val(aData.id);
					$("#otros").val(aData.otros);
					$("#email").val(aData.email);
					$("#telefono").val(aData.telefono);
					$("#apename").val(aData.cliente);
					$("#dni").val(aData.dni);
					$("#ruc").val(aData.ruc);
					$("#btn-actualizar").show();
					$("#btn-guardar").hide();
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarcliente(aData.id,successEliminarcliente,errorEliminarcliente);
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		clienteTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var clienteOptions = {
		"aoColumns":[
			{ "mDataProp": "dni"},
			{ "mDataProp": "ruc"},
			{ "mDataProp": "cliente"},
			{ "mDataProp": "telefono"},
			{ "mDataProp": "email"},
		],
		"sDom": 'T<"clear">lfrtip',
		"fnCreatedRow": clienteTA.RowCBFunction,
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
	};
	clienteTable = createDataTable2('tbl_cliente',clienteOptions);
	reloadTable();

});

/*function edtiarcliente(id_cliente,var_descripcion,successEditcliente,errorEditcliente){
	bootbox.dialog({
		title: "Actualizar",
		message:'<div class="row">' +'<div class="col-md-12"> ' +
				'<form class="form-horizontal" id="frm-edit" >' + '<div class="form-group"> ' +
				'<label class="col-md-4 control-label" for="descripcion_edit">Descripción</label> ' +
				'<div class="col-md-4"> ' +
				'<input id="descripcion_edit" name="descripcion_edit" type="text" class="form-control input-md" value="'+var_descripcion+'"></div>'+
				'<input id="id_cliente" name="id_cliente" type="text" hidden value="'+id_cliente+'"></div>'+
				'</div> ' +'</form> </div> </div>',
		buttons: {
			success: {
				label: "Editar",
				className: "btn-purple",
				callback: function(event) {
					event.preventDefault();
					enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-edit").serializeObject()}, successEditcliente, errorEditcliente);
				}
			}
		}
	});
}*/

function eliminarcliente(id_cliente,successEliminarcliente,errorEliminarcliente){
	enviar($("#frm-registro").attr("action-3"),{formulario:{"id_cliente":id_cliente}}, successEliminarcliente, errorEliminarcliente);	
}

function reloadTable(){
	clienteTable.fnReloadAjax(base_url+"mantenimiento/cliente/get_cliente_all/");
}