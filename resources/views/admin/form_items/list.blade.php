@extends('admin.master')
@section('title', 'form List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('فرم ها') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('form.create',['theme_id'=>request('theme_id')]) }}" class="pull-left btn btn-info text-white">افزودن جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($forms->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>نام</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($forms as $form)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $form->title }}</td>
                                                <td >
                                                    <a href="{{ route('form.edit',['form'=>$form->id]) }}" class="btn btn-warning m-1">ویرایش</a>
                                                    <a href="{{ route('form.destroy', $form->id) }}"  data-confirm-delete="true" class="btn btn-danger m-1">حذف</a>
                                                    <a href="{{ route('form-item.index',['form_id'=> $form->id]) }}" class="btn btn-info m-1">لیست آیتم ها</a>
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

    @if ($forms->count() > 0)
        @foreach ($forms as $form)
            <script>
                $('#confirmdelete{{ $form->id }}').click(function(event) {
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
