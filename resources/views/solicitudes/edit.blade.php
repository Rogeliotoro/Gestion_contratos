@extends('layouts.app')
@section('content')
<div class="container">
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
        <div class="card">
            <div class="card-header">Create Solicitud
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('solicitudes.index') }}">Solicitudes</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($solicitud, ['route' => ['solicitudes.update', $solicitud->id], 'method'=>'PATCH']) !!}
                <div class="form-group">
                    <strong>Titulo:</strong>
                    {!! Form::text('titulo', null, array('placeholder' => 'Titulo','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Comentarios:</strong>
                    {!! Form::textarea('comentarios', null, array('placeholder' => 'Comentarios','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Estado:</strong>
                    {!! Form::select('estado', array('Pendiente' => 'Pendiente', 'Aprobado' => 'Aprobado' , 'Revision' => 'Revision', 'Rechazado' => 'Rechazado') , null, ['class' => 'form-select']) !!}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection