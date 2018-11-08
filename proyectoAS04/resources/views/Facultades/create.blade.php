@extends('layouts.app2')

@section('title', 'Crear Facultad')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Crear Facultad')
  </div>

  @include('common.errors')
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/Facultades">
      @csrf
      <!-- CLAVE FORANEA - SELECT DE UNIVERSIDADES -->
      <div class="form-group">
        <strong class="text-muted d-block mb-2">Universidad:</strong>
        <!-- <label for="">Universidad:</label> -->
        <select name="id_universidad" id="id_universidad" class="form-control">
          @foreach($universidades as $universidad)
            <option value="{{ $universidad->id }}">{{ $universidad->nombre_universidad }}</option>
          @endforeach
        </select>
      </div>
      <!-- CLAVE FORANEA -->
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Nombre Facultad:</strong>
          <!-- <label for="">Nombre Facultad:</label> -->
          <input type="text" name="nombre_facultad" class="form-control" placeholder="Ejemplo: Facultad de Ingeniería" > 
      </div>

      <div class="form-group">
          <strong class="text-muted d-block mb-2">Area Facultad:</strong>
          <!-- <label for="area_facultad">Area Facultad:</label> -->
          <select class="form-control" id="area_facultad" name="area_facultad">
              <option value="Salud">Salud</option>
              <option value="Economia y Negocios">Economía y Negocios</option>
              <option value="Ingenieria">Ingeniería</option>
              <option value="Educacion">Educación</option>
              <option value="Educacion">Ciencias</option>
              <option value="Educacion">Medio Ambiente</option>
          </select>
      </div>

      <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
  
@endsection