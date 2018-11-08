@extends('layouts.app2')
@section('title', 'Socios')
 
@section('content') 
    <!-- TITULO --> 
@php
    $user = Auth::user();
    $idUser=$user->id;
    $rol=DB::table('role_user')
          ->where('user_id', $idUser)
          ->get()
          ->first();
@endphp 
    <div class="form-group ">
        @section('titulo', 'Socios Comunitarios')
    </div>

    <!-- Llamar a la vista de generadora de mensajes-->
    @include('common.sessions')
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
    <!-- Crear Facultad -->
  <div class="row container-fluid">
    <div class="col">
      @if($rol->role_id == 1)
      <div class="form-group">
            <a class="btn btn-success" class="col-sm-6" href="{{ route('Socio.create') }}"><i class="fas fa-plus"></i>  Añadir Socio</a>
      </div>
      @endif
      <div class="form-group">
        {!! Form::open(['method' => 'GET', 'url' => '/Socio', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                  <th tabindex="0" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Áreas de Socio Comunitario</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Acciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($socios as $socio)
                  <tr role="row" class="odd">
                            <td>{{ $socio->nombre_socio }}</td>
                            <td>
                              <a class="col-sm-6" target="_blank" href="/Socio/{{ $socio->id}}">
                              <i class="far fa-eye"></i>
                                Detalles
                              </a>
                            </td>
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
      <div class="form-group col-sm-6 col-lg-4">
        {!! $socios->render() !!}
      </div>
    </div>
  </div>


@endsection

