@extends('admin.master')
@section('title', 'گزارشات رزرو')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('گزارشات رزرو - '.fa_number($reserveOrders->total())) }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>شماره تماس</label>
                                            <input type="text" name="mobile" value="{{ $request->mobile }}"
                                                class="form-control form-control-sm" />
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>سانس</label>
                                            <select class="form-control select2" name="sans">
                                                <option value="">انتخاب کنید...</option>
                                                @foreach ($reserveParts as $rp )
                                                <option value="{{ $rp->id }}" @selected($request->sans==$rp->id)>
                                                    {{$rp->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>وضعیت</label>
                                            <select class="form-control select2" name="status">
                                                <option value="">انتخاب کنید...</option>
                                                <option @selected($request->status=='0') value="0">قبل از درگاه پرداخت</option>
                                                <option @selected($request->status==1) value="1">ناموفق</option>
                                                <option @selected($request->status==2) value="2">موفق</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 form-group">
                                            <label>از تاریخ</label>
                                            <input type="text" name="from" id="from" placeholder="از..."
                                                value="{{ $request->from }}"
                                                class="datePicker form-control form-control-sm" autocomplete="off" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>تا تاریخ</label>
                                            <input type="text" name="to" id="to" value="{{ $request->to }}"
                                                placeholder="تا..." class="datePicker form-control form-control-sm"
                                                autocomplete="off" />
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-info mr-auto check-validity"><i
                                                    class="fa fa-filter"></i>فیلتر</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="reserve-plan-form" class="card-body  table-responsive">
                                @if ($reserveOrders->isEmpty())
                                    <div class="alert alert-danger text-center m-2">موردی جهت نمایش موجود نیست.</div>
                                @else
                                    <table class="table table-bordered table-striped text-center table-hover">
                                        <tr class="table-warning">
                                            <th>#</th>
                                            <th>تاریخ ثبت</th>
                                            <th>تاریخ رزرو</th>
                                            <th>نام سانس</th>
                                            <th>توضیحات سانس</th>
                                            <th>مبلغ</th>
                                            <th>نام</th>
                                            <th>تعداد</th>
                                            <th>موبایل</th>
                                            <th>وضعیت</th>
                                        </tr>
                                        @foreach ($reserveOrders as $reserveOrder)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ zaman($reserveOrder->created_at) }}</td>
                                                <td>{{ fa_number(verta($reserveOrder->ro_date)->format('Y/m/j')) }}</td>
                                                <td>{{ $reserveOrder->rp_name }}</td>
                                                <td>{{ $reserveOrder->rp_details }}</td>
                                                <td>{{ price($reserveOrder->rs_price) }}</td>
                                                <td>{{ $reserveOrder->ro_name }}</td>
                                                <td>{{ fa_number($reserveOrder->ro_count) }}</td>
                                                <td>{{ fa_number($reserveOrder->ro_mobile) }}</td>
                                                <td>{{ $reserveOrder->status_value }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#from, #to").persianDatepicker({
                initialValue: false,
                obsever: true,
                format: 'YYYY/MM/DD',
                autoClose: true
            });
        });
    </script>
@endsection
