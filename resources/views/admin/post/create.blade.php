@extends('admin.master')
@section('title', 'page create/update')
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
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="action" name="action" value="{{ $action }}">
                    <input type="hidden" id="post_id" name="post" value="{{ $post?->id }}">
                    <input type="hidden" name="component_id" value="{{ request('component_id') }}">
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
                                                    value="{{ old('title') ?? $post?->title }}" placeholder="نام..."
                                                    required oninvalid="this.setCustomValidity('نام عنوان را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">نامک <span class="text-danger">*</span></label>
                                                <input type="text" name="slug" class="form-control object-slug"
                                                    value="{{ old('slug') ?? $post?->slug }}" placeholder="نام..." required
                                                    oninvalid="this.setCustomValidity('نام نامک را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group abstract">
                                                <label>خلاصه </label>
                                                <textarea name="abstract" class="form-control Reditor1" placeholder="خلاصه ...">{{ old('abstract') ?? $post?->abstract }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="form-group Rcontent">
                                            <label> محتوا <span class="text-danger">*</span></label>
                                            <textarea name="content" class="form-control Reditor2" placeholder="محتوا ...">{{ old('content') ?? $post?->content }}</textarea>
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
                                                <option value="draft" @selected($post?->publish_status == 'draft')>پیش نویس</option>
                                                <option value="publish" @selected($post?->publish_status == 'publish')>انتشار</option>
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
                                                                <input class="form-check-input" name='term[]'
                                                                    type="checkbox" value="{{ $parent->id }}"
                                                                    id="defaultCheck-{{ $parent->id }}"
                                                                    @checked(in_array($parent->id, $term_array))>
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
                                                                        <input class="form-check-input" name='term[]'
                                                                            type="checkbox" value="{{ $term->id }}"
                                                                            id="defaultCheck-{{ $term->id }}"
                                                                            @checked(in_array($term->id, $term_array))>
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
                                    <div class="col-12 mb-2">
                                        <label>تصویر شاخص </label>

                                            <div class="col-12 pos-relative thumb-show-image d-none">
                                                <img style="width:100% !important; object-fit:contain"
                                                    src="{{asset(ert('thumb-path')).'/' . $post?->thumbnail }}">
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
                            url: "{{ route('thumb.destroy') }}",
                            data:{
                                'post_id': $('#post_id').val()
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
        if ("{{$action}}"=='create') {
            $('.thumb-show-image').addClass('d-none');
        }else{
            @if ($post->thumbnail)
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
                formData.append('component_id', "{{ request('component_id') }}");
                formData.append('post', "{{$post->id??0 }}");
                $.ajax({
                    type: 'post',
                    url: "{{ route('post.thumb') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(respnse) {

                            $('#action').val(respnse.action);
                            $('.thumb-show-image img').attr('src',respnse.path);
                            $('.thumb-show-image').removeClass('d-none');
                            $('.thumb-show-input').addClass('d-none');
                            $("#loading-overlay").fadeOut();
                            $('#post_id').val(respnse.post);
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


    <script src="{{ asset('js/validation.js') }}"></script>

@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css" />
@endsection
