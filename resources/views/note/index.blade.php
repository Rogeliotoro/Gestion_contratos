@extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('Table List')])

@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h2>Nueva Nota</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-right">
                            <a class="btn btn-success btn-sm " href="{{ route('notes.create') }}"> Nueva Nota</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div >
                        --funciona
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection