@extends('layouts.app2')

@section('title', 'Informes')

@section('content') 
<!--   <div class="form-group col-sm-6 col-lg-4"> -->
  	<div class="form-group col-sm-6 col-lg-4">
    	@section('titulo', 'Informes')
  	</div>
  	@include('common.sessions')
  	<div class="card card-small py-3 mb-4 d-flex align-items-center">
  		<div class="row container-fluid">
			    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			    <script type="text/javascript">

			    	//----------- Grafico 1 -------------------- 
			      	google.charts.load('current', {'packages':['corechart']});
				    google.charts.setOnLoadCallback(drawChart);

			      	function drawChart() {

			        	var data = google.visualization.arrayToDataTable([
			          	['Universidades', 'Cantidad Proyectos'],
			          	@foreach ($proy as $p)
			          		['{{$p->nombre_universidad}}',{{$p->proy_count}}],
			          	@endforeach
			        ]);

			        var options = {
			          title: 'Cantidad de Proyectos por Universidad'
			        };

			        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

			        chart.draw(data, options);
			      	}

			      	//----------- Grafico 2 -------------------- 
			      	google.charts.load('current', {packages: ['corechart', 'bar']});
					google.charts.setOnLoadCallback(drawBasic);

					function drawBasic() {

					      var data = google.visualization.arrayToDataTable([
					        ['Universidad', 'Año 2018',],
					        @foreach($anio as $a)
					        	['{{$a->nombre_universidad}}', {{$a->anio_count}}],
					        @endforeach
					        // ['Los Angeles, CA', 3792000],
					        // ['Chicago, IL', 2695000],
					        // ['Houston, TX', 2099000],
					        // ['Philadelphia, PA', 1526000]
					      ]);

					      var options = {
					        title: 'Cantidad de Proyectos en el año 2018 por Universidades',
					        chartArea: {width: '50%'},
					        hAxis: {
					          title: 'Cantidad de Proyectos',
					          minValue: 0
					        },
					        vAxis: {
					          title: 'Universidad'
					        }
					      };

					      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

					      chart.draw(data, options);
					    }

			    
			    
			    </script>
			  <body>
			    <div id="piechart" style="width: 900px; height: 500px;"></div>
			    <div id="chart_div" style="width: 900px; height: 500px;"></div>
			  </body>
  		</div>
	</div>
@endsection