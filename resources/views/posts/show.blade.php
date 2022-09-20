@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="justify-content-center">
    @if (\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
    <h2><strong>{{ $post->objeto }}</strong></h2>
    <div class="card">
      <div class="card-header">
        @can('role-create')
        <span class="float-right">
          <a class="btn btn-success btn-sm" href="{{ route('posts.edit', $post->id) }}">Editar</a>
        </span>
        <span class="float-right">
          <a class="btn btn-danger btn-sm" href="{{ route('posts.destroy', $post->id) }}">Eliminar</a>
        </span>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Nuevo Fichero
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        @endcan
      </div>
      <div class="card-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row mt-2">
              <div class="col">
                <div class="card border border-3 mb-3">
                  <div class="card-header">Sociedad</div>
                  <div class="card-body">
                    <table id="w0" class="table">
                      <tbody>
                        <tr>
                          <th>Sociedad</th>
                          <td>{{ $post->societies_id }} </td>
                        </tr>
                        <tr>
                          <th>Estado</th>
                          <td><span class="font-weight-bold text-primary"> {{ $post->estado }}</span></td>
                        </tr>
                        <tr>
                          <th>Fecha</th>
                          <td> {{ $post->created_at }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card border border-3 mb-3">
                  <div class="card-header">Contrato</div>
                  <div class="card-body">
                    <table id="w1" class="table">
                      <tbody>
                        <tr>
                          <th>Objeto</th>
                          <td> {{ $post->objeto }}</td>
                        </tr>
                        <tr>
                          <th>Condiciones</th>
                          <td> {{ $post->condiciones }}</td>
                        </tr>
                        <tr>
                          <th>Observaciones</th>
                          <td> {{ $post->observaciones }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card border border-3 mb-3">
                  <div class="card-header">Proyecto ERP - Gestión Económica Abbantia</div>
                  <div class="card-body">
                    <table id="w2" class="table">
                      <tbody>
                        <tr>
                          <th>Cód. Cliente</th>
                          <td><span class="not-set"> {{ $post->cod_cliente }}</span></td>
                        </tr>
                        <tr>
                          <th>Cód. Expediente</th>
                          <td><span class="not-set"> {{ $post->files_id }}</span></td>
                        </tr>
                        <tr>
                          <th>Cód. Ceco</th>
                          <td> {{ $post->cecos_id }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card border border-3 mb-3">
                  <div class="card-header">Información de la contratación</div>
                  <div class="card-body">
                    <table id="w3" class="table">
                      <tbody>
                        <tr>
                          <th>Tipo</th>
                          <td> {{ $post->tipo }}</td>
                        </tr>
                        <tr>
                          <th>Firmante</th>
                          <td> {{ $post->firmante }}</td>
                        </tr>
                        <tr>
                          <th>DNI/CIF/NIE</th>
                          <td> {{ $post->documentacion }}</td>
                        </tr>
                        <tr>
                          <th>Representación</th>
                          <td> {{ $post->representacion }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card border border-3 mb-3">
                  <div class="card-header">Contraprestación</div>
                  <div class="card-body">
                    <table id="w4" class="table">
                      <tbody>
                        <tr>
                          <th>Importe</th>
                          <td> {{ $post->importe }}&nbsp;€</td>
                        </tr>
                        <tr>
                          <th>Forma Pago</th>
                          <td> {{ $post->forma_de_pago }}</td>
                        </tr>
                        <tr>
                          <th>Observaciones Adicionales</th>
                          <td> {{ $post->observaciones_adicionales }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card border border-3 mb-3">
                  <div class="card-header">Duración del Contrato</div>
                  <div class="card-body">
                    <table id="w5" class="table">
                      <tbody>
                        <tr>
                          <th>Fecha Inicio</th>
                          <td> {{ $post->fecha_inicio }}</td>
                        </tr>
                        <tr>
                          <th>Fecha Fin</th>
                          <td><span class="not-set"> {{ $post->fecha_fin }}</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>




@endsection