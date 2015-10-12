var anular_ventaTable;

$(document).ready(function(){

	var anular_ventaTA = new DTActions({
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
				},
			}
			]
	});

	RowCBF = function(nRow, aData, iDisplayIndex){
		anular_ventaTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	//"fnCreatedRow": anular_ventaTA.RowCBFunction,
	var anular_ventaOptions = {
		"aoColumns":[
			{ "mDataProp": "nVenCodigo" , "sWidth": "10%" },
			{ "mDataProp": "cliente" , "sWidth": "34%"},
			{ "mDataProp": "fecregistro", "sWidth": "13%"},
			{ "mDataProp": "montoTotal" , "sWidth": "13%"},
			{ "mDataProp": "desc_documento", "sWidth": "14%" },
			{ "mDataProp": "desc_formapago",  "sWidth": "10%" },
			{ "mDataProp": "usuario",  "sWidth": "10%" },
			{ "mDataProp": "desc_estado",  "sWidth": "6%"},
		],
		"responsive": true,
		"iDisplayLength": 10,
		"language": {
			"paginate": {
			  "previous": '<i class="fa fa-angle-left"></i>',
			  "next": '<i class="fa fa-angle-right"></i>'
			}
		},
		"sDom": '<"H"Trl>t<"F"ip>',
	};
	anular_ventaTable = createDataTable2('tbl_venta',anular_ventaOptions);
});