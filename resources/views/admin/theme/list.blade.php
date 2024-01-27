@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('قالب ها') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('theme.create') }}" class="pull-left btn btn-info text-white">افزودن جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($themes->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>نام</th>
                                            <th>برچسب</th>
                                            <th>نوع قالب</th>
                                            <th>توضیح کوتاه</th>
                                            <th>توضیح کامل</th>
                                            <th>تصویر پیش نمایش</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($themes as $theme)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $theme->name }}</td>
                                                <td>{{ $theme->label }}</td>
                                                <td>{{ $theme->category }}</td>
                                                <td>{{ $theme->slogan }}</td>
                                                <td>{{ $theme->details }}</td>
                                                <td>{{ $theme->preview }}</td>
                                                <td>{{ $theme->status }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('theme.selectComponent', $theme->id) }}"
                                                       class="btn btn-info m-1">تخصیص بخش</a>
                                                    <a href="{{ route('theme.edit', $theme) }}"
                                                       class="btn btn-warning m-1">ویرایش</a>
                                                    <form action="{{ route('theme.destroy', $theme) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger m-1" id="confirmdelete{{ $theme->id }}">حذف</button>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')

    @if ($themes->count() > 0)
        @foreach ($themes as $theme)
            <script>
                $('#confirmdelete{{ $theme->id }}').click(function(event) {
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
