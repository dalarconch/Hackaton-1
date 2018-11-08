@extends('layouts.app2')
@section('title', 'Cursos')

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
        @section('titulo', 'Detalles de Cursos')
    </div>

    <!-- Llamar a la vista de generadora de mensajes-->
    @include('common.sessions')
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
	<form class="form-horizontal text-center" role="form">

	  <div class="form-group">
        <strong class="text-muted d-block mb-2"><b>Nombre Curso: </b></strong>
        <p class="font-weight-normal">{{ $cursos->nombre_curso }}</p>
	  </div>

	  <div class="form-group">
        <strong class="text-muted d-block mb-2"><b>Universidad: </b></strong>
        <p class="font-weight-normal">{{ $cursos->universidad }}</p>
	  </div>

	  <div class="form-group">
        <strong class="text-muted d-block mb-2"><b>Facultad: </b></strong>
        <p class="font-weight-normal">{{ $cursos->facultad }}</p>
	  </div>

	  <div class="form-group">
        <strong class="text-muted d-block mb-2"><b>Fecha de creación: </b></strong>	  	
		<p class="font-weight-normal">{{$cursos->created_at}}</p>
	  </div>

	  <div class="form-group">
	  	<strong class="text-muted d-block mb-2"><b>Última Actualización: </b></strong>
	  	<p class="font-weight-normal">{{$cursos->updated_at}}</p>
	  </div>

	  <div class="form-group ">
	    <div class="form-group col-sm-10">
	    	<!-- TABLA -->
			<table style="width:35%"> <!-- Utilizacion de una tabla para mostrar los iconos-->
			  <tr>
			  	<!-- Volver Atras -->
			    <th>
			    	<a class="btn btn-primary" class="col-sm-6" href="{{ route('Curso.index') }}"><i class="far fa-caret-square-left"></i>  Volver atrás</a>
			    </th>
			    @if($rol->role_id != 2 & $rol->role_id !=4 )
				    <!-- Editar -->
				    <th>
				    	<a class="btn btn-primary" class="col-sm-6" href="/Curso/{{ $cursos->id }}/edit" ><i class="far fa-edit"></i>  Editar</a>
				    </th> 
				    <!-- Eliminar -->
				    <th>
				    	<form action="/Curso/{{$cursos -> id}}">
					    </form>
					   	<form action="/Curso/{{$cursos -> id}}" method="POST">
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
	</form>
@endsection

