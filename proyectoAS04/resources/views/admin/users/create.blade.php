@extends('layouts.app2')

@section('content')

@section('titulo', 'Crear Usuarios')
                    <div class="card card-small py-3 mb-4 d-flex align-items-center">
                    <div class="card-body container-fluid">
                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/users', 'class' => 'form-horizontal']) !!}

                        @include ('admin.users.form', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>

@endsection 
