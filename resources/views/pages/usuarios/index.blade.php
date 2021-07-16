<x-app-layout>

    @section('pagina')
        Usuarios
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Usuarios</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mt-2"><i class="fas fa-list"></i> Usuarios</h5>
                        <button class="ml-auto btn btn-outline-primary" data-toggle="modal" data-target="#modalCrearUsuario">
                            <i class="fas fa-plus"></i> Crear Usuario
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>N.</th>
                                        <th>Documento</th>
                                        <th>Nombre</th>
                                        <th>Ocupación</th>
                                        <th>Creado</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>N.</th>
                                        <th>Documento</th>
                                        <th>Nombre</th>
                                        <th>Ocupación</th>
                                        <th>Creado</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crear Usuario -->
    <div class="modal fade" id="modalCrearUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Documento<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" placeholder="Digite Cedula..." required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nombres Completos<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="" placeholder="Digite Nombres completos..." required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Grado<span class="text-danger">*</span></label>
                                <select class="custom-select" id="" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option value="Oficial">Oficial</option>
                                    <option value="Suboficial">Suboficial</option>
                                    <option value="Soldado">Soldado</option>
                                    <option value="Otros">Otros</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Distintivo</label>
                                <select class="custom-select" id="">
                                    <option selected disabled value="">Seleccione...</option>
                                    <option value="Subteniente">Subteniente</option>
                                    <option value="Teniente">Teniente</option>
                                    <option value="Capitan">Capitán</option>
                                    <option value="Mayor">Mayor</option>
                                    <option value="Teniente coronel">Teniente coronel</option>
                                    <option value="Coronel">Coronel</option>
                                    <option value="Brigadier General">Brigadier General</option>
                                    <option value="Mayor General">Mayor General</option>
                                    <option value="General">General</option>
                                    <option value="Cabo Tercero">Cabo Tercero</option>
                                    <option value="Cabo Segundo">Cabo Segundo</option>
                                    <option value="Cabo Primero">Cabo Primero</option>
                                    <option value="Sargento Segundo">Sargento Segundo</option>
                                    <option value="Sargento Viceprimero">Sargento Viceprimero</option>
                                    <option value="Sargento Primero">Sargento Primero</option>
                                    <option value="Sargento Mayor">Sargento Mayor</option>
                                    <option value="Sargento Mayor De Comando">Sargento Mayor De Comando</option>
                                    <option value="Sargento Mayor De Comando Conjunto">Sargento Mayor De Comando Conjunto</option>
                                    <option value="Soldado Profesional">Soldado Profesional</option>
                                    <option value="Soldado Bachiller">Soldado Bachiller</option>
                                    <option value="Administrativo No Militar">Administrativo No Militar</option>
                                    <option value="Servicios Generales">Servicios Generales</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Arma</label>
                                <select class="custom-select" id="">
                                    <option selected disabled value="">Seleccione...</option>
                                    <option value="Infantería 'paso de vencedores'">Infantería 'paso de vencedores'</option>
                                    <option value="Artillería 'deber antes que vida'">Artillería 'deber antes que vida'</option>
                                    <option value="Comunicaciones 'ciencia dominio y vigilancia'">Comunicaciones 'ciencia dominio y vigilancia'</option>
                                    <option value="Aviación 'gloria sobre el horizonte'">Aviación 'gloria sobre el horizonte'</option>
                                    <option value="Caballería 'salve usted la patria'">Caballería 'salve usted la patria'</option>
                                    <option value="Ingenieros 'vencer o morir'">Ingenieros 'vencer o morir'</option>
                                    <option value="Inteligencia 'en guardia por la patria'">Inteligencia 'en guardia por la patria'</option>
                                    <option value="Administrativos 'íntegros y valientes'">Administrativos 'íntegros y valientes'</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Comando Trigésima Brigada<span class="text-danger">*</span></label>
                                <select class="custom-select" id="" required>
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

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Correo Personal<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="" placeholder="Digite un correo electronico..." required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Correo Corporativo<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="" placeholder="Digite un correo electronico..." required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Contraseña<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="" placeholder="Digite una contraseña..." required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Estado<span class="text-danger">*</span></label>
                                <select class="custom-select select-search" id="" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option value="Activo">Activo</option>
                                    <option value="Suspendido">Suspendido</option>
                                    <option value="Retirado">Retirado</option>
                                    <option value="Reserva">Reserva</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">ROL<span class="text-danger">*</span></label>
                                <select class="custom-select select-search" id="" required>
                                    <option selected disabled value="">Seleccione...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Encargado</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();

        </script>
    </x-slot>

</x-app-layout>
