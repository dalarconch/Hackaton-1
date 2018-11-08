@extends('layouts.app2')

@section('content')


@section('titulo', 'Editar Usuarios')
                    
      <!-- / .main-navbar -->
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
                    <h4 class="mb-0">{{$user->nombre}}</h4>
                    <span class="text-muted d-block mb-2">Usuario</span>
                    
                  </div>
                  
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Detalles de la cuenta</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                            <form method="POST" action="/admin/users/{{ $user->id }}" enctype="multipart/form-data">
                              <!-- action="/Archivo/ $archivo->id" es enviada a la funcion update del controlador-->
                              @csrf
                              @method('PUT')
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="{{$usuario->nombre}}"> 
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="feInputAddress">Rut</label>
                                  <input type="text" class="form-control" name="rut" value="{{$usuario->rut}}" disabled> 
                              </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{$usuario->email}}"> </div>
                              <div class="form-group col-md-6">
                                <label for="password">Contraseña</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  value="{{$usuario->password}}" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group col-md-6{{ $errors->has('roles') ? ' has-error' : ''}}">
                                    {!! Form::label('role', 'Rol: ', ['class' => 'control-label']) !!}
                                    {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="universidad">Universidad:</label>
                                        <select name="universidad" id="universidad" class="form-control" placeholder="Universidad" value="{{$usuario->universidad}}" >
                                          @foreach($universidades as $universidad)
                                            <option value="{{ $universidad->id }}">{{ $universidad->nombre_universidad }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                  </div>
                              </div>

                              

                              <div class="form-group col-md-6">
                              <button type="submit" class="btn btn-primary"><i class="far fa-edit"></i>  Actualizar</button>
                              </div>
                            
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>
          </main>
        </div>
       </div>

@endsection
