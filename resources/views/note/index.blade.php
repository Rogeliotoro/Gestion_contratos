@extends('layouts.app', ['activePage' => 'notes', 'titlePage' => __('Table List')])

@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h2>Note</h2>
        <div class="row">
            

        </div>
    </div>
</div>
@endsection