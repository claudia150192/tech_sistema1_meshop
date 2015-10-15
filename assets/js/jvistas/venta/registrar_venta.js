var clienteTable, productoTable;
var ruc_cliente, dni_cliente;

var nro_registro=1;
$(document).ready(function(){

	$("#panel_documento").hide();

	$(".SelectAjax").SelectAjax();

	$("#btn-modal-cliente").click(function(e){
		e.preventDefault();
		reloadTable_cliente();
	});

	$("#btn-modal-producto").click(function(e){
		e.preventDefault();
		reloadTable_producto();
	});

	$("#btnSalir-modal-cliente").click(function(e){
		e.preventDefault();
	});

	$("#btnSalir-modal-producto").click(function(e){
		e.preventDefault();
	});

	$("#btn-close-modal-cliente").click(function(e){
		e.preventDefault();
	});

	$("#btn-close-modal-producto").click(function(e){
		e.preventDefault();
	});

	$('#btn_seleccionar_cliente').click(function(e) {
		e.preventDefault();
		$('#cod_cliente').val(selectCliente[0].id);	
		$('#cliente').val(selectCliente[0].cliente);
		$('#direccion').val(selectCliente[0].direccion);
		ruc_cliente = selectCliente[0].ruc;
		dni_cliente = selectCliente[0].dni;
		tipoDocumento();
	});

	$('#btn_seleccionar_producto').click(function(e) {
		e.preventDefault();
		$('#cod_producto').val(selectProducto[0].nProCodigo);	
		$('#nombre_producto').val(selectProducto[0].nombre);
		$('#precio_venta').val(selectProducto[0].precioventa);
		$('#precio_venta').val(selectProducto[0].precioventa);
		$('#stock_disponible').val(selectProducto[0].cantidad);
	});

	$('#btn-limpiartxt-cliente').click(function(e) {
		e.preventDefault();
		$('#cod_cliente').val("");	
		$('#cliente').val("");
		$('#direccion').val("");
	});

	$('#btn-agregar-detalle').click(function(event) {
		var id = $("#cod_producto").val();
		var nombre = $("#nombre_producto").val();
		var precioventa = parseFloat($("#precio_venta").val());
		var stock = parseFloat($("#stock_disponible").val());
		var cantidad = parseFloat($("#cant_producto").val());
		var importe = cantidad * precioventa;
        var tipo_stock;
        var status_tipo;
		$.ajax({
				type: 'GET',
				dataType: "json",
				url:base_url+'venta/registrar_venta/obtener_tipo_dato_stock/'+id,
				success:function(data){
					jQuery.each( data.aaData, function( key, value ) {
				     
			if( !isNaN(id) & !isNaN(precioventa) & nombre!='' & !isNaN(cantidad) ){
            status_tipo=true;

            if(value["tipo"]=="Entero"){
              if(cantidad % 1==0){status_tipo=true;}else{status_tipo=false;}
              
			}
            
            if(status_tipo){

			if(cantidad<=stock){
			var detalle = new Array();
			var obj = 	{
						'id':id,'producto':nombre,
						'preciounidad': precioventa.toFixed(2),
						'cantidad':cantidad.toFixed(2),
						'importe': importe.toFixed(2)
						};
			var index = $(detalleTable.fnGetData()).getIndexObj(obj,'id');

			if(index===null && nro_registro<=10){

				detalle[0] = obj;
				detalleTable.fnAddData(detalle);
				detalle.splice(0,detalle.length);
				
				calcularMontoApagar('importe');
               
				$("#cod_producto").val('');
				$("#nombre_producto").val('');
				$("#precio_venta").val('');
				$("#cant_producto").val('');
				$("#stock_disponible").val('');
				nro_registro++;
			}
			$("#cant_producto").css('border-color','#ccc');
            $("#cant_producto").attr('data-original-title','Nro Productos a Vender');
		}else{
            $("#cant_producto").css('border-color','red');
            $("#cant_producto").attr('data-original-title','Debe ser menor o igual al Stock disponible.');
			//console.log("La cantidad a vender debe ser menor o igual al Stock disponible.");
		}
	}else{ $("#cant_producto").css('border-color','red');
            $("#cant_producto").attr('data-original-title','El valor ingresado debe ser Entero');}
	}else{
			  
                   bootbox.dialog({
						title: "Error",
						message: "No se admite campos vacios", 
						buttons: {
							danger: {
								label: "Cancelar!",
								className: "btn-danger",
							}
						}
					});
                   //console.log("No se admite campos vacios");
		}

				});}
		});
	
		
	});

	$('#btn-guardar').click(function(event) {
		var estado = false;
		var modopago = $('#cboFormaPago').val();
		var importe = parseFloat($('#importe_producto').val());
		var totap = parseFloat($('#tota_apagar').val());
		var nrocuota = parseFloat($('#nro_cuota').val());
		var fecpg = $('#fecha_primerpago').val();
		var vuelto = parseFloat($('#vuelto').val());

		if(modopago == 1){
				if(totap>=0 && vuelto>=0){
					estado = true;
				}else{
					bootbox.dialog({
						title: "Está Operación: ",
						message: "No Admiten Total Apagar y/o Vuelto como campos valores Negativos", 
						buttons: {
							success: {
								label: "OK!",
								className: "btn-danger",
							}
						}
					});
				}
		}else{
			if(totap>=0){
				if(nrocuota>0 && fecpg.length>0 ){
					estado = true;
				}else{
					bootbox.dialog({
						title: "Está Operación: ",
						message: "Admiten el Número de Cuota y/o Fecha-Primer-Pago vacio", 
						buttons: {
							success: {
								label: "OK!",
								className: "btn-danger",
							}
						}
					});
				}
			}
		}

		if(estado){
			$.blockUI({
				onBlock: function(){
					var form = $("#frm-registro").serializeObject();
					form["detalle"] = detalleTable.fnGetData();
					enviar($("#frm-registro").attr("action-1"),{formulario:form},successVenta, errorVenta);
				}
			});
		}
		
	});

	var successVenta = function(data){
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
		//$("#panel_formulario").hide();
		location.reload();
		window.open(base_url+"view/ver_venta/"+data.datos.idventa,'_blank');
		//cargaData_Impresion(data.datos.idventa);
		//$("#panel_documento").show();
		nro_registro=0;
	}

	var errorVenta = function(){
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

	$("#imprimir").click(function(e){
		e.preventDefault();
		$("#resumen_venta").printThis({
        	importCSS: true,
	        printContainer: false,
	        pageTitle: "",
	        removeInline: true,
	        header: null,
         });
	});

	var successMensaje = function(data){
		console.log(data);
		bootbox.dialog({
			title: "Notificación",
			message: "Mensaje Enviado al correo", 
			buttons: {
				success: {
				label: "OK!",
				className: "btn-success"
				}
			}
		});
		$("#panel_formulario").show();
		$("#panel_documento").hide();
	}

	$('#btn_enviar_correo').click(function(event){
		event.preventDefault();
		$("#compose-modal").modal('hide');	
		enviar($("#EnviarForm").attr("action-1"),$("#EnviarForm").serializeObject(),successMensaje,null);	
	});	

	$("#nro_cuota").keyup(function(){
		var totalApagar = $('#tota_apagar').val();
		var acuenta = $('#importe_producto').val();
		var monto_pendiente = totalApagar - acuenta;
		var nro = $('#nro_cuota').val();
		$("#monto_cuota").val(parseFloat(monto_pendiente/nro).toFixed(2));
	});

	$("#importe_producto").keyup(function(){
		var totalApagar = $('#tota_apagar').val();
		var acuenta = $('#importe_producto').val();
		var saldo = acuenta-totalApagar;
		$("#vuelto").val(parseFloat(saldo).toFixed(2));
	});

	show_componentes_modopago();
	$("#cboFormaPago").change(function(e){
		e.preventDefault();
		show_componentes_modopago();
	});

	if($("#tipo_pago").val()==1){
     $("#cboFormaPago option[value='1']").attr("selected", "selected");
     show_componentes_modopago();
    }else if($("#tipo_pago").val()==2){
	 $("#cboFormaPago option[value='2']").attr("selected", "selected");
	 show_componentes_modopago();
	}

	$("#cboTipoDocumento").change(function(e){
		e.preventDefault();
		tipoDocumento();
	});

	mostrar_documento();
	$("#cboTipoDocumentoVenta").change(function(e){
		mostrar_documento();
		if($("#cboTipoDocumentoVenta").val()==3){
			$('#cboTipoDocumento').selectpicker('val', '2');
		}else{
			$('#cboTipoDocumento').selectpicker('val', '1');
		}
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
	
	var selectCliente = new Array();
	var ClienteOptions = {
		"aoColumns":[
			{ "mDataProp": "dni"},
			{ "mDataProp": "ruc"},	
			{ "mDataProp": "cliente"}
		],
		"fnCreatedRow":getSimpleSelectRowCallBack(selectCliente)
	};
	clienteTable = createDataTable2('tbl_cliente',ClienteOptions);

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
					nro_registro=nro_registro-1;
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
			},
			nro_cuota: {
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

});

function show_componentes_modopago(){
	var modopago = $("#cboFormaPago").val();
	if(modopago==1){
		$("#div_fecha_primerpago").hide();
		$("#div_nro_cuota").hide();
		$("#div_monto_cuota").hide();
		$("#div_nro_dias").hide();
		$("#div_vuelto").show();
	}else{
		$("#nro_cuota").value="";
		$("#monto_cuota").value="";
		$("#fecha_primerpago").value="";
		$("#div_fecha_primerpago").show();
		$("#div_nro_cuota").show();
		$("#div_monto_cuota").show();
		$("#div_vuelto").hide();
		$("#div_nro_dias").show();
	}
}

function reloadTable_cliente(){
	clienteTable.fnReloadAjax(base_url+"mantenimiento/cliente/get_cliente_all/");
}

function reloadTable_producto(){
	productoTable.fnReloadAjax(base_url+"mantenimiento/producto/get_producto_in_stock/");
}

function tipoDocumento(){
	var tipo =$("#cboTipoDocumento").val();
	if(tipo == 1){
		$("#nro_documento").val(dni_cliente);
	}else{
		$("#nro_documento").val(ruc_cliente);
	}
}

function calcularMontoApagar(campo){
	var impuesto = $("#igv_venta").val();
	var subtotal = sumArraycol(detalleTable.fnGetData(),campo).toFixed(2)
	var montoimpuesto = parseFloat(subtotal*(impuesto/100)).toFixed(2);
	var totalpagar = parseFloat(parseFloat(subtotal) +parseFloat(montoimpuesto)).toFixed(2);
	$("#subtotal").val(subtotal);
	$("#igv_monto_venta").val(montoimpuesto);
	$("#tota_apagar").val(totalpagar);
}

// function cargaData_Impresion(id_venta){
// 	//data: "idventa="+id_venta,
// 	$("#nVenta_id").val(id_venta);
// 	var nro_fil=0;
// 	var tbody = $("#detalle_contenido_producto");
// 	$.ajax({
// 		type: 'GET',
// 		dataType: "json",
// 		url:base_url+'venta/registrar_venta/ver/'+id_venta,
// 		success:function(data){
// 			nro_fil = data.aaData.length;
// 			$("#documento-emision").hide();
// 			var subtotal=0;

			// jQuery.each( data.aaData, function( key, value ) {
			// 	$("#titulo_emp").text(value["RazonSocialEmpresa"]);
			// 	$("#ruc_emp").text(value["RucEmpresa"]);
			// 	$("#razonsocial_emp").text(value["RazonSocialEmpresa"]);
			// 	$("#clienteR").text(value["cliente"]);
			// 	$("#rucR").text(value["documento_cliente"]);
			// 	$("#Telefono_emp").text(value["TelefonoEmpresa"]);
			// 	$("#Email_emp").text(value["EmailEmpresa"]);
			// 	$("#direccion_emp").text(value["DireccionEmpresa"]);
			// 	$("#clienteR_direccion").text(value["direccion_cliente"]);
			// 	tipo_documento = value["descripcion"];
			// 	$("#tipdocR").text(tipo_documento);
			// 	$("#sercomR").text(value["serie"]+" - "+value["numero"]);
			// 	var fechaemision = value["fechaemision"];
			// 	$("#fechaEmisionR_dia").text(fechaemision.substring(8,10));
			// 	$("#fechaEmisionR_mes").text(fechaemision.substring(5,7));
			// 	$("#fechaEmisionR_anio").text(fechaemision.substring(0,4));
			// 	$("#vendedorR").text(value["vendedor"]);
			// 	$("#tipoPagoR").text(value["tipopago"]);
			// 	$("#subtotalR").text(value["subTotal"]);
			// 	$("#igvR").text(value["impuestoporcentaje"]);
			// 	var igv = value["impuestoporcentaje"];
			// 	$("#totalR").text(value["montoTotal"]);
			// 	montoTotal = value["montoTotal"];
			// 	var montoimpuesto = parseFloat(montoTotal*(igv/100)).toFixed(2);
			// 	console.log(montoimpuesto);
			// 	$("#montoR").text(montoimpuesto);
			// 	tbody.append(
		 //            '<tr style="height: 30px;font-size: 11px;">'+
		 //            '</td><td >' + value["cantidad"] +
		 //            '</td><td >' + "Unid" + 
		 //            '<td>' + value["nombre"] + 
		 //            '</td><td >' + value["preciounitario"] + 
		 //            '</td><td >' + value["importe"] + 
		 //            '</td></tr>'
		 //            );
			// });
			
			// if(tipo_documento=="BOLETA VENTA"){
			// 	$("#tr_subtotal").hide();
			// 	$("#tr_igv").hide();
			// }

			// $.ajax({
			// 	type: 'POST',
			// 	data: "monto="+montoTotal,
			// 	dataType: "json",
			// 	url:base_url+'venta/registrar_venta/convert_numero_letra/',
			// 	success:function(data){
			// 		$("#texto_letra").text(data);
					
			// 	}
			// });
          
// 				tbody.append(
// 				            '<tr style="height: 30px;font-size: 11px;">'+
// 				            '</td><td >'+
// 				            '</td><td >'+ 
// 				            '<td>'+ 
// 				            '</td><td >'+ 
// 				            '</td><td >'+ 
// 				            '</td></tr>'
// 				            );
// 		}
// 	});

// }

function mostrar_documento(){
	$.ajax({
        type: "POST",
        url: base_url+"venta/registrar_venta/obtenerSerieNumeroDocumento/",
        data: {
            tipodocumento: $("#cboTipoDocumentoVenta").val(),
        },
        dataType: "json",
        success: function (data) {
            $("#documento-emision").show();
            $("#documento-emision").val("Nro "+data.aaData.seriea+" - "+data.aaData.numeroa);
        }
    });
}