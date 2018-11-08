@extends('layouts.app2')

@section('title', 'Error')

@section('content') 
<!--   <div class="form-group col-sm-6 col-lg-4"> -->
    <div class="form-group col-sm-6 col-lg-4">
          @section('titulo', 'Error de Autorización')
    </div>
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
        <h1 class="text-center">Error 401</h1>
        <div class="error-page">
            <div class="error-content">
                <h3 class="text-center"><i class="fas fa-exclamation-triangle"></i><font color="red"> ¡Oops! Usted no tiene acceso a esta página</font></h3>
                <p class="text-center">Tal vez ingresó la dirección de manera incorrecta, está utilizando un link roto o está intentando acceder a una página en dónde no tiene autorización.
                </p> 
                <div class="form-group">
                    <center>
                        <a class="btn btn-primary" class="col-sm-6" href="/home"><i class="fas fa-arrow-alt-circle-left"></i>   Volver al Inicio</a>
                    </center>
                </div>
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->
    </div>

@endsection