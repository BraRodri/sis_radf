<x-app-layout>

    @section('pagina')
        Archivos
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Archivos</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">

            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mr-auto p-2"><i class="far fa-file-archive"></i> Archivos</h5>
                        <button class=" btn btn-outline-primary mr-3" data-toggle="modal" data-target="#modalSubirArchivos" data-id="1">
                            <i class="far fa-file-image"></i> Subir Imagen
                        </button>
                        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#modalSubirArchivos" data-id="2">
                            <i class="far fa-file-video"></i> Subir Video
                        </button>
                    </div>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="">Digite un nombre que identifique a los archivos a subir:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Digite aqui el nombre..." required>
                            </div>

                        </div>
                        <div class="card-footer bg-white">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-share-square"></i> Guardar Archivos</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal subir archivos -->
    <x-modal-subir-archivo></x-modal-subir-archivo>

    <x-slot name="js">
        <script type="text/javascript">

            $(document).ready(function(){
                $('#modalSubirArchivos').on('shown.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var modal = $(this);
                    if(id === 1){
                        modal.find('.modal-header #texto-title').text('Subir Imagen');
                        modal.find('.modal-body #texto-form').text('Seleccione una imagen');
                    } else {
                        modal.find('.modal-header #texto-title').text('Subir Video');
                        modal.find('.modal-body #texto-form').text('Seleccione un video');
                    }

                });
            });

        </script>
    </x-slot>

</x-app-layout>
