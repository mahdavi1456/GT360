@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('پالت ها') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('pallete.create') }}" class="pull-left btn btn-info text-white">افزودن جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($palletes->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>نام</th>
                                            <th>برچسب</th>
                                            <th>توضیح کامل</th>
                                            <th>رنگ اول</th>
                                            <th>رنگ دوم</th>
                                            <th>رنگ سوم</th>
                                            <th>رنگ چهارم</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($palletes as $pallete)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $pallete->name }}</td>
                                                <td>{{ $pallete->label }}</td>
                                                <td>{{ $pallete->details }}</td>
                                                <td>{{ $pallete->first_color }}</td>
                                                <td>{{ $pallete->second_color }}</td>
                                                <td>{{ $pallete->third_color }}</td>
                                                <td>{{ $pallete->fourth_color }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('pallete.edit', $pallete) }}" class="btn btn-warning m-1">ویرایش</a>
                                                    <form action="{{ route('pallete.destroy', $pallete) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger m-1" id="confirmdelete{{ $pallete->id }}">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger m-2 text-center">
                                        موردی جهت نمایش موجود نیست.
                                    </div>
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

    @if ($palletes->count() > 0)
        @foreach ($palletes as $pallete)
            <script>
                $('#confirmdelete{{ $pallete->id }}').click(function(event) {
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
