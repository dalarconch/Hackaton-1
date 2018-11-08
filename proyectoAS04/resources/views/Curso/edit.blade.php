@extends('layouts.app2')
@section('title', 'Editar Curso')

@section('content') 
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Editar Curso')
  </div>
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/Curso/{{ $cursos->id }}" enctype="multipart/form-data">
      @csrf
      @method('PUT') <!--HTML no acepta acciones de PUT/PATCH/DELETE por lo que debe ser específicado mediante un método-->
      <div class="form-group">
        <strong class="text-muted d-block mb-2">Nombre Curso:</strong>
          <input type="text" name="nombre_curso" class="form-control" value="{{ $cursos->nombre_curso }}"> 
      </div>
      <button type="submit" class="btn-primary"><i class="far fa-edit"></i>  Actualizar</button>
  </form>
  
@endsection

