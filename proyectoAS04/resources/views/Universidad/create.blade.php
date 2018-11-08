@extends('layouts.app2')
@section('title', 'Añadir Universidad')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Añadir Universidades')
  </div>

  <!-- Llama a la vista de Errores para mostrar los mensajes (resources/views/common/errors.blade.php)-->
  @include('common.errors')
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <!-- Formulario --> 
  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/Universidad">
      @csrf
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Nombre de Universidad:</strong>
          <input type="text" name="nombre_universidad" class="form-control" placeholder="Ejemplo: Universidad Católica del Maule"> 
      </div>
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Agregar Información Adicional:</strong>
          <input class="form-control" rows="5" id="informacion" name="informacion" type="text" placeholder="Ejemplo: Esta es la información adicional"> 
      </div>

      <button type="submit" class="btn btn-primary"><i class="fas fa-file-upload"></i>  Añadir</button>
  </form>
  
@endsection