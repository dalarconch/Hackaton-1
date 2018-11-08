@extends('layouts.app2')

@section('content')
    
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Rol</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/roles') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Editar</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/roles', $role->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Role',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th> <th>Nombre</th><th>Etiqueta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $role->id }}</td> <td> {{ $role->name }} </td><td> {{ $role->label }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
