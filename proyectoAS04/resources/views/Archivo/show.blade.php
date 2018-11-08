@extends('layouts.app2')
@section('title', 'Archivos')


@section('content')
	<!-- TITULO --> 
@php
		$user = Auth::user();
		$idUser=$user->id;
		$rol=DB::table('role_user')
		      ->where('user_id', $idUser)
		      ->get()
		      ->first();
@endphp 

    <div class="form-group col-sm-6 col-lg-4">
        @section('titulo', 'Detalles de Pauta de Evaluación')
    </div>

    <!-- Llamar a la vista de generadora de mensajes-->
    @include('common.sessions')
    	<div class="card card-small py-3 mb-4 d-flex align-items-center">
		<form class="form-horizontal text-center container-fluid" role="form">

		  <div class="form-group">
		    <strong class="text-muted d-block mb-2">Nombre Archivo:</strong>	  	
		    <p class="font-weight-normal">{{ $archivo->nombre_archivo }}</p>
		  </div>

		  <div class="form-group">
		    <strong class="text-muted d-block mb-2"><b>Información Adicional: </b></strong>
		    <textarea class="font-weight-normal col-lg-5 rounded" rows="6" disabled>{{ $archivo->informacion_adicional }}</textarea>
		  </div>

		  <div class="form-group">
		    <strong class="text-muted d-block mb-2">Fecha de subida: </strong>
		    <p class="font-weight-normal">{{$archivo->created_at}}</p>	    	  	
		  </div>

		  <div class="form-group">
		    <strong class="text-muted d-block mb-2">Última modificación: </strong>	  	
		    <p class="font-weight-normal">{{$archivo->updated_at}}</p>
		  </div>

		  <div class="form-group">
		      <a target="_blank" href="/Archivo/{{ $archivo->id }}/download">
	                      <i class="fas fa-arrow-alt-circle-down"></i>
	                      Descargar Archivo
	           </a>
		  </div>
		</form>
		  <div class="form-group">
		    <div class="form-group col-sm-10">
		    	<!-- TABLA -->
				<table style="width:35%"> <!-- Utilizacion de una tabla para mostrar los iconos-->
				  <tr>
				  	<!-- Volver Atras -->
				    <th>
				    	<a class="btn btn-primary" class="col-sm-6" href="{{ route('Archivo.index') }}"><i class="far fa-caret-square-left"></i>  Volver atrás</a>
				    </th>
				    @if($rol->role_id < 4)
					    <!-- Editar -->
					    <th>
					    	<a class="btn btn-primary" class="col-sm-6" href="/Archivo/{{ $archivo->id }}/edit" ><i class="far fa-edit"></i>  Editar</a>
					    </th> 
					    <!-- Eliminar -->
					    <th>
					    	<form action="/Archivo/{{$archivo -> id}}">
						    </form>
						   	<form action="/Archivo/{{$archivo -> id}}" method="POST">
						   		@csrf
						   		@method("DELETE")
							    <button type="submit" class="btn btn-danger" onclick= "return confirm('¿Estás seguro?')">
							    	<i class="far fa-trash-alt">
							    	</i>  Eliminar
							    </button>
							</form>
					    </th>
					@endif    
				  </tr>
				</table>
				<!-- FINTABLA -->
		    </div>
		  </div>

@endsection

