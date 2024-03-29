@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif

        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h2>Cecos</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $ceco)
                        <tr>
                            <td>{{ $ceco->id }}</td>
                            <td>{{ $ceco->code }}</td>
                            <td>{{ $ceco->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="...">
                    <ul class="pagination pagination-xs">
                        {!! $data->links() !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection