<x-app-layout>

    @section('pagina')
        Historial del inventario
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Historial del inventario</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row mb-5">

            <div class="col-12 mb-2">
                @if (Session::has('error'))
                    @if (Session::get('error') == 'success')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>¡Registro añadido!</strong> Se proceso la información exitosamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'success_updated')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>¡Registro Actualizado!</strong> Se proceso la información correctamente.
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
                    @if (Session::get('error') == 'failure_document')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> El documento que intenta ingresar ya existe en el sistema.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'failure_email')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> El correo electronico que intenta ingresar ya existe en el sistema.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'delete')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Almacen Eliminado!</strong> Se ha elimiando correctamente el producto.
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
                        <h5 class="mr-auto p-2"><i class="fas fa-history"></i> Historial de <strong>{{$inventario->nombre}}</strong></h5>
                        <button class="ml-auto btn btn-outline-primary" data-toggle="modal" data-target="#modalCrearHistory">
                            <i class="fas fa-plus"></i> Añadir
                        </button>
                    </div>

                    <div class="card-body">
                        @if(count($historiales) === 0)
                            <div class="text-center align-self-center">
                                <h2 class="text-center mt-3">¡Aún no hay historiales registrados!</h2>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4 text-center align-content-center justify-content-center">
                                        <lottie-player src="https://assets1.lottiefiles.com/temp/lf20_LJK4oD.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                                <h5>Para agregar un historial da clic en el botón "Añadir"</h5>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>N.</th>
                                            <th>Fecha</th>
                                            <th>Cantidad agregada</th>
                                            <th>Cantidad eliminada</th>
                                            <th>Stock registrado</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>N.</th>
                                            <th>Fecha</th>
                                            <th>Cantidad agregada</th>
                                            <th>Cantidad eliminada</th>
                                            <th>Stock registrado</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(count($historiales) > 0)
                                            @foreach($historiales as $key => $value)
                                                <tr id="{{ $value->id }}">
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->created_at }}</td>
                                                    <td>{{ $value->cantidad_agregada }}</td>
                                                    <td>{{ $value->cantidad_eliminada }}</td>
                                                    <td>{{ $value->stock_registrado }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Modal Crear Usuario -->
    <x-modal-crear-history></x-modal-crear-history>
    <x-eliminar-inventario-modal></x-eliminar-inventario-modal>

    <x-slot name="js">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

        <script type="text/javascript">

            $(document).ready(function(){
                $('#modal-eliminar-producto').on('shown.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var names = button.data('id2');

                    var modal = $(this);
                    modal.find('.modal-body #idUser').val(id);
                    modal.find('.modal-body #name_user').text(names);
                });
            });

        </script>
    </x-slot>

</x-app-layout>
