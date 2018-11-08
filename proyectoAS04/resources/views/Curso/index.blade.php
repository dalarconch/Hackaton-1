@extends('layouts.app2')
@section('title', 'Cursos') 

@section('content') 
    <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Lista de Cursos')
    </div>

@php
    $user = Auth::user();
    $idUser=$user->id;
    $rol=DB::table('role_user')
          ->where('user_id', $idUser)
          ->get()
          ->first();
@endphp
    @include('common.sessions')
  <div class="card card-small py-3 mb-4 d-flex align-items-center">
  <div class="row container-fluid">
    <div class="col">
      @if($rol->role_id < 4 )
        <div class="form-group">
          <a class="btn btn-success" class="col-sm-6" href="{{ route('Curso.create') }}"><i class="fas fa-pencil-alt"></i> Añadir Curso</a>
        </div>
      @endif
        <div class="form-group">
        {!! Form::open(['method' => 'GET', 'url' => '/Curso', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                  <th tabindex="0" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre Curso</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Universidad</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Carrera</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Opciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach($cursos as $curso)
                  <tr role="row" class="odd">
                            <td>{{ $curso->nombre_curso }}</td>
                            <td>{{ $curso->University['nombre_universidad'] }}</td>
                            <td>{{ $curso->Carrera['nombre_carrera'] }}</td>
                            <td>
                              <a class="col-sm-6" target="_blank" href="/Curso/{{ $curso->id}}">
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
        {!! $cursos->render() !!}
      </div>
    </div>
  </div>
@endsection

