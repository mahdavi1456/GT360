@extends('admin.master')
@section('title', 'ایجاد بسته')
@section('content')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('ایجاد بسته') }}
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                        <div class="row">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{ route('plan.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 form-group">
                                            <label class="required">نام <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="نام..." required
                                                oninvalid="this.setCustomValidity('کادر نشان داده شده رو تکمیل کنید.')"
                                                oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-lg-3 form-group">
                                            <label class="required">برچسب <span class="text-danger">*</span></label>
                                            <input type="text" name="label" class="form-control"
                                                value="{{ old('label') }}" placeholder="برچسب..." required
                                                oninvalid="this.setCustomValidity('کادر نشان داده شده رو تکمیل کنید.')"
                                                oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-12 form-group">
                                            <label class="required ">توضیحات <span class="text-danger">*</span></label>
                                            <textarea name="desc" class="form-control Reditor1" ></textarea>
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
    <script src="{{ asset('js/validation.js') }}"></script>
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
            }).catch(error => {
                console.error(error);
            });
    </script>
@endsection
@section('style')
<style type="text/css">
    .ck-editor__editable{
        height: 150px;
    }
</style>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css"/> --}}
@endsection
