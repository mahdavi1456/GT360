@extends('front.theme.park.parts.master')
@section('content')
<div class="container-fluid mt-5">
    <div class="row mb-5">
        <div class="col-12 reserveBox">
            <div class="reserveBoxSelect">
                <div class="row">
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
                        <button type="button" id="reserve-filter-btn" class="btn btn-success" data-a_id="">نمایش</button>
                    </div>
                </div>
            </div>
            @php
                $reservePlanModel->reserveList($currentYear, $currentMonth, $currentDay);
            @endphp
        </div>
    </div>
</div>
<?php //$opt = new option(); ?>
<script type="text/javascript" src="dist/js/website-reserve.js"></script>
@endsection
