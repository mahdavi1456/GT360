@extends('admin.master')
@section('title', 'فهرست ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('فهرست ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">لیست فهرست ها ({{ $navs->count() }})</h3>
                                <a href="{{ route('nav.create') }}" class="d-flex align-items-center btn btn-info btn-sm mr-auto">
                                    جدید
                                </a>
                            </div>
                            <div class="card-body p-0">
                                @if ($navs->isEmpty())
                                    <div class="alert alert-danger m-2">موردی جهت نمایش موجود نیست.</div>
                                @else
                                    <table class="table table-bordered table-striped text-center table-hover">
                                        <tr class="table-warning">
                                            <th>#</th>
                                            <th>نام</th>
                                            <th>برچسب</th>
                                            <th>توضیحات</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($navs as $key => $nav)
                                            <tr>
                                                <td>{{ 1 + $key }}</td>
                                                <td>{{ $nav->name }}</td>
                                                <td>{{ $nav->label }}</td>
                                                <td>{!! $nav->desc !!}</td>
                                                <td>{{ $nav->status }}</td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm" href="{{ route('nav.create', ['action' => 'update', 'nav_id' => $nav->id]) }}" data-toggle="tooltip" data-placement="top" title="ویرایش"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger btn-sm" href="{{ route('nav.destroy', $nav->id ) }}" data-toggle="tooltip" data-placement="top" title="حذف" data-confirm-delete="true"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
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
    <script type="text/javascript">
        $(document).on("click", ".delete-confirm", function () {
            var form =  $(this).closest("form");
            event.preventDefault();
            new swal({
                title: "حذف نوشته",
                text:  "آیا از حذف نوشته مطمئن هستید؟",
                icon: "warning",
                dangerMode: true,
                buttons: ["خیر", "بله"],
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
        $(function() {
            $("#from, #to").persianDatepicker();
        });
    </script>
@endsection
