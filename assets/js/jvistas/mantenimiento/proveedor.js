var proveedorTable;

$(document).ready(function(){

	$("#btn-actualizar").hide();

	$("#btn-cancelar").click(function(){
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	});

	var successEditproveedor = function(){
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

	var errorEditproveedor = function(){
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

	var successproveedor = function(){
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

	var errorproveedor = function(){
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

	var successEliminarproveedor = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Eliminación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEliminarproveedor = function(){
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
				enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-registro").serializeObject()}, successEditproveedor, errorEditproveedor);
			}
		});
	});

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successproveedor, errorproveedor);
			}
		});
	});

	var proveedorTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					console.log(aData.nProvCodigo);
					$("#id_proveedor").val(aData.nProvCodigo);
					$("#telefono").val(aData.telefono);
					$("#direccion").val(aData.direccion);
					$("#apename").val(aData.nombre);
					$("#ruc").val(aData.ruc);
					$("#email").val(aData.email);
					$("#pageweb").val(aData.pageweb);
					$("#observacion").val(aData.observacion);
					$("#btn-actualizar").show();
					$("#btn-guardar").hide();
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarproveedor(aData.nProvCodigo,successEliminarproveedor,errorEliminarproveedor);
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		proveedorTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var proveedorOptions = {
		"aoColumns":[
			{ "mDataProp": "ruc"},
			{ "mDataProp": "nombre"},
			{ "mDataProp": "telefono"},
			{ "mDataProp": "email"},
		],"fnCreatedRow": proveedorTA.RowCBFunction,
		"sDom": 'T<"clear">lfrtip',
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
	};
	proveedorTable = createDataTable2('tbl_proveedor',proveedorOptions);
	reloadTable();

});

function eliminarproveedor(id_proveedor,successEliminarproveedor,errorEliminarproveedor){
	enviar($("#frm-registro").attr("action-3"),{formulario:{"id_proveedor":id_proveedor}}, successEliminarproveedor, errorEliminarproveedor);	
}

function reloadTable(){
	proveedorTable.fnReloadAjax(base_url+"mantenimiento/proveedor/get_proveedor_all/");
}