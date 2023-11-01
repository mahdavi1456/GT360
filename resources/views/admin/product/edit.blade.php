@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('ویرایش محصولات') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
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
                                <form action="{{ route('product.update', $product) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">نام محصول <span class="text-danger">*</span></label>
                                                <input type="text" name="product_name" class="form-control"
                                                    value="{{ $product->product_name }}" placeholder="نام محصول..." required oninvalid="this.setCustomValidity('.لطفا نام محصول را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>دسته <span class="text-danger">*</span></label>
                                                <select name="categories[]" class="form-control select2" multiple  required oninvalid="this.setCustomValidity('.لطفا دسته را وارد کنید')"
                                                oninput="this.setCustomValidity('')">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $product->hasCategory($category) ? 'selected' : '' }}>
                                                            {{ $category->cname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>قیمت خرید <span class="text-danger">*</span></label>
                                                <input type="text" name="purchase_price" class="form-control just-numbers"
                                                    value="{{ $product->purchase_price }}" placeholder="قیمت خرید..." required oninvalid="this.setCustomValidity('.لطفا قیمت خرید را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>قیمت فروش <span class="text-danger">*</span></label>
                                                <input type="text" name="sales_price" class="form-control just-numbers"
                                                    value="{{ $product->sales_price }}" placeholder="قیمت فروش..." required oninvalid="this.setCustomValidity('.لطفا قیمت فروش را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>موجودی <span class="text-danger">*</span></label>
                                                <input type="text" name="inventory" class="form-control just-numbers"
                                                    value="{{ $product->inventory }}" placeholder="موجودی..." required oninvalid="this.setCustomValidity('.لطفا موجودی را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    @if ($product->media)
                                    <div style="display: flex;">
                                        @foreach ($product->media as $media)
                                            <div style="display: flex; align-items: flex-start; position: relative;"
                                                id="show-image">
                                                <img src="{{ asset($media->image) }}" id="imagePreview"
                                                    style="max-width: 100px;">
                                                <div style="position: absolute; top: 0; right: 0;">
                                                    <div class="delete-button" data-product="{{ $media->id }}"
                                                        style="width: 20px; height: 20px; background-color: red; display: flex; justify-content: center; align-items: center;">
                                                        <span style="font-size: 20px; color: white;">X</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>فایل <span class="text-danger">*</span></label>
                                                <input type="hidden" name="files" id="files">
                                                <div class="dropzone">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
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


    <script>
        function storeImageLocally() {
            const fileInput = document.getElementById('image');
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    localStorage.setItem('selectedImage', e.target.result);
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete-button').click(function() {
                var imageId = $(this).data('product');
                $('#image').val('');

                $.ajax({
                    type: 'POST',
                    url: '/delete-product-images',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'PUT',
                        image_id: imageId
                    },
                    success: function(response) {

                        $("#show-image").remove();
                    },
                    error: function() {}
                });
            });
        });
    </script>


    <script src="{{ asset('js/validation.js') }}"></script>

@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css" />

@endsection
