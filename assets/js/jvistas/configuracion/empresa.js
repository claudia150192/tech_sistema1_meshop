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
				var archivo  =$("#archivo_adjunto").val();
				if(archivo!=""){
				    $.ajaxFileUpload({
				    	url             : $("#frm-registro").attr("action-2"), 
				        secureuri       : false,
				        fileElementId   : 'archivo_adjunto',
				        dataType        : 'json',
				        data            : { 'data':0},
				        success : function (data, status)
				        {	
				            if(data.greeting == 'Bad')
				            {
				                console.log("error de archivo");
				            }else{
				            	console.log(data.resultado);
				            	if(data.resultado!=null){
				            		$.blockUI({
										onBlock: function(){
											enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successcliente, errorcliente);
										}
									});
					            }
				            }
				        }
				    });
				}else{
					$.blockUI({
						onBlock: function(){
							enviar($("#frm-registro").attr("action-1"),{formulario:$("#frm-registro").serializeObject()}, successcliente, errorcliente);
						}
					});
				}
			}
		});
	});

});