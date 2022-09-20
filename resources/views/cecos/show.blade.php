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
            <div class="card-header"><h4><strong>Cecos</strong></h4>
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('cecos.index') }}">Atras</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>ID:</strong>
                    {{ $ceco->id }}
                </div>
                <div class="lead">
                    <strong>Code:</strong>
                    {{ $ceco->code }}
                </div>
                <div class="lead">
                    <strong>Name:</strong>
                    {{ $ceco->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection