<x-app-layout>

    @section('pagina')
        Editar Usuario
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Usuarios</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb bg-white">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('usuarios') }}">Usuarios</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Actualizar datos</li>
                    </ol>
                </nav>
            </div>

            <div class="col-12 mt-2 mb-2">
                @if (Session::has('error'))
                    @if (Session::get('error') == 'failure')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> Se ha producido un error, favor vuelva a intentarlo.
                            Si el error persiste favor comunicarse al administrador.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (Session::get('error') == 'duplicate')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>¡ERROR!</strong> Se ha producido un error, el usuario que intenta
                            ingresar ya se encuentra registrado.
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
                        <h5 class="mt-2"><i class="fas fa-user"></i> Usuario: <strong>{{ $user->names }}</strong></h5>
                    </div>

                    <form action="{{ route('usuarios.updated') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="card-body">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Documento<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="documento" name="documento" min="8" placeholder="Digite Cedula..." value="{{ $user->document }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nombres Completos<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Digite Nombres completos..." value="{{ $user->names }}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Grado<span class="text-danger">*</span></label>
                                    <select class="custom-select" id="grado" name="grado" required>
                                        <option disabled value="">Seleccione...</option>
                                        @if(count($grados) > 0)
                                            @foreach($grados as $key => $value)
                                                @php
                                                    $selected = (isset($user->grado) && !empty($user->grado) && $user->grado == $key)? 'selected="selected"' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Distintivo</label>
                                    <select class="custom-select" id="distintivo" name="distintivo">
                                        <option disabled value="">Seleccione...</option>
                                        @if(count($distintivos) > 0)
                                            @foreach($distintivos as $key => $value)
                                                @php
                                                    $selected = (isset($user->distintivo) && !empty($user->distintivo) && $user->distintivo == $key)? 'selected="selected"' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Arma</label>
                                    <select class="custom-select" id="arma" name="arma">
                                        <option disabled value="">Seleccione...</option>
                                        @if(count($armas) > 0)
                                            @foreach($armas as $key => $value)
                                                @php
                                                    $selected = (isset($user->arma) && !empty($user->arma) && $user->arma == $key)? 'selected="selected"' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Comando Trigésima Brigada<span class="text-danger">*</span></label>
                                    <select class="custom-select" id="brigada" name="brigada" required>
                                        <option disabled value="">Seleccione...</option>
                                        @if(count($brigadas) > 0)
                                            @foreach($brigadas as $key => $value)
                                                @php
                                                    $selected = (isset($user->brigada) && !empty($user->brigada) && $user->brigada == $key)? 'selected="selected"' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Correo Personal<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="correo_personal" name="correo_personal" value="{{ $user->email }}" placeholder="Digite un correo electronico..." required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Correo Corporativo<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="correo_corporativo" name="correo_corporativo" value="{{ $user->email_corporativo }}" placeholder="Digite un correo electronico..." required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite una contraseña...">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Estado<span class="text-danger">*</span></label>
                                    <select class="custom-select select-search" id="estado" name="estado" required>
                                        <option disabled value="">Seleccione...</option>
                                        @if(count($estados) > 0)
                                            @foreach($estados as $key => $value)
                                                @php
                                                    $selected = (isset($user->estado) && !empty($user->estado) && $user->estado == $key)? 'selected="selected"' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">ROL<span class="text-danger">*</span></label>
                                    <select class="custom-select select-search" id="rol" name="rol" required>
                                        <option disabled value="">Seleccione...</option>
                                        @if(count($roles) > 0)
                                            @foreach($roles as $key => $value)
                                                @php
                                                    $selected = (isset($user->rol) && !empty($user->rol) && $user->rol == $key)? 'selected="selected"' : '';
                                                @endphp
                                                <option value="{{ $key }}" {{ $selected }}>{{ $value }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>

                        <input type="hidden" name="idUser" value="{{ $user->id }}">

                        <div class="card-footer bg-white d-flex align-content-center flex-wrap">
                            <a href="{{ route('usuarios') }}" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i> Regresar</a>
                            <button type="submit" class="ml-auto btn btn-primary"><i class="fas fa-check"></i> Actualizar Datos</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
    </x-slot>
</x-app-layout>
