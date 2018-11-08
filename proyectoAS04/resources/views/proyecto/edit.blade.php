@extends('layouts.app2')

@section('title', 'Editar proyecto')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Editar proyecto')
  </div>




  <form class="" method="POST" action="/proyecto/{{ $proyecto->id }}">
      @csrf
      @method('PUT') <!--HTML no acepta acciones de PUT/PATCH/DELETE por lo que debe ser específicado mediante un método-->
      <div class="d-flex justify-content-center container-fluid">
      <div class="card col-8 col-sm-12 col-md-12 col-lg-12">  <!-- Tarjeta contenedora del formulario de proyecto -->
        <div class="row  justify-content-center py-2 bg-primary border rounded-top border-primary text-white">Datos de coordinador</div>
        <div class="row pt-4 border border-primary rounded-top">                 <!-- Datos generales del formulario de proyecto -->

            <div class="col-sm-6 col-md-6 col-lg-3 pb-4 " >
              <strong class="text-muted d-block pb-2" for="id_profesor">Profesor:</strong>
              <input class="form-control" disabled="disabled" name="id_profesor" type="text" value="{{ $proyecto->profesor}}">
              <input class="form-control" name="id_profesor" type="hidden" value="{{ $proyecto->profesorID}}">
            </div>
            
{{--             @php
            echo $universidad;
            @endphp --}}

            <div class="col-sm-6 col-md-6 col-lg-3 pb-4" >
              <strong class="text-muted d-block pb-2" for="id_universidad">Universidad:</strong>
              <input class="form-control" disabled="disabled" type="text" value="{{$proyecto->universidad}}">
              <input class="form-control" name="id_universidad" type="hidden" value="{{$proyecto->universidadID}}">
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3 pb-4 " >
              <strong class="text-muted d-block pb-2" for="anio">Año:</strong>
              <select id="year" class="form-control col-sm-8" name="anio" value="{{$proyecto->anio}}">
                          <option value=2018>2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                </select>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3 pb-4" >
              <strong class="text-muted d-block pb-2" for="id_course">Carrera:</strong>
              <select class="form-control" id="id_course" name="id_course"><option value="5">Ingenieria civil en informatica</option></select>
            </div>
        </div>

        <div class="row  justify-content-center py-2 bg-primary border border-primary text-white">Proyecto de A+S</div>
        
        <!-- Datos del proyecto -->

        <div class="row py-3 ">
          <strong class="text-muted d-block ml-3 pb-2" for="nombre_proyecto">Nombre del Proyecto:</strong>
          <div class="col-12"><input class="form-control" name="nombre_proyecto" type="text" value="{{$proyecto->nombre_proyecto}}"></div>
        </div>

  <!--       <div class="row  justify-content-center py-1 bg-primary border border-primary text-white"></div>-->

        <div class="row py-3 rounded-top">
          <!-- Ramo -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="ramo">Ramo del Proyecto:</strong>
            <select name="ramo" id="ramo" value="{{$proyecto->ramo}}" class="form-control col-12">
              @foreach($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre_curso }}</option>
              @endforeach
            </select>
          </div>
          <!-- Complejidad -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="complejidad">Complejidad del Proyecto:</strong>
            <div class="form-group col-12">
              <select class="form-control" name="complejidad"><option value="Baja">Baja</option><option value="{{$proyecto->complejidad}}">Media</option><option value="Alta">Alta</option></select>
            </div>
          </div>

          <!-- Duracion -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="duracion">¿Cuál será la duración del Proyecto?</strong>
            <div class="form-group col-12">
              <select class="form-control" name="duracion" value="{{$proyecto->duracion}}">
                <option value="1">1 Semestre</option>
                <option value="2">2 Semestres</option>
              </select>
            </div>
          </div>
        </div>

  <!--       <div class="row  justify-content-center py-1 bg-primary border border-primary text-white"></div> -->

        <div class="row py-3">
          <strong class="text-muted d-block ml-3 pb-2" for="sectorsocio">Clasificación del Socio Comunitario:</strong>
          <div class="col-12">
            <select class="form-control" id="sectorsocio" name="sectorsocio" value="{{$proyecto->socio}}">
              @foreach($socios as $socio)
                <option value="{{ $socio->id }}">{{ $socio->nombre_socio }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row py-3 d-flex justify-content-around ">
            <div class="col-sm-12 col-md-2 pb-1">
                <button type="submit" class="col-sm-12 btn btn-outline-primary">Actualizar</button>
            </div>
            <div class="col-sm-12 col-md-2">           
              <a class="col-sm-12 btn btn-outline-info" href="{{ route('proyecto.index') }}">
                <i class="far fa-caret-square-left"></i>  Volver 
              </a>
            </div>

        </div>

      </div>
    </div>
  </form>
@endsection