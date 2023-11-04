@extends('admin.master')
@section('title', 'روش های پرداخت')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('روش های پرداخت') }}

        <div class="col-md-6">
            <h1 class="p-4" style="font-size: 25px">روش های پرداخت</h1>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-0">
                                @if(count($paymentTypes) > 0)
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ردیف</th>
                                            <th>نام</th>
                                            <th>آیکون</th>
                                            <th>ترتیب نمایش</th>
                                            <th>وضعیت</th>
                                            <th>توضیحات</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paymentTypes as $paymentType)
                                            <tr>
                                                <td>{{ fa_number($loop->index+1)}}</td>
                                                <td>{{ $paymentType->name }}</td>
                                                <td>@if($paymentType->icon) <img src="{{ asset($paymentType->icon) }}" style="with: 50px; height: 50px"> @else بدون تصویر @endif </td>
                                                <td>{{ $paymentType->display_order }}</td>
                                                <td>
                                                    @if($paymentType->status == 'active')
                                                        <span class="badge bg-success">فعال</span>
                                                    @else
                                                        <span class="badge bg-danger">غیرفعال</span>
                                                    @endif
                                                </td>
                                                <td>@if($paymentType->description) {{ $paymentType->description }} @else بدون توضیحات @endif</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('payments_type.edit', $paymentType->id ) }}"
                                                        class="btn btn-warning m-1">ویرایش</a>
                                                    <form action="{{ route('payments_type.destroy', $paymentType->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger m-1" id="confirmdelete{{ $paymentType->id }}">حذف</button>
                                                    </form>
                                                    <form method="POST" action="{{ route('PaymentTypeVariable.create') }}">
                                                        @csrf
                                                        <input type="hidden" name="paymentType_id" value="{{ $paymentType->id }}">
                                                        <button type="submit" class="btn btn-info m-1">ایجاد متغیر</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger text-center"> موردی جهت نمایش موجود نیست. </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')

@if ($paymentTypes->count() > 0)
@foreach ($paymentTypes as $paymentType)
<script>
    $('#confirmdelete{{ $paymentType->id }}').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
                title: `آیا مطمئنید؟`,
                text: "این مورد برای همیشه حذف خواهد شد.",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: 'انصراف',
                confirmButtonText: 'تایید',
            })
            .then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
    });
</script>

@endforeach
    @endif

@endsection

