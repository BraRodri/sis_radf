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

            <div class="col-12 mb-2">
                @if (Session::has('error'))
                    @if (Session::get('error') == 'failure')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> Se ha producido un error, favor vuelva a intentarlo.
                            Si el error persiste favor comunicarse al administrador.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                @endif
            </div>

            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mr-auto p-2"><i class="far fa-file-archive"></i> Archivos</h5>
                        <button class=" btn btn-outline-primary mr-3" data-toggle="modal" data-target="#modalSubirArchivos" data-id="1">
                            <i class="far fa-file-image"></i> Subir Archivos
                        </button>
                    </div>
                    <form action="{{ route('registro.archivos.insert') }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="">Digite un nombre que identifique a los archivos a subir:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Digite aqui el nombre..." required>
                            </div>

                            <div class="form-group">
                                <ul class="list-group" id="contenedor-nuevos-archivos">
                                </ul>
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


            $('#form-subir-archivos').on('submit', function(e) {

                // evito que propague el submit
                e.preventDefault();

                var $thisForm = $('#form-subir-archivos');
                var $thisModal = $('#modalSubirArchivos');
                $thisModal.find('.modal-body .alert-danger, .modal-body .alert-success').remove();
                var url = "{{route('registro.archivos.agregar')}}";

                // agrego la data del form a formData
                var formData = new FormData(this);
                formData.append('image', $thisForm.find('input[type="file"]')[0].files[0]);

                var count = 0;

                //console.log(formData);

                    $.ajax({
                        headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        type: "POST",
                        encoding:"UTF-8",
                        url: url,
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType:'json',
                        success: function(response) {
                            console.log(response);
                            if(response.type == 'failure'){
                                var message = '<div class="alert alert-danger"><strong>ERROR!</strong> Se ha producido un error, favor vuelva a intentarlo. Si el error persiste favor comunicarse al administrador.</div>';
                                $thisModal.find('.modal-body').prepend(message);
                            } else {

                                $thisForm[0].reset();

                                var message = '<div class="alert alert-success"><strong>OK!</strong> ingreso realizado correctamente.</div>';
                                $thisModal.find('.modal-body').prepend(message);

                                setTimeout(function() {
                                    $thisModal.find('.modal-body .alert-danger, .modal-body .alert-success').remove();
                                    $thisModal.modal('hide');
                                }, 1000);

                                var retype = null;
                                /*if(response.typeFile === "image"){
                                    retype = `<img src="${response.imagen}" />`;
                                }else{
                                    retype = `<video width="400">
                                            <source src="${response.imagen}">
                                            Your browser does not support HTML5 video.
                                            </video>`;
                                }*/


                                var bloque = `
                                    <li class="list-group-item d-flex" id="cont__${count}">
                                        <div class="mr-auto pt-2">
                                            ${response.name}
                                        </div>
                                        <a data-fancybox="gallery" data-fancybox-type="iframe" href="${response.imagen}" data-width="640px !important" data-height="360px" class="btn btn-primary mr-2">
                                            Ver Archivo
                                        </a>



                                        <button type="button" class="btn btn-danger" onclick="myEliminarArchivo(${count})">Eliminar</button>
                                        <input type="hidden" name="nombreArchivos[]" value="${response.imagen}">
                                    </li>
                                `;

                                count++;

                                $('#contenedor-nuevos-archivos').append(bloque);

                            }

                        },
                        error: function(xhr, status, error){
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }
                    });

            });


            function myEliminarArchivo(count) {
                $(`#cont__${count}`).remove();
            }

        </script>
    </x-slot>

</x-app-layout>
