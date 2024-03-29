@extends('admin.master')
@section('title', 'فونت ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('فونت ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('font.create') }}" class="pull-left btn btn-info btn-sm">جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($fonts->count() > 0)
                                    <table class="table table-bordered table-hover text-center">
                                        <tr class="table-warning">
                                            <th>#</th>
                                            <th>نام</th>
                                            <th>برچسب</th>
                                            <th>توضیح</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($fonts as $font)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $font->name }}</td>
                                                <td>{{ $font->label }}</td>
                                                <td>{{ $font->details }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('font.edit', $font) }}" class="btn btn-warning btn-sm mx-1"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('font.destroy', $font) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1" id="confirmdelete{{ $font->id }}"><i class="fa fa-trash"></i></button>
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
    @if ($fonts->count() > 0)
        @foreach ($fonts as $font)
            <script>
                $("#confirmdelete{{ $font->id }}").click(function(event) {
                    var form = $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    Swal.fire({
                        title: "آیا مطمئنید؟",
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
