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

        {{ breadcrumb('ایجاد قالب') }}

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
                                <form action="{{ route('theme.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">نام لاتین <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') }}" placeholder="نام لاتین..." required
                                                    oninvalid="this.setCustomValidity('نام قالب را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">برچسب <span class="text-danger">*</span></label>
                                                <input type="text" name="label" class="form-control"
                                                    value="{{ old('label') }}" placeholder="برچسب..." required
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
                                                    value="{{ old('slogan') }}" placeholder="توضیح کوتاه...">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="primary_image"> تصویر پیش نمایش</label>
                                            <div class="custom-file">
                                                <input type="file" name="preview" class="custom-file-input"
                                                    id="primary_image">
                                                <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>وضعیت</label>
                                                <select name="status" class="form-control">
                                                    <option value="active">فعال</option>
                                                    <option value="deactive">غیرفعال</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>توضیح کامل</label>
                                                <textarea name="details" class="form-control" placeholder="توضیح کامل...">{{ old('details') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </form>
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

        //     let files = [];

        //     let myDropzone = new Dropzone(".dropzone", {
        //         url: "/uploadFile",
        //         dictDefaultMessage: "برای اپلود کلیک کنید یا فایل را در این باکس بیاندازید ",
        //         sending: function(file, xhr, formData) {
        //             // Append the CSRF token to the form data
        //             var csrfToken = $('meta[name="csrf-token"]').attr('content');
        //             formData.append("_token", csrfToken);
        //         },
        //         success: (res) => {
        //             data = JSON.parse(res.xhr.responseText)
        //             files.push(data.file)
        //             $("#files").val(JSON.stringify(files))
        //         },
        //         error: (file, res) => {
        //             alert(res.message.file[0]);
        //             swal.fire({
        //                 text: res.message.file[0],
        //                 icon: "error",
        //                 button: "باشه"
        //             })
        //             file.previewElement.remove();

        //         },
        //     });
        //
    </script>

    <script src="{{ asset('js/validation.js') }}"></script>

@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css" />
@endsection
