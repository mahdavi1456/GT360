@extends('admin.master')
@section('title', 'pallete List')
@section('content')
    @include('sweetalert::alert')
    @include("admin.partial.nav")
    @include("admin.partial.aside")
    <div class="content-wrapper">
        {{ breadcrumb('ایجاد پالت') }}
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
                                <form action="{{ route('pallete.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">نام لاتین <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                       value="{{ old('name') }}" placeholder="نام لاتین..." required
                                                       oninvalid="this.setCustomValidity('نام پالت را وارد نمایید.')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">برچسب <span class="text-danger">*</span></label>
                                                <input type="text" name="label" class="form-control"
                                                       value="{{ old('label') }}" placeholder="برچسب..." required
                                                       oninvalid="this.setCustomValidity('برچسب پالت را وارد نمایید.')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>توضیح کامل</label>
                                                <textarea name="details" class="form-control"
                                                          placeholder="توضیح کامل...">{{ old('details') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label>رنگ اول</label>
                                            <input type="text" name="first_color" class="form-control"
                                                   value="{{ old('first_color') }}" placeholder="رنگ اول...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ دوم</label>
                                            <input type="text" name="second_color" class="form-control"
                                                   value="{{ old('second_color') }}" placeholder="رنگ دوم...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ سوم</label>
                                            <input type="text" name="third_color" class="form-control"
                                                   value="{{ old('third_color') }}" placeholder="رنگ سوم...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ چهارم</label>
                                            <input type="text" name="fourth_color" class="form-control"
                                                   value="{{ old('fourth_color') }}" placeholder="رنگ چهارم...">
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
        let files = [];

        let myDropzone = new Dropzone(".dropzone", {
            url: "/uploadFile",
            dictDefaultMessage: "برای اپلود کلیک کنید یا فایل را در این باکس بیاندازید ",
            sending: function (file, xhr, formData) {
                // Append the CSRF token to the form data
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                formData.append("_token", csrfToken);
            },
            success: (res) => {
                data = JSON.parse(res.xhr.responseText)
                files.push(data.file)
                $("#files").val(JSON.stringify(files))
            },
            error: (file, res) => {
                alert(res.message.file[0]);
                swal.fire({
                    text: res.message.file[0],
                    icon: "error",
                    button: "باشه"
                })
                file.previewElement.remove();

            },
        });
    </script>

    <script src="{{ asset('js/validation.js') }}"></script>

@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css"/>
@endsection
