<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>Ingreso - SIS-RADF</title>

    <!-- icon -->
    <link href="{{ asset('images/icon.jpeg') }}" rel="icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/js-login.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">

        <div class="row align-items-center">

            <!-- The content half -->
            <div class="col-md-12 bg-light bg-login">
                <div class="login align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-xl-5 mx-auto text-center">

                                <img src="{{ asset('images/logo.jpeg') }}" class="img-fluid mb-4" style="width: 25%">

                                <h1 class="text-center text-primary">SIS-RADF</h1>
                                <h4>Gestión de Servicios Especializados</h4>

                                @yield('content')

                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>

    </div>
</body>
</html>
