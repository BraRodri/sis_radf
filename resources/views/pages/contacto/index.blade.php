<x-app-layout>

    @section('pagina')
        Contacto
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Contacto</h3>
        </div>
    </div>

    <div class="container contenedor-principal mb-5">

        <!-- página estandard EMPRESA -->
       <div class="row">

            <div class="col-md-5 col-lg-4">
                <div class="r-contacto-info">
                    <h2>
                        REDES SOCIALES
                    </h2>
                    <p><strong>Batallon:</strong></p>
                    <p>
                        <a href="https://www.ejercito.mil.co/" class="btn btn-dark" target="_blank"><i class="fas fa-globe"></i></a>
                        <a href="https://www.facebook.com/ejercitocolombia/" class="btn btn-dark" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/ejercitonacionalcolombia/?hl=es-la" class="btn btn-dark" target="_blank"><i class="fab fa-instagram"></i></a>
                    </p>
                    <p><strong>Universidad Santander:</strong></p>
                    <p>
                        <a href="https://udes.edu.co/" class="btn btn-dark" target="_blank"><i class="fas fa-globe"></i></a>
                        <a href="https://www.facebook.com/UdesCucutaOficial/" class="btn btn-dark" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/udescampuscucuta/?hl=es" class="btn btn-dark" target="_blank"><i class="fab fa-instagram"></i></a>
                    </p>
                    <hr>
                    <h2>
                        <i class="fa fa-envelope" aria-hidden="true"></i> ESCRÍBENOS
                    </h2>
                    <p>Dudas o consultas sobre nosotros te respondemos.</p>
                    <p><strong>Correo Contacto</strong></p>
                    <p>
                        <a href="mailto:jairo.tique@buzonejercito.mil.co">jairo.tique@buzonejercito.mil.co</a>
                        <a href="mailto:ingenierias@cucuta.udes.edu.co">ingenierias@cucuta.udes.edu.co</a>
                        <a href="mailto:bas30@buzonejercito.mil.co">bas30@buzonejercito.mil.co</a>
                    </p>
                </div>
            </div>

            <div class="col-md-7 col-lg-8">

                <div class="r-form-contacto">

                    @if (Session::has('error'))
                        @if (Session::get('error') == 'success')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Se ha enviado la información correctamente!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::get('error') == 'failure')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error al enviar la información, inténtelo mas tarde nuevamente!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    @endif

                    <h2>FORMULARIO DE CONTACTO</h2>

                    <form action="{{ route('contacto.insert') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Asunto</label>
                                <select id="type" name="type" class="custom-select" required>
                                    <option selected value="">- Seleccionar -</option>
                                    <option value="Consultas">Consultas</option>
                                    <option value="Contacto">Contacto</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Nombre y Apellido</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="ej: Pepito Perez" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="ej: email@mail.com" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Teléfono / Celular</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="ej: +57 313 222-4567" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comentarios</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>

                </div>
            </div>

            <div class="col-12 mt-4">
                <hr> <br>
                <h2>UBICACIÓN</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3420.875114350529!2d-72.51045023388146!3d7.861840351935264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e66454d6d2956bf%3A0x3b2cdf5df8e63d12!2zQkFUQUxMw5NOIERFIEPDmkNVVEE!5e0!3m2!1ses!2sco!4v1633665010218!5m2!1ses!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

       </div>

    </div>

    <x-slot name="js">
    </x-slot>
</x-app-layout>
