@extends('layouts.app2')

@section('title', 'Crear Facultad')

@section('content')
<!-- Id University Field 
  <input class="form-control" name="id_university" type="hidden" value="27">
-->

<!--    Este es el formulario para completar los atributos de la tabla proyectos
        esta en la primera fase
        necesita arreglos en la vista y en la logica de los atributos -->


  <!-- TITULO -->
  <div class="form-group col-sm-6 col-lg-4">
      @section('titulo', 'Crear Proyecto')
  </div>

  @include('common.errors')

  <form class="form-group col-sm-6 col-lg-4 text-center" method="POST" action="/proyecto">  
      @csrf

      <div class="form-group">
          <strong class="text-muted d-block mb-2">Nombre proyecto:</strong>
          <input type="text" name="nombre_proyecto" class="form-control" placeholder="Ejemplo: Juntos en el Colegio" > 
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
        <strong class="text-muted d-block mb-2">Socio Comunitario:</strong>
        <select name="sectorsocio" id="nombre_socio" class="form-control">
          @foreach($socios as $socio)
            <option value="sectorsocio">{{ $socio->nombre_socio }}</option>
          @endforeach
        </select>
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
  </form>
  
@endsection