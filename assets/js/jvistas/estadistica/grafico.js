
$(document).ready(function(){
	var anio = (new Date).getFullYear();
	var res = getAjaxObject(base_url+"estadistica/grafico/get_grafico/"+anio);
	
	/*Morris.Area({
		element: 'demo-morris-area',
		data: res,
		gridEnabled: false,
		gridLineColor: 'transparent',
		behaveLikeLine: true,
		xkey: 'period',
		ykeys: ['dl'],
		labels: ['Monto'],
		lineColors: ['#045d97'],
		pointSize: 0,
		pointStrokeColors : ['#045d97'],
		lineWidth: 0,
		resize:true,
		hideHover: 'auto',
		fillOpacity: 0.7,
		parseTime:false
	});*/
	
	Morris.Bar({
		element: 'demo-morris-bar',
		data: res,
		xkey: 'period',
		ykeys: ['dl'],
		labels: ['Monto'],
		gridEnabled: false,
		gridLineColor: 'transparent',
		barColors: ['#177bbb', '#afd2f0'],
		resize:true,
		hideHover: 'auto'
	});

});