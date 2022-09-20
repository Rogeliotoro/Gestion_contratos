@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>Editar Rol</h2>
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('roles.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($role, ['route' => ['roles.update', $role->id],'method' => 'PATCH']) !!}
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Permisios:</strong>
                    <br />
                    @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br />
                    @endforeach
                </div>
                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection