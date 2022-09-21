@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="justify-content-center">
    @if (\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
    <h2>{{ $post->objeto }}</h2>
    <div class="card">
      <div class="card-header">
        @can('role-create')
        <span class="float-right">
          <a class="btn btn-success btn-sm" href="{{ route('posts.edit', $post->id) }}">Editar</a>
        </span>
        <span class="float-right">
          <a class="btn btn-danger btn-sm" href="{{ route('posts.destroy', $post->id) }}">Eliminar</a>
        </span>

        <!-- //////////////////////////////////////// -->

        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Nuevo Fichero <i class="fa-solid fa-file-pdf"></i>
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Fichero</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div>
                <label class="control-label">Descripción</label>
                <input type="text"  class="form-control"  maxlength="500" aria-required="true">
                </div>
                <div class="help-block"></div>
                <div>
                Anexo <input type="file" name="archivo" title="seleccionar fichero" id="importData" accept=".xls,.xlsx" />
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
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
                  <div class="card-header"><h4><strong>Sociedad</strong></h4></div>
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
                  <div class="card-header"><h4><strong>Solicitud</strong></h4></div>
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
                  <div class="card-header"><h4><strong>Proyecto ERP - Gestión Económica Abbantia</strong></h4></div>
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
                  <div class="card-header"><h4><strong>Información de la contratación</strong></h4></div>
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
                  <div class="card-header"><h4><strong>Contraprestación</strong></h4></div>
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
                  <div class="card-header"><h4><strong>Duración del Contrato</strong></h4></div>
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