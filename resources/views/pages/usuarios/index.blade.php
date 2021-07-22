<x-app-layout>

    @section('pagina')
        Usuarios
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Usuarios</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">

            <div class="col-12 mb-2">
                @if (Session::has('error'))
                    @if (Session::get('error') == 'success')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>¡Usuario Creado!</strong> Se proceso la información exitosamente!.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'success_updated')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>¡Usuario Actualizado!</strong> Se proceso la información correctamente!.
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
                            <strong>¡Usuario Eliminado!</strong> Se ha elimiando correctamente al usuario.
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
                        <h5 class="mt-2"><i class="fas fa-list"></i> Usuarios</h5>
                        <button class="ml-auto btn btn-outline-primary" data-toggle="modal" data-target="#modalCrearUsuario">
                            <i class="fas fa-plus"></i> Crear Usuario
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>N.</th>
                                        <th>Documento</th>
                                        <th>Nombre</th>
                                        <th>Ocupación</th>
                                        <th>Creado</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>N.</th>
                                        <th>Documento</th>
                                        <th>Nombre</th>
                                        <th>Ocupación</th>
                                        <th>Creado</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(count($users) > 0)
                                        @foreach($users as $key => $value)

                                            @php
                                                $class_estado = '';
                                                switch ($value->estado) {
                                                    case 'Activo':
                                                        $class_estado = 'success';
                                                        break;

                                                    case 'Suspendido':
                                                        $class_estado = 'warning';
                                                        break;

                                                    case 'Retirado':
                                                        $class_estado = 'danger';
                                                        break;

                                                    case 'Reserva':
                                                        $class_estado = 'dark';
                                                        break;

                                                    default:
                                                        $class_estado = '';
                                                        break;
                                                }
                                            @endphp

                                            <tr id="{{ $value->id }}">
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->document }}</td>
                                                <td>{{ $value->names }}</td>
                                                <td>{{ $value->distintivo }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-{{$class_estado}} p-2 ">
                                                        {{ $value->estado }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('usuarios.view', $value->id) }}" class="btn btn-success"><i class="far fa-edit"></i></a>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-eliminar-user" data-id="{{$value->id}}" data-id2="{{$value->names}}">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </td>
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
