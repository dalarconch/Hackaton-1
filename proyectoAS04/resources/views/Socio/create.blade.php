@extends('layouts.app2')
@section('title', 'Socios') 
 
@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Añadir Socios Comunitarios')
  </div>

  <!-- Llama a la vista de Errores para mostrar los mensajes (resources/views/common/errors.blade.php)-->
  @include('common.errors')
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <!-- Formulario -->
  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/Socio">
      @csrf
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Áreas de Socio Comunitario:</strong>
          <input type="text" name="nombre_socio" class="form-control" placeholder="Ejemplo: Construcción"> 
      </div>

      <button type="submit" class=" btn btn-primary"><i class="fas fa-file-upload"></i>  Añadir</button>
  </form>
  
@endsection

