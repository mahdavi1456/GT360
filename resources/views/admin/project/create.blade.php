@extends('admin.master')
@section('title', 'ایجاد پروژه')
@section('content')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('ایجاد پروژه') }}
        <section class="content">
            <div class="container-fluid">
                @include('admin.partial.error')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="action" value="{{ $action }}">
                                    <input type="hidden" name="project" value="{{ $project?->id }}">
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <label class="required">عنوان <span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $project?->title }}" placeholder="عنوان..." required
                                                oninvalid="this.setCustomValidity('عنوان را وارد نمایید.')"
                                                oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>دامنه <span class="text-danger">*</span></label>
                                            <input type="text" name="domain" class="form-control"
                                                value="{{ $project?->domain }}" required
                                                oninvalid="this.setCustomValidity('کادر مشخص شده را پر کنید.')"
                                                oninput="this.setCustomValidity('')" placeholder="دامنه...">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>نامک <span class="text-danger">*</span></label>
                                            <input type="text" name="slug" required
                                                oninvalid="this.setCustomValidity('کادر مشخص شده را پر کنید.')"
                                                oninput="this.setCustomValidity('')" class="form-control"
                                                value="{{ $project?->slug }}" placeholder="نامک...">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label for="primary_image"> لوگو پروژه </label>
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input"
                                                    id="primary_image">
                                                <label class="custom-file-label" for="primary_image"> انتخاب
                                                    فایل </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <label> توضیحات </label>
                                            <textarea name="description" class="form-control Reditor1" placeholder="توضیحات ...">{{ $project?->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-left">
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                </div>
                            </form>
                        </div>
                        @if ($project?->logo)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered text-center">
                                                <tr>
                                                    <th>عنوان</th>
                                                    <th>فایل</th>
                                                    <th>عملیات</th>
                                                </tr>
                                                <tr class="vertical-base">
                                                    <td>لوگو</td>
                                                    <td>
                                                        <img style="max-width: 200px"
                                                            src="{{ asset(ert('aip') . $project->logo) }}"
                                                            class="w-100 object-fit-contain">
                                                    </td>
                                                    <td><a href="{{ route('project.logo.destroy', $project->id) }}"
                                                            data-confirm-delete="true" class="btn btn-danger"><i
                                                                class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script type="text/javascript">
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
    </script>
    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
@section('style')
    <style type="text/css">
        .ck-editor__editable {
            height: 150px;
        }

        td {
            vertical-align: middle !important;
        }
    </style>
@endsection
