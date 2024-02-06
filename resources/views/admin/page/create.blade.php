@extends('admin.master')
@section('title', 'page create')
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
        {{ breadcrumb('ایجاد صفحه') }}
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="action" name="action" value="{{ $action }}">
                    <input type="hidden" id="page_id" name="page" value="{{ $page?->id }}">
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
                                                    value="{{ old('title') ?? $page?->title }}" placeholder="نام..."
                                                    required oninvalid="this.setCustomValidity('نام عنوان را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">نامک <span class="text-danger">*</span></label>
                                                <input type="text" name="slug" class="form-control"
                                                    value="{{ old('slug') ?? $page?->slug }}" placeholder="نام..." required
                                                    oninvalid="this.setCustomValidity('نام نامک را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group abstract">
                                                <label>خلاصه</label>
                                                <textarea name="abstract" class="form-control Reditor1" placeholder="خلاصه ...">{{ old('abstract') ?? $page?->abstract }}</textarea>
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
                                            <textarea name="content" class="form-control Reditor2" placeholder="محتوا ...">{{ old('content') ?? $page?->content }}</textarea>
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
                                                <option value="draft" @selected($page?->publish_status == 'draft')>پیش نویس</option>
                                                <option value="publish" @selected($page?->publish_status == 'publish')>انتشار</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 mb-2">
                                        <label>تصویر شاخص </label>
                                            <div class="col-12 pos-relative thumb-show-image d-none">
                                                <img style="width:100% !important; object-fit:contain"
                                                    src="{{ asset(ert('pip')) . '/' . $page?->thumbnail }}">
                                                <button type="button" onclick="destroyImage()"
                                                style="left:44%;bottom:0"
                                                class="btn btn-danger btn-sm position-absolute"> حذف</button>
                                            </div>
                                            <div class="custom-file thumb-show-input">
                                                <input type="file" class="custom-file-input"
                                                    id="primary_image">
                                                <label class="custom-file-label" for="primary_image">انتخاب فایل</label>
                                            </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="required">ترتیب</label>
                                            <input type="text" name="page_order" class="form-control"
                                                value="{{ old('page_order') }}" placeholder="ترتیب...">
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
        function destroyImage() {
            Swal.fire({
                title: "اطمینان دارید؟",
                text: "آیا از حذف این مورد اطمینان دارید؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "بله، مطمئنم.",
                cancelButtonText: "نه، پشیمون شدم."
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('pageImage.destroy') }}",
                        data: {
                            'page_id': $('#page_id').val()
                        },
                        success:function(data) {
                            Swal.fire({
                                title: "موفق",
                                text: 'تصویر شاخص حذف شد',
                                icon: "success"
                            });
                            $('.thumb-show-input').removeClass('d-none');
                            $('.thumb-show-image').addClass('d-none');
                        },
                        error: function(data) {
                            Swal.fire({
                                title: "خطا",
                                text: data.responseJSON.message,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

        if ("{{ $action }}" == "create") {
            $(".thumb-show-image").addClass('d-none');
        } else {
            @if ($page?->thumbnail)
                $('.thumb-show-image').removeClass('d-none');
                $('.thumb-show-input').addClass('d-none');
            @else
                $('.thumb-show-image').addClass('d-none');
                $('.thumb-show-input').removeClass('d-none');
            @endif
        }
        $('#primary_image').change(function() {
           $("#loading-overlay").fadeIn();
            var image = $('#primary_image').prop('files')[0];
            var formData = new FormData();
            formData.append('image', image);
            formData.append('_token', "{{ csrf_token() }}");
            formData.append('action', "{{ $action }}");
            formData.append('page', "{{$page?->id??0 }}");
            $.ajax({
                type: 'post',
                url: "{{ route('page.image') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(respnse) {
                    $('#action').val(respnse.action);
                    $('.thumb-show-image img').attr('src',respnse.path);
                    $('.thumb-show-image').removeClass('d-none');
                    $('.thumb-show-input').addClass('d-none');
                    $("#loading-overlay").fadeOut();
                    $('#page_id').val(respnse.page);
                    Swal.fire({
                        title: "موفق",
                        text: "تصویری خواسته شده ذخیره شد",
                        icon: "success"
                    });
                },
                error: function(respnse) {
                    alert('eroor');
                    console.log(respnse);
                }
            });
        });

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
