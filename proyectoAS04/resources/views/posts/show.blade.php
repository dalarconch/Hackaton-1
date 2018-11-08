@extends('layouts.app2')
@section('title', 'Universidad')

@section('content')
	<!-- TITULO --> 
    <div class="form-group col-sm-6 col-lg-4">
        @section('titulo', 'Detalle de Post')
    </div>

    <!-- Llamar a la vista de generadora de mensajes-->
    @include('common.sessions')
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
		<form class="form-horizontal text-center" role="form">

		  	<div class="form-group">
				<strong class="text-muted d-block mb-2">Nombre Post:</strong>	
				<p class="font-weight-normal">{{$post->title}}</p>
		  	</div>

		  <div class="form-group">
			<strong class="text-muted d-block mb-2">Información:</strong>	
			<p class="font-weight-normal">{{$post->body}}</p>
		  </div>

		  <div class="form-group ">
		    <div class="form-group col-sm-10">
		    	<!-- TABLA -->
				<table style="width:35%"> <!-- Utilizacion de una tabla para mostrar los iconos-->
				  <tr>
				  	<!-- Volver Atras -->
				    <th>
				    	<a class="btn btn-primary" class="col-sm-6" href="/posts"><i class="far fa-caret-square-left"></i>  Volver atrás</a>
				    </th>
				  </tr>
				</table>
				<!-- FINTABLA -->
		    </div>
		  </div>
		</form>
	</div>
@endsection

		

		       