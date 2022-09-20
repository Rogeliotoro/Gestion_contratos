@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header"><h3><strong>Solicitudes</strong></h3>   
                @can('solicitud-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('solicitudes.create') }}">Nueva Solicitud</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Comentarios</th>
                            <th>Estado</th>
                            <th>Sociedades</th>
                            <th>Expedientes</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $solicitud)
                        <tr>
                            <td>{{ $solicitud->id }}</td>
                            <td>{{ $solicitud->titulo }}</td>
                            <td>{{ $solicitud->comentarios }}</td>
                            <td>{{ $solicitud->estado }}</td>
                            <td>{{ $solicitud->societies_id }}</td>
                            <td>{{ $solicitud->files_id }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('solicitudes.show',$solicitud->id) }}">Show</a>
                                @can('solicitud-edit')
                                <a class="btn btn-primary" href="{{ route('solicitudes.edit',$solicitud->id) }}">Edit</a>
                                @endcan
                                @can('solicitud-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['solicitudes.destroy', $solicitud->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
@endsection