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
        <h2>Editar Solicitud : {{ $post->id }}</h2>
        <div class="card">
            <div class="card-header">
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}">Atras</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=>'PATCH']) !!}
                <div class="row">
                    <div class="col">
                        <div class="card border border-3 mb-3">
                            <div class="card-header">
                                <h4><strong>Sociedad</strong></h4>
                            </div>
                            <div class="card-body">
                                @can('post-edita')
                                <div class="form-group">
                                    <strong>Estado:</strong>
                                    {!! Form::select('estado', array('Pendiente' => 'Pendiente', 'Aprobado' => 'Aprobado' , 'Revision' => 'Revision', 'Rechazado' => 'Rechazado') , null, ['class' => 'form-select']) !!}
                                </div>
                                @endcan
                                @can('soli-edit')
                                <div class="form-group">
                                    <strong>Estado:</strong>
                                    {!! Form::select('estado', array('Pendiente' => 'Pendiente', 'Rechazado' => 'Rechazado') , null, ['class' => 'form-select']) !!}
                                </div>
                                @endcan
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Sociedades:</strong>
                                    {!! Form::select('societies_id', $society, null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card border border-3 mb-3">
                            <div class="card-header">
                                <h4><strong>Solicitud</strong></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Objeto:</strong>
                                    {!! Form::text('objeto', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Condiciones:</strong>
                                    {!! Form::textarea('condiciones', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Observaciones:</strong>
                                    {!! Form::textarea('observaciones', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border border-3 mb-3">
                            <div class="card-header">
                                <h4><strong>Proyecto</strong></h4>
                            </div>
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-info">Utilizad los códigos de la sección de Maestros y Contratantes</h6>
                                <div class="form-group">
                                    <strong>Cód. Cliente:</strong>
                                    {!! Form::text('cod_cliente', null, array('placeholder' => 'Por ejemplo: C00013 para Televisión Española, S.A.' ,'class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Cód. Expediente:</strong>
                                    {!! Form::text('cod_files', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Cód. Cecos:</strong>
                                    {!! Form::text('cod_cecos', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card border border-3 mb-3">
                            <div class="card-header">
                                <h4><strong>Información de la Contratación</strong></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Tipo:</strong>
                                    {!! Form::select('tipo', array('Cliente' => 'Cliente', 'Proveedores' => 'Proveedores') , null, ['class' => 'form-select']) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Fimante:</strong>
                                    {!! Form::text('firmante', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>DNI/CIF/NIE:</strong>
                                    {!! Form::text('documentacion', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Representacion:</strong>
                                    {!! Form::text('representacion', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="card border border-3 mb-3">
                            <div class="card-header">
                                <h4><strong>Contraprestación</strong></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Importe:</strong>
                                    {!! Form::text('importe', null, array('placeholder' => 'Valor en €.','class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Forma de Pago:</strong>
                                    {!! Form::text('forma_de_pago', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Observaciones Adicionales:</strong>
                                    {!! Form::textarea('observaciones_adicionales', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card border border-3 mb-3">
                            <div class="card-header">
                                <h4><strong>Duración del Contrato</strong></h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Fecha de Inicio:</strong>
                                    {{ Form::date('fecha_inicio', new \DateTime(), ['class' => 'form-control']) }}
                                    {{-- {!! Form::text('fecha_inicio', null, ['class' => 'form-control']) !!} --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <strong>Fecha de Fin:</strong>
                                    {{ Form::date('fecha_fin', new \DateTime(), ['class' => 'form-control']) }}
                                    {{-- {!! Form::text('fecha_fin', null, ['class' => 'form-control']) !!} --}}
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