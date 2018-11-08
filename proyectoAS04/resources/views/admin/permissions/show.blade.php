@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Permisos</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/permissions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ url('/admin/permissions/' . $permission->id . '/edit') }}" title="Edit Permission"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Editar</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/permissions', $permission->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Permission',
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
                                        <td>{{ $permission->id }}</td> <td> {{ $permission->name }} </td><td> {{ $permission->label }} </td>
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