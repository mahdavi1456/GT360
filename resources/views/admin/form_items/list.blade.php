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
                                        <a href="{{ route('form-item.create',['form_id'=>request('form_id')]) }}" class="pull-left btn btn-info text-white">افزودن جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($items->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>نام</th>
                                            <th>عنوان فارسی</th>
                                            <th>توضیحات</th>
                                            <th>نوع آیتم</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->label }}</td>
                                                <td>{{ $item->desc }}</td>
                                                <td>{{ $item->type }}</td>
                                                <td >
                                                    <a href="{{ route('form-item.edit',$item->id) }}" class="btn btn-warning m-1">ویرایش</a>
                                                    <a href="{{ route('form-item.destroy', $item->id) }}"  data-confirm-delete="true" class="btn btn-danger m-1">حذف</a>
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
@endsection
