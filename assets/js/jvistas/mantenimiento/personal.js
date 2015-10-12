var personalTable;

$(document).ready(function(){

	$("#btn-actualizar").hide();

	$("#btn-cancelar").click(function(){
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	});

	var successEditpersonal = function(){
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

	var errorEditpersonal = function(){
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

	var successpersonal = function(){
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

	var errorpersonal = function(){
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

	var successEliminarpersonal = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Eliminación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEliminarpersonal = function(){
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
				enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-registro").serializeObject()}, successEditpersonal, errorEditpersonal);
			}
		});
	});

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successpersonal, errorpersonal);
			}
		});
	});

	var personalTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					console.log(aData.nPerCodigo);
					$("#id_persona").val(aData.nPerCodigo);
					$("#telefono").val(aData.telefono);
					$("#direccion").val(aData.direccion);
					$("#apename").val(aData.nombre);
					$("#dni").val(aData.dni);
					$("#btn-actualizar").show();
					$("#btn-guardar").hide();
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarpersonal(aData.nPerCodigo,successEliminarpersonal,errorEliminarpersonal);
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		personalTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var personalOptions = {
		"aoColumns":[
			{ "mDataProp": "dni"},
			{ "mDataProp": "nombre"},
			{ "mDataProp": "direccion"},
		],"fnCreatedRow": personalTA.RowCBFunction,
		"sDom": 'T<"clear">lfrtip',
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
	};
	personalTable = createDataTable2('tbl_personal',personalOptions);
	reloadTable();

});

/*function edtiarpersonal(id_personal,var_descripcion,successEditpersonal,errorEditpersonal){
	bootbox.dialog({
		title: "Actualizar",
		message:'<div class="row">' +'<div class="col-md-12"> ' +
				'<form class="form-horizontal" id="frm-edit" >' + '<div class="form-group"> ' +
				'<label class="col-md-4 control-label" for="descripcion_edit">Descripción</label> ' +
				'<div class="col-md-4"> ' +
				'<input id="descripcion_edit" name="descripcion_edit" type="text" class="form-control input-md" value="'+var_descripcion+'"></div>'+
				'<input id="id_personal" name="id_personal" type="text" hidden value="'+id_personal+'"></div>'+
				'</div> ' +'</form> </div> </div>',
		buttons: {
			success: {
				label: "Editar",
				className: "btn-purple",
				callback: function(event) {
					event.preventDefault();
					enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-edit").serializeObject()}, successEditpersonal, errorEditpersonal);
				}
			}
		}
	});
}*/

function eliminarpersonal(id_persona,successEliminarpersonal,errorEliminarpersonal){
	enviar($("#frm-registro").attr("action-3"),{formulario:{"id_persona":id_persona}}, successEliminarpersonal, errorEliminarpersonal);	
}

function reloadTable(){
	personalTable.fnReloadAjax(base_url+"mantenimiento/personal/get_personal_all/");
}