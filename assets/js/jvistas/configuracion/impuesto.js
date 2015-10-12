$(document).ready(function(){

	var successcliente = function(){
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
	}

	var errorcliente = function(){
		$.unblockUI({
		    onUnblock: function(){
				bootbox.dialog({
					title: "Notificación",
					message: "Error al Guardar Datos", 
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

	$('#btn-guardar').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successcliente, errorcliente);
			}
		});
	});


	$('#btn-guardar2').click(function(event) {
		event.preventDefault();
		$.blockUI({
			onBlock: function(){
				enviar($("#frm-registro2").attr("action-1"),{formulario:$("#frm-registro2").serializeObject()}, successcliente, errorcliente);
			}
		});
	});

	if($('#estado').val()==1){
      $('#estado')[0].checked = true;
	}else{
	  $('#estado')[0].checked = false;
	}


	$('#estado').click(function() {
       if($('#estado').is(':checked')){$('#estado').val(1);}
	   if(!($("#estado").is('checked'))){$('#estado').val(0);}			
    });


});