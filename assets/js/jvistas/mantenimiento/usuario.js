var usuarioTable;
var accesosTable;
var id_usuarioreg=0;

$(document).ready(function(){

	$(".SelectAjax").SelectAjax();

	//$('#cboPersona').chosen({width:'200%'});
	//$('#cboCargo').chosen({width:'200%'});

	$("#btn-actualizar").hide();

	$("#btn-cancelar").click(function(){
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	});

	var successEditusuario = function(){
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
		$("#ind_1").removeClass("active");
		$("#ind_2").addClass("active");
		$("#lista").removeClass("in active");
		$("#registro").addClass("in active");
	}

	var errorEditusuario = function(){
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

	var successusuario = function(){
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
		$("#ind_1").removeClass("active");
		$("#ind_2").addClass("active");
		$("#lista").removeClass("in active");
		$("#registro").addClass("in active");
	}

	var errorusuario = function(){
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

	var successEliminarusuario = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Eliminación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEliminarusuario = function(){
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
				enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-registro").serializeObject()}, successEditusuario, errorEditusuario);
			}
		});
	});

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successusuario, errorusuario);
			}
		});
	});

	var usuarioTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					$("#id_usuario").val(aData.nUsuCodigo);
					$("#name_usuario").val(aData.name);
					$("#cboPersona").val(aData.nPerCodigo);
					$("#cboCargo").val(aData.cargo);
					$("#btn-actualizar").show();
					$("#btn-guardar").hide();
					$("#ind_1").removeClass("active");
					$("#ind_2").addClass("active");
					$("#lista").removeClass("in active");
					$("#registro").addClass("in active");
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarusuario(aData.nUsuCodigo,successEliminarusuario,errorEliminarusuario);
				},
			},
			{
				'icon':'fa fa-table',
				'tooltip':'Perfiles',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					id_usuarioreg = aData.nUsuCodigo;
					reloadPerfil(aData.nUsuCodigo);
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		usuarioTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var usuarioOptions = {
		"aoColumns":[
			{ "mDataProp": "name"},
			{ "mDataProp": "nombre"},
			{ "mDataProp": "descripcion"},
		],"fnCreatedRow": usuarioTA.RowCBFunction,
		"sDom": 'T<"clear">lfrtip',
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
	};
	usuarioTable = createDataTable2('tbl_usuario',usuarioOptions);
	reloadTable();

	var arrayCheck = new Array();
	var accesosOptions = {
		"aoColumns":[
			{ "mDataProp": "menu"},
			{ "mDataProp": "submenu"},
			{ "mDataProp": "check"}
		],
		"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			arrayCheck.push($(nRow).find(".cbox"));
			$(nRow).find(".cbox").change(function(){
				if($(this).is(':checked'))
				{
					$(nRow).find(".desc").text(" Con acceso");
					aData.estado = 1;
				}
				else
				{
					$(nRow).find(".desc").text(" Sin acceso");
					aData.estado = 0;
				}
			});
		}
	};
	accesosTable = createDataTable2('tbl_perfil',accesosOptions);

	var successAccesos = function(){
		$.unblockUI({
		    onUnblock: function(){
				bootbox.dialog({
					message: "Actualización correcta", 
					buttons: {
						"success" : {
						"label" : "OK",
						"className" : "btn-sm btn-primary"
						}
					}
				});
				reloadPerfil(id_usuarioreg);
			} 
        });
	}

	var errorAccesos = function(){  
		$.unblockUI({
		    onUnblock: function(){
				bootbox.dialog({
					message: "Error al intentar actualizar accesos", 
					buttons: {
						"success" : {
						"label" : "OK",
						"className" : "btn-sm btn-primary"
						}
					}
				});
			} 
        });			
	}

	$('#btn-guardarperfil').click(function(event) {
		event.preventDefault();
		var datos = CopyArray(accesosTable.fnGetData(),["nOpcion","estado"]);
		if(datos.length!=0){
			var datossend = {
				datos : datos,
				usuario: id_usuarioreg			
			}
			$.blockUI({
				onBlock: function(){
					enviar(base_url+"mantenimiento/usuario/actualizar_perfil",{formulario:datossend}, successAccesos, errorAccesos);
				}
			});
		}
	});

	$('#btn-cancelarperfil').click(function(event) {
		event.preventDefault();
		reloadPerfil(id_usuarioreg);
	});

});

function eliminarusuario(id_usuario,successEliminarusuario,errorEliminarusuario){
	enviar($("#frm-registro").attr("action-3"),{formulario:{"id_usuario":id_usuario}}, successEliminarusuario, errorEliminarusuario);	
}

function reloadTable(){
	usuarioTable.fnReloadAjax(base_url+"mantenimiento/usuario/get_usuario_all/");
}

function reloadPerfil(id_usuario){
	accesosTable.fnReloadAjax(base_url+"mantenimiento/usuario/get_accesos_byperfil/"+id_usuario);
}