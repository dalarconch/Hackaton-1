@extends('layouts.app2')

@section('title', 'Editar Facultad')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Editar Facultad')
  </div>
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/Facultades/{{ $facultad->id }}" enctype="multipart/form-data">
      @csrf
      @method('PUT') <!--HTML no acepta acciones de PUT/PATCH/DELETE por lo que debe ser específicado mediante un método-->
      <div class="form-group">
        <strong class="text-muted d-block mb-2">Editar Nombre Facultad:</strong>
          <!-- <label for="">Editar Nombre Facultad</label> -->
          <input type="text" name="nombre_facultad" class="form-control" value="{{ $facultad->nombre_facultad }}"> 
      </div>
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Editar Área Facultad:</strong>
          <!-- <label for="">Editar Área Facultad</label> -->
          <div class="form-group">
            <select class="form-control" id="area_facultad" name="area_facultad" >
                <option value="Salud">Salud</option>
                <option value="Economia y Negocios">Economia y Negocios</option>
                <option value="Ingenieria">Ingenieria</option>
                <option value="Educacion">Educacion</option>
            </select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>  Actualizar</button>
  </form>
@endsection