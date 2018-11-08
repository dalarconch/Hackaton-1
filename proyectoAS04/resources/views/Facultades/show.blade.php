@extends('layouts.app2')

@section('title', 'Facultades')

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
	@include('Facultades.userforms')
    <div class="form-group col-sm-6 col-lg-4">
        @section('titulo', 'Detalles de Facultades')
    </div>

    <!-- Llamar a la vista de generadora de mensajes-->
    @include('common.sessions')
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
	<form class="form-horizontal text-center" role="form">
	  <div class="form-group">
	    <!-- <label class="col-lg-2 control-label"><b>Nombre Facultad: </b></label> -->
	    <strong class="text-muted d-block mb-2">Nombre Facultad:</strong>
	    <p class="font-weight-normal">{{ $facultad->nombre_facultad }}</p>
<!-- 	    <div class="col-lg-10 ">
  <p class="font-weight-normal"></p>
</div> -->
	  </div>
	  <div class="form-group">
	  	<strong class="text-muted d-block mb-2">Área Facultad:</strong>
	  	<p class="font-weight-normal">{{ $facultad->area_facultad }}</p>
	    <!-- <label class="col-lg-2 control-label"><b>Área Facultad: </b></label> -->
<!-- 	    <div class="col-lg-10">
  <p class="font-weight-normal"></p>
</div> -->
	  </div>
	  <div class="form-group">
	  	<strong class="text-muted d-block mb-2">Fecha de creación:</strong>
	  	<p class="font-weight-normal">{{$facultad->created_at}}</p>
	    <!-- <label class="col-lg-2 control-label"><b>Fecha de creación: </b></label> -->
<!-- 	    <div class="col-lg-10">
  <p class="font-weight-normal"></p>
</div> -->
	  </div>
	  <div class="form-group ">
	    <div class="form-group col-sm-10">
	    	<!-- TABLA -->
			<table style="width:35%"> <!-- Utilizacion de una tabla para mostrar los iconos-->
			  <tr>
			  	<!-- Volver Atras -->
			    <th>
			    	<a class="btn btn-primary" class="col-sm-6" href="{{ route('Facultades.index') }}"><i class="far fa-caret-square-left"></i>  Volver atras</a>
			    </th>
			    @if($rol->role_id == 1)
				    <!-- Editar -->
				    <th>
				    	<a class="btn btn-primary" class="col-sm-6" href="/Facultades/{{ $facultad->id }}/edit" ><i class="far fa-edit"></i>  Editar</a>
				    </th> 
				    <!-- Eliminar -->
				    <th>
				    	<form action="/Facultades/{{$facultad -> id}}">
					    </form>
					   	<form action="/Facultades/{{$facultad -> id}}" method="POST">
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

