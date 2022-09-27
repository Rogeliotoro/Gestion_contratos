@extends('layouts.app', ['activePage' => 'society', 'titlePage' => __('Table List')])

@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2>Sociedades</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Display Name</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $society)
                        <tr>
                            <td>{{ $society->id }}</td>
                            <td>{{ $society->displayName }}</td>
                            <td>{{ $society->name }}</td>
                            <td>
                                <a rel="tooltip" class="btn btn-default" href="{{ route('societies.show', $society->id) }}" data-original-title="" title="">
                                    <i class=" fa-solid fa-eye " style="color: #5054b1;"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="Page navigation example">
                    {!!$data->links()!!}
                </div>
            </div>
        </div>
        @endsection