@extends('layouts.app2')

@section('title', 'Proyecto de A+S')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

<!--    Este es el formulario para completar los atributos de la tabla proyectos
        esta en la primera fase
        necesita arreglos en la vista y en la logica de los atributos -->


  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      <b>@section('titulo', 'Proyecto de A+S')</b>
  </div>

  @include('common.errors')
  <form  method="POST" action="/proyecto">  
          @csrf
    <div class="d-flex justify-content-center container-fluid">
      <div class="card col-8 col-sm-12 col-md-12 col-lg-12">  <!-- Tarjeta contenedora del formulario de proyecto -->
        <div class="row  justify-content-center py-2 bg-primary border rounded-top border-primary text-white">Datos de coordinador</div>
        <div class="row pt-4 border border-primary rounded-top">                 <!-- Datos generales del formulario de proyecto -->

            <div class="col-sm-6 col-md-6 col-lg-3 pb-4 " >
              <strong class="text-muted d-block pb-2" for="id_profesor">Profesor:</strong>
              <input class="form-control" disabled="disabled" name="id_profesor" type="text" value="{{ $user->nombre}}">
              <input class="form-control" name="id_profesor" type="hidden" value="{{ $user->id}}">
            </div>
            
{{--             @php
            echo $universidad;
            @endphp --}}

            <div class="col-sm-6 col-md-6 col-lg-3 pb-4" >
              <strong class="text-muted d-block pb-2" for="id_universidad">Universidad:</strong>
              <input class="form-control" disabled="disabled" type="text" value="{{$universidad->nombre_universidad}}">
              <input class="form-control" name="universidad" type="hidden" value="{{$universidad->nombre_universidad}}">
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3 pb-4 " >
              <strong class="text-muted d-block pb-2" for="anio">Año:</strong>
              <select id="year" class="form-control col-sm-8" name="anio" value="2018">
                          <option value=2018>2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                </select>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-3 pb-4" >
              <strong class="text-muted d-block pb-2" for="id_course">Carrera:</strong>
              <select class="form-control" id="id_course" name="id_course"><option value="5">Ingenieria civil en informatica</option></select>
            </div>
        </div>

        <div class="row  justify-content-center py-2 bg-primary border border-primary text-white">Proyecto de A+S</div>
        
        <!-- Datos del proyecto -->

        <div class="row py-3 ">
          <strong class="text-muted d-block ml-3 pb-2" for="nombre_proyecto">Nombre del Proyecto:</strong>
          <div class="col-12"><input class="form-control" name="nombre_proyecto" type="text"></div>
        </div>

  <!--       <div class="row  justify-content-center py-1 bg-primary border border-primary text-white"></div>-->

        <div class="row py-3 rounded-top">
          <!-- Ramo -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="ramo">Ramo del Proyecto:</strong>
            <select name="ramo" id="ramo" class=" form-control col-12">
              @foreach($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre_curso }}</option>
              @endforeach
            </select>
          </div>
          <!-- Complejidad -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="complejidad">Complejidad del Proyecto:</strong>
            <div class="form-group col-12">
              <select class="form-control" name="complejidad"><option value="Baja">Baja</option><option value="Media">Media</option><option value="Alta">Alta</option></select>
            </div>
          </div>

          <!-- Duracion -->
          <div class="col-12 col-lg-4">
            <strong class="text-muted d-block ml-3 pb-2" for="duracion">¿Cuál será la duración del Proyecto?</strong>
            <div class="form-group col-12">
              <select class="form-control" name="duracion">
                <option value="1">1 Semestre</option>
                <option value="2">2 Semestres</option>
              </select>
            </div>
          </div>
        </div>

  <!--       <div class="row  justify-content-center py-1 bg-primary border border-primary text-white"></div> -->

        <div class="row py-3">
          <strong class="text-muted d-block ml-3 pb-2" for="sectorsocio">Clasificación del Socio Comunitario:</strong>
          <div class="col-12">
            <select class="form-control" id="sectorsocio" name="sectorsocio">
              @foreach($socios as $socio)
                <option value="{{ $socio->id }}">{{ $socio->nombre_socio }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="row py-3 d-flex justify-content-around ">
            <div class="col-sm-12 col-md-2 pb-1">
                <button type="submit" class="col-sm-12 btn btn-outline-primary">Guardar</button>
            </div>
            <div class="col-sm-12 col-md-2">           
              <a class="col-sm-12 btn btn-outline-info" href="{{ route('proyecto.index') }}">
                <i class="far fa-caret-square-left"></i>  Volver 
              </a>
            </div>

        </div>

      </div>
    </div>
  </form>
{{--    






      <div class="row justify-content-center pt-3">
        <div class="card  mb-3">
          <div class="card-header text-white bg-primary text-center">Proyecto de A+S</div>
          <div class="card-body">
            <h5 class="card-title">Primary card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

    </div>

   
                <div class="panel panel-default">
                    <div class="panel-heading">Nombre del Proyecto</div>
                    <div class="panel-body"><input class="form-control" name="project_name" type="text"></div>
                </div>




<div class="container d-flex d-flex justify-content-between">
      <div class="form-group col-sm-6 col-lg-3">
          <label for="id_profesor">Profesor:</label>
        <input class="form-control" disabled="disabled" name="id_profesor" type="text" value="Profesor Prueba" id="id_profesor">
          <input class="form-control" name="id_profesor" type="hidden" value="9" id="id_profesor">
      </div>

      <div class="form-group col-sm-6 col-lg-4">
          <label for="id_university">Carrera:</label>
        <input class="form-control" disabled="disabled" name="id_university" type="text" value="Universidad de Ays&eacute;n" id="id_university">
           <input class="form-control" name="id_university" type="hidden" value="27" id="id_university">
      </div>

      <div class="form-group col-sm-3 col-lg-2">
          <label for="year">A&ntilde;o:</label>
          <select id="year" class="form-control col-sm-8" name="year" value="2018">
                      <option value=2018>2018</option>
                      <option value="2017">2017</option>
                      <option value="2017">2016</option>
                      <option value="2017">2015</option>
                      <option value="2017">2014</option>
                      <option value="2017">2013</option>
                      <option value="2017">2012</option>
                      <option value="2017">2011</option>
                      <option value="2017">2010</option>
                    </select>

      </div>

      <div class="form-group col-sm-6 col-lg-3">
          <label for="id_course">Carrera:</label>
        <select class="form-control" id="id_course" name="id_course"><option value="5">Ingenieria civil en informatica</option></select>
      </div>
    </div> --}}




{{--     <div class="form-group">
      <strong class="text-muted d-block mb-2">Profesor a cargo:</strong>

      <select name="id_profesor" id="id_profesor" class="form-control">
        @foreach($users as $user)
          <option value="{{ $user->id }}">{{ $user->nombre}}</option>
        @endforeach
      </select>
    </div>

    <div>
      <strong class="text-muted d-block mb-2">Nombre proyecto:</strong>
      <input type="text" name="nombre_proyecto" class="form-control" placeholder="Ejemplo: Juntos en el Colegio" > 
    </div> --}}







    {{-- <form class="col-sm-6 col-lg-4" method="POST" action="/Proyectos">  
        @csrf
         
        <div class="">
          <div class="form-group">
              <strong class="text-muted d-block mb-2">Nombre proyecto:</strong>
              <input type="text" name="nombre_proyecto" class="form-control" placeholder="Ejemplo: Juntos en el Colegio" > 
          </div>
        </div>



        <!-- CLAVE FORANEA - SELECT DE UNIVERSIDADES -->
        <div class="form-group">
          <strong class="text-muted d-block mb-2">Universidad:</strong>
          <select name="id_universidad" id="id_universidad" class="form-control">
            @foreach($universidades as $universidad)
              <option value="{{ $universidad->id }}">{{ $universidad->nombre_universidad }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <strong class="text-muted d-block mb-2">Facultad:</strong>
          <select name="facultad" id="id_facultad" class="form-control">
            @foreach($facultades as $facultad)
              <option value="{{ $facultad->nombre_facultad }}">{{ $facultad->nombre_facultad }}</option>
            @endforeach
          </select>
        </div>

        <!-- CLAVE FORANEA - SELECT DE PROFESORES -->
        <div class="form-group">
          <strong class="text-muted d-block mb-2">Profesor a cargo:</strong>
          <select name="id_profesor" id="id_profesor" class="form-control">
            @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->nombre}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Año del Proyecto:</strong>
            <input type="text" name="anio" class="form-control" placeholder="Ejemplo: 2018" > 
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Duración:</strong>
            <input type="text" name="duracion" class="form-control" placeholder="Ejemplo: 3 años" > 
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Sector Socio Comunitario:</strong>
            <input type="text" name="sectorsocio" class="form-control" placeholder="Ejemplo: Educación" > 
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Ramo:</strong>
            <input type="text" name="ramo" class="form-control" placeholder="Ejemplo: Calidad y Producción de Software" > 
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Complejidad:</strong>
            <input type="text" name="complejidad" class="form-control" placeholder="Ejemplo: Alta, baja o media" > 
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Cantidad Alumnos:</strong>
            <input type="number" name="cantidad_alumnos" class="form-control" placeholder="Ejemplo: 10, 40, 50..." >
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Visible:</strong>
            <select class="form-control" id="visible" name="visible">
                <option value="si">Sí</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Evaluaciones:</strong>
            <input type="text" name="evaluaciones" class="form-control" placeholder="Ejemplo: 3 inspecciones" >
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Otras Evaluaciones:</strong>
            <input type="text" name="otras_evaluaciones" class="form-control" placeholder="Ejemplo: 3 inspecciones" >
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Porcentaje:</strong>
            <input type="text" name="porcentaje" class="form-control" placeholder="Ejemplo: 50" >
        </div>
        <div class="form-group">
            <strong class="text-muted d-block mb-2">Objetivos Alcanzado:</strong>
            <input type="text" name="objalcanzados" class="form-control" placeholder="Ejemplo: 50" >
        </div>






        <div class="form-group">
            <strong class="text-muted d-block mb-2">Resumen:</strong>
            <input type="text" name="resumen" class="form-control" placeholder="Ejemplo: El proyecto consiste en..." >
        </div>
        <div class="form-group">
            <strong class="text-muted d-block mb-2">Objetivos:</strong>
            <input type="text" name="objetivos" class="form-control" placeholder="Ejemplo: Los objetivos son..." >
        </div>
        <div class="form-group">
            <strong class="text-muted d-block mb-2">Resultados:</strong>
            <input type="text" name="resultado" class="form-control" placeholder="" >
        </div>
        <div class="form-group">
            <strong class="text-muted d-block mb-2">Conclusión:</strong>
            <input type="text" name="conclusion" class="form-control" placeholder="Ejemplo: Se cumplieron 3 objetivos..." >
        </div>
        <div class="form-group">
            <strong class="text-muted d-block mb-2">Estado:</strong>
            <input type="text" name="estado" class="form-control" placeholder="Ejemplo: Comenzando, finalizando..." >
        </div>



        <div class="form-group">
            <strong class="text-muted d-block mb-2">Nombre Archivo:</strong>
            <input type="text" name="nombre_archivo" class="form-control" placeholder="" >
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Nombre Extension:</strong>
            <input type="text" name="nombre_extension" class="form-control" placeholder="" >
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Archivo Encuesta:</strong>
            <input type="text" name="encuesta_archivo" class="form-control" placeholder="" >
        </div>

        <div class="form-group">
            <strong class="text-muted d-block mb-2">Extension Encuesta:</strong>
            <input type="text" name="encuesta_extension" class="form-control" placeholder="" >
        </div>

        <div class="form-group">
          <strong class="text-muted d-block mb-2">Cursos:</strong>
          <select name="id_course" id="id_course" class="form-control">
            @foreach($cursos as $curso)
              <option value="{{ $curso->id}}">{{ $curso->nombre_curso}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <strong class="text-muted d-block mb-2">Alumnos Involucrados:</strong>
          <select name="alumnos_table" id="alumnos_table" class="form-control">
            @foreach($users as $user)
              <option value="{{ $user->id }}">{{ $user->nombre}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> --}}

@endsection