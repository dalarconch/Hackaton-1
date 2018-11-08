@extends('layouts.app2')

@section('content')
        @section('titulo', 'Permisos')
                    <div class="card card-small py-3 mb-4 d-flex align-items-center">
                     <div class="card-body  container-fluid">
                        <a href="{{ url('/admin/permissions/create') }}" class="btn btn-success btn-sm" title="Add New Permission">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Nuevo
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/permissions', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Buscar...">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Nombre</th><th>Etiqueta</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ url('/admin/permissions', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->label }}</td>
                                        <td>
                                            <a href="{{ url('/admin/permissions/' . $item->id) }}" title="View Permission"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/permissions/' . $item->id . '/edit') }}" title="Edit Permission"><button class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/permissions', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fas fa-trash-alt"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Permission',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination"> {!! $permissions->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>

@endsection
