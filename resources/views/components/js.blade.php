
@php /*
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" type="text/javascript"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.2/js/dataTables.searchPanes.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.2/js/searchPanes.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
*/ @endphp

<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>


<!-- Page level plugins -->
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.2/js/dataTables.searchPanes.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/1.2.2/js/searchPanes.bootstrap4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<!-- Select2 -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js" defer></script>

<script src="{{ asset('js/js-admin.js') }}" type="text/javascript"></script>

<!-- FANCYBOX 3 -->
<script type="text/javascript" src={{ asset('vendor/fancybox/jquery.fancybox.js') }}></script>
<script type="text/javascript">
    $('[data-fancybox]').fancybox({
        image: {
            protect: true
        },
        loop: false,
        speed: 320,
        slideShow: false
    });
</script>
<!-- END -->

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

<!-- fullcalendar -->
<script src="{{ asset('vendor/fullcalendar/main.js') }}"></script>
<script src="{{ asset('vendor/fullcalendar/locales-all.js') }}"></script>

{{$slot}}

