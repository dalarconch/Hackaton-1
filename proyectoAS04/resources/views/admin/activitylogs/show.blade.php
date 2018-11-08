@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Actividad {{ $activitylog->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/activitylogs') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/activitylogs', $activitylog->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i> Eliminar', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Activity',
                                    'onclick'=>'return confirm("¿Estás seguro eliminar?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $activitylog->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Actividad </th><td> {{ $activitylog->description }} </td>
                                    </tr>
                                    <tr>
                                        <th> Actor </th>
                                        <td>
                                            @if ($activitylog->causer)
                                                <a href="{{ url('/admin/users/' . $activitylog->causer->id) }}">{{ $activitylog->causer->name }}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Fecha </th><td> {{ $activitylog->created_at }} </td>
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
