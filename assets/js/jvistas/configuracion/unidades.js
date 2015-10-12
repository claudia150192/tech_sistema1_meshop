var unidadesTables;

$(document).ready(function(){

	var successEditUnidades = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Actualización Correcta",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEditUnidades = function(){
		$.niftyNoty({
			type: 'danger',
			icon : 'fa fa-times',
			message : "Se produjo un error al actualizar",
			container : 'floating',
			timer : 3000
		});
	}

	var successUnidades = function(){
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
		$("#frm-registro").reset();
	}

	var errorUnidades = function(){
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
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successUnidades, errorUnidades);
			}
		});
	});

	var unidadesTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					edtiarUnidadMedida(aData.int_constante_id,aData.descripcion,successEditUnidades,errorEditUnidades);
				},
			},
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		unidadesTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var UnidadesOptions = {
		"aoColumns":[
			{ "mDataProp": "int_constante_id"},
			{ "mDataProp": "descripcion"},
		],
		"sDom": 'T<"clear">lfrtip',
		"fnCreatedRow": unidadesTA.RowCBFunction,
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
	};
	unidadesTables = createDataTable2('tbl_unidades',UnidadesOptions);
	reloadTable();

});

function edtiarUnidadMedida(id_unidad,var_descripcion,successEditUnidades,errorEditUnidades){
	bootbox.dialog({
		title: "Actualizar",
		message:'<div class="row">' +'<div class="col-md-12"> ' +
				'<form class="form-horizontal" id="frm-edit" >' + '<div class="form-group"> ' +
				'<label class="col-md-4 control-label" for="descripcion_edit">Descripción</label> ' +
				'<div class="col-md-4"> ' +
				'<input id="descripcion_edit" name="descripcion_edit" type="text" class="form-control input-md" value="'+var_descripcion+'"></div>'+
				'<input id="int_constante_id" name="int_constante_id" type="text" hidden value="'+id_unidad+'"></div>'+
				'</div> ' +'</form> </div> </div>',
		buttons: {
			success: {
				label: "Editar",
				className: "btn-purple",
				callback: function(event) {
					event.preventDefault();
					enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-edit").serializeObject()}, successEditUnidades, errorEditUnidades);
				}
			}
		}
	});
}

function reloadTable(){
	unidadesTables.fnReloadAjax(base_url+"mantenimiento/producto/get_constante_unidadmedida/");
}