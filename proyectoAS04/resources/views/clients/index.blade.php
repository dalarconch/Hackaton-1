@extends('layouts.app2')
@section('title', 'Clientes')

@section('content') 
	<!-- TITULO -->
	<div class="form-group ">
	    @section('titulo', 'Clientes')
	</div>
	<!-- Llamar a la vista de generadora de mensajes-->
	@include('common.sessions')
	<!-- Crear Facultad -->
    <div class="card card-small py-3 mb-4 d-flex align-items-center">
    	<div class="card-body container-fluid">
		    <div class="col">
				<div class="container">
					<div class="card-body p-0 pb-3 text-center">
			          	<table class="table mb-0">
			              	<thead class="bg-light" >
			                	<tr role="row">
				                  	<th tabindex="0" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre Cliente</th>
				                  	<th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Acciones</th>
			                	</tr>
			             	</thead>
			             	<tbody>
			              	@foreach ($clients as $client)
			                  	<tr role="row" class="odd">
			                        <td>
			                        	{{ $client->fullName }}
			                        </td>
			                        <td>
			                          	<a class="col-sm-6" target="_blank" href="/clients/{{$client->rut}}">
			                              <i class="far fa-eye">
			                              </i>
			                                Ver más
			                              </a>
			                        </td>
			                  	</tr>
			             	@endforeach
			              	</tbody>
			          	</table>
			        </div>
			    </div>
			</div>
		</div>
	</div>

@endsection



		
