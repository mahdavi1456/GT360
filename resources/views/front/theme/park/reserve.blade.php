@extends('front.theme.park.parts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="result" class="reserveBox col-12 mt-4 mb-4">
                <form action="">
                    <div class="reserveBoxSelect row">
                        <div class="col">
                            <label>ماه</label>
                            <select name="month" id="reserve-filter-month" class="w-100">
                                <option value="1" {{ $currentMonth == 1 ? 'selected' : '' }}>فروردین</option>
                                <option value="2" {{ $currentMonth == 2 ? 'selected' : '' }}>اردیبهشت</option>
                                <option value="3" {{ $currentMonth == 3 ? 'selected' : '' }}>خرداد</option>
                                <option value="4" {{ $currentMonth == 4 ? 'selected' : '' }}>تیر</option>
                                <option value="5" {{ $currentMonth == 5 ? 'selected' : '' }}>مرداد</option>
                                <option value="6" {{ $currentMonth == 6 ? 'selected' : '' }}>شهریور</option>
                                <option value="7" {{ $currentMonth == 7 ? 'selected' : '' }}>مهر</option>
                                <option value="8" {{ $currentMonth == 8 ? 'selected' : '' }}>آبان</option>
                                <option value="9" {{ $currentMonth == 9 ? 'selected' : '' }}>آذر</option>
                                <option value="10" {{ $currentMonth == 10 ? 'selected' : '' }}>دی</option>
                                <option value="11" {{ $currentMonth == 11 ? 'selected' : '' }}>بهمن</option>
                                <option value="12" {{ $currentMonth == 12 ? 'selected' : '' }}>اسفند</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>روز</label>
                            <select name="day" id="reserve-filter-day" class="w-100">
                                @for ($i = 1; $i <= $date->daysInMonth; $i++)
                                    <option value="{{ $i }}" {{ $currentDay == $i ? 'selected' : '' }}>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col">
                            <label class="d-block fade">روز</label>
                            <button type="submit" class="btn btn-success">نمایش</button>
                            @if (request('day'))
                                <a href="{{ url()->current() }}" class="btn btn-warning">نمایش همه
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
                @php
                    $reservePlanModel->reserveList($currentYear, $currentMonth, $currentDay, $date);
                @endphp
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document.body).on("click", ".load-reserve-info-form", function() {
                $("#loading-overlay").fadeIn();
                var id = $(this).data("id");
                var rp_date = $(this).data("rp_date");

                $.ajax({
                    type: "POST",
                    url: "{{ route('reservePlan.InfoForm') }}",
                    data: {
                        id: id,
                        rp_date: rp_date,
                        slug: "{{ request('slug') }}"
                    },
                    success: function(data) {

                       $("#result").html(data);
                       
                        $('#ro-count').on('change', function() {
                            let count = this.value;
                            let price = $('#rs_price').val();
                            let totalPrice = parseFloat(count) * parseFloat(
                                price);
                            $('#ro-total').val(totalPrice);
                        });
                        $("#loading-overlay").fadeOut();
                        /*Swal.fire({
                            title: "موفق",
                            text: "اطلاعات با موفقیت ثبت شد.",
                            icon: "success"
                        });*/
                    },
                    error: function(data) {
                        $("#loading-overlay").fadeOut();
                        console.log(data);
                        /*Swal.fire({
                            title: "خطا",
                            text: data.responseJSON.message,
                            icon: "error"
                        });*/
                    }
                });

            });

            $(document.body).on("change", "#ro-count", function() {

                var inputValue = $(this).val();
                if (parseInt(inputValue) > $(this).attr('max')) {
                    $(this).tooltip({
                        title: 'تعداد بیش از ظرفیت',
                        placement: 'top',
                        trigger: 'manual',
                    });
                    $(this).tooltip('show');
                    $(this).val(0);
                    setTimeout(function() {
                        $('#ro-count').tooltip('hide');
                    }, 2000); // 2000 milliseconds = 2 seconds


                } else {
                    $(this).tooltip('dispose');
                }
            });

            $(document.body).on("click", "#load-confirm-mobile-form", function() {
                //var id = $(this).data("id");
                $("#loading-overlay").fadeIn();
                var ro_count = $("#ro-count").val();
                var ro_name = $("#ro-name").val();
                var ro_mobile = $("#ro-mobile").val();
                var rp_id = $('#rp_id').val();
                var ro_date = $('#ro_date').val();
                var rs_price = $('#rs_price').val();
                //  var slug=$('#slug').val();
                var rp_details = $('#rp_details').val();
                var rp_name = $('#rp_name').val();

                if (ro_count > 0 && ro_name != "" && ro_mobile != "") {
                    if (ro_mobile.length != 11) {
                        $("#loading-overlay").fadeOut();
                        Swal.fire({
                            title: "خطا",
                            text: " موبایل وارد شده صحیح نمی باشد",
                            icon: "error"
                        });
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('reservePlan.ConfirmMobileForm') }}",
                            data: {
                                //   id: id,
                                rp_id: rp_id,
                                ro_date: ro_date,
                                ro_count: ro_count,
                                ro_name: ro_name,
                                ro_mobile: ro_mobile,
                                rs_price: rs_price,
                                slug: "{{ request('slug') }}",
                                rp_details: rp_details,
                                rp_name: rp_name
                            },
                            success: function(data) {
                                $("#result").html(data);
                                timer();
                                Swal.fire({
                                    title: "توجه",
                                    text: "کد اعبتار سنجی  برای شما ارسال شد",
                                    icon: "info",
                                    timer: 1000
                                });
                                $("#loading-overlay").fadeOut();
                                // alert('صفحه ورود کد');
                                /*Swal.fire({
                                    title: "موفق",
                                    text: "اطلاعات با موفقیت ثبت شد.",
                                    icon: "success"
                                });*/
                            },
                            error: function(data) {
                                $("#loading-overlay").fadeOut();
                                Swal.fire({
                                    title: "خطا",
                                    text: data.responseJSON.message,
                                    icon: "error"
                                });
                            }
                        });
                    }
                } else {
                    $("#loading-overlay").fadeOut();
                    if (ro_count == 0) {
                        Swal.fire({
                            title: "توجه",
                            text: "تعداد  را وارد کنید ",
                            icon: "info"
                        });
                    } else {
                        Swal.fire({
                            title: "توجه",
                            text: "لطفا کادرهای ستاره دار را درست تکمیل نمایید.",
                            icon: "info"
                        });
                    }


                }
            });

            $(document.body).on("click", "#check-confirm-customer", function() {
                $("#loading-overlay").fadeIn();
                var mobile = $("#mobile").val();
                var code = $("#code").val();

                if (mobile != "" && code != "") {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('confirm-customer.check') }}",
                        data: {
                            mobile: mobile,
                            code: code
                        },
                        success: function(data) {
                            var id = $('#ro_id').val();
                            $.ajax({
                                type: "POST",
                                url: "{{ route('transaction.start') }}",
                                data: {
                                    id: id
                                },
                                success: function(data2) {
                                    //  console.log(data2);
                                    window.location.href = data2;
                                },
                                error: function(data2) {
                                    $("#loading-overlay").fadeOut();
                                    alert(data2);
                                    console.log(data2);
                                }
                            });
                        },
                        error: function(data) {
                            $("#loading-overlay").fadeOut();
                            if (data.status == 405) {
                                Swal.fire({
                                    title: "خطا",
                                    text: "کد وارد شده منقضی شده است",
                                    icon: "error"
                                });
                            } else {
                                Swal.fire({
                                    title: "خطا",
                                    text: "کد وارد شده اشتباه است",
                                    icon: "error"
                                });
                            }
                        }
                    });
                } else {
                    $("#loading-overlay").fadeOut();
                    Swal.fire({
                        title: "توجه",
                        text: "لطفا کادرهای ستاره دار را تکمیل نمایید.",
                        icon: "info"
                    });

                }
            });
            $(document.body).on("click", "#countdownBTN", function() {
                $("#loading-overlay").fadeIn();
                // if ($('#countdownBTN').prop('disable') == 'false') {
                let mobile = $('#mobile').val();
                $.ajax({
                    type: 'post',
                    url: "{{ route('reservePlan.resendCode') }}",
                    data: {
                        mobile: mobile
                    },
                    success: function(res) {
                        $("#loading-overlay").fadeOut();
                        Swal.fire({
                            title: "توجه",
                            text: "کد اعبتار سنجی مجددا برای شما ارسال شد",
                            icon: "info"
                        });
                        timer();
                    },
                    error: function(res) {
                        $("#loading-overlay").fadeOut();
                        alert('nop');
                    }
                });


            });

            function timer() {
                var countdown = 60;
                $('#countdownBTN').prop('disabled', true);
                var timer = setInterval(function() {
                    $('#countdown').parent().removeClass('fade');
                    $('#countdown').text(countdown);
                    countdown--;
                    if (countdown <= 0) {
                        clearInterval(timer);
                        $('#countdown').parent().addClass('fade');
                        $('#countdownBTN').prop('disabled', false);
                    }
                }, 1000);
            }

        });
    </script>
@endsection
