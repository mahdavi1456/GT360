@extends('admin.master')
@section('title', 'Theme List')
@section('style')
    <style>
        .custom-file-label::after {
            content: "فایل";
        }

        .custom-file-label:after {
            right: unset;
            left: 0;
            border-left: unset;
            border-right: inherit;
            border-radius: 0.35rem 0 0 0.35rem;
        }
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('ویرایش قالب') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
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
                                <form action="{{ route('theme.update', $theme) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">نام لاتین <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $theme->name }}" placeholder="نام لاتین..." required
                                                    oninvalid="this.setCustomValidity('نام قالب را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">برچسب <span class="text-danger">*</span></label>
                                                <input type="text" name="label" class="form-control"
                                                    value="{{ $theme->label }}" placeholder="برچسب..." required
                                                    oninvalid="this.setCustomValidity('برچسب قالب را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>نوع قالب</label>
                                                <select name="category" class="form-control">
                                                    <option value="company">شرکتی</option>
                                                    <option value="shop">فروشگاهی</option>
                                                    <option value="news">خبری</option>
                                                    <option value="multiple">چند منظوره</option>
                                                    <option value="personal">شخصی</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>توضیح کوتاه <span class="text-danger">*</span></label>
                                                <input type="text" name="slogan" class="form-control"
                                                    value="{{ $theme->slogan }}" placeholder="توضیح کوتاه...">
                                            </div>
                                        </div>
                                        @if (!$theme->preview)
                                        <div class="form-group col-md-4">
                                            <label for="primary_image"> تصویر پیش نمایش</label>
                                            <div class="custom-file">
                                                <input type="file" name="preview" class="custom-file-input"
                                                    id="primary_image">
                                                <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                                            </div>
                                        </div>

                                        @endif
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>وضعیت</label>
                                                <select name="status" class="form-control">
                                                    <option {{ $theme->status == 'active' ? 'selected' : '' }}
                                                        value="active">فعال</option>
                                                    <option {{ $theme->status == 'deactive' ? 'selected' : '' }}
                                                        value="deactive">غیرفعال</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>توضیح کامل</label>
                                                <textarea name="details" class="form-control" placeholder="توضیح کامل...">{{ $theme->details }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </form>

                                @if ($theme->preview)
                                <hr />
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <img src="{{url(ert('theme-path').$theme->preview)}}" alt="" class="w-100">
                                            <a href="{{route('theme.imageDestroy',$theme->id)}}" class="btn btn-sm btn-danger">حذف</a>
                                        </div>
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
    <script>
        $('#primary_image').change(function() {
            //get the file name
            var fileName = $(this).val().split('\\').pop();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });
    </script>
    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css" />
@endsection
