    <!-- jQuery -->
    <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
    <!-- bootstrap touchspin -->
    <script src="{{ asset('asset/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.touchspin').TouchSpin({
                buttondown_class: 'btn',
                buttonup_class: 'btn',
                initval: 1,
                min: 1,
            });
        });
    </script>

    @yield('scripts')