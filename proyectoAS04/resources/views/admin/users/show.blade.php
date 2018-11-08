@extends('layouts.app2')

@section('content')

@section('titulo', 'Usuario')
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
          <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Vista General</span>
            <h3 class="page-title">Perfil de Usuario</h3>
          </div>
        </div>
        <!-- End Page Header -->
        <!-- Default Light Table -->
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-small mb-4 pt-3">
              <div class="card-header border-bottom text-center">
                <div class="mb-3 mx-auto">
                  <img class="rounded-circle" src="{{ asset('images/avatars/2.jpg') }}" alt="User Avatar" width="110"> </div>
                <h4 class="mb-0">{{Auth::user()->nombre}}</h4>
                <span class="text-muted d-block mb-2">Usuario</span>
                
              </div>
              
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card card-small mb-4">
              <div class="card-header border-bottom">
                <h6 class="m-0">Detalles de la cuenta</h6>
              </div>
              <div class="card-body container-fluid">

                    <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                    <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="far fa-edit"></i> Editar</button></a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'url' => ['/admin/users', $user->id],
                        'style' => 'display:inline'
                    ]) !!}
                        {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-sm',
                                'title' => 'Delete User',
                                'onclick'=>'return confirm("Confirm delete?")'
                        ))!!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>
              <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                  <div class="row">
                    <div class="col">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="feFirstName"><b>Nombre: </b></label>
                            <a>{{Auth::user()->nombre}}</a>
                           </div>
                            <div class="form-group col-md-6">
                                <label for="feInputAddress"><b>Rut: </b></label>
                                <a>{{Auth::user()->rut}}</a>
                            </div>
                          <div class="form-group col-md-6">
                            <label for="feEmailAddress"><b>Email: </b></label>
                            <a>{{Auth::user()->email}}</a> 
                          </div>
                          <div class="form-group col-md-6">
                            <label for="feEmailAddress"><b>Fecha de Registro: </b></label>
                            <a>{{Auth::user()->created_at}}</a> 
                          </div>
                        </div>
                     </div>
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection
