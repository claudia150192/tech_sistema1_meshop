function DTActions(options)
{
	var divaction = $("<div class='actions'>");
	var divbubble = $("<div class='action-bubble'>");
	var divcontainer = $("<div class='action_container'>");
	var ul = $(getButtons(options));

	divaction.append(divbubble);
	divbubble.append(divcontainer);
	divcontainer.html(ul);

	var count = options.botones.length - 1;
	var offset = count*28;
		
	divcontainer.css("height",parseInt(26+offset)+"px");
	divbubble.css("height",parseInt(34+offset)+"px");
		
	this.RowCBFunction = function(nRow, aData, iDisplayIndex)
	{
    	$(nRow).click( function(e)
    	{
    		e.preventDefault();
    		var tr = $(this);
    		var tabla = $(tr.closest('table'));
    		divaction.find('.btn-action').tooltip('destroy');
    		divaction.find(".tooltip").remove();	
    		var botones = $(options.botones);

			if ( tr.hasClass('row_selected') ) {
	            tr.removeClass('row_selected');
	            divaction.remove();	            
	            IdReservaSelected = null;
	        }
			else {
				divaction.show();
				var tds = $(this).find("td");
				$(tabla.dataTable().fnGetNodes()).removeClass('row_selected');
	            tr.addClass('row_selected');
	            $(tds[tds.length-1]).append(divaction);

	            tr.find("button").removeAttr("disabled");

	            botones.each(function(index){
	            	var boton = this;
	            	if( typeof boton.condition != "undefined")
		            	if(!boton.condition(nRow, aData, iDisplayIndex))
		            		ul.find("#btn-"+index).attr("disabled",true);
					ul.find("#btn-"+index).click(function(e){
						e.preventDefault();
						$(this).tooltip('destroy');
						boton.clickfunction(nRow, aData, iDisplayIndex);
					});
	            });
				tr.find('[data-toggle="tooltip"]').tooltip({"placement":"top",delay: { show: 400, hide: 1 }});
        	}
		});
    };
}

function getButtons(options){
	actions = "<ul>";

	var botones = $(options.botones);

	botones.each(function(index){
		var tooltip = "unknown";
		var icon = "icon-ban-circle";
		
		if(typeof this.icon != "undefined")
			icon = this.icon;
		if(typeof this.tooltip != "undefined")
			tooltip = this.tooltip;
		actions += '<li><button class="btn btn-white btn-sm btn-action" id="btn-'+index+'" data-toggle="tooltip" data-placement="top" title="'+tooltip+'"><i class="'+icon+'"></i></button></li>';
	});

	actions += '</ul>';
	return actions;
}