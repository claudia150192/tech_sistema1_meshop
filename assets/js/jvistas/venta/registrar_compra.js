var proveedorTable, productoTable,comprasTable;

$(document).ready(function(){

$(".SelectAjax").SelectAjax();

$("#btn-modal-proveedor").click(function(e){
	e.preventDefault();
	reloadTable_proveedor();
});

$("#btn-modal-producto").click(function(e){
	e.preventDefault();
	reloadTable_producto();
});

$("#btnSalir-modal-proveedor").click(function(e){
	e.preventDefault();
});

$("#btnSalir-modal-producto").click(function(e){
	e.preventDefault();
});

$("#btn-close-modal-proveedor").click(function(e){
	e.preventDefault();
});

$("#btn-close-modal-producto").click(function(e){
	e.preventDefault();
});

$('#btn_seleccionar_proveedor').click(function(e) {
	e.preventDefault();
	$('#cod_proveedor').val(selectproveedor[0].nProvCodigo);	
	$('#proveedor').val(selectproveedor[0].nombre+" - "+selectproveedor[0].ruc);
});

$('#btn_seleccionar_producto').click(function(e) {
	e.preventDefault();
	$('#cod_producto').val(selectProducto[0].nProCodigo);	
	$('#nombre_producto').val(selectProducto[0].nombre);
	$('#precio_venta').val(selectProducto[0].precioventa);
	$('#precio_venta').val(selectProducto[0].precioventa);
});

$('#btn-limpiartxt-proveedor').click(function(e) {
	e.preventDefault();
	$('#cod_proveedor').val("");	
	$('#proveedor').val("");
	$('#direccion').val("");
});

$('#btn-agregar-detalle').click(function(event) {
	var id = $("#cod_producto").val();
	var nombre = $("#nombre_producto").val();
	var precioventa = parseFloat($("#precio_venta").val());
	var cantidad = parseFloat($("#cant_producto").val());
	var importe = cantidad * precioventa;
	if( id!='' & precioventa!='' & nombre!='' & cantidad!='' ){
		var detalle = new Array();
		var obj = 	{
					'id':id,
					'producto':nombre,
					'preciounidad': precioventa.toFixed(2),
					'cantidad':cantidad.toFixed(2),
					'importe': importe.toFixed(2)
					};
		var index = $(detalleTable.fnGetData()).getIndexObj(obj,'id');

		if(index===null){
			detalle[0] = obj;
			detalleTable.fnAddData(detalle);
			detalle.splice(0,detalle.length);
			
			calcularMontoApagar('importe');

			$("#cod_producto").val('');
			$("#nombre_producto").val('');
			$("#precio_venta").val('');
			$("#cant_producto").val('');
		}
	}else{
		console.log("No se admite campos vacios");
	}
});

	$('#btn-guardar').click(function(event) {
		$.blockUI({
			onBlock: function(){
				var form = $("#frm-registro").serializeObject();
				form["detalle"] = detalleTable.fnGetData();
				enviar($("#frm-registro").attr("action-1"),{formulario:form},successCompra, errorCompra);
			}
		});
		
	});

	var successCompra = function(data){
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
		detalleTable.fnReloadAjax();
		$("#ind_1").removeClass("active");
		$("#ind_2").addClass("active");
		$("#lista").removeClass("in active");
		$("#registro").addClass("in active");
	}

	var errorCompra = function(){
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

	$("#igv_venta").keyup(function(){
		var subtotal = parseFloat($('#subtotal').val());
		var igvventa = $('#igv_venta').val();
		igvventa = parseFloat(subtotal*(igvventa/100));
		$("#monto_igvventa").val(igvventa.toFixed(2));
		var total = (subtotal+igvventa);
		$("#tota_apagar").val(total.toFixed(2));
	});

	$("#cboTipoDocumento").change(function(e){
		e.preventDefault();
		tipoDocumento();
	});

	$('#fechaEmision').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
		});

	$('#fechaVencimiento').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
		});

	$('#fecha_primerpago').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
		});
	
	var selectproveedor = new Array();
	var proveedorOptions = {
		"aoColumns":[
			{ "mDataProp": "ruc"},	
			{ "mDataProp": "nombre"},
			{ "mDataProp": "direccion"}
		],
		"fnCreatedRow":getSimpleSelectRowCallBack(selectproveedor)
	};
	proveedorTable = createDataTable2('tbl_proveedor',proveedorOptions);

	var selectProducto = new Array();
	var ProductoOptions = {
		"aoColumns":[
			{ "mDataProp": "codproveedor"},
			{ "mDataProp": "nombre"},
			{ "mDataProp": "marca"},
			{ "mDataProp": "cat_descripcion"},
			{ "mDataProp": "cantidad"}
		],
		"fnCreatedRow":getSimpleSelectRowCallBack(selectProducto),
	};
	productoTable = createDataTable2('tbl_producto',ProductoOptions);

	var detalleTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-trash fa-lg',
				'tooltip':'Quitar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					var index = $(detalleTable.fnGetData()).getIndexObj(aData,'id');
					detalleTable.fnDeleteRow(index);
					calcularMontoApagar('importe');
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		detalleTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var DetalleOptions = {
		"sDom": '<"clear">rtip',
		"aoColumns":[
			{ "mDataProp": "producto"},
			{ "mDataProp": "preciounidad"},
			{ "mDataProp": "cantidad"},
			{ "mDataProp": "importe"},
		],
		"fnCreatedRow":detalleTA.RowCBFunction
	};
	detalleTable = createDataTable2('tbl_detalle',DetalleOptions);

	$("#fechaEmision").val(fechanow());

	$('#frm-registro').bootstrapValidator({
		message: 'Este valor no es valido',
		fields: {
			precio_venta: {
				validators: {
					numeric: {
						message: 'Valido solo números decimales o enteros'
					}
				}
			},
			cant_producto: {
				validators: {
					numeric: {
						message: 'Valido solo números decimales o enteros'
					}
				}
			}
			,
			subtotal: {
				validators: {
					notEmpty: {
						message: 'Este campo es requerido'
					},
					numeric: {
						message: 'Valido solo números decimales o enteros'
					}
				}
			},
			igv_venta: {
				validators: {
					notEmpty: {
						message: 'Este campo es requerido'
					},
					numeric: {
						message: 'Valido solo números decimales o enteros'
					}
				}
			},
			tota_apagar: {
				validators: {
					notEmpty: {
						message: 'Este campo es requerido'
					},
					numeric: {
						message: 'Valido solo números decimales o enteros'
					}
				}
			}
		}
	}).on('success.field.bv', function(e, data) {
		var $parent = data.element.parents('.form-group');
		$parent.removeClass('has-success');
	});

	/*Lista */
	var ComprasOptions = {
		"aoColumns":[
			{ "mDataProp": "CodigoOrdenCompra"},
			{ "mDataProp": "fecharegistro"},
			{ "mDataProp": "fechaemision"},
			{ "mDataProp": "documento"},
			{ "mDataProp": "numero"},
			{ "mDataProp": "subTotal"},
			{ "mDataProp": "igvporcentaje"},
			{ "mDataProp": "montoTotal"},
			{ "mDataProp": "razonsocial"},
			{ "mDataProp": "nombre"},
		],
		"sDom": '<"H"Trlf>t<"F"ip>',
		"iDisplayLength": 10
		//"fnCreatedRow":detalleTA.RowCBFunction
	};
	comprasTable = createDataTable2('tbl_compras',ComprasOptions);

});

function reloadTable_proveedor(){
	proveedorTable.fnReloadAjax(base_url+"mantenimiento/proveedor/get_proveedor_all/");
}

function reloadTable_producto(){
	productoTable.fnReloadAjax(base_url+"mantenimiento/producto/get_producto_all/");
}

function calcularMontoApagar(campo){
	//$("#subtotal").val(sumArraycol(detalleTable.fnGetData(),campo).toFixed(2));
	$("#tota_apagar").val(sumArraycol(detalleTable.fnGetData(),campo).toFixed(2));
	var impuesto = $("#igv_venta").val();
	var total_apagar = $("#tota_apagar").val();
	var montoimpuesto = parseFloat(total_apagar*(impuesto/100)).toFixed(2);
	var subtotal = parseFloat(total_apagar - montoimpuesto).toFixed(2);
	$("#monto_igvventa").val(montoimpuesto);
	$("#subtotal").val(subtotal);
}