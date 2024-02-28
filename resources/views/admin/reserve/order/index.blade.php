@extends('admin.master')
@section('title', 'گزارشات رزرو')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('گزارشات رزرو') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <div id="reserve-plan-form" class="card-body p-0 table-responsive">
                                @if ($reserveOrders->isEmpty())
                                    <div class="alert alert-danger text-center m-2">موردی جهت نمایش موجود نیست.</div>
                                @else
                                    <table class="table table-bordered table-striped text-center table-hover">
                                        <tr class="table-warning">
                                            <th>#</th>
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
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $reserveOrder->ro_date }}</td>
                                                <td>{{ $reserveOrder->rp_name }}</td>
                                                <td>{{ $reserveOrder->rp_details }}</td>
                                                <td>{{ number_format($reserveOrder->rs_price) }}</td>
                                                <td>{{ $reserveOrder->ro_name }}</td>
                                                <td>{{ $reserveOrder->ro_count }}</td>
                                                <td>{{ $reserveOrder->ro_mobile }}</td>
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
@endsection
