@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h2>Nota: {{ $note->id }}</h2>
        <div class="card">
            <div class="card-header">
                @can('notes-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('notes.index') }}">Atras</a>
                </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong>Nombre:</strong>
                    {{ $note->nota }}
                </div>
                <div class="lead">
                    <strong>Email:</strong>
                    {{ $note->posts_id }}
                </div>
                <div class="lead">
                    <strong>Contraseña:</strong>
                    {{ $note->user_id }}
                </div>
              
                      
            </div>
        </div>
    </div>
</div>
@endsection