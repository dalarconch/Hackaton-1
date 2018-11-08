@extends('layouts.app2')
@section('title', 'Socios')
 
@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Editar Socios Comunitarios')
  </div>
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <form class="form-group col-sm-6 col-lg-4" method="POST" action="/Socio/{{ $socios->id }}">
      <!-- action="/Archivo/ $archivo->id" es enviada a la funcion update del controlador-->
      @csrf
      @method('PUT') <!--HTML no acepta acciones de PUT/PATCH/DELETE por lo que debe ser específicado mediante un método-->
      <div class="form-group">
          <strong class="text-muted d-block mb-2"> Editar Nombre de Socio Comunitario:</strong>
          <input type="text" name="nombre_socio" class="form-control" value="{{ $socios->nombre_socio }}"> 
      </div>
      <button type="submit" class="btn-primary"><i class="far fa-edit"></i>  Actualizar</button>
  </form>
  
@endsection

