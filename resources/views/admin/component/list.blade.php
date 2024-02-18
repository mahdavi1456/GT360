@extends('admin.master')
@section('title', 'بخش ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('بخش ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('component.create') }}" class="pull-left btn btn-info btn-sm">جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($components->count() > 0)
                                    <table class="table table-hover table-bordered text-center">
                                        <tr class="table-warning">
                                            <th>#</th>
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
                                                <td>
                                                    {!! $component->status == "active"
                                                        ? "<span class='badge bg-success'>فعال</span>"
                                                        : "<span class='badge bg-danger '>غیرفعال</span>" !!}
                                                </td>
                                                <td class="d-flex">
                                                    <a href="{{ route('post.index', ['component_id' => $component->id]) }}"
                                                       class="btn btn-info btn-sm mx-1">محتوا</a>
                                                    <a href="{{ route('component.chooseTaxonomy', $component->id) }}"
                                                       class="btn btn-secondary btn-sm mx-1">تخصیص طبقه بندی</a>
                                                    <a href="{{ route('component.edit', $component) }}"
                                                       class="btn btn-warning btn-sm mx-1"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form action="{{ route('component.destroy', $component) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-1"
                                                                id="confirmdelete{{ $component->id }}"><i
                                                                class="fa fa-trash"></i></button>
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
    @if ($components->count() > 0)
        @foreach ($components as $component)
            <script>
                $('#confirmdelete{{ $component->id }}').click(function (event) {
                    var form = $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    Swal.fire({
                        title: `آیا مطمئنید؟`,
                        text: "این مورد برای همیشه حذف خواهد شد.",
                        icon: "warning",
                        showCancelButton: true,
                        cancelButtonText: "انصراف",
                        confirmButtonText: "تایید"
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
