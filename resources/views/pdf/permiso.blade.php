<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Generación de Permisos</title>

        <style>
            .table {
                width: 100%;
                max-width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
            }

            .contenedor-principal{
                margin-top: 30px;
                border: 1px solid #000;
                border-radius: 5px;
                width: 100%;
                padding: 20px;
            }

            .border_abajo{
                border-bottom: 1px solid #000;
                margin-right: 15px;
            }

            .margin-abajo{
                margin-bottom: 0px;
            }

            .texto-centrado{
                text-align: center !important;
            }
        </style>

    </head>

    <body>

        @php

            $fechaSalida = strtotime($data->fecha_salida);
            $fechaEntrada = strtotime($data->fecha_entrada);

        @endphp

        <table class="table">
            <tr>
                <td width="15%">
                    <img src="images/logo_permisos.png" style="width: 65%;" />
                </td>
                <td width="85%">
                    <span>
                        MINISTERIO DE DEFENSA NACIONAL <br>
                        COMANDO GENERAL FUERZAS MILITARES <br>
                        EJERCITO NACIONAL <br>
                        <span style="text-transform: uppercase">{{ $data->batallon }}</span>
                    </span>
                </td>
            </tr>
        </table>

        <br>

        <div style="text-align: right">
            <strong>BOLETA: <span style="color: red; padding-left: 20px;">{{ $data->id }}</span> </strong>
        </div>

        <div class="contenedor-principal">

            <div class="margin-abajo">
                <div style="width: 36%; float: left;">
                    EL COMANDO DE LA UNIDAD AUTORIZA AL:
                </div>
                <div class="border_abajo" style="width: 63%; float: left;">
                    {{ $data->nombre_soldado }}
                </div>
            </div>

            <br> <br>

            <div class="margin-abajo">
                <div style="width: 7%; float: left;">
                    C.C. No.
                </div>
                <div class="border_abajo" style="width: 13%; float: left;">
                    {{ $data->cedula_soldado }}
                </div>
                <div style="width: 31%; float: left;">
                    PARA SALIR A PERMISO DESDE EL DIA:
                </div>
                <div class="border_abajo" style="width: 4%; float: left;">
                    {{ date("d", $fechaSalida) }}
                </div>
                <div style="width: 6%; float: left;">
                    MES:
                </div>
                <div class="border_abajo" style="width: 4%; float: left;">
                    {{ date("m", $fechaSalida) }}
                </div>
                <div style="width: 6%; float: left;">
                    AÑO:
                </div>
                <div class="border_abajo" style="width: 4%; float: left;">
                    {{ date("Y", $fechaSalida) }}
                </div>
                <div style="width: 6%; float: left;">
                    A LAS:
                </div>
                <div class="border_abajo" style="width: 5%; float: left;">
                    {{ date("H:i", $fechaSalida) }}
                </div>
                <div style="width: 7%; float: left;">
                    HORAS
                </div>
            </div>

            <br> <br>

            <div class="margin-abajo">
                <div style="width: 21%; float: left;">
                    PERMISO HASTA EL DIA:
                </div>
                <div class="border_abajo" style="width: 5%; float: left;">
                    {{ date("d", $fechaEntrada) }}
                </div>
                <div style="width: 6%; float: left;">
                    MES:
                </div>
                <div class="border_abajo" style="width: 5%; float: left;">
                    {{ date("m", $fechaEntrada) }}
                </div>
                <div style="width: 6%; float: left;">
                    AÑO:
                </div>
                <div class="border_abajo" style="width: 5%; float: left;">
                    {{ date("Y", $fechaEntrada) }}
                </div>
                <div style="width: 6%; float: left;">
                    A LAS:
                </div>
                <div class="border_abajo" style="width: 5%; float: left;">
                    {{ date("H:i", $fechaEntrada) }}
                </div>
                <div style="width: 7%; float: left;">
                    HORAS
                </div>
            </div>

            <br> <br>

            <div class="margin-abajo">
                <div style="width: 28%; float: left;">
                    PUEDE SALIR DE LA GUARNICIÓN:
                </div>
                <div class="border_abajo" style="width: 10%; float: left;">
                    {{ $data->guarnicion }}
                </div>
                <div style="width: 10%; float: left;">
                    DESTINO:
                </div>
                <div class="border_abajo" style="width: 50%; float: left;">
                    {{ $data->destino }}
                </div>
            </div>

            <br> <br>

            <div class="margin-abajo">
                <div style="width: 10%; float: left;">
                    MOTIVO:
                </div>
                <div class="border_abajo" style="width: 65%; float: left;">
                    {{ $data->motivo }}
                </div>
                <div style="width: 6%; float: left;">
                    TEL:
                </div>
                <div class="border_abajo" style="width: 17%; float: left;">
                    {{ $data->telefono_soldado }}
                </div>
            </div>

            <br> <br> <br> <br>

            <div class="margin-abajo texto-centrado">
                <div style="width: 50%; float: left;">
                    <span>__________________________________________________</span> <br>
                    FIRMA DEL SOLDADO / OFICIAL / SUBOFICIAL
                </div>
                <div style="width: 50%; float: left;">
                    <span>__________________________________________________</span> <br>
                    SEP - SE
                </div>
            </div>

            <br> <br> <br> <br>

            <div class="margin-abajo texto-centrado">
                <div style="width: 50%; float: left;">
                    <span>__________________________________________________</span> <br>
                    COMANDANTE DE COMPAÑIA
                </div>
                <div style="width: 50%; float: left;">
                    <span>__________________________________________________</span> <br>
                    OFICIAL / SUBOFICIAL SERVICIO
                </div>
            </div>

            <br> <br> <br> <br>

            <div class="margin-abajo texto-centrado">
                <div style="width: 100%; float: left;">
                    <span>__________________________________________________</span> <br>
                    CDTE O EJECUTIVO DE LA UNIDAD
                </div>
            </div>

            <br> <br> <br>

        </div>
    </body>

</html>
