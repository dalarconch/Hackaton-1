@extends('layouts.app2')
@section('title', 'Editar Archivo')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->


  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Editar Pauta de Evaluación')
  </div>
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/Archivo/{{ $archivo->id }}" enctype="multipart/form-data">
      <!-- action="/Archivo/ $archivo->id" es enviada a la funcion update del controlador-->
      @csrf
      @method('PUT') <!--HTML no acepta acciones de PUT/PATCH/DELETE por lo que debe ser específicado mediante un método-->
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Nombre de la Pauta:</strong>
          <input type="text" name="nombre_archivo" class="form-control" value="{{ $archivo->nombre_archivo }}"> 
      </div>
      <div class="form-group">
          <strong class="text-muted d-block mb-2">Agregar Información Adicional:</strong>
          <input class="form-control" rows="5" id="informacion_adicional" name="informacion_adicional" type="text" value="{{$archivo->informacion_adicional}}"> 
      </div>
      <div class="form-group">
          <input type="file" name="pdf" placeholder="{{ $archivo->pdf }}">
      </div>

      <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>  Actualizar</button>
  </form>
  
@endsection

