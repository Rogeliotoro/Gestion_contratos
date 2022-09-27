@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h4><strong>Sociedades</strong></h4>
        <div class="card">
            <div class="card-header">
               
                @can('role-create')
                <span class="float-right">
                    <a class="btn btn-primary btn-sm" href="{{ route('societies.index') }}">Atras</a>
                </span>
                @endcan
            </div>
            <div class="card-body">

                <h1> {{ $society->id }}</h1>

                <table id="w0" class="table table-sm">
                    <tbody>
                        <tr>
                            <th style="width:15%;">ID</th>
                            <td> {{ $society->id }}</td>
                        </tr>
                        <tr>
                            <th class="" style="width:15%;">Display Name</th>
                            <td>{{ $society->displayName }}</td>
                        </tr>
                        <tr>
                            <th style="width:15%;">Nombre</th>
                            <td>{{ $society->name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
    @endsection