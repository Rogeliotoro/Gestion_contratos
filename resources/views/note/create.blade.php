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
        <h2>Crear Nota</h2>
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('notes.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'notes.store','method'=>'POST')) !!}
                <div class="form-group">
                    <strong>Contenido:</strong>
                    {!! Form::textarea('nota', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Solicitudes:</strong>
                    {!! Form::select('posts_id', $post, null, ['class' => 'form-select']) !!}
                </div>
                <button type="submit" class="btn btn-success btn-sm mt-2">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection