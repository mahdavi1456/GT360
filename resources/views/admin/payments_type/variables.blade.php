@extends('admin.master')
@section('title', 'روش های پرداخت کاربر')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('روش های پرداخت کاربر') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-0">
                                @if(count($paymentVariables) > 0)
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ردیف</th>
                                            <th>نام</th>
                                            <th>برچسب</th>
                                            <th>نوع پرداخت</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paymentVariables as $paymentVariable)
                                            <tr>
                                                <td>{{ fa_number($loop->index+1)}}</td>
                                                <td>{{ $paymentVariable->name }}</td>
                                                <td>{{ $paymentVariable->label }}</td>
                                                <td>{{ $paymentVariable->paymentType->name }}</td>
                                                <td>
                                                <a href="{{ route('PaymentTypeVariable.edit', $paymentVariable->id ) }}"
                                                        class="btn btn-warning m-1">ویرایش</a>
                                                    <form action="{{ route('PaymentTypeVariable.destroy', $paymentVariable->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger m-1" id="confirmdelete{{ $paymentVariable->id }}">حذف</button>
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

@if ($paymentVariables->count() > 0)
@foreach ($paymentVariables as $paymentVariable)
<script>
    $('#confirmdelete{{ $paymentVariable->id }}').click(function(event) {
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

