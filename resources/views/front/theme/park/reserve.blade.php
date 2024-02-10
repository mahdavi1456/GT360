@extends('front.theme.park.parts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="result" class="reserveBox col-12 mt-4 mb-4">
                <div class="reserveBoxSelect row">
                    <div class="col">
                        <label>ماه</label>
                        <select id="reserve-filter-month" class="w-100">
                            <option value="1" {{ $currentMonth == 1 ? "selected" : "" }}>فروردین</option>
                            <option value="2" {{ $currentMonth == 2 ? "selected" : "" }}>اردیبهشت</option>
                            <option value="3" {{ $currentMonth == 3 ? "selected" : "" }}>خرداد</option>
                            <option value="4" {{ $currentMonth == 4 ? "selected" : "" }}>تیر</option>
                            <option value="5" {{ $currentMonth == 5 ? "selected" : "" }}>مرداد</option>
                            <option value="6" {{ $currentMonth == 6 ? "selected" : "" }}>شهریور</option>
                            <option value="7" {{ $currentMonth == 7 ? "selected" : "" }}>مهر</option>
                            <option value="8" {{ $currentMonth == 8 ? "selected" : "" }}>آبان</option>
                            <option value="9" {{ $currentMonth == 9 ? "selected" : "" }}>آذر</option>
                            <option value="10" {{ $currentMonth == 10 ? "selected" : "" }}>دی</option>
                            <option value="11" {{ $currentMonth == 11 ? "selected" : "" }}>بهمن</option>
                            <option value="12" {{ $currentMonth == 12 ? "selected" : "" }}>اسفند</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>روز</label>
                        <select id="reserve-filter-day" class="w-100">
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}" {{ $currentDay == $i ? "selected" : "" }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <button type="button" id="reserve-filter-btn" class="btn btn-success" data-a_id="">نمایش
                        </button>
                    </div>
                </div>
                @php
                    $reservePlanModel->reserveList($currentYear, $currentMonth, $currentDay);
                @endphp
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document.body).on("click", ".load-reserve-info-form", function () {

                var id = $(this).data("id");
                var rp_date = $(this).data("rp_date");

                $.ajax({
                    type: "POST",
                    url: "{{ route('reservePlan.InfoForm') }}",
                    data: {
                        id: id,
                        rp_date: rp_date
                    },
                    success: function (data) {
                        $("#result").html(data);
                        /*Swal.fire({
                            title: "موفق",
                            text: "اطلاعات با موفقیت ثبت شد.",
                            icon: "success"
                        });*/
                    },
                    error: function (data) {
                        /*Swal.fire({
                            title: "خطا",
                            text: data.responseJSON.message,
                            icon: "error"
                        });*/
                    }
                });

            });

            $(document.body).on("click", "#load-confirm-mobile-form", function () {
                var id = $(this).data("id");
                var ro_count = $("#ro-count").val();
                var ro_name = $("#ro-name").val();
                var ro_mobile = $("#ro-mobile").val();

                if (ro_count != "" && ro_name != "" && ro_mobile != "") {
                    if (ro_mobile.length != 11) {
                        alert("موبایل وارد شده معتبر نیست.")
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('reservePlan.ConfirmMobileForm') }}",
                            data: {
                                id: id,
                                ro_count: ro_count,
                                ro_name: ro_name,
                                ro_mobile: ro_mobile
                            },
                            success: function (data) {
                                $("#result").html(data);
                                /*Swal.fire({
                                    title: "موفق",
                                    text: "اطلاعات با موفقیت ثبت شد.",
                                    icon: "success"
                                });*/
                            },
                            error: function (data) {
                                /*Swal.fire({
                                    title: "خطا",
                                    text: data.responseJSON.message,
                                    icon: "error"
                                });*/
                            }
                        });
                    }
                } else {
                    alert("لطفا کادرهای ستاره دار را تکمیل نمایید.")
                }
            });

            $(document.body).on("click", "#check-confirm-customer", function () {
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
                        success: function (data) {
                            alert("yes");
                        },
                        error: function (data) {
                            alert("no");
                        }
                    });
                } else {
                    alert("لطفا کادرهای ستاره دار را تکمیل نمایید.")
                }
            });

        });
    </script>
@endsection
