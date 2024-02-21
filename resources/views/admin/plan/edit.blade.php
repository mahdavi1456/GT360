@extends('admin.master')
@section('title', 'ویرایش بسته')
@section('content')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('ویرایش بسته') }}
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="row">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{ route('plan.update', $plan->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    @method('put')
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') ?? $plan->name }}" placeholder="نام..." required
                                                    oninvalid="this.setCustomValidity('کادر نشان داده شده را پر کنید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">برچسب <span class="text-danger">*</span></label>
                                                <input type="text" name="label" class="form-control"
                                                    value="{{ old('label') ?? $plan->label }}" placeholder="برچسب..."
                                                    required
                                                    oninvalid="this.setCustomValidity('کادر نشان داده شده را پر کنید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="required">نوع بسته <span class="text-danger">*</span></label>
                                            <select name="plan_type" class="form-control" required
                                                oninvalid="this.setCustomValidity('.لطفا نوع بسته را وارد کنید')"
                                                oninput="this.setCustomValidity('')">
                                                <option value="">انتخاب کنید...</option>
                                                <option value="فروشگاهی" @if (old('plan_type')??$plan->plan_type == 'فروشگاهی') selected @endif>
                                                    فروشگاهی</option>
                                                <option value="شرکتی" @if (old('plan_type')??$plan->plan_type == 'شرکتی') selected @endif>شرکتی
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="required">توضیحات </label>
                                                <textarea name="desc" class="form-control Reditor1" rows="10">{{ $plan->desc }}</textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 text-left">
                                            <button type="submit" class="btn btn-warning">ویرایش</button>
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
    <style>
        .ck-editor__editable {
            height: 150px;
        }
    </style>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css"/> --}}
@endsection
