<div class="modal fade" id="modalCrearGuardia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="texto-title">Crear nueva guardia</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="form-agregar-guardia" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label id="texto-form">Usuario</label>
                        <select class="form-control select" name="user_id" id="user_id" data-live-search="true" required>
                            <option value="">- Seleccione -</option>
                            @if(count($users) > 0)
                                @foreach($users as $key => $value)
                                    <option value="{{ $value->id }}">#{{ $value->document }} - {{ $value->names }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label id="texto-form">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label id="texto-form">Fecha desde</label>
                            <input type="date" class="form-control" id="fecha_desde" name="fecha_desde" value="13/08/2021 00:00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label id="texto-form">Hora</label>
                            <input type="time" class="form-control" id="hora_desde" name="hora_desde" value="13/08/2021 00:00" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label id="texto-form">Fecha hasta</label>
                            <input type="date" class="form-control" id="fecha_hasta" name="fecha_hasta" value="13/08/2021 00:00" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label id="texto-form">Hora</label>
                            <input type="time" class="form-control" id="hora_hasta" name="hora_hasta" value="13/08/2021 00:00" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btn-subir-archivo"><i class="fas fa-plus"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
