@extends('layouts.app2')
@section('title', 'Archivos')

@section('content') 
    <!-- TITULO --> 
    <!-- <div class="form-group col-sm-6 col-lg-4"> -->
    <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Lista de Archivos')
    </div>
@php
    $user = Auth::user();
    $idUser=$user->id;
    $rol=DB::table('role_user')
          ->where('user_id', $idUser)
          ->get()
          ->first();
@endphp 

<!--     </div> -->

    <!-- Llamar a la vista de generadora de mensajes-->
    @include('common.sessions')

    <!-- Crear Facultad -->
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <div class="container-fluid row ">
    <div class="col">
      @if($rol->role_id < 4)
        <div class="form-group">
          <a class="btn btn-success" class="col-sm-6" href="{{ route('Archivo.create') }}"><i class="fas fa-upload"></i>   Subir Pauta</a>
        </div>
      @endif
        <div class="form-group">
        {!! Form::open(['method' => 'GET', 'url' => '/Archivo', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
          <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Buscar...">
              <span class="input-group-append">
                  <button class="btn btn-secondary" type="submit">
                      <i class="fa fa-search"></i>
                  </button>
              </span>
          </div>
          {!! Form::close() !!}
        </div>
        <br/>
        <br/>
        <div class="card-body p-0 pb-3 text-center">
          <table class="table mb-0">
              <thead class="bg-light" >
                <tr role="row">
                    <th tabindex="0" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Nombre Archivo</th>
                    <th class="text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" class="glyphicon .glyphicon-download-alt" >Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($archivos as $archivo)
                    <tr role="row" class="odd">
                              <td>{{ $archivo->nombre_archivo }}</td>
                              <td>
                                <a class="col-sm-6" target="_blank" href="/Archivo/{{ $archivo->id }}/download">
                                  <i class="fas fa-arrow-alt-circle-down"></i>
                                  Descargar
                                </a>
                              
                                <a class="col-sm-6" target="_blank" href="/Archivo/{{ $archivo->id}}">
                                <i class="far fa-eye"></i>
                                  Ver detalles
                                </a>
                              </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <div class="form-group col-sm-6 col-lg-4">
          {!! $archivos->render() !!}
        </div>
      </div>
    </div>
@endsection
