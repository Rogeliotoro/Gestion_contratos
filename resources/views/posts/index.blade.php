@extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('Table List')])

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
                    @can('post-create')
                    <div class="card-header">
                        <h2><strong>Solicitudes</strong></h2>
                        <span class="float-right">
                            <a class="btn btn-success btn-sm " href="{{ route('posts.create') }}"> Crear Solicitudes</a>
                        </span>
                    </div>
                    @endcan
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class=" text-dark">
                                    <th>Objeto</th>
                                    <th>Sociedad</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Firmante</th>
                                    <th>Importe</th>
                                    <th>Estado</th>
                                    <th width="120px">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $post)
                                    <tr>
                                        <td>{{ $post->objeto }}</td>
                                        <td>{{ $post->societies_id }}</td>
                                        <td>{{ $post->fecha_inicio }}</td>
                                        <td>{{ $post->firmante }}</td>
                                        <td>{{ $post->importe }}</td>
                                        <td>{{ $post->estado }}</td>
                                       <td>
                                    
                                            <a rel="tooltip" class="btn btn-primary btn-link" href="{{ route('posts.show', $post->id) }}" data-original-title="" title="">
                                                <i class=" fa-solid fa-eye " style="color: blue;"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                       
                                        @can('post-edit')
                                        
                                            <a rel="tooltip" class="btn btn-primary btn-link" href="{{ route('posts.edit', $post->id) }}" data-original-title="" title="">
                                                <i class=" fa-solid fa-pen " style="color: blue;"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                       
                                        @endcan
                                        @can('post-delete')
                                    
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id], 'style' => 'display:inline']) !!}
                                            {{ Form::button('<i class="fa-solid fa-trash" style="color: blue;"></i>', ['class' => 'btn btn-primary btn-link', 'type' => 'submit']) }}
                                            {!! Form::close() !!}
                                     
                                        @endcan
                                       </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection