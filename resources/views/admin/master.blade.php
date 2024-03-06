<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <!-- Ionicons -->
    {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/colorpicker/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Persian Data Picker -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/persian-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/select2/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/custom-style.css') }}">
    <style>
        .custom-file-label::after {
            content: "فایل";
        }

        .custom-file-label:after {
            right: unset;
            left: 0;
            border-left: unset;
            border-right: inherit;
            border-radius: 0.35rem 0 0 0.35rem;
        }

        .filter-option-inner-inner {
            text-align: right;
        }
    </style>
    @yield('style')

    <!-- Persian Datepicker -->
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">
</head>

<body class="hold-transition sidebar-mini">
    @include('sweetalert::alert')
    <div id="loading-overlay">
        <div class="spinner"><i class="fa fa-refresh fa-4x fa-spin"></i></div>
    </div>
    <div class="wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        ساخته شده با <i class="fa fa-heart text-danger"></i> در
        <strong>گراتک</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- jQuery -->
    <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Persian Datepicker -->
    <script src="{{ asset('asset/plugins/persiandatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/persiandatepicker/persian-datepicker.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('asset/plugins/select2/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('asset/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('asset/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('asset/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ asset('asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('asset/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{ asset('asset/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('asset/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('asset/plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('asset/dist/js/demo.js') }}"></script>

    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <!-- Page script -->
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                minimumResultsForSearch: 20 // at least 20 results must be displayed
            })
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()


            $('.normal-example').persianDatepicker();
         
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".datepicker").persianDatepicker({
                initialValue: false,
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '.datepicker-alt'
            });
        });
    </script>
    <script>
        $('.custom-file-input').change(function() {
            //get the file name
            var fileName = $(this).val().split('\\').pop();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        $("a[data-confirm-delete='true']").click(function(e) {
            e.preventDefault();
        });
        $(document).ready(function() {
                    //minimize  menu ----- responsiv
                    $(window).on('load resize', function() {
                        if ($(window).width() < 1000) {

                            $('body').removeClass('sidebar-open');
                            $('body').addClass('sidebar-collapse');
                            //  alert('yes');
                        } else {
                            $('body').removeClass('sidebar-collapse');
                            $('body').addClass('sidebar-open');
                        }
                    });
                    $('body').removeClass('control-sidebar-slide-open');
                });
                //end responsive
    </script>

    @yield('scripts')
</body>

</html>
