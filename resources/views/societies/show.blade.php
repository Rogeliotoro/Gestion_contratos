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
            <div class="card-header"><h4><strong>Sociedades</strong></h4>
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('societies.index') }}">Atras</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>ID:</strong>
                    {{ $society->id }}
                </div>
                <div class="lead">
                    <strong>Display Name:</strong>
                    {{ $society->displayName }}
                </div>
                <div class="lead">
                    <strong>Name:</strong>
                    {{ $society->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection