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
                            <div class="card-body">
                                <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="action" value="{{ $action }}">
                                    <input type="hidden" name="project" value="{{$project?->id}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required">عنوان <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control"
                                                       value="{{ $project?->title }}" placeholder="عنوان..." required
                                                       oninvalid="this.setCustomValidity('عنوان را وارد نمایید.')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="primary_image"> لوگو پروژه </label>
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input"
                                                    id="primary_image">
                                                <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label> توضیحات </label>
                                            <textarea name="description" class="form-control Reditor1" placeholder="توضیحات ...">{{$project?->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </form>
                                @if ($project?->logo)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-bordered text-center">
                                                    <tr>
                                                        <th>عنوان</th>
                                                        <th> فایل </th>
                                                        <th> عملیات </th>
                                                    </tr>
                                                    <tbody>
                                                        <tr class="vertical-base">
                                                            <td >لوگو</td>
                                                            <td>
                                                                <img style="max-width: 200px"
                                                                    src="{{ asset(ert('aip') . $project->logo) }}"
                                                                    class="w-100 object-fit-contain"
                                                                    alt="">
                                                            </td>
                                                            <td> <a href="{{ route('project.logo.destroy', $project->id) }}"
                                                                    data-confirm-delete="true"
                                                                    class="btn btn-danger"><i
                                                                        class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
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
    </script>

    <script src="{{ asset('js/validation.js') }}"></script>

@endsection
@section('style')
<style>
    .ck-editor__editable{
        height: 150px;
    }
    td{
        vertical-align: middle !important;
    }
</style>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css"/> --}}
@endsection
