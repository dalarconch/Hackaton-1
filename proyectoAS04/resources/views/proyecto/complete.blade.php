<!-- Scripts de muestra de porcentaje para variable porcentaje -->

<script>


  addEventListener('load',inicio,false);

  function inicio()
  {
    document.getElementById('porcentaje').addEventListener('change',cambioPorcentaje,false);
  }

  function cambioPorcentaje()
  {    
    document.getElementById('porc').innerHTML=document.getElementById('porcentaje').value;
  }
</script>


<!-- Fin de Scripts de muestra de porcentaje -->

<!-- Scripts de muestra de porcentaje para variable objalcanzado -->

<script>


  addEventListener('load',inicio,false);

  function inicio()
  {
    document.getElementById('objalcanzados').addEventListener('change',cambioObj,false);
  }

  function cambioObj()
  {    
    document.getElementById('obj').innerHTML=document.getElementById('objalcanzados').value;
  }
</script>


<!-- Fin de Scripts de muestra de porcentaje -->






@extends('layouts.app2')

@section('title', 'Proyecto de A+S')

@section('content')


<!--    Este es el formulario para completar los atributos de la tabla proyectos
        esta en la segunda fase
        necesita arreglos en la vista y en la logica de los atributos -->
  <div class="form-group col-sm-6 col-lg-4">
      <b>@section('titulo', 'Proyecto de A+S')</b>
  </div>

  @include('common.errors')



	<form  method="POST" action="/proyecto/{{ $proyecto->id }}/guardar">
		@csrf 
		<div class="d-flex container-fluid justify-content-center pb-3">
			<div class="card col-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row  justify-content-center py-2 bg-primary border rounded-top text-white">Datos del Proyecto</div>
				<div class="row pt-4">

					<div class="col-sm-6 col-md-6 col-lg-3 pb-4 text-center" >
						<p class="h6" style="font-weight: bold;"><b>Nombre Proyecto:</b></p>
						<strong class="text-muted d-block pb-2">{{$proyecto->nombre_proyecto}}</strong>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-3 pb-4 text-center" >
						<p class="h6" style="font-weight: bold;"><b>Año del Proyecto:</b></p>
						<strong class="text-muted d-block pb-2">{{ $proyecto->anio}}</strong>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-3 pb-4 text-center" >
						<p class="h6" style="font-weight: bold;"><b>Curso Relacionado:</b></p>
						<strong class="text-muted d-block pb-2">{{ $proyecto->ramo}}</strong>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-3 pb-4 text-center" >
						<p class="h6" style="font-weight: bold;"><b>Carrera:</b></p>
						<strong class="text-muted d-block pb-2">{{$carrera->carrera}}</strong>
					</div>

					{{-- <div class="col-sm-6 col-md-6 col-lg-3 pb-4 text-center" >
						<p class="h6" style="font-weight: bold;"><b>Facultad Relacionada:</b></p>
						<strong class="text-muted d-block pb-2">{{ $proyecto->facultad}}</strong>
					</div> --}}

				</div>

				<div class="row justify-content-center py-2 bg-primary text-white text-center">Completar Antecedentes del Proyecto</div>
				
				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center"><h6>Estado Final del Proyecto :</h6></div>
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center">
						<select class="form-control col-12 col-sm-12" id="estado" name="estado">
							<option value="Terminado">Terminado</option>
							<option value="Cancelado">Cancelado</option>
						</select>
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center text-center pb-2"><h6>El Proyecto según su parecer alcanzó un :</h6></div>
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center" >
						0%<input class="col-10 col-sm-10 col-md-4" type="range" id="porcentaje" min="0" max="100" value="50" name="porcentaje">100% <h6>&ensp; Usted dice: &ensp;</h6>
						<span id="porc">50</span>%
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center text-center pb-2"><h6>Los objetivos planteados en un comienzo versus los objetivos alcanzados, ¿en que porcentaje concuerdan?</h6></div>
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center" >
						0%<input class="col-10 col-sm-10 col-md-4" type="range" id="objalcanzados" min="0" max="100" value="50" name="objalcanzados"> 100% <h6>&ensp; Usted dice: &ensp;</h6>
						<span id="obj">50</span>%
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center pb-2"><h6>Resumen: </h6></div>
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center" >
						<textarea class="form-control" rows="6" cols="150" style="resize: none; background-color: #F5F5F5" name="resumen" id="resumen"></textarea>
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center pb-2"><h6> Objetivo A+S: </h6></div>
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center" >
						<textarea class="form-control" rows="6" cols="150" style="resize: none; background-color: #F5F5F5" name="objetivos" id="objetivos"></textarea>
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center pb-2"><h6> Resultados: </h6></div>
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center" >
						<textarea class="form-control" rows="6" cols="150" style="resize: none; background-color: #F5F5F5" name="resultados" id="resultados"></textarea>
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center pb-2"><h6> Conclusiones y Reflexiones: </h6></div>
					<div class="col-12 col-sm-12 col-md-12 d-flex justify-content-center" >
						<textarea class="form-control" rows="6" cols="150" style="resize: none; background-color: #F5F5F5" name="conclusion" id="conclusion"></textarea>
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center"><h6>Cantidad de Estudiantes participantes del Proyecto:</h6></div>
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center">
						<input class="form-control" name="cantidad_alumnos" type="number" min="1" pattern="^[0-9]+">
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center"><h6>¿Los archivos del Proyecto serán visibles para cualquier persona?</h6></div>
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center">
						<select class="form-control col-12 col-sm-12" id="visible" name="visible">
							<option value="si">Sí</option>
							<option value="no">No</option>
						</select>
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center"><h6>Archivos del Proyecto / Sobrescribir Archivos</h6></div>
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center">
						<input type="file" class="form-control" id="nombre_archivo" name="nombre_archivo"  accept=".rar,.zip,.tar">
					</div>
				</div>

				<div class="row py-3">
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center"><h6>Resultados de Encuestas del Proyecto / Sobrescribir Encuestas</h6></div>
					<div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center">
						<input type="file" class="form-control" id="encuesta_archivo" name="encuesta_archivo"  accept=".rar,.zip,.tar,.pdf">
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

@endsection