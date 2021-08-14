<div class="modal fade" id="modalSubirArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="texto-title">Subir nuevo Archivo</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST" id="form-subir-archivos" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label id="texto-form">Elige un archivo</label>
                        <input type="file" class="form-control" id="archivo" name="archivo" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btn-subir-archivo"><i class="fas fa-plus"></i> Subir</button>
                </div>
            </form>
        </div>
    </div>
</div>
