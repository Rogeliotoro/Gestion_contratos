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
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Display Name</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $society)
                        <tr>
                            <td>{{ $society->id }}</td>
                            <td>{{ $society->displayName }}</td>
                            <td>{{ $society->name }}</td>
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
