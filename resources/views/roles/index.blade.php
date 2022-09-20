@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h2>Roles</h2>
        <div class="card">
            <div class="card-header">
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">Crear Rol</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th width="150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-default" href="{{ route('roles.show',$role->id) }}"><i class=" fa-solid fa-eye " style="color: blue;"></i></a>
                                @can('role-edit')
                                <a class="btn btn-default" href="{{ route('roles.edit',$role->id) }}"><i class=" fa-solid fa-pen " style="color: blue;"></i></a>
                                @endcan
                                @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {{ Form::button('<i class="fa-solid fa-trash" style="color: blue;"></i>', ['class' => 'btn btn-default', 'type' => 'submit']) }}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!!$data->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection