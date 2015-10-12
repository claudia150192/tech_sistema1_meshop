var producto="-1",marcas=-1,categoria=-1;
var saldosTable;
$(document).ready(function(){

	$("#btn-buscar").click(function (e){
		e.preventDefault();
		producto = $("#producto").val()!=""?$("#producto").val():"-1";
		marcas=$("#cboMarcas").val();
		categoria = $("#cboCategoria").val();;
		reloadTable(producto,categoria,marcas);
	});

	$.ajax({
        type: "POST",
        url: base_url+"mantenimiento/categoria/get_categorias_all",
        data: {},
        dataType: "json",
        success: function (data) {
            $('#cboCategoria').append('<option value="-1">Seleccionar categoria</option>');
            $.each(data.aaData, function (key,value) {
                $('#cboCategoria').append('<option value="'+ value['nCatCodigo']+ '">'+value['descripcion']+'</option>');
            });
            $('#cboCategoria').chosen();
        }
    });

    $.ajax({
        type: "POST",
        url: base_url+"mantenimiento/producto/get_marcas_all",
        data: {},
        dataType: "json",
        success: function (data) {
            $('#cboMarcas').append('<option value="-1">Seleccionar marca</option>');
            $.each(data.aaData, function (key,value) {
                $('#cboMarcas').append('<option value="'+ value['marca']+ '">'+value['marca']+'</option>');
            });
            $('#cboMarcas').chosen({width:'100%'});
        }
    });

	var SaldosOptions = {
		"aoColumns":[
			{ "mDataProp": "codproveedor"},
			{ "mDataProp": "nombre"},
			{ "mDataProp": "descripcion"},
			{ "mDataProp": "marca"},
			{ "mDataProp": "desc_categoria"},
			{ "mDataProp": "preciocompra"},
			{ "mDataProp": "precioventa"},
			{ "mDataProp": "cantidad"},
		]
		,"sDom": '<"H"Trl>t<"F"ip>',
		"iDisplayLength": 25
	};
	saldosTable = createDataTable2('tbl_saldosactuales',SaldosOptions);

	reloadTable(producto,categoria,marcas);

});

function reloadTable(producto,categoria,marca){
	saldosTable.fnReloadAjax(base_url+"kardex/servicios/get_producto_all_bycondicion/"+producto+"/"+categoria+"/"+marca);
}
