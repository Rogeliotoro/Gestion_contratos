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
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title "><strong>Expedientes</strong></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-dark">
                                        <th>ID</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $file)
                                            <tr>
                                                <td>{{ $file->id }}</td>
                                                <td>{{ $file->code }}</td>
                                                <td>{{ $file->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="Page navigation example">
                                    {!! $data->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
@endsection