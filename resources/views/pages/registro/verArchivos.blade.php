<x-app-layout>

    @section('pagina')
        Conjuntos de Archivos
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Conjuntos de Archivos</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row mb-5">

            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mr-auto p-2"><i class="far fa-file-archive"></i> Archivos: {{ $archivo->name }}</h5>
                    </div>
                    <div class="card-body">

                        <ul class="list-group">
                            @if(count($datos) > 0)
                                @foreach($datos as $key => $value)
                                    <a href="{{ $value->archivo }}" data-fancybox="galeria-{{ $value->id }}" class="list-group-item list-group-item-action">Ver Archivo</a>
                                @endforeach
                            @endif
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-slot name="js">
        <script>
        </script>
    </x-slot>

</x-app-layout>
