@extends('layouts.app2')

@section('title', 'Proyectos')

@section('content') 
<!--   <div class="form-group col-sm-6 col-lg-4"> -->
  @section('titulo', 'Lista de Proyectos')
<!--   </div> -->
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
        <div class="form-group">
          @if($rol->role_id == 1 | $rol->role_id == 3)
            <a class="btn btn-primary" class="col-sm-6" href="{{ route('proyecto.create') }}"><i class="fas fa-pencil-alt"></i> Nuevo Proyecto</a>
          @else
            <h5>Proyectos asociados a nuestro sistema</h5>
          @endif
         </div>
        
        <div class="form-group">
        {!! Form::open(['method' => 'GET', 'url' => '/proyecto', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
          <table class="table mb-0 ">
              <thead class="bg-light" >
                <tr role="row">
                  <th tabindex="0" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre Proyecto</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Universidad</th>
                  {{-- <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Curso</th> --}}
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Profesor</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Opciones</th>
                </tr> 
              </thead>
              <tbody>
              @foreach($nombresProyectos as $proyecto)
                  <tr role="row" class="odd">
                            <td>{{ $proyecto->nombre_proyecto}}</td>
                            <td>{{ $proyecto->nombre_universidad }}</td>
                            {{-- <td>{{ $proyecto->nombre_curso}}</td> --}}
                            <td>{{ $proyecto->profesor}}</td> 
                              <td>
                                <a class="col-sm-6" target="_blank" href="/proyecto/{{ $proyecto->id}}"><i class="far fa-eye"></i></a>
                            @if($rol->role_id == 1 | $rol->role_id == 3)
                                <a class="col-sm-6" target="_blank" href="/proyecto/{{ $proyecto->id}}/complete"><i class="far fa-edit"></i></a>
                                <a href="/proyecto/{{ $proyecto->id }}/edit">Editar</a>
                              </td>
                            @endif
                  </tr>
              @endforeach
              </tbody>
          </table>
        </div>
        <div class="form-group col-sm-6 col-lg-4">
        {!! $nombresProyectos->render() !!}
      </div>
    </div>
  </div>
@endsection

