@extends('admin.master')
@section('title', 'ایجاد فهرست')
@section('style')
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
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
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('ایجاد فهرست') }}
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('nav.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="action" name="action" value="{{ $action }}">
                    <input type="hidden" name="nav_id" value="{{ $nav?->id }}">
                    @if ($errors->any())
                        <div class="row">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label class="required">نام <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ old('name') ?? $nav?->name }}" placeholder="نام..."
                                                   required
                                                   oninvalid="this.setCustomValidity('نام را وارد نمایید.')"
                                                   oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="required">برچسب <span class="text-danger">*</span></label>
                                            <input type="text" name="label" class="form-control"
                                                   value="{{ old('label') ?? $nav?->label }}" placeholder="برچسب..."
                                                   required
                                                   oninvalid="this.setCustomValidity('برچسب  را وارد نمایید.')"
                                                   oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>وضعیت</label>
                                            <select name="status" class="form-control">
                                                <option value="فعال" @selected($nav?->status == 'فعال')> فعال</option>
                                                <option value="غیرفعال" @selected($nav?->status == 'غیرفعال')>غیرفعال
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group abstract">
                                                <label>توضیحات</label>
                                                <textarea name="desc" class="form-control Reditor1"
                                                          placeholder="توضیحات ...">{{ old('desc') ?? $nav?->desc }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 text-left">
                                            <button class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('.Reditor1'), {
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
        }).catch(error => {
            console.error(error);
        });
    </script>
    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endsection
