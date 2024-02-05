@extends('admin.master')
@section('title', 'سانس ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('سانس ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title col-md-4">فرم</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('reserve-plan.index') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>سال</label>
                                            <select name="year" id="year" class="form-control">
                                                <option {{ $currentYear == "1399" ? "selected" : "" }} value="1399">1399</option>
                                                <option {{ $currentYear == "1400" ? "selected" : "" }} value="1400">1400</option>
                                                <option {{ $currentYear == "1401" ? "selected" : "" }} value="1401">1401</option>
                                                <option {{ $currentYear == "1402" ? "selected" : "" }} value="1402">1402</option>
                                                <option {{ $currentYear == "1403" ? "selected" : "" }} value="1403">1403</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>ماه</label>
                                            <select name="month" id="month" class="form-control">
                                                <option {{ $currentMonth == "1" ? "selected" : "" }} value="1">فروردین</option>
                                                <option {{ $currentMonth == "2" ? "selected" : "" }} value="2">اردیبهشت</option>
                                                <option {{ $currentMonth == "3" ? "selected" : "" }} value="3">خرداد</option>
                                                <option {{ $currentMonth == "4" ? "selected" : "" }} value="4">تیر</option>
                                                <option {{ $currentMonth == "5" ? "selected" : "" }} value="5">مرداد</option>
                                                <option {{ $currentMonth  == "6" ? "selected" : "" }} value="6">شهریور</option>
                                                <option {{ $currentMonth == "7" ? "selected" : "" }} value="7">مهر</option>
                                                <option {{ $currentMonth == "8" ? "selected" : "" }} value="8">آبان</option>
                                                <option {{ $currentMonth == "9" ? "selected" : "" }} value="9">آذر</option>
                                                <option {{ $currentMonth == "10" ? "selected" : "" }} value="10">دی</option>
                                                <option {{ $currentMonth == "11" ? "selected" : "" }} value="11">بهمن</option>
                                                <option {{ $currentMonth == "12" ? "selected" : "" }} value="12">اسفند</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div  class="row">
                                        <div class="col-12">
                                            <button type="submit" name="filter" class="btn btn-success w-100">جستجو</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">برنامه {{ $currentYear . '/' . $currentMonth }}</h3>
                            </div>
                            <div id="reserve-plan-form" class="card-body">
                                @if ($reserveParts->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        <span class="not-found">نوشته یافت نشد.</span>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped text-center table-hover">
                                        <thead class="table-warning">
                                            <tr>
                                                <th>روز</th>
                                                <th>نام روز</th>
                                                @foreach ($reserveParts as $key => $reservePart)
                                                    <th>
                                                        {{ $reservePart->name }}
                                                        <small>({{ $reservePart->details }})</small>
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $i }}</td>
                                                    @foreach ($reserveParts as $key => $reservePart)
                                                        @php
                                                            $rpDate = $currentYear . '/' . $currentMonth . '/' . $i;
                                                        @endphp
                                                        <td>
                                                            <input type="text" name="rs_name|<?php echo $reservePart->name . '|' . $reservePart->details . '|' . $rpDate . '|' . $reservePart->price; ?>" class="form-control" placeholder="تعداد..." value="{{ $reservePlanModel->getValue($reservePart->name, $reservePart->details, $rpDate) }}">
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                @endif
                                <div class="mt-3">
                                    <button class="btn btn-success w-100" id="save-reserve-plan">ذخیره</button>
                                </div>
                                <div id="result">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document.body).on("click", "#save-reserve-plan", function (event) {
                event.preventDefault();
                var list = $("#reserve-plan-form *").serialize();
                $.ajax({
                    type: "POST",
                    url: "{{ route('reserve-plan.store') }}",
                    data: {
                        list: list
                    },
                    success: function(data) {
                        $("#result").html(data);
                        Swal.fire({
                            title: "موفق",
                            text: "اطلاعات با موفقیت ثبت شد.",
                            icon: "success"
                        });
                    },
                    error: function(data) {
                        Swal.fire({
                            title: "خطا",
                            text: data.responseJSON.message,
                            icon: "error"
                        });
                    }
                });
            });

        });
    </script>
@endsection
