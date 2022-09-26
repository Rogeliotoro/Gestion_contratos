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
        <h2>Crear Usuarios</h2>
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">Atras</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                <div class="form-group">
                    <strong>Nombre:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Contraseña:</strong>
                    {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Confirma Contraseña:</strong>
                    {!! Form::password('password_confirmation', array('placeholder' => 'Confirma Contraseña','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                </div>
                <div class="form-group">
                    <strong>Sociedades:</strong>
                    {!! Form::select('societies_id', $society, null, ['class' => 'form-control','multiple']) !!}
                </div>
                
                <button type="submit" class="btn btn-success btn-sm mt-2">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection