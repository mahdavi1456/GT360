@extends('admin.master')
@section('title', 'Account')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('نوع پرداخت') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(count($paymentTypes) > 0)
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="px-4 p-4">شماره</th>
                                            <th class="px-4 p-4">نام</th>
                                            <th class="px-4 p-4">آیکون</th>
                                            <th class="px-4 p-4">ترتیب نمایش</th>
                                            <th class="px-4 p-4">وضعیت</th>
                                            <th class="px-4 p-4">توضیحات</th>
                                            <th class="px-4 p-4">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($paymentTypes as $paymentType)
                                            <tr>
                                                <td class="w-auto text-center p-4">{{ fa_number($loop->index+1)}}</td>
                                                <td class="w-auto text-center p-4">{{ $paymentType->name }}</td>
                                                <td class="w-auto text-center p-4">@if($paymentType->icon) <img src="{{ asset($paymentType->icon) }}" style="with: 50px; height: 50px"> @else بدون تصویر @endif </td>
                                                <td class="w-auto text-center p-4">{{ $paymentType->display_order }}</td>
                                                <td class="w-auto text-center p-4">@if($paymentType->status == 'active') فعال @else غیرفعال @endif</td>
                                                <td class="w-auto text-center p-4">@if($paymentType->description) {{ $paymentType->description }} @else بدون توضیحات @endif</td>
                                                <td class="w-auto text-center p-4 d-flex">
                                                    <a href="{{ route('payments_type.edit', $paymentType->id ) }}"
                                                        class="btn btn-warning m-1">ویرایش</a>
                                                    <form action="{{ route('payments_type.destroy', $paymentType->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger m-1 confirm-button">حذف</button>
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

<script>
   $('.confirm-button').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: "اطمینان دارید؟",
        text: "آیا از حذف این مورد اطمینان دارید؟",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete.isConfirmed) {
            form.submit();
        } else {

        }
    });
});

</script>

@endsection

