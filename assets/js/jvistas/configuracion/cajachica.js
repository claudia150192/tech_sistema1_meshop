$(document).ready(function(){

	var successEditCajaChica = function(){
		$.niftyNoty({
			type: 'primary',
			icon : 'fa fa-check',
			message : "Operación Exitosa",
			container : 'floating',
			timer : 3000
		});
		location.reload();
	}

	var errorEditCajaChica = function(){
		$.niftyNoty({
			type: 'danger',
			icon : 'fa fa-times',
			message : "Se produjo un error vuelva a intentarlo",
			container : 'floating',
			timer : 3000
		});
	}

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successEditCajaChica, errorEditCajaChica);
	});

});