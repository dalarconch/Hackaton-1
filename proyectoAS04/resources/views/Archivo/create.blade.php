@extends('layouts.app2')
@section('title', 'Subir Archivo')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->
@php
    $user = Auth::user();
    $idUser=$user->id;
    $rol=DB::table('role_user')
          ->where('user_id', $idUser)
          ->get()
          ->first();
@endphp 

  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
    @section('titulo', 'Subir Pauta de Evaluación')
  </div>

  <!-- Llama a la vista de Errores para mostrar los mensajes (resources/views/common/errors.blade.php)-->
  @include('common.errors')

  <!-- Formulario -->
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/Archivo" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Nombre de la Pauta:</strong>
          <input type="text" name="nombre_archivo" class="form-control" placeholder="Ejemplo: Pauta Proyecto 2018"> 
      </div>
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Agregar Información Adicional:</strong>
          <input class="form-control" rows="5" id="informacion_adicional" name="informacion_adicional" type="text" placeholder="Ejemplo: Esta es la información adicional"> 
      </div>
      <div class="form-group">
          <input type="file" name="pdf">
      </div>

      <button type="submit" class="btn btn-primary"><i class="fas fa-file-upload"></i>  Subir archivo</button>
  </form>
  

@endsection