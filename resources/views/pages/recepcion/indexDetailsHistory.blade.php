<x-app-layout>

    @section('pagina')
        Detalles de la Recepción
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Detalles de la Recepción</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        @php
                            $date = explode(" ", $recepcion->created_at);
                        @endphp
                        <h5 class="mr-auto p-2"><i class="fas fa-clock"></i> Detalles de la visita de <strong>{{$recepcion->user->names}}</strong> el <strong>{{$date[0]}}</strong></h5>
                    </div>

                    <div class="card-body">
                        <div class="container text-center">
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h2 class="font-weight-bold">Nombre: <span class="text-dark"> {{$recepcion->user->names}}</span></h2>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <h5 class="font-weight-bold">Documento: <span class="text-dark font-weight-normal"> {{$recepcion->user->document}}</span></h5>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h5 class="font-weight-bold">Grado: <span class="text-dark font-weight-normal"> {{$recepcion->user->grado}}</span></h4>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <h5 class="font-weight-bold">Distintivo: <span class="text-dark font-weight-normal"> {{$recepcion->user->distintivo}}</span></h5>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h5 class="font-weight-bold">Brigada: <span class="text-dark font-weight-normal"> {{$recepcion->user->brigada}}</span></h5>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Hora de entrada <span class="text-danger">*</span></label>
                                            @php
                                                $hour = explode(".", $recepcion->hora_entrada);
                                            @endphp
                                            <input type="time" class="form-control" name="hora_entrada" value="{{$hour[0]}}" disabled required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Hora de salida<span class="text-danger"></span></label>
                                            @if($recepcion->updated_at)
                                                @php
                                                    $hourSalida = explode(".", $recepcion->hora_salida);
                                                @endphp
                                                <input type="time" class="form-control" name="hora_salida" value="{{$hourSalida[0]}}" disabled required>
                                            @else
                                                Aún no ha salido
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Motivo ingreso<span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="exampleTextarea" rows="3" name="motivo_ingreso" disabled>{{$recepcion->motivo_ingreso}}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Motivo egreso<span class="text-danger">*</span></label>
                                            @if($recepcion->updated_at)
                                                <textarea class="form-control" id="exampleTextarea" rows="3" name="motivo_egreso" disabled>{{$recepcion->motivo_egreso}}</textarea>
                                            @else
                                                <textarea class="form-control" id="exampleTextarea" rows="3" name="motivo_egreso" disabled>No ha salido</textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <x-slot name="js">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    </x-slot>

</x-app-layout>
