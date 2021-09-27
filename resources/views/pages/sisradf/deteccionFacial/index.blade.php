<x-app-layout>

    @section('pagina')
        Detección Facial
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Detección Facial</h3>
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
                    <form action="{{route('deteccionFacial.index')}}" method="post">
                    @csrf
                        <div class="card-header d-flex align-content-center flex-wrap">
                            <h5 class="mr-auto p-2"><i class="fas fa-camera-retro"></i> Detección facial</h5>
                            <div class="form-group mr-3">
                                <label for="last_wash_date">Fecha inicial</label>
                                <input
                                    type="date"
                                    id="fecha_inicial"
                                    class="form-control"
                                    value="{{old('last_wash_date')}}"
                                    name="fecha_inicial"
                                >
                            </div>
                            <div class="form-group">
                                <label for="last_wash_date">Fecha final</label>
                                <input
                                    type="date"
                                    id="fecha_final"
                                    class="form-control"
                                    value="{{old('last_wash_date')}}"
                                    name="fecha_final"
                                >
                            </div>
                            <div class="form-group">
                                <Button type="submit" class="btn btn-success mt-4 ml-3" >Buscar</Button>
                            </div>
                        </div>

                    </form>
                    <div class="card-body">
                        <div class="row">
                            @if(isset($archives))
                                @if($archives->count() === 0)
                                    <h3>No se encontraron resultados que involucren ese rango de fechas</h3>
                                @else
                                    @foreach($archives as $archive)
                                        <div class="col-md-3">
                                            @php
                                                $path = explode('/', $archive->archivo);
                                                $nameImage = $path[3];
                                                $formated = explode('.', $nameImage);
                                            @endphp
                                            @if($formated[1] === "mp4")
                                                <img class="img-fluid" src="{{ asset('public/images/no-video.png') }}" />
                                            @else
                                                <img class="img-fluid" src="{{ asset('/storage/archivosFacial/' . $formated[0] . '.jpeg') }}" />
                                            @endif
                                            <p>{{$nameImage}}</p>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-slot name="js">
    </x-slot>

</x-app-layout>
