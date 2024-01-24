@extends('admin.master')
@section('title', 'Component List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('بخش ها') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('component.create') }}" class="pull-left btn btn-info text-white">افزودن جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($components->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>نام</th>
                                            <th>برچسب</th>
                                            <th>توضیح کوتاه</th>
                                            <th>توضیح کامل</th>
                                            <th>تصویر پیش نمایش</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($components as $component)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $component->name }}</td>
                                                <td>{{ $component->label }}</td>
                                                <td>{{ $component->slogan }}</td>
                                                <td>{{ $component->details }}</td>
                                                <td>{{ $component->preview }}</td>
                                                <td>{{ $component->status }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('component.edit', $component) }}" class="btn btn-warning m-1">ویرایش</a>
                                                    <form action="{{ route('component.destroy', $component) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger m-1" id="confirmdelete{{ $component->id }}">حذف</button>
                                                    </form>
                                                    <a href="{{ route('post.index',['component_id'=> $component->id]) }}" class="btn btn-info m-1">لیست محتوا</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger text-center">
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

    @if ($components->count() > 0)
        @foreach ($components as $component)
            <script>
                $('#confirmdelete{{ $component->id }}').click(function(event) {
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
