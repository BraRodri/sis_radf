<x-app-layout>

    @section('pagina')
        Historial
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Historial de Archivos</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">

            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mr-auto p-2"><i class="far fa-file-archive"></i> Historial de Archivos</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTableHistorial" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Usuario</th>
                                        <th>Archivo</th>
                                        <th>Creado</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>N°</th>
                                        <th>Usuario</th>
                                        <th>Archivo</th>
                                        <th>Creado</th>
                                        <th>Cantidad</th>
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

    <x-slot name="js">
        <script>
            $(document).ready(function () {

                $('#dataTableHistorial').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                    },
                    columnDefs: [{
                            width: "180px",
                            targets: 3
                        }],
                    dom: 'Blfrtip',
                    buttons:[
                        {
                            extend: "excelHtml5",
                            text: "<i class='fas fa-file-excel'></i> EXCEL",
                            titleAttr: "Exportar a Excel",
                            className: 'btn btn-success'
                        },
                        {
                            extend: "pdfHtml5",
                            text: '<i class="fas fa-file-pdf"></i> PDF',
                            titleAttr: "Exportar a PDF",
                            className: 'btn btn-danger'
                        },
                        {
                            extend: "print",
                            text: '<i class="fas fa-print"></i> IMPRIMIR',
                            titleAttr: "Imprimir Datos",
                            className: 'btn btn-dark'
                        }
                    ]
                });

            });
        </script>
    </x-slot>

</x-app-layout>
