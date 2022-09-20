@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header">Solicitud
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('solicitudes.index') }}">Back</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Title:</strong>
                    {{ $solicitud->title }}
                </div>
                <div class="lead">
                    <strong>Comentarios:</strong>
                    {{ $solicitud->comentarios }}
                </div>
                <div class="lead">
                    <strong>Estado:</strong>
                    {{ $solicitud->estado }}
                </div>
                <div class="lead">
                    <strong>Sociedad:</strong>
                    {{ $solicitud->societies_id }}
                </div>
                <div class="lead">
                    <strong>Expediente:</strong>
                    {{ $solicitud->files_id }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection