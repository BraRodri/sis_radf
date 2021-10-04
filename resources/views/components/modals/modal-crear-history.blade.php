<div class="modal fade" id="modalCrearHistory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir historial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('inventarioHistorial.store', ['inventario' => Request::route('inventario')]) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Cantidad a agregar<span class="text-danger"></span></label>
                            <input type="number" class="form-control" id="cantidad_agregada" name="cantidad_agregada" placeholder="Digite cantidad a agregar..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Cantidad a eliminar<span class="text-danger"></span></label>
                            <input type="number" class="form-control" id="cantidad_eliminada" name="cantidad_eliminada" placeholder="Digite cantidad a eliminar..." required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>
