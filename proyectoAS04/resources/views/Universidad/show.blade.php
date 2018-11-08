@extends('layouts.app2')
@section('title', 'Universidad')

@section('content')
	<!-- TITULO --> 
    <div class="form-group col-sm-6 col-lg-4">
        @section('titulo', 'Detalles de Universidades')
    </div>

    <!-- Llamar a la vista de generadora de mensajes-->
    @include('common.sessions')
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
	<form class="form-horizontal text-center" role="form">

	  <div class="form-group">
		<strong class="text-muted d-block mb-2">Nombre universidad:</strong>	
		<p class="font-weight-normal">{{ $universidades->nombre_universidad }}</p>
	  </div>

	  <div class="form-group">
		<strong class="text-muted d-block mb-2">Información Adicional:</strong>	
		<p class="font-weight-normal">{{ $universidades->informacion }}</p>
	  </div>

	  <div class="form-group">
		<strong class="text-muted d-block mb-2">Fecha de subida:</strong>	
		<p class="font-weight-normal">{{$universidades->created_at}}</p>
	  </div>

	  <div class="form-group">
		<strong class="text-muted d-block mb-2">Última modificación:</strong>	
		<p class="font-weight-normal">{{$universidades->updated_at}}</p>
	  </div>

	  <div class="form-group ">
	    <div class="form-group col-sm-10">
	    	<!-- TABLA -->
			<table style="width:35%"> <!-- Utilizacion de una tabla para mostrar los iconos-->
			  <tr>
			  	<!-- Volver Atras -->
			    <th>
			    	<a class="btn btn-primary" class="col-sm-6" href="{{ route('Universidad.index') }}"><i class="far fa-caret-square-left"></i>  Volver atrás</a>
			    </th>
			    <!-- Editar -->
			    <th>
			    	<a class="btn btn-primary" class="col-sm-6" href="/Universidad/{{ $universidades->id }}/edit" ><i class="far fa-edit"></i>  Editar</a>
			    </th> 
			    <!-- Eliminar -->
			    <th>
			    	<form action="/Universidad/{{$universidades -> id}}">
				    </form>
				   	<form action="/Universidad/{{$universidades -> id}}" method="POST">
				   		@csrf
				   		@method("DELETE")
					    <button type="submit" class="btn btn-danger" onclick= "return confirm('¿Estás seguro?')">
					    	<i class="far fa-trash-alt">
					    	</i>  Eliminar
					    </button>
					</form>
			    </th>
			  </tr>
			</table>
			<!-- FINTABLA -->
	    </div>
	  </div>
	</form>
@endsection
