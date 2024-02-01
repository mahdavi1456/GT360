@extends('admin.master')
@section('title', 'Category List')
@section('style')
    <style>
        .ck-editor__editable {
            height: 150px;
        }
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('دسته بندی محصولات') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger  justify-content-center mt-4">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="">قالب پیشفرض</label>
                                            <select class="custom-select" name="default_theme">
                                                <option value="">انتخاب کنید...</option>
                                                @foreach ($themes as $theme)
                                                    <option @selected($defaultTheme == $theme->name) value="{{ $theme->name }}">
                                                        {{ $theme->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">عنوان سایت <span class="text-danger">*</span></label>
                                                <input type="text" name="settings[title]" class="form-control" id="title" placeholder="عنوان سایت..." value = "{{ getSetting('title') }}" required oninvalid="this.setCustomValidity('.لطفا عنوان را وارد کنید')"
                                                oninput="this.setCustomValidity('')">
                                            </div>
                                        </div> --}}

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>شرایط و قوانین سایت</label>
                                                <textarea name="site_terms" class="form-control Reditor1" id="description" placeholder="شرایط و قوانین...">{{ getSetting('site_terms') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
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
    </div>
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
@endsection
