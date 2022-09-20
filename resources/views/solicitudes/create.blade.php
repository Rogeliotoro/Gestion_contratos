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
            <div class="card-header">Crear Solicitud
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('solicitudes.index') }}">Solicitudes</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'solicitudes.store', 'method'=>'POST')) !!}
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
                <div class="form-group">
                    <strong>Sociedades:</strong>
                    {!! Form::select('societies_id', $society, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Expedientes:</strong>
                    {!! Form::select('files_id', $file, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Cecos:</strong>
                    {!! Form::select('cecos_id', $ceco, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <strong>Objeto:</strong>
                    {!! Form::text('objeto', null, array('placeholder' => 'Objeto','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Condiciones:</strong>
                    {!! Form::textarea('condiciones', null, array('placeholder' => 'Condiciones','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Observaciones:</strong>
                    {!! Form::textarea('observaciones', null, array('placeholder' => 'Observaciones','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Fecha de Inicio:</strong>
                    {{ Form::date('fecha_inicio', new \DateTime(), ['class' => 'form-control']) }}
                    {{-- {!! Form::text('fecha_inicio', null, ['class' => 'form-control']) !!} --}}
                </div>
                <div class="form-group">
                    <strong>Fecha de Fin:</strong>
                    {{ Form::date('fecha_fin', new \DateTime(), ['class' => 'form-control']) }}
                    {{-- {!! Form::text('fecha_fin', null, ['class' => 'form-control']) !!} --}}
                </div>
                <div class="form-group">
                    <strong>Observaciones Adicionales:</strong>
                    {!! Form::textarea('observaciones_adicionales', null, array('placeholder' => 'Observaciones Adicionales','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Tipo:</strong>
                    {!! Form::select('tipo', array('Cliente' => 'Cliente', 'Proveedor' => 'Proveedor' ) , null, ['class' => 'form-select']) !!}
                </div>
                <div class="form-group">
                    <strong>Importe:</strong>
                    {!! Form::text('importe', null, array('placeholder' => 'Importe','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Forma de Pago:</strong>
                    {!! Form::text('forma_de_pago', null, array('placeholder' => 'Forma de Pago','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Firmante:</strong>
                    {!! Form::text('firmante', null, array('placeholder' => 'Firmante','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Documentacion:</strong>
                    {!! Form::text('documentacion', null, array('placeholder' => 'Documentacion','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Representacion:</strong>
                    {!! Form::text('representacion', null, array('placeholder' => 'Representacion','class' => 'form-control')) !!}
                </div>
                <button type="submit" class="btn btn-success btn-sm">Crear</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection