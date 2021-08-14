<div class="modal fade" id="modalVerGuardia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="texto-title">Ver información guardia</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="form-eliminar-guardia" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label id="texto-form">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" disabled>
                    </div>

                    <div class="form-group">
                        <label id="texto-form">Descripción</label>
                        <input type="text" class="form-control" id="descripcionVer" name="descripcion" disabled>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label id="texto-form">Fecha desde</label>
                            <input type="text" class="form-control" id="fecha_desdeVer" name="fecha_desde" value="13/08/2021 00:00" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label id="texto-form">Hora</label>
                            <input type="text" class="form-control" id="hora_desdeVer" name="hora_desde" value="13/08/2021 00:00" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label id="texto-form">Fecha hasta</label>
                            <input type="text" class="form-control" id="fecha_hastaVer" name="fecha_hasta" value="13/08/2021 00:00" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label id="texto-form">Hora</label>
                            <input type="text" class="form-control" id="hora_hastaVer" name="hora_hasta" value="13/08/2021 00:00" disabled>
                        </div>
                    </div>

                    <input type="hidden" name="idGuarida" id="idGuardia">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="btn-subir-archivo"><i class="fas fa-trash"></i> Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
