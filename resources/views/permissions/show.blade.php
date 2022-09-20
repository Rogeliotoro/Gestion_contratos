@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h2>Permisos</h2>
        <div class="card">
            <div class="card-header">
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('permissions.index') }}">Atras</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Nombre:</strong>
                    {{ $permission->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection