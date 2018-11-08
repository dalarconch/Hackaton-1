$(function(){
	$('#select_universidad_carrera').on('change', onSelectUniversidadCarrera)

});

$(function(){
	$('#select_universidad_curso').on('change', onSelectUniversidadCurso)

});

$(function(){
	$('#select_facultad_curso').on('change', onSelectFacultadCurso)

});

function onSelectUniversidadCarrera(){
	var IDuniversidad = $(this).val(); //Obtiene ID de la universidad seleccionada en el evento

	//AJAX
	if(!IDuniversidad)
		$('#select_facultad_carrera').html('<option value=""> Seleccionar Facultad</option>'); //No dejar el valor anterior en value

	$.get('/api/universidad/'+IDuniversidad+'/facultad', function(data){
	//$.get('/api/universidad/2/facultad', function(data){
		//console.log(data) Imprimir en consola los resultados de las facultades asociadas

		var html_select = '<option value=""> Seleccionar Facultad</option>';
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].nombre_facultad+'</option>';
			console.log(html_select) //verifico por consola buen funcionamiento 
			$('#select_facultad_carrera').html(html_select);

	});	
}

function onSelectUniversidadCurso(){
	var IDuniversidad = $(this).val(); //Obtiene ID de la universidad seleccionada en el evento
	console.log(IDuniversidad)
	//AJAX
	if(!IDuniversidad)
		$('#select_facultad_curso').html('<option value=""> Seleccionar Facultad</option>'); //No dejar el valor anterior en value

	$.get('/api/universidad/'+IDuniversidad+'/facultad', function(data){
	//$.get('/api/universidad/2/facultad', function(data){
		//console.log(data) Imprimir en consola los resultados de las facultades asociadas

		var html_select = '<option value=""> Seleccionar Facultad</option>';
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].nombre_facultad+'</option>'; 
			console.log(html_select) //verifico por consola buen funcionamiento
			$('#select_facultad_curso').html(html_select);

	});	
}

function onSelectFacultadCurso(){
	var IDfaculdad = $(this).val(); //Obtiene ID de la universidad seleccionada en el evento
	console.log(IDfaculdad)
	//AJAX
	if(!IDfaculdad)
		$('#select_carrera_curso').html('<option value=""> Seleccionar Carrera</option>'); //No dejar el valor anterior en value

	$.get('/api/facultad/'+IDfaculdad+'/carreras', function(data){
	//$.get('/api/universidad/2/facultad', function(data){
		//console.log(data) Imprimir en consola los resultados de las facultades asociadas

		var html_select = '<option value=""> Seleccionar Carreras</option>';
		for (var i=0; i<data.length; ++i)
			html_select += '<option value="'+data[i].id+'">'+data[i].nombre_carrera+'</option>';
			console.log(html_select) //verifico por consola buen funcionamiento
			$('#select_carrera_curso').html(html_select);

	});	
}