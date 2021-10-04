<x-app-layout>

    @section('pagina')
        Editar inventario
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de inventario</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">
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
                <div class="card shadow mb-5">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mt-2"><i class="fas fa-edit"></i> Producto: <strong>{{ $inventario->nombre }}</strong></h5>
                    </div>

                    <form action="{{ route('inventario.update', ['inventario' => $inventario->id]) }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        @if($inventario->categoria_inventario_id === 1)
                            <input type="hidden" name="route_name" value="inventarioAlmacen.index">
                        @elseif($inventario->categoria_inventario_id === 2)
                            <input type="hidden" name="route_name" value="inventarioArmamento.index">
                        @elseif($inventario->categoria_inventario_id === 3)
                            <input type="hidden" name="route_name" value="inventarioAlimentos.index">
                        @elseif($inventario->categoria_inventario_id === 1)
                            <input type="hidden" name="route_name" value="inventarioInsumos.index">
                        @endif

                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="">Nombre<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" min="8" placeholder="Digite nombre..." required
                                        value="{{  $inventario->nombre }}"
                                    >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Stock<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Digite stock..." required
                                        value="{{  $inventario->stock_currently }}"
                                    >
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Descripción<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="exampleTextarea" rows="3" name="descripcion">{{  $inventario->descripcion }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-white d-flex align-content-center flex-wrap">
                            @if($inventario->categoria_inventario_id === 1)
                                <a href="{{ route('inventarioAlmacen.index') }}" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i> Regresar</a>
                            @elseif($inventario->categoria_inventario_id === 2)
                                <a href="{{ route('inventarioArmamento.index') }}" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i> Regresar</a>
                            @elseif($inventario->categoria_inventario_id === 3)
                                <a href="{{ route('inventarioAlimentos.index') }}" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i> Regresar</a>
                            @elseif($inventario->categoria_inventario_id === 1)
                                <a href="{{ route('inventarioInsumos.index') }}" class="btn btn-outline-dark"><i class="fas fa-arrow-left"></i> Regresar</a>
                            @endif
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
