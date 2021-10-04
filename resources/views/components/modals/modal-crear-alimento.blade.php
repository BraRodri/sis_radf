<div class="modal fade" id="modalCrearAlimento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir al inventario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('inventario.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    @if(Route::currentRouteName() === 'inventarioAlmacen.index')
                        <input type="hidden" name="categoria_inventario_id" value="1">
                        <input type="hidden" name="route_name" value="inventarioAlmacen.index">
                    @elseif(Route::currentRouteName() === 'inventarioArmamento.index')
                        <input type="hidden" name="categoria_inventario_id" value="2">
                        <input type="hidden" name="route_name" value="inventarioArmamento.index">
                    @elseif(Route::currentRouteName() === 'inventarioAlimentos.index')
                        <input type="hidden" name="categoria_inventario_id" value="3">
                        <input type="hidden" name="route_name" value="inventarioAlimentos.index">
                    @elseif(Route::currentRouteName() === 'inventarioInsumos.index')
                        <input type="hidden" name="categoria_inventario_id" value="4">
                        <input type="hidden" name="route_name" value="inventarioInsumos.index">
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Nombre<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombre" name="nombre" min="8" placeholder="Digite nombre..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Stock<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Digite stock..." required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Descripción<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="exampleTextarea" rows="3" name="descripcion"></textarea>
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
