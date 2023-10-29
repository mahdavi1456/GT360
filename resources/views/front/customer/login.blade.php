@extends('front.layouts.master')
@section('title', 'ورود / ثبت نام')
@section('style')
    <link rel="stylesheet" href="{{ asset('asset/dist/css/custom-style.css') }}">
@endsection
@section('content')

    <div id="loading-overlay">
        <div class="spinner"><i class="fa fa-refresh fa-4x fa-spin"></i></div>
    </div>

    <section class="py-5">
        <div class="container">

            <div class="d-flex flex-column checkout-box-login">

                <div class="col-12 mb-4">

                    <div class="p-2 pull-right"><strong> ورود / ثبت نام </strong></div>

                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('customerlogin') }}" method="post" class="form-element" id="loginform">
                    @csrf
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" id="mobile" name="mobile" class="form-control pl-15 just-numbers"
                                placeholder="موبایل...">
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-success btn-block margin-top-10" style="width: 100%;" id="submit-btn">ارسال</button>
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
                    <!-- /.col -->
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success btn-block" style="width: 100%;" id="code-submit">تایید</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary btn-block" style="width: 100%;" id="resend-code">ارسال مجدد
                                کد</button>
                        </div>
                    </div>
                    <!-- /.col -->

                </form>

            </div>
        </div>

    </section>
@endsection


@section('scripts')

    <script>
        $('#submit-btn').click(function(e) {
            e.preventDefault();
            var mobile = $('#mobile').val();
            var token = $("input[name='_token']").val();

            $('#loading-overlay').fadeIn();
            $('#submit-btn').prop('disabled', true);

            $.ajax({
                type: 'POST',
                url: '/customer-login',
                data: {
                    '_token': token,
                    'mobile': mobile
                },
                success: function(data) {
                    $("#loginform").hide();
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
            url: '/confirmLogin',
            data: {
                '_token': token,
                'code': code,
                'mobile': mobile
            },
            success: function(data) {


                if(data.redirect == 'checkout') {

                    Swal.fire({
                        icon: 'success',
                        title: 'موفقیت',
                        text: 'درخواست با موفقیت انجام شد.'
                    });

                    var customer_id = data.customer_id;
                    window.location.href = 'checkout/' + customer_id;
                }

                if(data.redirect == 'completeInfo') {
                    Swal.fire({
                        icon: 'success',
                        title: 'موفقیت',
                        text: 'درخواست با موفقیت انجام شد.'
                    });

                    var customer_id = data.customer_id;
                    window.location.href = 'completeInfo/' + customer_id;
                }

                $('#loading-overlay').fadeOut();
                $('#submit-btn').prop('disabled', false);

            },
            error: function(data) {
                Swal.fire({
                    icon: 'error',
                    title: 'خطا',
                    text: 'کد وارد شده اشتباه است.'
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
            url: '/resendLoginCode',
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


@endsection
