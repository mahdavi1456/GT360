<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" value="{{ csrf_token() }}">
    <title>پنل مدیریت | صفحه ورود</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/iCheck/square/blue.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/bootstrap-rtl.min.css') }}">
    <!-- template rtl version -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/custom-style.css') }}">

    <!-- اضافه کردن CSS SweetAlert -->
    <link rel="stylesheet" href="{{ asset('asset/dist/css/sweetalert2.min.css') }} ">
    <!-- اضافه کردن JavaScript SweetAlert -->
    <script src="{{ asset('asset/dist/js/sweetalert2.all.min.js') }} "></script>

</head>

<body class="hold-transition login-page">

    <div id="loading-overlay">
        <div class="spinner"><i class="fa fa-refresh fa-4x fa-spin"></i></div>
    </div>

    <div class="login-box">
        <div class="login-logo">
            <b>فراموشی رمز عبور</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">فرم زیر را تکمیل کنید و دکمه ارسال را بزنید</p>
                @if ($errors->any())
                    <div class="container">
                        <div class="row alert alert-danger  justify-content-center mt-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <form method="POST" action="{{ route('forgotPassword') }}" id="forgotform">
                    @csrf
                    <label class="form-label">موبایل <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="text" name="mobile" id="mobile" class="form-control just-numbers"
                            placeholder="موبایل...">
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="button" class="btn btn-primary btn-block btn-flat" id="submit-btn">ارسال</button>
                    </div>
                    <!-- /.col -->

                </form>

                <form method="POST" action="{{ route('codePassword') }}" id="codeform" style="display: none;">
                    @csrf
                    <p id="countdown"></p>
                    <label class="form-label">کد <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="hidden" name="mobile" id="user-mobile" class="form-control">
                        <input type="text" name="code" id="code" class="form-control" placeholder="کد...">
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"
                                id="code-submit">تایید</button>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary btn-block btn-flat" id="resend-code">ارسال
                                مجدد کد</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset('asset/plugins/iCheck/icheck.min.js') }}"></script>
        <script>
            $('#submit-btn').click(function() {
                var mobile = $('#mobile').val();
                var token = $("input[name='_token']").val();

                $('#loading-overlay').fadeIn();
                $('#submit-btn').prop('disabled', true);

                $.ajax({
                    type: 'POST',
                    url: '/forgotPassword',
                    data: {
                        '_token': token,
                        'mobile': mobile
                    },
                    success: function(data) {
                        $("#forgotform").hide();
                        $("#codeform").show();
                        startCountdown();

                        $('#loading-overlay').fadeOut();
                        $('#submit-btn').prop('disabled', false);

                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: data.responseJSON.message
                        });

                        $('#loading-overlay').fadeOut();
                        $('#submit-btn').prop('disabled', false);

                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#code-submit').click(function(event) {
                    event.preventDefault();
                    $('#user-mobile').val($('#mobile').val());
                    $('#codeform').submit();
                });
            });
        </script>

        <script>
            $('#codeform').on('submit', function(e) {
                e.preventDefault();

                var code = $('#code').val();
                var token = $("input[name='_token']").val();
                var mobile = $('#user-mobile').val();

                $('#loading-overlay').fadeIn();
                $('#submit-btn').prop('disabled', true);

                $.ajax({
                    type: 'POST',
                    url: '/codePassword',
                    data: {
                        '_token': token,
                        'code': code,
                        'mobile': mobile
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'موفقیت',
                            text: 'رمز عبور با موفقیت تغییر یافت.'
                        }).then(function() {
                            window.location.href = "{{ route('login') }}";
                        });

                        $('#loading-overlay').fadeOut();
                        $('#submit-btn').prop('disabled', false);

                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: data.responseJSON.message
                        });

                        $('#loading-overlay').fadeOut();
                        $('#submit-btn').prop('disabled', false);
                    }
                });
            });
        </script>

        <script>
            $('#resend-code').click(function() {
                var mobile = $('#mobile').val();
                var token = $("input[name='_token']").val();

                $('#loading-overlay').fadeIn();
                $('#submit-btn').prop('disabled', true);

                $.ajax({
                    type: 'POST',
                    url: '/resendCode',
                    data: {
                        '_token': token,
                        'mobile': mobile
                    },
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'موفق',
                            text: 'کد جدید برای شما ارسال شد.'
                        });

                        $('#loading-overlay').fadeOut();
                        $('#submit-btn').prop('disabled', false);

                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'خطا',
                            text: data.responseJSON.message
                        });

                        $('#loading-overlay').fadeOut();
                        $('#submit-btn').prop('disabled', false);

                    }
                });
            });
        </script>

        <script>
            var countdownSeconds = 60;
            var countdownInterval;
            var resendButtonDisabled = true;

            function startCountdown() {
                if (countdownSeconds === 60) {
                    document.getElementById('resend-code').disabled = true;
                    resendButtonDisabled = true;
                }

                countdownSeconds = 60;
                updateCountdown();
                countdownInterval = setInterval(updateCountdown, 1000);
            }

            function updateCountdown() {
                document.getElementById('countdown').innerHTML = "زمان باقی‌مانده: " + countdownSeconds + " ثانیه";

                if (countdownSeconds === 0) {
                    clearInterval(countdownInterval);
                    document.getElementById('countdown').innerHTML = "زمان به پایان رسید.";

                    if (resendButtonDisabled) {
                        document.getElementById('resend-code').disabled = false;
                        resendButtonDisabled = false;
                    }
                } else {
                    countdownSeconds--;
                }
            }

            document.getElementById('resend-code').addEventListener('click', function() {
                if (!resendButtonDisabled) {
                    document.getElementById('resend-code').disabled = true;
                    resendButtonDisabled = true;
                    startCountdown();
                }
            });

            document.getElementById('resend-code').disabled = true;
        </script>

        <script src="{{ asset('js/validation.js') }}"></script>

</body>

</html>
