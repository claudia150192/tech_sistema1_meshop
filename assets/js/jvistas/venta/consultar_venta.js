var fecha=null,anio=0,mes=0,tipo=0;
$(document).ready(function(){

	$("#fechaDia").val(fechanow());
	$("#modal1").hide();
	
	$('#fechaDia').datepicker({
		format: "dd/mm/yyyy",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
		});

	$("#btn-guardar_modal").click(function(event){
       event.preventDefault();
         var cont=0;
         var total_pagar=0;
         var total_pagar_nose=0;

		$('#tbl_anulado tbody tr').each(function () {
			 if($(this).find('td:eq(5) .desc').html()=="Se Anula"){
			 	cont=cont+1;
			 total_pagar_nose=parseFloat(total_pagar_nose)+parseFloat($(this).find('td:eq(4)').html());}
			 else{total_pagar=parseFloat(total_pagar)+parseFloat($(this).find('td:eq(4)').html());}
			 
		});

	  if($('#id_seleccionado').val()!="" && cont==0){
  
         if(total_pagar==0){total_pagar=total_pagar_nose;}

		$('#tbl_anulado tbody tr').each(function () {
            var cod_producto=$(this).find('td:eq(0)').html();
            var cantidad=$(this).find('td:eq(2)').html();
            var preciounidad=$(this).find('td:eq(3)').html();
            var importe=$(this).find('td:eq(4)').html();
            var no_fila=$('#tbl_anulado >tbody >tr').length;
           
            if(no_fila==1){
            	if($('#id_seleccionado').val()==1){
            	enviar($("#AnularForm").attr("action-1"),$("#AnularForm").serializeObject(), null,null);
            	enviar($("#AnularForm").attr("action-2"),{formulario:{"id_venta":$('#id_venta').val(),"id_producto":cod_producto,"cantidad":cantidad,"preciounidad":preciounidad,"importe":importe,"tp_actual":total_pagar}}, successAnularVenta,error);
                }
            }else{
             var estado=$(this).find('td:eq(5) .desc').html();
             if(estado=="Se Anula"){
             	if($('#id_seleccionado').val()==1){
			     if(cont<no_fila){
                   enviar($("#AnularForm").attr("action-2"),{formulario:{"id_venta":$('#id_venta').val(),"id_producto":cod_producto,"cantidad":cantidad,"preciounidad":preciounidad,"importe":importe,"tp_actual":total_pagar}}, successAnularVenta,error);
			     }else if(cont==no_fila){
                   enviar($("#AnularForm").attr("action-1"),$("#AnularForm").serializeObject(), null,null);
            	   enviar($("#AnularForm").attr("action-2"),{formulario:{"id_venta":$('#id_venta').val(),"id_producto":cod_producto,"cantidad":cantidad,"preciounidad":preciounidad,"importe":importe,"tp_actual":total_pagar}}, successAnularVenta,error);
			     }
             }}
         }
        });
        
        $("#AnularForm").reset();	

	  }else{$.niftyNoty({
			type: 'danger',
			icon : 'fa fa-times',
			message : "operación cancelada: No ha seleccionado el tipo de acción o no ha seleccionado un producto",
			container : 'floating',
			timer : 3000
		});}
			
	});	

    $("[id*='_accion']").click(function(event){
    	$("#id_seleccionado").keyup();
		if($(this).html()=="Devolución pactada"){$("#id_seleccionado").val(1);}
		else if($(this).html()=="Por daño"){$("#id_seleccionado").val(0);}

		$("#model_title_anular").html("Causa de la Anulación - "+$(this).html());
	});	

	$("#btn-cancelar_modal").click(function (e){

        $("#AnularForm").reset();	
		$.niftyNoty({
								type: 'danger',
								icon : 'fa fa-times',
								message : "Operación cancelada",
								container : 'floating',
								timer : 3000
		 });
	});

	var faIcon = {
		valid: 'fa fa-check-circle fa-lg text-success',
		invalid: 'fa fa-times-circle fa-lg',
		validating: 'fa fa-refresh'
	}

	$('#AnularForm').bootstrapValidator({
		excluded: [':disabled'],
		feedbackIcons: faIcon,
		fields: {
		comentarios: {
				validators: {
					notEmpty: {
						message: '*Debe de agregar Comentarios'
					}
				}
			},
		id_seleccionado: {
				validators: {
					notEmpty: {
						message: '*No ha seleccionado la acción'
					}
				}
			},
		total_cont: {
				validators: {
					notEmpty: {
						message: '*No ha seleccionado el/los productos'
					}
				}
			}
		}
	});

	$("#btn-dia").click(function (e){
		e.preventDefault();
		tipo = $("#cboTipoDia").val();
		fecha = new Date($("#fechaDia").datepicker("getDates"));
		fecha = fechaFormatoSQL(fecha);
		anio =0;
		mes = 0;
		reloadTable(fecha,anio,mes,tipo);
	});

	$("#btn-mes").click(function (e){
		e.preventDefault();
		fecha=null;
		anio = $("#fechaMesAnio").val();
		mes=$("#cboSeleccionarMes").val();
		tipo = $("#cboTipoMes").val();;
		reloadTable(fecha,anio,mes,tipo);
	});

	$("#btn-anio").click(function (e){
		e.preventDefault();
		fecha=null;
		anio = $("#txt_anio").val();
		mes=0;
		tipo = $("#cboTipoAnio").val();;
		reloadTable(fecha,anio,mes,tipo);
	});

	var successAnularVenta = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Operación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
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

	var detalleTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-search',
				'tooltip':'Visualizar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					window.open(base_url+"view/ver_venta/"+aData.nVenCodigo,'_blank');
				},
			},
			{
				'icon':'fa fa-edit',
				'tooltip':'Anular Venta',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					$("#modal1").click();
					$("#model_title_anular").html("Causa de la Anulación");
					$("#id_venta").val(aData.nVenCodigo);
					reloadAnulados(aData.nVenCodigo);
					// bootbox.confirm("Desea Anular la Venta?", function(result){
					// 	if(result==true){
					// 		enviar(base_url+"venta/anular_venta/anular",{id_venta:aData.nVenCodigo}, successAnularVenta, null);
					// 	}else{
					// 		$.niftyNoty({
					// 			type: 'danger',
					// 			icon : 'fa fa-times',
					// 			message : "Operación cancelada",
					// 			container : 'floating',
					// 			timer : 3000
					// 		});
					// 	}
					// }); 
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		detalleTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var VentasOptions = {
		"aoColumns":[
			{ "mDataProp": "nVenCodigo"},
			{ "mDataProp": "cliente"},
			{ "mDataProp": "fechaemision"},
			{ "mDataProp": "montoTotal"},
			{ "mDataProp": "descripcion"},
			{ "mDataProp": "tipopago"},
			{ "mDataProp": "vendedor"},
			{ "mDataProp": "estado"},
		]
		,"sDom": '<"H"Trl>t<"F"ip>',
		"fnCreatedRow":detalleTA.RowCBFunction
	};
	ventasTable = createDataTable2('tbl_venta',VentasOptions);


var arrayCheck = new Array();
	var anuladosOptions = {
		"aoColumns":[
			{ "mDataProp": "Codproducto"},
			{ "mDataProp": "nombre"},
			{ "mDataProp": "cantidad"},
			{ "mDataProp": "preciounitario"},
			{ "mDataProp": "importe"},
			{ "mDataProp": "check"}
		],
		"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			arrayCheck.push($(nRow).find(".cbox"));
			$(nRow).find(".cbox").change(function(){
				if($(this).is(':checked'))
				{
					$(nRow).find(".desc").text("Se Anula");
					aData.estado = 1;
					$("#total_cont").val(aData.estado);
				}
				else
				{
					$(nRow).find(".desc").text("");
					aData.estado = 0;
					$("#total_cont").val("");
				}
			});
		}
	};
	anuladosTable = createDataTable1('tbl_anulado',anuladosOptions);
});

function reloadTable(fecha,anio,mes,tipo){
	ventasTable.fnReloadAjax(base_url+"venta/consultar_venta/get_ventas_all/"+fecha+"/"+anio+"/"+mes+"/"+tipo);
}

function reloadAnulados(id_venta){
	anuladosTable.fnReloadAjax(base_url+"venta/consultar_venta/get_ventas_facturadas/"+id_venta);
}