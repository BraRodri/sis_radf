<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" type="text/javascript"></script>

<!-- Page level plugins -->
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="{{ asset('vendor/datatables/datatables.js') }}"></script>
<script type="text/javascript" src={{ asset('vendor/datatables/i18n/spanish.js') }}></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('js/js-admin.js') }}" type="text/javascript"></script>

{{$slot}}
