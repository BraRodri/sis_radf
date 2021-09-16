<x-app-layout>

    @section('pagina')
        Permisos
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Permisos</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">

            <div class="col-12 mb-2">
                @if (Session::has('error'))
                    @if (Session::get('error') == 'success')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>¡Permiso Creado!</strong> Se proceso la información exitosamente.
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
                @endif
            </div>

            <div class="col-12">
                <div class="card shadow mb-5">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mt-2"><i class="fas fa-list"></i> Permisos</h5>
                        <button class="ml-auto btn btn-outline-primary" data-toggle="modal" data-target="#modalCrearPermiso">
                            <i class="fas fa-plus"></i> Crear Permiso
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Batallon</th>
                                        <th>Soldado</th>
                                        <th>Motivo</th>
                                        <th>Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Batallon</th>
                                        <th>Soldado</th>
                                        <th>Motivo</th>
                                        <th>Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(count($permisos) > 0)
                                        @foreach($permisos as $key => $value)
                                            <tr>
                                                <td>#{{ $value->id }}</td>
                                                <td>{{ $value->batallon }}</td>
                                                <td>{{ $value->nombre_soldado }}</td>
                                                <td>{{ $value->motivo }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <td>
                                                    @php $archivo = "storage/permisos/" . $value->pdf; @endphp
                                                    <a href="{{ asset($archivo) }}" target="_blank" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true"></i></a>
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

    <!-- modal crear permiso -->
    <x-modal-crear-permisos></x-modal-crear-permisos>

    <x-slot name="js">
        <script>
            $(function () {
                $('.select').selectpicker();
            });
        </script>
    </x-slot>

</x-app-layout>
