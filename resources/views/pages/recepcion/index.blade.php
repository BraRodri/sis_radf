<x-app-layout>

    @section('pagina')
        Recepción
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Recepción</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row mb-5">

            <div class="col-12 mb-2">
                @if (Session::has('error'))
                    @if (Session::get('error') == 'success')
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Recepción Guardada!</strong> Se proceso la información exitosamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'success_updated')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
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

                @endif

                @if (Session::has('errorUser'))
                    @if (Session::get('errorUser') == 'failure')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> Se ha producido un error, favor vuelva a intentarlo.
                            Si el error persiste favor comunicarse al administrador.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('errorUser') == 'failure_document')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> El documento que intenta ingresar ya existe en el sistema.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('errorUser') == 'failure_email')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> El correo electronico que intenta ingresar ya existe en el sistema.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                @endif
            </div>

            <div class="col-12">
                <div class="card shadow">
                    <form action="{{route('recepcion')}}" method="post">
                    @csrf
                        <div class="card-header d-flex align-content-center flex-wrap">
                            <h5 class="mr-auto p-2"><i class="fas fa-door-open"></i> Recepción</h5>
                            <div class="form-group">
                                <input
                                    type="number"
                                    placeholder="Buscar por documento"
                                    id="fecha_inicial"
                                    class="form-control"
                                    name="documento"
                                >
                            </div>
                            <div class="form-group">
                                <Button type="submit" class="btn btn-success ml-2 mr-3" >Buscar <i class="fas fa-search"></i></Button>
                            </div>
                            <div class="form-group">
                                <a href="{{route('recepcionHistoryCount')}}" class="btn btn-dark ml-3" >Ver historial <i class="fas fa-history"></i></a>
                            </div>
                        </div>

                    </form>
                    <div class="card-body">
                        <div class="row">
                            @if(isset($user))
                                @if($user === 'null')
                                    <h3>No se encontraron usuarios con el documento ingresado, verifique que el documento esté bien escrito o añada al usuario dando clic en el siguiente botón
                                        <button class="ml-auto btn btn-outline-primary" data-toggle="modal" data-target="#modalCrearUsuario">
                                            <i class="fas fa-plus"></i> Crear Usuario
                                        </button>
                                    </h3>
                                @else
                                <div class="container text-center">
                                <form action="{{ route('recepcion.store') }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <input type="hidden" name="documento" value="{{$user->document}}">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <h2 class="font-weight-bold">Nombre: <span class="text-dark"> {{$user->names}}</span></h2>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h5 class="font-weight-bold">Documento: <span class="text-dark font-weight-normal"> {{$user->document}}</span></h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h5 class="font-weight-bold">Grado: <span class="text-dark font-weight-normal"> {{$user->grado}}</span></h4>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h5 class="font-weight-bold">Distintivo: <span class="text-dark font-weight-normal"> {{$user->distintivo}}</span></h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h5 class="font-weight-bold">Brigada: <span class="text-dark font-weight-normal"> {{$user->brigada}}</span></h5>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="">Hora de entrada <span class="text-danger">*</span></label>
                                                <input type="time" class="form-control" name="hora_entrada" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="">Motivo ingreso<span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="exampleTextarea" rows="3" name="motivo_ingreso"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Añadir</button>
                                    </div>
                                </form>
                                </div>


<div id="my_camera" style="background-color: #a2ace9; width: 320px;
height: 240px;
border: 1px solid black;"></div>
<input type=button value="Take Snapshot" onClick="take_snapshot()">

<div id="results" ></div>

                                @endif
                                @endif



                            @if(isset($recepcionPreview))
                                <div class="container text-center">
                                <form action="{{ route('recepcion.update', ['recepcion' => $recepcionPreview->id]) }}" method="POST" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{$recepcionPreview->user->id}}">
                                        <input type="hidden" name="documento" value="{{$recepcionPreview->user->document}}">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <h2 class="font-weight-bold">Nombre: <span class="text-dark"> {{$recepcionPreview->user->names}}</span></h2>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h5 class="font-weight-bold">Documento: <span class="text-dark font-weight-normal"> {{$recepcionPreview->user->document}}</span></h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h5 class="font-weight-bold">Grado: <span class="text-dark font-weight-normal"> {{$recepcionPreview->user->grado}}</span></h4>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <h5 class="font-weight-bold">Distintivo: <span class="text-dark font-weight-normal"> {{$recepcionPreview->user->distintivo}}</span></h5>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <h5 class="font-weight-bold">Brigada: <span class="text-dark font-weight-normal"> {{$recepcionPreview->user->brigada}}</span></h5>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Hora de entrada <span class="text-danger">*</span></label>
                                                @php
                                                    $hour = explode(".", $recepcionPreview->hora_entrada);
                                                @endphp
                                                <input type="time" class="form-control" name="hora_entrada" value="{{$hour[0]}}" disabled required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Hora de salida<span class="text-danger"></span></label>
                                                <input type="time" class="form-control" name="hora_salida" required>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Motivo ingreso<span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="exampleTextarea" rows="3" name="motivo_ingreso" disabled>{{$recepcionPreview->motivo_ingreso}}</textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Motivo egreso<span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="exampleTextarea" rows="3" name="motivo_egreso" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Actualizar</button>
                                    </div>
                                </form>
                                </div>


<div id="my_camera" style="background-color: #a2ace9; width: 320px;
height: 240px;
border: 1px solid black;"></div>
<input type=button value="Take Snapshot" onClick="take_snapshot()">

<div id="results" ></div>

                            @endif

                            <x-crear-usuarios-modal></x-crear-usuarios-modal>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <x-slot name="js">
        <!--<script type="text/javascript" src="/public/js/webcamjs-master/webcamjs-master/webcam.min.js" defer></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
<!-- Configure a few settings and attach camera -->
<script>
 Webcam.set({
     width: 320,
     height: 240,
     image_format: 'jpeg',
     jpeg_quality: 90
 });
 Webcam.attach( '#my_camera' );

function take_snapshot() {

   // take snapshot and get image data
   Webcam.snap( function(data_uri) {
       // display results in page
       document.getElementById('results').innerHTML =
        '<img src="'+data_uri+'"/>';
    } );
}
</script>
    </x-slot>

</x-app-layout>
