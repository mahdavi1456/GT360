@extends('admin.master')
@section('title', 'Page List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('لسیت فهرست ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">لیست فهرست ها ({{ $navs->count() }})</h3>
                                <a href="{{ route('nav.create') }}" class="d-flex align-items-center btn btn-success btn-sm mr-auto text-white">
                                    <i class="fa fa-plus ml-2"></i> افزودن فهرست
                                </a>
                            </div>
                            <div class="card-body">
                                @if ($navs->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        <span class="not-found">فهرستی یافت نشد.</span>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>نام</th>
                                                <th>برچسب</th>
                                                <th>توضیحات</th>
                                                <th>وضعیت</th>
                                                <th width="10%">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($navs as $key => $nav)
                                                <tr>
                                                    <td>{{ 1 + $key }}</td>


                                                    <td>{{ $nav->name }}</td>
                                                    <td>{{ $nav->label }}</td>
                                                    <td>{!! $nav->desc !!}</td>
                                                    <td>{{ $nav->status }}</td>

                                                    <td>
                                                        <div class="d-flex">

                                                            <a class="btn btn-warning btn-sm ml-2 d-flex align-items-center" href="{{ route('nav.create', ['action' => 'update', 'nav_id' => $nav->id]) }}" data-toggle="tooltip" data-placement="top" title="ویرایش"><i class="fa fa-edit"></i></a>
                                                            <a class="btn btn-danger btn-sm ml-2 d-flex align-items-center" data-confirm-delete='true' href="{{ route('nav.destroy',$nav->id ) }}" data-toggle="tooltip" data-placement="top" title="حذف"><i class="fa fa-trash"></i></a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                                <div class="w-100 mt-3 d-flex justify-content-center"></div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).on('click', '.delete-confirm', function() {
            var form =  $(this).closest("form");
            event.preventDefault();
            new swal({
                title: "حذف نوشته",
                text:  "آیا از حذف نوشته مطمئن هستید؟",
                icon: "warning",
                dangerMode: true,
                buttons: ["خیر","بله"],
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
