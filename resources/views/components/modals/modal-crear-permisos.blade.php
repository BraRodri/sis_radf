<div class="modal fade" id="modalCrearPermiso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><span id="texto-title">Crear nuevo permiso</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('permisos.insert') }}" method="POST" id="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label id="texto-form">Batallon</label>
                                <select class="form-control select" name="batallon" id="batallon" data-live-search="true" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option value="TRIGESIMA BRIGADA N° 30 CUCUTA DIV02">TRIGESIMA BRIGADA N° 30 CUCUTA DIV02</option>
                                    <option value="BIROV BATALLON DE INFANTERIA N°13 'GR. CUSTODIO GARCIA ROVIRA">BIROV BATALLON DE INFANTERIA N°13 "GR. CUSTODIO GARCIA ROVIRA</option>
                                    <option value="GMMAZ GRUPO DE CABALLERIA MECANIZADO N° 5 'GR. HERMOGENES MAZA">GMMAZ GRUPO DE CABALLERIA MECANIZADO N° 5 "GR. HERMOGENES MAZA</option>
                                    <option value="BAS30 BATALLON DE SERVICIOS N° 30">BAS30 BATALLON DE SERVICIOS N° 30</option>
                                    <option value="BISAN BATALLON DE INFANTERIA N° 15 FRANCISCO DE PAULA SANTANDER">BISAN BATALLON DE INFANTERIA N° 15 FRANCISCO DE PAULA SANTANDER</option>
                                    <option value="BIJOS BATALLON DE INGENIEROS N° 30 CORONEL JOSE ALBERTO SALAZAR A">BIJOS BATALLON DE INGENIEROS N° 30 CORONEL JOSE ALBERTO SALAZAR A</option>
                                    <option value="BACUC BATALLON DE ARTILLERIA N° 30 BATALLA DE CUCUTA">BACUC BATALLON DE ARTILLERIA N° 30 BATALLA DE CUCUTA</option>
                                    <option value="BITER30 BATALLON DE INSTRUCCION ENTRENAMIENTO Y REENTRENAMIENTO N° 30">BITER30 BATALLON DE INSTRUCCION ENTRENAMIENTO Y REENTRENAMIENTO N° 30</option>
                                    <option value="GGNSA GRUPO DE ACCION UNIFICADA POR LA LIBERTAD PERSONAL NORTE DE SANTANDER">GGNSA GRUPO DE ACCION UNIFICADA POR LA LIBERTAD PERSONAL NORTE DE SANTANDER</option>
                                    <option value="CIAME - FUNDACIAME">CIAME - FUNDACIAME</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label id="texto-form">Soldado</label>
                                <select class="form-control select" name="user" id="user" data-live-search="true" required>
                                    <option value="">- Seleccione -</option>
                                    @if(count($users) > 0)
                                        @foreach($users as $key => $value)
                                            <option value="{{ $value->id }}">#{{ $value->document }} - {{ $value->names }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label id="texto-form">Fecha Salida</label>
                                    <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label id="texto-form">Hora Salida</label>
                                    <input type="time" class="form-control" id="hora_salida" name="hora_salida" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label id="texto-form">Fecha Entrada</label>
                                    <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label id="texto-form">Hora Entrada</label>
                                    <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label id="texto-form">¿Puede salir de la guarnición?</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="guarnicion" id="guarnicion" value="1">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Si
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="guarnicion" id="guarnicion" value="0">
                                    <label class="form-check-label" for="exampleRadios1">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="form-group">
                                <label id="texto-form">Telefono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label id="texto-form">Destino</label>
                                <input type="text" class="form-control" id="destino" name="destino" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label id="texto-form">Motivo</label>
                                <input type="text" class="form-control" id="motivo" name="motivo" required>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="btn-subir-archivo"><i class="fas fa-plus"></i> Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
