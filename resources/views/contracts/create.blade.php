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
        <h2>Generar Contratos</h2>
        <div class="card shadow-sm p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('contracts.index') }}">Atras </a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'contracts.store', 'method'=>'POST')) !!}
                <div class="row">
                    <div class="col">
                        <div class="card border border-3 mb-3">
                            <div class="card-header">
                                <h4><strong>Contrato</strong></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Asignacion:</strong>
                                    {!! Form::select('user_id', $user, null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Solicitud:</strong>
                                    {!! Form::select('posts_id', $post, null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Vigencia:</strong>
                                    {!! Form::select('vigencia', array('Si' => 'Si', 'No' => 'No') , null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Estado:</strong>
                                    {!! Form::select('estado', array('Borrador' => 'Borrador', 'Revision' => 'Revision' , 'Firmado' => 'Firmado', 'Firmado y Archivado' => 'Firmado y Archivado') , null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Importancia:</strong>
                                    {!! Form::select('importancia', array('Alta' => 'Alta', 'Media' => 'Media' , 'Baja' => 'Baja') , null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Urgencia:</strong>
                                    {!! Form::select('urgencia', array('Alta' => 'Alta', 'Media' => 'Media' , 'Baja' => 'Baja') , null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Tipologia:</strong>
                                    {!! Form::select('tipologia', array(
                                    'MOU' => 'MOU',
                                    'SPA' => 'SPA' ,
                                    'SHA' => 'SHA',
                                    'NDA' => 'NDA',
                                    'Arredamiento' => 'Arredamiento',
                                    'Cesión de derechos' => 'Cesión de derechos',
                                    'Colobaración' => 'Colobaración',
                                    'Coproducción' => 'Coproducción',
                                    'Comodato' => 'Comodato',
                                    'Compraventa' => 'Compraventa',
                                    'Cuenta Corriente' => 'Cuenta Corriente',
                                    'Depósito' => 'Depósito',
                                    'Financiación' => 'Financiación',
                                    'Inversión' => 'Inversión',
                                    'Laboral' => 'Laboral',
                                    'Obra' => 'Obra',
                                    'Prestamo Participativo' => 'Financiación',
                                    'Seguro' => 'Seguro',
                                    'Servicios' => 'Servicios',
                                    ) , null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Importancia:</strong>
                                    {!! Form::select('importancia', array('Alta' => 'Alta', 'Media' => 'Media' , 'Baja' => 'Baja') , null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Observaciones:</strong>
                                    {!! Form::textarea('observaciones', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Comentarios:</strong>
                                    {!! Form::textarea('comentarios', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection