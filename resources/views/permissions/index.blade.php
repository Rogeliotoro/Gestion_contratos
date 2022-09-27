@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h2>Permisos</h2>
        <div class="card">
            <div class="card-header">
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('permissions.create') }}">Crear Permisos</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th width="150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <a class="btn btn-default" href="{{ route('permissions.show',$permission->id) }}"><i class=" fa-solid fa-eye " style="color: #5054b1;"></i></a>
                                @can('role-edit')
                                <a class="btn btn-default" href="{{ route('permissions.edit',$permission->id) }}"><i class=" fa-solid fa-pen " style="color: #5054b1;"></i></a>
                                @endcan
                                @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                {{ Form::button('<i class="fa-solid fa-trash" style="color: #5054b1;"></i>', ['class' => 'btn btn-default', 'type' => 'submit']) }}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!!$data->links()!!}
            </div>
        </div>
    </div>
</div>
@endsection