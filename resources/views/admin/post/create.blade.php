@extends('admin.master')
@section('title', 'Theme List')
@section('style')

    <style>
        ul ul {
            list-style-type: none !important;
        }

        .abstract .ck-editor__editable {
            height: 100px;
        }
        .Rcontent .ck-editor__editable {
            height: 180px;
        }

        /* aside {
                            display: none;
                        } */
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('ایجاد نوشته') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('post.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="component_id" value="{{request('component_id')}}">
                    <div class="row">
                        <div class="col-md-8">
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

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">عنوان <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ old('title') }}" placeholder="نام..." required
                                                    oninvalid="this.setCustomValidity('نام عنوان را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">نامک <span class="text-danger">*</span></label>
                                                <input type="text" name="slug" class="form-control"
                                                    value="{{ old('slug') }}" placeholder="نام..." required
                                                    oninvalid="this.setCustomValidity('نام نامک را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group abstract">
                                                <label>خلاصه</label>
                                                <textarea name="abstract" class="form-control Reditor1" placeholder="خلاصه ...">{{ old('content') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="form-group Rcontent">
                                            <label>محتوا</label>
                                            <textarea name="content" class="form-control Reditor2" placeholder="محتوا ...">{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>وضعیت</label>
                                            <select name="publish_status" class="form-control">
                                                <option value="draft">پیش نویس</option>
                                                <option value="publish">انتشار</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="pr-2">
                                        <ul>
                                            @foreach ($taxonomies as $taxonomy)
                                                <li>{{ $taxonomy->name }}</li>
                                                <ul class="mr-4 mb-3">
                                                    @foreach ($taxonomy->parents as $parent)
                                                        <li>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                    name='term[]' type="checkbox"
                                                                    value="{{ $parent->id }}"
                                                                    id="defaultCheck-{{ $parent->id }}">
                                                                <label class="form-check-label"
                                                                    for="defaultCheck-{{ $parent->id }}">
                                                                    {{ $parent->name }}
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <ul class="mr-4 mb-3">
                                                            @foreach ($parent->children as $term)
                                                                <li>
                                                                    <div class="form-check ">
                                                                        <input class="form-check-input"
                                                                            name='term[]'
                                                                            type="checkbox" value="{{ $term->id }}"
                                                                            id="defaultCheck-{{ $term->id }}">
                                                                        <label class="form-check-label"
                                                                            for="defaultCheck-{{ $term->id }}">
                                                                            {{ $term->name }}
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endforeach

                                                </ul>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <label>تصویر شاخص </label>
                                        <div class="custom-file">

                                            <input type="file" name="t" class="custom-file-input" id="customFileLang"
                                                lang="es">
                                            <label class="custom-file-label" for="customFileLang">انتخاب فایل</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="required">ترتیب</label>
                                            <input type="text" name="post_order" class="form-control"
                                                value="{{ old('post_order') }}" placeholder="ترتیب...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('scripts')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.Reditor1'), {

                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic',
                        '|', 'link', 'insertImage', 'insertTable', 'mediaEmbed',
                        '|', 'bulletedList', 'numberedList'
                    ]
                },
                language: {
                    // The UI will be Arabic.
                    ui: 'fa',
                    // And the content will be edited in Arabic.
                    content: 'fa'
                }
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor.create(document.querySelector('.Reditor2'), {

                toolbar: {
                    items: [
                        'undo', 'redo',
                        '|', 'heading',
                        '|', 'bold', 'italic',
                        '|', 'link', 'insertImage', 'insertTable', 'mediaEmbed',
                        '|', 'bulletedList', 'numberedList'
                    ]
                },
                language: {
                    // The UI will be Arabic.
                    ui: 'fa',
                    // And the content will be edited in Arabic.
                    content: 'fa'
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        let files = [];

        let myDropzone = new Dropzone(".dropzone", {
            url: "/uploadFile",
            dictDefaultMessage: "برای اپلود کلیک کنید یا فایل را در این باکس بیاندازید ",
            sending: function(file, xhr, formData) {
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
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css" />
@endsection
