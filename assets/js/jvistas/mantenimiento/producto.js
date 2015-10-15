var productoTable;

$(document).ready(function(){

	$(".SelectAjax").SelectAjax();
	
	$("#btn-actualizar").hide();

	$("#btn-cancelar").click(function(){
		$("#cboUnidadMedida").removeAttr("disabled");
        $("#btn-actualizar").hide();
		$("#btn-guardar").show();
		$("#frm-registro").reset();
	});


	var successEditproducto = function(){
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

	var errorEditproducto = function(){
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

	var successproducto = function(){
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

	var errorproducto = function(){
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

	var successEliminarproducto = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Eliminación Satisfactoria",
			container : 'floating',
			timer : 3000
		});
		reloadTable();
	}

	var errorEliminarproducto = function(){
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
				enviar($("#frm-registro").attr("action-2"),{formulario:$("#frm-registro").serializeObject()}, successEditproducto, errorEditproducto);
			}
		});
	});

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successproducto, errorproducto);
			}
		});
	});

    var id_producto;
   
	var productoTA = new DTActions({
		'botones': [
			{
				'icon':'fa fa-edit',
				'tooltip':'editar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					$("#id_producto").val(aData.nProCodigo);
					$("#nombre").val(aData.nombre);
					$("#cboCategoria").val(aData.nCatCodigo);
					$("#cboUnidadMedida").val(aData.unidamedida);
					$("#codproveedor").val(aData.codproveedor);
					$("#marca").val(aData.marca);
					$("#stock").val(aData.cantidad);
					$("#descripcion").val(aData.prod_descripcion);
					$("#precio_compra").val(aData.preciocompra);
					$("#precio_venta").val(aData.precioventa);
					$("#utilidad_porcentaje").val(aData.utilidadporcentaje);
					$("#utilidad_monetaria").val(aData.utilidadmoneda);
					$("#btn-actualizar").show();
					$("#btn-guardar").hide();
					$("#ind_1").removeClass("active");
					$("#ind_2").addClass("active");
					$("#lista").removeClass("in active");
					$("#registro").addClass("in active");
					id_producto=aData.nProCodigo
				$.ajax({
				type: 'GET',
				dataType: "json",
				url:base_url+'mantenimiento/producto/get_producto_por_venta/'+id_producto,
				success:function(data){
					jQuery.each( data.aaData, function( key, value ) {
					if(parseInt(value["contaventa"])==0){
                     $("#cboUnidadMedida").removeAttr("disabled");
					}else{ $("#cboUnidadMedida").attr('disabled', 'disabled');}
					});
		         }
	           });
					
				},
			},
			{
				'icon':'fa fa-remove',
				'tooltip':'eliminar',
				'clickfunction': function(nRow, aData, iDisplayIndex) {
					eliminarproducto(aData.nProCodigo,successEliminarproducto,errorEliminarproducto);
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		productoTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var productoOptions = {
		"aoColumns":[
			{ "mDataProp": "codproveedor"},
			{ "mDataProp": "nombre"},
			{ "mDataProp": "const_descripcion"},
			{ "mDataProp": "marca"},
			{ "mDataProp": "cat_descripcion"},
			{ "mDataProp": "cantidad"},
		],
		"sDom": 'T<"clear">lfrtip',
		"fnCreatedRow":productoTA.RowCBFunction,
		"iDisplayLength": 10
	};
	
	productoTable = createDataTable2('tbl_producto',productoOptions);
	reloadTable();



	$.fn.delayPasteKeyUp = function(fn, ms)
    {
        var timer = 0;
        $(this).on("keyup paste", function()
        {
            clearTimeout(timer);
            timer = setTimeout(fn, ms);
        });
    };
 
    $("input[name=codproveedor]").delayPasteKeyUp(function()
    {
    	$("#busqueda").show();
        $.ajax({
        	type: "POST",
            url: base_url+'mantenimiento/producto/get_find/',
            data: "autocomplete="+$("input[name=codproveedor]").val(),
            success: function(data)
            {
            	if(data)
            	{
            		var json = JSON.parse(data),
            			html = '<div class="list-group">';
            		if(json.res == 'full')
            		{
            			for(datos in json.data)
            			{
            				html+='<a href="#" onclick="info('+json.data[datos].ruc+',\''+json.data[datos].nombre+'\')" class="list-group-item">';
            				html+='<h4 >RUC/DNI:' + json.data[datos].ruc;
            				html+=' Nombre: ' + json.data[datos].nombre+'</h4>';
            				html+='</a>';
            			}
            		}
            // 		else
            // 		{
            // 			alert(json.res);
            // 			html+='<a href="#" class="list-group-item">';
        				// html+='<h4 class="list-group-item-heading">No se ha encontrado nada con '+$("input[name=codproveedor]").val()+'</h4>';
        				// html+='</a>';
            // 		}
            		html+='</div>';
            		$("#busqueda").html("").append(html);
            	}
            }
        });
    }, 500);
 
	$(document).on("click", "a", function()
	{
		$("a").removeClass("active");
		$(this).addClass("active");

	});

});

function info(id,nombre){
	$("#codproveedor").val(id);
	$("#busqueda").hide();
    loadCmbJson();
}


function loadCmbJson(){
//borramos el contenido de los option del select
$("#marca").html("");
//invoca el metodo obtener Json por post
$.ajax({
type: 'GET',
		dataType: "json",
		 url: base_url+"mantenimiento/proveedor/get_marca_all/"+$("#codproveedor").val(),
		success:function(data){
			jQuery.each( data.aaData, function( key, value ) {
            	$("#marca").append("<option value='"+value["int_constante_id"]+"'>"+value["descripcion"]+"</option>");  });
		}
});

}

function eliminarproducto(id_producto,successEliminarproducto,errorEliminarproducto){
	enviar($("#frm-registro").attr("action-3"),{formulario:{"id_producto":id_producto}}, successEliminarproducto, errorEliminarproducto);	
}

function reloadTable(){
	productoTable.fnReloadAjax(base_url+"mantenimiento/producto/get_producto_all/");
}