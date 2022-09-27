@extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('Table List')])

@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h2>Solicitudes</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @can('post-create')
                    <div class="card-header">
                        <span class="float-right">
                            <a class="btn btn-success btn-sm " href="{{ route('posts.create') }}"> Crear Solicitudes</a>
                        </span>
                    </div>
                    @endcan
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-sm">
                                @can('soli-soli')
                                <thead class="table-secondary">
                                    <th>Objeto</th>
                                    <th>Sociedad</th>
                                    <th >Fecha de Inicio</th>
                                    <th>Firmante</th>
                                    <th>Importe</th>
                                    <th>Estado</th>
                                    <th width="150px"></th>
                                </thead>
                                @endcan


                                @can('admin-soli')
                                <thead class="table-secondary">
                                    <th>Solicitante</th>
                                    <th>Objeto</th>
                                    <th>Sociedad</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Firmante</th>
                                    <th>Importe</th>
                                    <th>Estado</th>
                                    <th width="140px"></th>
                                </thead>
                                @endcan

                                <tbody>
                                    @can('soli-soli')
                                    @foreach ($data as $key => $post)
                                    <tr>
                                        <td>{{ $post->objeto }}</td>
                                        <td>{{ $post->society->name }}</td>
                                        <td>{{date('d-m-Y',strtotime($post->fecha_inicio))}}</td>
                                        <td>{{ $post->firmante }}</td>
                                        <td>{{ $post->importe }}&nbsp;€</td>
                                        <td>
                                            @if($post->estado == 'Rechazado')
                                            <span style="color:red;"><strong>{{$post->estado}}</strong></span>
                                            @elseif($post->estado == 'Pendiente')
                                            <span style="color:blue;"><strong>{{$post->estado}}</strong></span>
                                            @elseif($post->estado == 'Aprobado')
                                            <span style="color:green;"><strong>{{$post->estado}}</strong></span>
                                            @elseif($post->estado == 'Revision')
                                            <span style="color:#ffc107 ;"><strong>{{$post->estado}}</strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a rel="tooltip" class="btn btn-default" href="{{ route('posts.show', $post->id) }}" data-original-title="" title="">
                                                <i class=" fa-solid fa-eye " style="color: #5054b1;"></i>
                                            </a>

                                            @can('post-edit')

                                            <a rel="tooltip" class="btn btn-default" href="{{ route('posts.edit', $post->id) }}" data-original-title="" title="">
                                                <i class=" fa-solid fa-pen " style="color: #5054b1;"></i>
                                            </a>

                                            @endcan
                                            @can('soli-edit')
                                            @if($post->estado == 'Rechazado' || $post->estado == 'Pendiente' )

                                            <a rel="tooltip" class="btn btn-default" href="{{ route('posts.edit', $post->id) }}" data-original-title="" title="">
                                                <i class=" fa-solid fa-pen " style="color: #5054b1;"></i>
                                            </a>
                                            @else
                                            @endif
                                            @endcan

                                            @can('post-delete')

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id], 'style' => 'display:inline']) !!}
                                            {{ Form::button('<i class="fa-solid fa-trash" style="color: #5054b1;"></i>', ['class' => 'btn btn-default', 'type' => 'submit']) }}
                                            {!! Form::close() !!}

                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endcan

                                    @can('admin-soli')
                                    @foreach ($admin as $key => $post)
                                    <tr>
                                        <td><a class="btn btn-default btn-sm" style="color: #4330ad;"  href="{{ route('users.show',$post->user->id) }}"><strong>{{ $post->user->name}}</strong></a></td>
                                        <td>{{ $post->objeto }}</td>
                                        <td>{{ $post->society->name }}</td>
                                        <td>{{date('d-m-Y',strtotime($post->fecha_inicio))}}</td>
                                        <td>{{ $post->firmante }}</td>
                                        <td>{{ $post->importe }}&nbsp;€</td>
                                        <td>
                                            @if($post->estado == 'Rechazado')
                                            <span style="color:red;"><strong>{{$post->estado}}</strong></span>
                                            @elseif($post->estado == 'Pendiente')
                                            <span style="color:blue;"><strong>{{$post->estado}}</strong></span>
                                            @elseif($post->estado == 'Aprobado')
                                            <span style="color:green;"><strong>{{$post->estado}}</strong></span>
                                            @elseif($post->estado == 'Revision')
                                            <span style="color:#ffc107 ;"><strong>{{$post->estado}}</strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a rel="tooltip" class="btn btn-default" href="{{ route('posts.show', $post->id) }}" data-original-title="" title="">
                                                <i class=" fa-solid fa-eye " style="color: #5054b1;"></i>
                                            </a>

                                            @can('post-edit')

                                            <a rel="tooltip" class="btn btn-default" href="{{ route('posts.edit', $post->id) }}" data-original-title="" title="">
                                                <i class=" fa-solid fa-pen " style="color: #5054b1;"></i>
                                            </a>

                                            @endcan
                                            @can('soli-edit')
                                            @if($post->estado == 'Rechazado' || $post->estado == 'Pendiente' )

                                            <a rel="tooltip" class="btn btn-default" href="{{ route('posts.edit', $post->id) }}" data-original-title="" title="">
                                                <i class=" fa-solid fa-pen " style="color: #5054b1;"></i>
                                            </a>
                                            @else
                                            @endif
                                            @endcan

                                            @can('post-delete')

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id], 'style' => 'display:inline']) !!}
                                            {{ Form::button('<i class="fa-solid fa-trash" style="color: #5054b1;"></i>', ['class' => 'btn btn-default', 'type' => 'submit']) }}
                                            {!! Form::close() !!}

                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endcan
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