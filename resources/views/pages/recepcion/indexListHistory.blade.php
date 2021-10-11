<x-app-layout>

    @section('pagina')
        Listado de Recepción
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Listado de Recepción</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mr-auto p-2"><i class="fas fa-clock"></i> Listado de personas el <strong>{{$date}}</strong></h5>
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
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Documento</th>
                                            <th>Hora entrada</th>
                                            <th>Hora Salida</th>
                                            <th>Detalles</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Documento</th>
                                            <th>Hora entrada</th>
                                            <th>Hora Salida</th>
                                            <th>Detalles</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(count($historiales) > 0)
                                            @foreach($historiales as $key => $value)
                                                <tr id="{{ $key }}">
                                                    <td>{{ $value->user->names }}</td>
                                                    <td>{{ $value->user->document }}</td>
                                                    <td>{{ $value->hora_entrada }}</td>
                                                    <td>{{ $value->hora_salida }}</td>
                                                    <td>
                                                        <a href="{{route('recepcionHistoryDetails', ['recepcion' => $value->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    </td>
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


    <x-slot name="js">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    </x-slot>

</x-app-layout>
