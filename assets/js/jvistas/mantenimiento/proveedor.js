var proveedorTable;
var marcaTable;

$(document).ready(function(){

	$("#btn-actualizar").hide();
	$("#btn-actualizar2").hide();
	$("#frm-registro2").hide();
	$("#id_marca").attr('disabled', 'disabled');

	$("#btn-cancelar").click(function(){
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	});

	$("#btn-cancelar2").click(function(){
		$("#btn-actualizar2").hide();
		$("#btn-guardar2").show();
		$("#frm-registro2").reset();
		$("#idmarca").hide();
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
		reloadTable1();
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	}

	var successEditmarca = function(){
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
		reloadTable2();
		$("#btn-actualizar2").hide();
		$("#btn-guardar2").show();
		$("#frm-registro2").reset();
	}

	var errorEdit = function(){
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
		reloadTable1();
		$("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	}

	var successmarca = function(){
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
		reloadTable2();
		$("#btn-actualizar2").hide();
		$("#btn-guardar2").show();
		$("#frm-registro2").reset();
	}


	var error = function(){
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
		reloadTable1();
	}

var successEliminarmarca = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Eliminación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
		reloadTable2();
	}

	var errorEliminar = function(){
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
				enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-registro").serializeObject()}, successEditproveedor, errorEdit);
			}
		});
	});


	$('#btn-actualizar2').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				$("#id_marca").removeAttr("disabled");
				enviar($("#frm-registro2").attr("action-2"),{formulario:$("#frm-registro2").serializeObject()}, successEditmarca, errorEdit);
			    $("#idmarca").hide();
			}
		});
	});

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successproveedor, error);
			}
		});
	});

	$('#btn-guardar2').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro2").attr("action-1"),{formulario:$("#frm-registro2").serializeObject()}, successmarca, error);
			}
		});
	});

	
	$('#ind_1').click(function(event) {
				$("#frm-registro").show();
		        $("#frm-registro2").hide();
		        $("#frm-registro2").reset();
	});

	$('#ind_2').click(function(event) {
		
				$("#frm-registro").hide();
				$("#frm-registro").reset();
                $("#idmarca").hide();
		if($('#idproveedor').val()==""){
             bootbox.dialog({
					title: "Notificación",
					message: "Debe de Seleccionar un Proveedor", 
					buttons: {
						success: {
							label: "OK!",
							className: "btn-danger",
						}
					}
				});
              $("#frm-registro2").hide();
              $("#title").hide();
         }else{$("#frm-registro2").show();
      $("#title").show();}
		
	});


    $('#tbl_proveedor tbody').on( 'click', 'tr', function () {
          $('#idproveedor').val($(this).find('td:eq(0)').text());
          reloadTable2();
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
					$("#pageweb").val(aData.paginaweb);
					$("#observacion").val(aData.observacion);
					$("#btn-actualizar").show();
					$("#btn-guardar").hide();
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarproveedor(aData.nProvCodigo,successEliminarproveedor,errorEliminar);
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
	reloadTable1();

	var marcaTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					console.log(aData.int_constante_id);
					$("#id_marca").val(aData.int_constante_id);
					$("#descripcion").val(aData.descripcion);
					$("#btn-actualizar2").show();
					$("#btn-guardar2").hide();
					$("#idmarca").show();
					$("#id_marca").attr('disabled', 'disabled');
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarmarca(aData.int_constante_id,successEliminarmarca,errorEliminar);
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		marcaTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var marcaOptions = {
		"aoColumns":[
			{ "mDataProp": "int_constante_id"},
			{ "mDataProp": "descripcion"},
		],"fnCreatedRow": marcaTA.RowCBFunction,
		"sDom": 'T<"clear">lfrtip',
		"responsive": true,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
	};

	marcaTable = createDataTable2('tbl_marca',marcaOptions);
	reloadTable2();

});

function eliminarproveedor(id_proveedor,successEliminarproveedor,errorEliminar){
	enviar($("#frm-registro").attr("action-3"),{formulario:{"id_proveedor":id_proveedor}}, successEliminarproveedor, errorEliminar);	
}

function eliminarmarca(int_constante_id,successEliminarmarca,errorEliminar){
	enviar($("#frm-registro2").attr("action-3"),{formulario:{"id_marca":int_constante_id}}, successEliminarmarca, errorEliminar);	
}

function reloadTable1(){
	proveedorTable.fnReloadAjax(base_url+"mantenimiento/proveedor/get_proveedor_all/");
}

function reloadTable2(){
	marcaTable.fnReloadAjax(base_url+"mantenimiento/proveedor/get_marca_all/"+$('#idproveedor').val());
}