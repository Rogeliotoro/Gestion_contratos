@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h2>Usuario: {{ $user->name }}</h2>
        <div class="card">
            <div class="card-header">
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">Atras</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Nombre:</strong>
                    {{ $user->name }}
                </div>
                <div class="lead">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
                <div class="lead">
                    <strong>Contraseña:</strong>
                    ********
                </div>
                <div class="lead">
                    <strong>Rol:</strong>
                    {{ $user->getRoleNames() }}
                </div>
                <div class="lead">
                    <strong>Sociedad:</strong>
                    {{ $user->society->name}}
                </div>         
            </div>
        </div>
    </div>
</div>
@endsection