<x-app-layout>

    @section('pagina')
        Batallones
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Batallones</h3>
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
                        data-toggle="list" href="#list-b1" role="tab" aria-controls="b1">Ejecutivo</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b2" role="tab" aria-controls="b1">Registro</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b3" role="tab" aria-controls="b1">STICS</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b4" role="tab" aria-controls="b1">Sala de Computo</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b5" role="tab" aria-controls="b1">S1</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b6" role="tab" aria-controls="b1">Presupuesto</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b7" role="tab" aria-controls="b1">Contaduria</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b8" role="tab" aria-controls="b1">Jefe de</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b9" role="tab" aria-controls="b1">S5</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b10" role="tab" aria-controls="b1">Tesoreria</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b11" role="tab" aria-controls="b1">S3</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b12" role="tab" aria-controls="b1">Comunicaciones</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b13" role="tab" aria-controls="b1">COT</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b14" role="tab" aria-controls="b1">S4</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b15" role="tab" aria-controls="b1">Juridica</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b16" role="tab" aria-controls="b1">Juzgado</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b17" role="tab" aria-controls="b1">Ayudantia</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list"
                        data-toggle="list" href="#list-b18" role="tab" aria-controls="b1">Sala de Guerra</a>
                </div>
            </div>

            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-b1" role="tabpanel" aria-labelledby="list-home-list">
                        <x-contenido-batallones title="Ejecutivo" idbatallon="B1"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b2" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Registro" idbatallon="B2"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b3" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="STICS" idbatallon="B3"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b4" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Sala de Computo" idbatallon="B4"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b5" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="S1" idbatallon="B5"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b6" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Presupuesto" idbatallon="B6"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b7" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Contaduria" idbatallon="B7"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b8" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Jefe de" idbatallon="B8"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b9" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="S5" idbatallon="B9"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b10" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Tesoreria" idbatallon="B10"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b11" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="S3" idbatallon="B11"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b12" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Comunicaciones" idbatallon="B12"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b13" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="COT" idbatallon="B13"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b14" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="S4" idbatallon="B14"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b15" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Juridica" idbatallon="B15"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b16" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Juzgado" idbatallon="B16"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b17" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Ayudantia" idbatallon="B17"></x-contenido-batallones>
                    </div>
                    <div class="tab-pane fade" id="list-b18" role="tabpanel" aria-labelledby="list-profile-list">
                        <x-contenido-batallones title="Sala de Guerra" idbatallon="B18"></x-contenido-batallones>
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
