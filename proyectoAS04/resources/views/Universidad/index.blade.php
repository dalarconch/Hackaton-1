@extends('layouts.app2')
@section('title', 'Universidades')

@section('content') 
    <!-- Obtenemos primero la ID del usuario que se encuentra registrado. Almacenamos en rol todos los datos existentes del usuario actual.-->
    @php
      $user = Auth::user();
      $idUser=$user->id;
      $rol=DB::table('role_user')
            ->where('user_id', $idUser)
            ->get()
            ->first();
    @endphp 
    <!-- TITULO -->
    <div class="form-group ">
        @section('titulo', 'Universidades')
    </div>

    <!-- Llamar a la vista de generadora de mensajes-->
    @include('common.sessions')

    <!-- Crear Facultad -->
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
    <div class="card-body container-fluid">
      <div class="col">

        <!-- Solo aquellos usuarios con el Rol de administrador pueden ver el boton para crear universidades-->
        @if($rol->role_id == 1)
          <div class="form-group">
                <a class="btn btn-success" class="col-sm-6" href="{{ route('Universidad.create') }}"><i class="fas fa-plus"></i>  Ingresar Universidad</a>
          </div>
        @endif
        <!-- Fin if de restriccion por rol Administrador-->
        
        <div class="form-group">
        {!! Form::open(['method' => 'GET', 'url' => '/Universidad', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                  <th tabindex="0" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre Universidad</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Acciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($universidades as $universidad)
                  <tr role="row" class="odd">
                            <td>{{ $universidad->nombre_universidad }}</td>
                            <td>
                              <a class="col-sm-6" target="_blank" href="/Universidad/{{ $universidad->id}}">
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
        {!! $universidades->render() !!}
      </div>
    </div>
    </div>


@endsection
