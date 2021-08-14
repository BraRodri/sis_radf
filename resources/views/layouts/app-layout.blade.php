<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title> @yield('pagina') - Gestión de Servicios | SIS-RADF </title>

        <!-- icon -->
        <link href="{{ asset('images/icon.jpeg') }}" rel="icon">

        <!-- css -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <x-css></x-css>
    </head>
    <body id="page-top">

        <x-header></x-header>

        {{ $slot }}

        <x-js>
            {{$js}}
        </x-js>
    </body>
</html>
