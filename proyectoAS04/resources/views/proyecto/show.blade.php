@extends('layouts.app2')

@section('title', 'Proyecto')

@section('content')
  <div class="form-group col-sm-6 col-lg-4">
      <b>@section('titulo', 'Proyecto de A+S')</b>
  </div>
  @php
    $user = Auth::user();
    $idUser=$user->id;
    $rol=DB::table('role_user')
          ->where('user_id', $idUser)
          ->get()
          ->first();
  @endphp 

  <div class="d-flex justify-content-center container-fluid">
   	<div class="card col-8 col-sm-12 col-md-12 col-lg-12">
      <div class="row  justify-content-center py-2 bg-primary border rounded-top border-primary text-white">Mostrando datos de coordinador</div>
    		<div class="row pt-4 border border-primary rounded-top"> 

	    		<div class="col-sm-6 col-md-6 col-lg-3 pb-4 " >
	          <strong class="text-muted d-block pb-2" for="id_profesor">Profesor:</strong>
						<strong>{{$proyecto->profesor}}</strong>
	        </div>

	        <div class="col-sm-6 col-md-6 col-lg-3 pb-4" >
	          <strong class="text-muted d-block pb-2" for="id_universidad">Universidad:</strong>
	          <strong>{{$proyecto->universidad}}</strong>
	        </div>

	        <div class="col-sm-6 col-md-6 col-lg-3 pb-4 " >
	          <strong class="text-muted d-block pb-2" for="anio">Año:</strong>
	          <strong>{{$proyecto->anio}}</strong>
	        </div>

	        <div class="col-sm-6 col-md-6 col-lg-3 pb-4" >
	          <strong class="text-muted d-block pb-2" for="id_course">Carrera:</strong>
	          <strong>{{$carrera->carrera}}</strong>
	        </div>
	      </div>

        <div class="row  justify-content-center py-2 bg-primary border border-primary text-white">Mostrando datos del proyecto de A+S</div>
        
        <!-- Datos del proyecto -->

        <div class="row py-3 ">
          <strong class="col-12 text-muted d-block  pb-2 ml-3" for="nombre_proyecto">Nombre del Proyecto:</strong>
          <div class="col-12 ml-3"><strong>{{ $proyecto->nombre_proyecto }}</strong></div>
        </div>

  <!--       <div class="row  justify-content-center py-1 bg-primary border border-primary text-white"></div>-->

        <div class="row py-3 rounded-top">
          <!-- Ramo -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="ramo">Ramo del Proyecto:</strong>
            <strong class="ml-3">{{ $proyecto->ramo }}</strong>
          </div>
          <!-- Complejidad -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="complejidad">Complejidad del Proyecto:</strong>
						<strong class="ml-3">{{ $proyecto->complejidad }}</strong>
          </div>

          <!-- Duracion -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="duracion">¿Cuál será la duración del Proyecto?</strong>
            <strong class="ml-3">{{ $proyecto->duracion }}&ensp;Semestres</strong>
          </div>
        </div>

  <!--       <div class="row  justify-content-center py-1 bg-primary border border-primary text-white"></div> -->

        <div class="row py-3">
          <strong class="text-muted d-block ml-3 pb-2 col-12" for="sectorsocio">Clasificación del Socio Comunitario:</strong>
					<strong class="col-12 ml-3">{{ $proyecto->socio }}</strong>
        </div>



        <div class="row py-3 d-flex justify-content-around ">

            <div class="col-sm-12 col-md-2">           
              <a class="col-sm-12 btn btn-outline-info" href="{{route('proyecto.index') }}">
                <i class="far fa-caret-square-left"></i>  Volver 
              </a>
            </div>
            @if($rol->role_id == 1 | $rol->role_id == 3)
              <div class="col-sm-12 col-md-2">           
                <a class="col-sm-12 btn btn-outline-info" href="/proyecto/{{ $proyecto->id}}/complete">
                  <i class="far fa-check-square"></i>  Completar
                </a>
              </div>
              {{-- <div class="col-sm-12 col-md-2 pb-1">
                  <button type="submit" class="col-sm-12 btn btn-outline-primary" href="/proyecto/{{ $proyecto->id}}/complete">Completar</button>
              </div> --}}

  			   		<div class="col-sm-12 col-md-2">
  			   			<form action="/proyecto/{{$proyecto->id}}" method="POST">
  			   				@csrf
  			   				@method("DELETE")
  					    	<button type="submit" class="col-sm-12 btn btn-danger" onclick= "return confirm('¿Estás seguro?')">
  					    		<i class="far fa-trash-alt">
  					    		</i>  Eliminar
  					    	</button>
  					    </form>
  					  </div>
            @endif
						
      </div>
   	</div>
  </div>

@endsection

