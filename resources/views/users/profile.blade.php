@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">{{ $user->name }}'s Profile page</div>

                <div class="card-body">
                    Hi, {{ $user->name }} This is a private profile page!!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection