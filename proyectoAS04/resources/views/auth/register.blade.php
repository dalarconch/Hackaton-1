@extends('layouts.app2')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}  <i class="far fa-id-card"></i></label>

                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" value="{{ old('rut') }}" required placeholder="Ejemplo: 18656310">

                                @if ($errors->has('rut'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre y Apellido') }}  <i class="fas fa-file-signature"></i></label>

                            <div class="col-md-6">
                                <input id="nombre" type="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" placeholder= "Ejemplo: Juanito Pérez" required>

                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}  <i class="far fa-envelope"></i></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Ejemplo: juanito@asd.cl"required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}  <i class="fas fa-user-lock"></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}  <i class="fas fa-user-lock"></i></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
