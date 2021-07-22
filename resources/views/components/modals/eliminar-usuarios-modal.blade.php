<div class="modal fade" id="modal-eliminar-user">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" action="{{ route('usuarios.delete') }}" method="post" class="custom-validate" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h4>¿Desea eliminar al usuario <strong id="name_user"></strong>?</h4>
                        </div>

                        <div class="col-md-12">
                            <input type="hidden" name="idUser" id="idUser"/>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>

            </form>

        </div>
    </div>
</div>
