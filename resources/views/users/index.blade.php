@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h1>Usuarios</h1>
        
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-sm " href="{{ route('users.create') }}"> Crear Usuario</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Sociedad</th>
                            <th width="150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $val)
                                <label class="badge badge-dark">{{ $val }}</label>
                                @endforeach
                                @endif
                            </td>
                            <td>{{ $user->society->name}}</td>
                            <td>
                                <a class="btn btn-default" href="{{ route('users.show',$user->id) }}"><i class=" fa-solid fa-eye " style="color: #5054b1;"></i></a>
                                @can('user-edit')
                                <a class="btn btn-default" href="{{ route('users.edit',$user->id) }}"><i class=" fa-solid fa-pen " style="color: #5054b1;"></i></a>
                                @endcan
                                @can('user-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {{ Form::button('<i class="fa-solid fa-trash" style="color: #5054b1;"></i>', ['class' => 'btn btn-default', 'type' => 'submit']) }}
                                {!! Form::close() !!}
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->render() }}
            </div>
        </div>
    </div>
</div>
@endsection