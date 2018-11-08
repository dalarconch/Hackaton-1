@extends('layouts.app2')
@section('title', 'Crear Facultad')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Crear Curso')
  </div>
  
  @include('common.errors')
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/Curso">
      @csrf
      <!-- CLAVE FORANEA - SELECT DE UNIVERSIDADES -->
      <div class="form-group">
        <strong class="text-muted d-block mb-2">Universidad:</strong>
        <select name="id_universidad" id="select_universidad_curso" class="form-control">
          <option value="">Seleccionar Universidad</option>
          @foreach($universidades as $universidad)
            <option value="{{ $universidad->id }}">{{ $universidad->nombre_universidad}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <strong class="text-muted d-block mb-2">Facultad:</strong>
        <select name="id_facultad" id="select_facultad_curso" class="form-control">
          <option value=""> Seleccionar Facultad</option>
        </select>
      </div>
      <div class="form-group">
        <strong class="text-muted d-block mb-2">Carrera:</strong>
        <select name="id_carrera" id="select_carrera_curso" class="form-control">
          <option value=""> Seleccionar Carreras</option>
        </select>
      </div>
      <!-- CLAVE FORANEA -->
      <div class="form-group">
        <strong class="text-muted d-block mb-2">Nombre Curso:</strong>
          <input type="text" name="nombre_curso" class="form-control" placeholder="Ejemplo: Calidad y Prod. de Software" > 
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/cargar.js"></script>
@endsection