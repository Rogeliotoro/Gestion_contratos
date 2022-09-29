@extends('layouts.app', ['activePage' => 'posts', 'titlePage' => __('Table List')])

@section('content')
<div class="container-fluid">
    <div class="justify-content-center">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
        <h1>Contratos</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-sm ">
                                <thead class="table-secondary">
                                    <th>Id</th>
                                    <th>Estado</th>
                                    <th>Vigencia</th>
                                    <th>Importancia</th>
                                    <th>Urgencia</th>
                                    <th>Tipologia</th>
                                    <th>Sociedad</th>
                                    <th>Objeto de la Solicitud</th>
                                    <th width="150px"></th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $contract)
                                    <tr>
                                        <td>{{ $contract->id }}</td>
                                        <td>{{ $contract->estado }}</td>
                                        <td>{{ $contract->vigencia }}</td>
                                        <td>{{ $contract->importancia }}</td>
                                        <td>{{ $contract->urgencia }}</td>
                                        <td>{{ $contract->tipologia }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a rel="tooltip" class="btn btn-default" href="#" data-original-title="" title="">
                                                <i class=" fa-solid fa-eye " style="color: #5054b1;"></i>
                                            </a>
                                            <a rel="tooltip" class="btn btn-default" href="#" data-original-title="" title="">
                                                <i class=" fa-solid fa-pen " style="color: #5054b1;"></i>
                                            </a>
                                            <a rel="tooltip" class="btn btn-default" href="#" data-original-title="" title="">
                                                <i class=" fa-solid fa-trash " style="color: #5054b1;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="...">
                                <ul class="pagination pagination-xs">
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection