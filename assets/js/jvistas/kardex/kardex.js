var fechaI="-1",fechaF="-1",tipo="Todos";
var kardexTable;
$(document).ready(function(){

	//$("#fechaI").val(fechanow());
	$('#fechaI').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
		});

	//$("#fechaF").val(fechanow());
	$('#fechaF').datepicker({
		format: "yyyy-mm-dd",
		todayBtn: "linked",
		autoclose: true,
		language: "es",
		});

	$("#btn-buscar").click(function (e){
		e.preventDefault();
		fechaI = $("#fechaI").val()!=""?$("#fechaI").val():"-1";
		fechaF = $("#fechaF").val()!=""?$("#fechaF").val():"-1";
		tipo=$("#cboTodos").val();
		reloadTable(tipo,fechaI,fechaF);
	});

	$('#cboTodos').chosen({width:'100%'});

	var KardexOptions = {
		"aoColumns":[
			{ "mDataProp": "fecha"},
			{ "mDataProp": "documento"},
			{ "mDataProp": "detalle"},
			{ "mDataProp": "producto_nombre"},
			{ "mDataProp": "tipooperacion"},
			{ "mDataProp": "cantidad"},
			{ "mDataProp": "preciounitario"},
		]
		,"sDom": '<"H"Trl>t<"F"ip>',
		"iDisplayLength": 25,
	};
	kardexTable = createDataTable2('tbl_kardex',KardexOptions);
	//reloadTable(tipo,fechaI,fechaF);
});

function reloadTable(tipo,fechaI,fechaF){
	var cant_total_ing=0, cant_total_sal=0;
	kardexTable.fnReloadAjax(base_url+"kardex/servicios/get_kardex_movimiento_all/"+tipo+"/"+fechaI+"/"+fechaF);
	$(kardexTable.fnSettings().aoData).each(function (key,value){
		if(value._aData.tipooperacion == "Salida"){
			$(value.nTr).css({"background-color":"#F3F781"});
			cant_total_sal = cant_total_sal + parseInt(value._aData.cantidad);
		}else{
			$(value.nTr).css({"background-color":"#81F781"});
			cant_total_ing = cant_total_ing + parseInt(value._aData.cantidad);
		}
		
    });
    $("#cant_total_ing").text(cant_total_ing);
    $("#cant_total_sal").text(cant_total_sal);
    $("#cant_total").text(cant_total_ing+cant_total_sal);
}
