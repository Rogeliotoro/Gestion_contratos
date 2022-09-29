@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header card-header-primary">
                        <h2 class="card-title ">Expedientes</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-sm">
                            <thead class="table-secondary">
                                <th>Code</th>
                                <th>Nombre</th>
                            </thead>
                            <tbody>
                                @foreach ($res as $key => $file)
                                <tr>
                                    <td>{{ $file->code }}</td>
                                    <td>{{ $file->displayName }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="...">
                            <ul class="pagination pagination-sm">

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            @endsection