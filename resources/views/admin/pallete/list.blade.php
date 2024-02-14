@extends('admin.master')
@section('title', 'پالت های رنگ')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('پالت های رنگ') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('pallete.create') }}" class="pull-left btn btn-info btn-sm">جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($palletes->count() > 0)
                                    <table class="table table-hover table-bordered text-center">
                                        <tr class="table-warning">
                                            <th>#</th>
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
                                                <td style="background: #{{ $pallete->first_color }}">{{ $pallete->first_color }}</td>
                                                <td style="background: #{{ $pallete->second_color }}">{{ $pallete->second_color }}</td>
                                                <td style="background: #{{ $pallete->third_color }}">{{ $pallete->third_color }}</td>
                                                <td style="background: #{{ $pallete->fourth_color }}">{{ $pallete->fourth_color }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('pallete.edit', $pallete) }}" class="btn btn-warning btn-sm mx-1"><i class="fa fa-edit"></i></a>
                                                    <form action="{{ route('pallete.destroy', $pallete) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1" id="confirmdelete{{ $pallete->id }}"><i class="fa fa-trash"></i></button>
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
                $("#confirmdelete{{ $pallete->id }}").click(function(event) {
                    var form = $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    Swal.fire({
                        title: "اطمینان دارید؟",
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
