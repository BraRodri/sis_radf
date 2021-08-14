<x-app-layout>

    @section('pagina')
        Historial
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Historial de Archivos</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row mb-5">

            <div class="col-12 mb-2">
                @if (Session::has('error'))
                    @if (Session::get('error') == 'success')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>¡Archivos Guardados!</strong> Se proceso la información exitosamente.
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
                <div class="card shadow">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mr-auto p-2"><i class="far fa-file-archive"></i> Historial de Archivos</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Archivo</th>
                                        <th>Cantidad</th>
                                        <th>Creado</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Archivo</th>
                                        <th>Cantidad</th>
                                        <th>Creado</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(count($archivos) > 0)
                                        @foreach($archivos as $key => $value)
                                            <tr>
                                                <th>{{ $value->id }}</th>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->user->names }}</td>
                                                <td>
                                                    <a href="{{ route('registro.ver.archivos', $value->id) }}" class="btn btn-primary">Ver Archivos</a>
                                                </td>
                                                <td>
                                                    {{ count($value->groups) }}
                                                </td>
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

    <x-slot name="js">
        <script>
            $(document).ready(function () {


            });
        </script>
    </x-slot>

</x-app-layout>
