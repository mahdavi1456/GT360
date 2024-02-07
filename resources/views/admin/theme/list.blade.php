@extends('admin.master')
@section('title', 'قالب ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('قالب ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('theme.create') }}" class="pull-left btn btn-info btn-sm">جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($themes->count() > 0)
                                    <table class="table table-hover table-bordered text-center">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>نام</th>
                                            <th>برچسب</th>
                                            <th>نوع قالب</th>
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
                                                <td>
                                                    @if ($theme->preview)
                                                        <img class="w-100 img-thumbnail object-fit-contain"
                                                             style="max-width: 180px"
                                                             src="{{ asset(ert('theme-path') . $theme->preview) }}">
                                                    @endif
                                                </td>
                                                <td>{!! ($theme->status == "active") ? "<span class='badge bg-success text-white'>فعال</span>" : "<span class='badge bg-danger text-white'>غیرفعال</span>" !!}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('theme.selectNav', $theme->id) }}"
                                                       class="btn btn-primary btn-sm mx-1">فهرست ها</a>
                                                    <a href="{{ route('theme.selectComponent', $theme->id) }}"
                                                       class="btn btn-info btn-sm mx-1">بخش ها</a>
                                                    <a href="{{ route('theme.edit', $theme) }}"
                                                       class="btn btn-warning btn-sm mx-1"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{ route('theme.destroy', $theme) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                                id="confirmdelete{{ $theme->id }}"><i
                                                                class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('form.index', ['theme_id'=>$theme->id]) }}"
                                                       class="btn btn-secondary btn-sm mx-1">فرم ها</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger m-2 text-center">موردی جهت نمایش موجود نیست.</div>
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
    @if ($themes->count() > 0)
        @foreach ($themes as $theme)
            <script>
                $('#confirmdelete{{ $theme->id }}').click(function (event) {
                    var form = $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    Swal.fire({
                        title: `آیا مطمئنید؟`,
                        text: "این مورد برای همیشه حذف خواهد شد.",
                        icon: "warning",
                        showCancelButton: true,
                        cancelButtonText: "انصراف",
                        confirmButtonText: "تایید",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            </script>
        @endforeach
    @endif
@endsection
