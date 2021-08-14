<x-app-layout>

    @section('pagina')
        Guardia
    @endsection

    <div class="container-fluid m-0 p-0">
        <div class="bg-principal text-center">
            <h3>Gestión de Guardia</h3>
        </div>
    </div>

    <div class="container contenedor-principal">
        <div class="row">

            <div class="col-12">
                <div class="card shadow mb-5">
                    <div class="card-header d-flex align-content-center flex-wrap">
                        <h5 class="mt-2"><i class="fas fa-calendar-alt"></i> Calendario de Guardia</h5>
                        <button class="ml-auto btn btn-outline-primary" data-toggle="modal" data-target="#modalCrearGuardia">
                            <i class="fas fa-plus"></i> Crear
                        </button>
                    </div>
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal crear guardia -->
    <x-modal-crear-guardia></x-modal-crear-guardia>

    <!-- Modal ver guardia -->
    <x-modal-ver-guardia></x-modal-ver-guardia>

    <x-slot name="js">
        <script>

            document.addEventListener('DOMContentLoaded', function() {

                $('.select').selectpicker();

                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prevYear,prev,next,nextYear today',
                        center: 'title',
                        right: 'dayGridMonth,dayGridWeek,dayGridDay,listWeek'
                    },
                    navLinks: true,
                    locale: 'es',
                    initialView: 'dayGridMonth',
                    dateClick: function(info){
                        $('#fecha_desde').val(info.dateStr);
                        $('#modalCrearGuardia').modal();
                    },
                    events: "{{ route('guardia.obtener') }}",
                    eventClick: function(info){
                        //informacion
                        $('#idGuardia').val(info.event.extendedProps.idGuardia);
                        $('#descripcionVer').val(info.event.extendedProps.descripcion);

                        var mesDesde = (info.event.start.getMonth()+1);
                        mesDesde = (mesDesde<10)?"0"+mesDesde:mesDesde;
                        var diaDesde = (info.event.start.getDate());
                        diaDesde = (diaDesde<10)?"0"+diaDesde:diaDesde;
                        var anoDesde = (info.event.start.getFullYear());
                        var horaDesde = (info.event.start.getHours()+":"+info.event.start.getMinutes());
                        $('#fecha_desdeVer').val(diaDesde+"/"+mesDesde+"/"+anoDesde);
                        $('#hora_desdeVer').val(horaDesde);

                        var mesHasta = (info.event.end.getMonth()+1);
                        mesHasta = (mesHasta<10)?"0"+mesHasta:mesHasta;
                        var diaHasta= (info.event.end.getDate());
                        diaHasta = (diaHasta<10)?"0"+diaHasta:diaHasta;
                        var anoHasta = (info.event.end.getFullYear());
                        var horaHasta = (info.event.end.getHours()+":"+info.event.end.getMinutes());
                        $('#fecha_hastaVer').val(diaHasta+"/"+mesHasta+"/"+anoHasta);
                        $('#hora_hastaVer').val(horaHasta);

                        $('#usuario').val(info.event.extendedProps.nombreUsuario);

                        $('#modalVerGuardia').modal();
                    }
                });
                calendar.render();

                //guardar nuevo guardia
                $('#form-agregar-guardia').on('submit', function(e) {

                    // evito que propague el submit
                    e.preventDefault();

                    var $thisForm = $('#form-agregar-guardia');
                    var $thisModal = $('#modalCrearGuardia');
                    $thisModal.find('.modal-body .alert-danger, .modal-body .alert-success').remove();
                    var url = "{{route('guardia.crear')}}";

                    // agrego la data del form a formData
                    var form = this;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "POST",
                        encoding:"UTF-8",
                        url: url,
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        dataType:'json',
                        success: function(response) {

                            console.log(response);

                            if(response.type == 'failure'){
                                var message = '<div class="alert alert-danger"><strong>ERROR!</strong> Se ha producido un error, favor vuelva a intentarlo. Si el error persiste favor comunicarse al administrador.</div>';
                                $thisModal.find('.modal-body').prepend(message);
                            } else {

                                $thisForm[0].reset();

                                var message = '<div class="alert alert-success"><strong>OK!</strong> ingreso realizado correctamente.</div>';
                                $thisModal.find('.modal-body').prepend(message);

                                calendar.refetchEvents();

                                $thisModal.find('.modal-body .alert-danger, .modal-body .alert-success').remove();
                                $thisModal.modal('hide');
                            }

                        },
                        error: function(xhr, status, error){
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }
                    });

                });

                //eliminar guardia
                $('#form-eliminar-guardia').on('submit', function(e) {

                    // evito que propague el submit
                    e.preventDefault();

                    var $thisForm = $('#form-eliminar-guardia');
                    var $thisModal = $('#modalVerGuardia');
                    $thisModal.find('.modal-body .alert-danger, .modal-body .alert-success').remove();
                    var url = "{{route('guardia.eliminar')}}";

                    // agrego la data del form a formData
                    var form = this;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: "POST",
                        encoding:"UTF-8",
                        url: url,
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        dataType:'json',
                        success: function(response) {

                            console.log(response);

                            if(response.type == 'failure'){
                                var message = '<div class="alert alert-danger"><strong>ERROR!</strong> Se ha producido un error, favor vuelva a intentarlo. Si el error persiste favor comunicarse al administrador.</div>';
                                $thisModal.find('.modal-body').prepend(message);
                            } else {

                                $thisForm[0].reset();

                                var message = '<div class="alert alert-success"><strong>OK!</strong> se elimino.</div>';
                                $thisModal.find('.modal-body').prepend(message);

                                calendar.refetchEvents();

                                $thisModal.find('.modal-body .alert-danger, .modal-body .alert-success').remove();
                                $thisModal.modal('hide');
                            }

                        },
                        error: function(xhr, status, error){
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }
                    });

                });
            });

        </script>
    </x-slot>

</x-app-layout>
