@extends('admin.master')
@section('title', 'تنظیمات')
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
        {{ breadcrumb('تنظیمات') }}
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="row">
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    </div>
               @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>قالب پیشفرض</label>
                                            <select name="default_theme" class="custom-select">
                                                <option value="">انتخاب کنید...</option>
                                                @foreach ($themes as $theme)
                                                    <option @selected($defaultTheme == $theme->name) value="{{ $theme->name }}">
                                                        {{ $theme->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>شرایط و قوانین سایت</label>
                                                <textarea name="site_terms" class="form-control Reditor1" id="description" placeholder="شرایط و قوانین...">{{ getSetting('site_terms') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 text-left">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
