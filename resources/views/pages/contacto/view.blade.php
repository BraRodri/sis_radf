<x-app-layout>

    @section('pagina')
        Usuarios
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Mensaje de Contacto</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">

            <div class="col-12">
                <div class="card shadow mb-5">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mt-2"><i class="fas fa-list"></i> Mensajes de Contacto</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo</th>
                                        <th>Nombres</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo</th>
                                        <th>Nombres</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>Mensaje</th>
                                        <th>Fecha</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(count($datos) > 0)
                                        @foreach($datos as $key => $value)

                                            <tr id="{{ $value->id }}">
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->tipo }}</td>
                                                <td>{{ $value->nombres }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->celular }}</td>
                                                <td>{{ $value->comentarios }}</td>
                                                <td>{{ $value->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crear Usuario -->
    <x-crear-usuarios-modal></x-crear-usuarios-modal>

    <!-- Modal eliminar Usuario -->
    <x-eliminar-usuarios-modal></x-eliminar-usuarios-modal>

    <x-slot name="js">
        <script type="text/javascript">

            $(document).ready(function(){
                $('#modal-eliminar-user').on('shown.bs.modal', function (event) {
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
