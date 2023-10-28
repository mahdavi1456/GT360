<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | صفحه ثبت نام</title>
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
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <b>ثبت نام در سایت</b>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">ثبت نام کاربر جدید</p>
                            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger"><b>اخطار: </b>{{ $error }}</div>
                @endforeach
            @endif
                <form method="POST" action="{{ route('newUserAccount') }}">
                    @csrf
                    <label class="form-label">نوع حساب <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select name="account_type" id="account_type" class="form-control" required
                        oninvalid="this.setCustomValidity('.لطفا نوع حساب را وارد کنید')"
                        oninput="this.setCustomValidity('')">
                            <option value="">انتخاب کنید...</option>
                            <option value="حقیقی" @if(old('account_type') == 'حقیقی') selected @endif>حقیقی</option>
                            <option value="حقوقی" @if(old('account_type') == 'حقوقی') selected @endif>حقوقی</option>
                        </select>
                    </div>
                    <label class="form-label">نام <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="نام..." value="{{ old('name') }}" required
                        oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                        oninput="this.setCustomValidity('')">
                    </div>
                    <label class="form-label">نام خانوادگی <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="text" name="family" class="form-control" placeholder="نام خانوادگی..." value="{{ old('family') }}" required
                        oninvalid="this.setCustomValidity('.لطفا نام خانوادگی را وارد کنید')"
                        oninput="this.setCustomValidity('')">
                    </div>
                    <label class="form-label">موبایل <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="text" name="mobile" class="form-control just-numbers" placeholder="موبایل..." value="{{ old('mobile') }}" required
                        oninvalid="this.setCustomValidity('.لطفا موبایل را وارد کنید')"
                        oninput="this.setCustomValidity('')">
                    </div>
                    <label class="form-label">نام مجموعه </label>
                    <div class="input-group mb-3">
                        <input type="text" name="company" class="form-control" placeholder="نام مجموعه..."  value="{{ old('company') }}">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" id="checkbox"> با <a href="#">شرایط</a> موافق هستم
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" id="register" class="btn btn-primary btn-block btn-flat"
                                disabled>ثبت نام</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">من قبلا ثبت نام کرده ام</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- iCheck -->
    <script src="{{ asset('asset/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $('#register').prop('disabled', false);
                } else {
                    $('#register').prop('disabled', true);
                }
            });
        });
    </script>

<script src="{{ asset('js/validation.js') }}"></script>

</body>

</html>
