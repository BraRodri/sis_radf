<x-app-layout>

    @section('pagina')
        Brigadas
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Brigadas</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row mb-5">

            <div class="col-12 mb-2">
                @if (Session::has('error'))
                    @if (Session::get('error') == 'success')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>¡Usuario Agregado!</strong> Se proceso la información exitosamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'failure')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> Se ha producido un error, favor vuelva a intentarlo.
                            Si el error persiste favor comunicarse al administrador.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'delete')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>¡Usuario Eliminado!</strong> Se ha eliminado correctamente al usuario.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'failure_exist')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> El usuario seleccionado para agregar, ya se encuentra registrado en ese modulo.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                @endif
            </div>

            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                        data-toggle="list" href="#list-b1" role="tab" aria-controls="b1">B1 Talento Humano</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b2" role="tab" aria-controls="b1">B2 Inteligencia y contra</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b3" role="tab" aria-controls="b1">B3 Operaciones</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b4" role="tab" aria-controls="b1">B4 Presupuesto</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b5" role="tab" aria-controls="b1">B5 Planeación</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b6" role="tab" aria-controls="b1">B6 Comunicaciones</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b7" role="tab" aria-controls="b1">B7 Edicación Militar</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b8" role="tab" aria-controls="b1">B8 Gestión Fiscal</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b9" role="tab" aria-controls="b1">B9 Acción Integral y desarrollo</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b10" role="tab" aria-controls="b1">B10 Dpta de Ingenieros Militares</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b11" role="tab" aria-controls="b1">B11 Dpta Juridico Integral</a>
                </div>
            </div>

            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-b1" role="tabpanel" aria-labelledby="list-home-list">
                        <x-contenido-brigadas title="B1 Talento Humano" idbrigada="B1"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b2" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B2 Inteligencia y contra" idbrigada="B2"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b3" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B3 Operaciones" idbrigada="B3"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b4" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B4 Presupuesto" idbrigada="B4"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b5" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B5 Planeación" idbrigada="B5"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b6" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B6 Comunicaciones" idbrigada="B6"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b7" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B7 Edicación Militar" idbrigada="B7"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b8" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B8 Gestión Fiscal" idbrigada="B8"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b9" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B9 Acción Integral y desarrollo" idbrigada="B9"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b10" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B10 Dpta de Ingenieros Militares" idbrigada="B10"></x-contenido-brigadas>
                    </div>
                    <div class="tab-pane fade" id="list-b11" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-brigadas title="B11 Dpta Juridico Integral" idbrigada="B11"></x-contenido-brigadas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script type="text/javascript">

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $(document).ready(function(){
                $('.select').selectpicker();

                /*
                $('#form-agg-usuario-brigada').on('submit', function(e){

                    var $thisForm = $('#form-agg-usuario-brigada');
                    var $thisModal = $('#modalAgregarBrigada');
                    $thisModal.find('.modal-body .alert-danger, .modal-body .alert-success').remove();

                    e.preventDefault();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        success:function(data){
                            if(data.code == 0){
                                var message = '<div class="alert alert-danger"><strong>ERROR!</strong> Se ha producido un error, favor vuelva a intentarlo. Si el error persiste favor comunicarse al administrador.</div>';
                                $thisModal.find('.modal-body').prepend(message);
                            }else{
                                $thisForm[0].reset();
                                var message = '<div class="alert alert-success"><strong>OK!</strong> ingreso realizado correctamente.</div>';
                                $thisModal.find('.modal-body').prepend(message);
                            }
                        }
                    });

                });
                */

                $('.dataTable').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    },
                    "ordering": false,
                });
            });

        </script>
    </x-slot>

</x-app-layout>
