<div class="modal fade" id="modal-eliminar-producto">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" action="{{ route('inventario.delete') }}" method="post" class="custom-validate" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    @if(Route::currentRouteName() === 'inventarioAlmacen.index')
                        <input type="hidden" name="route_name" value="inventarioAlmacen.index">
                    @elseif(Route::currentRouteName() === 'inventarioArmamento.index')
                        <input type="hidden" name="route_name" value="inventarioArmamento.index">
                    @elseif(Route::currentRouteName() === 'inventarioAlimentos.index')
                        <input type="hidden" name="route_name" value="inventarioAlimentos.index">
                    @elseif(Route::currentRouteName() === 'inventarioInsumos.index')
                        <input type="hidden" name="route_name" value="inventarioInsumos.index">
                    @endif

                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h4>¿Desea eliminar el producto <strong id="name_user"></strong>?</h4>
                        </div>

                        <div class="col-md-12">
                            <input type="hidden" name="idUser" id="idUser"/>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                </div>

            </form>

        </div>
    </div>
</div>
