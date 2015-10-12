var categoriaTable;

$(document).ready(function(){

	var successEditCategoria = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Actualización Correcta",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEditCategoria = function(){
		$.niftyNoty({
			type: 'danger',
			icon : 'fa fa-times',
			message : "Se produjo un error al actualizar",
			container : 'floating',
			timer : 3000
		});
	}

	var successCategoria = function(){
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

	var errorCategoria = function(){
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

	var successEliminarCategoria = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Eliminación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEliminarCategoria = function(){
		$.niftyNoty({
			type: 'danger',
			icon : 'fa fa-times',
			message : "Se produjo un error al eliminar",
			container : 'floating',
			timer : 3000
		});
	}

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successCategoria, errorCategoria);
			}
		});
	});

	var categoriaTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					edtiarCategoria(aData.nCatCodigo,aData.descripcion,successEditCategoria,errorEditCategoria);
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarCategoria(aData.nCatCodigo,successEliminarCategoria,errorEliminarCategoria);
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		categoriaTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var CategoriaOptions = {
		"aoColumns":[
			{ "mDataProp": "nCatCodigo"},
			{ "mDataProp": "descripcion"},
		],
		"sDom": 'T<"clear">lfrtip',
		"fnCreatedRow": categoriaTA.RowCBFunction,
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
	};
	categoriaTable = createDataTable2('tbl_categoria',CategoriaOptions);
	reloadTable();

});

function edtiarCategoria(id_categoria,var_descripcion,successEditCategoria,errorEditCategoria){
	bootbox.dialog({
		title: "Actualizar",
		message:'<div class="row">' +'<div class="col-md-12"> ' +
				'<form class="form-horizontal" id="frm-edit" >' + '<div class="form-group"> ' +
				'<label class="col-md-4 control-label" for="descripcion_edit">Descripción</label> ' +
				'<div class="col-md-4"> ' +
				'<input id="descripcion_edit" name="descripcion_edit" type="text" class="form-control input-md" value="'+var_descripcion+'"></div>'+
				'<input id="id_categoria" name="id_categoria" type="text" hidden value="'+id_categoria+'"></div>'+
				'</div> ' +'</form> </div> </div>',
		buttons: {
			success: {
				label: "Editar",
				className: "btn-purple",
				callback: function(event) {
					event.preventDefault();
					enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-edit").serializeObject()}, successEditCategoria, errorEditCategoria);
				}
			}
		}
	});
}

function eliminarCategoria(id_categoria,successEliminarCategoria,errorEliminarCategoria){
	enviar($("#frm-registro").attr("action-3"),{formulario:{"id_categoria":id_categoria}}, successEliminarCategoria, errorEliminarCategoria);	
}

function reloadTable(){
	categoriaTable.fnReloadAjax(base_url+"mantenimiento/categoria/get_categorias_all/");
}