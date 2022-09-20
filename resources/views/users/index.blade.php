@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header"><h3><strong>Usuarios</strong></h3>
                <span class="float-right">
                    <a class="btn btn-outline-primary btn-sm " href="{{ route('users.create') }}"> Crear Usuario</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="280px">Action</th>
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
                            <td>
                                <a class="btn btn-default" href="{{ route('users.show',$user->id) }}"><i class=" fa-solid fa-eye " style="color: blue;"></i></a>
                                @can('user-edit')
                                <a class="btn btn-default" href="{{ route('users.edit',$user->id) }}"><i class=" fa-solid fa-pen " style="color: blue;"></i></a>
                                @endcan
                                @can('user-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {{ Form::button('<i class="fa-solid fa-trash" style="color: blue;"></i>', ['class' => 'btn btn-default', 'type' => 'submit']) }}
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