@extends('admin.master')
@section('title', 'form List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb(' آیتم ها') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <span> معرفی انواع بسته</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <form action="{{ route('plan.stroeType') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="action" value="{{ $action }}">
                                    @if ($type)
                                        <input type="hidden" name="type_id" value="{{ $type->id }}">
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label class="required">عنوان <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $type?->name }}" placeholder="عنوان..." required
                                                    oninvalid="this.setCustomValidity(' عنوان را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">{{$type?"ویرایش":"ایجاد"}}</button>
                                            @if ($type)
                                            <a href="{{route('planDefineType')}}" class="btn btn-danger">انصراف</a>
                                            @endif
                                            <a href="{{route('plan.index')}}" class="btn btn-primary">بسته ها</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('plan.create',['theme_id'=>request('theme_id')]) }}" class="pull-left btn btn-info text-white">افزودن جدید</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card-body p-0 table-responsive">
                                @if ($types->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>عنوان</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($types as $type)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ convertToPersian($type->name) }}</td>

                                                <td>
                                                    <a href="{{ route('planDefineType', ['type_id' => $type->id]) }}"
                                                        class="btn btn-sm btn-warning m-1"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('typeDelete', $type->id) }}"
                                                        data-confirm-delete="true" class="btn btn-sm btn-danger m-1"><i class="fa fa-trash"></i></a>
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
