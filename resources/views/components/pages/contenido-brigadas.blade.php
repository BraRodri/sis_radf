<div class="card shadow">
    <div class="card-header d-flex align-content-center flex-wrap">
        <h5 class="mt-2"><i class="fas fa-list"></i> {{ $title }}</h5>
        <button class="ml-auto btn btn-outline-primary" data-toggle="modal" data-target="#modalAgregarBrigada{{ $idbrigada }}">
            <i class="fas fa-plus"></i> Agregar Usuario
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>N.</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>N.</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Grado</th>
                        <th>Distintivo</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @if(count($brigadas) > 0)
                        @foreach($brigadas as $key => $value)
                            <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->user->document }}</td>
                                <td>{{ $value->user->names }}</td>
                                <td>{{ $value->user->grado }}</td>
                                <td>{{ $value->user->distintivo }}</td>
                                <td><a href="{{ route('seccional.brigada.delete', $value->id) }}" class="btn btn-danger">Eliminar</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAgregarBrigada{{ $idbrigada }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="texto-title">Agregar usuario</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('seccional.brigada.create') }}" method="POST" id="form-agg-usuario-brigada" class="needs-validation form-agg-usuario-brigada" novalidate enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label id="texto-form">Elige un usuario:</label>
                        <select class="form-control select" name="user_id" data-live-search="true" required>
                            <option value="">- Seleccione -</option>
                            @if(count($users) > 0)
                                @foreach($users as $key => $value)
                                    <option value="{{ $value->id }}">#{{ $value->document }} - {{ $value->names }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <input type="hidden" name="brigada_id" value="{{ $idbrigada }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btn-subir-archivo"><i class="fas fa-plus"></i> Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
