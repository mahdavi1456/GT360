@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include("admin.partial.nav")
    @include("admin.partial.aside")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @include("admin.partial.breadcrumb")

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
                                <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">نام محصول</label>
                                                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" placeholder="نام محصول...">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>دسته</label>
                                                <select name="categories[]" class="form-control select2" multiple>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $product->hasCategory($category) ? 'selected' : '' }}>{{ $category->cname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>قیمت خرید</label>
                                                <input type="text" name="purchace_price" class="form-control" value="{{ $product->purchase_price }}" placeholder="قیمت خرید...">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>قیمت فروش</label>
                                                <input type="text" name="sales_price" class="form-control" value="{{ $product->sales_price }}" placeholder="قیمت فروش...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>موجودی</label>
                                                <input type="text" name="inventory" class="form-control" value="{{ $product->inventory }}" placeholder="موجودی...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>فایل</label>
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
@section('script')
	<script>
        let files = [];

        let myDropzone = new Dropzone(".dropzone", {
            url: "/uploadFile",
            dictDefaultMessage: "برای اپلود کلیک کنید یا فایل را در این باکس بیاندازید ",
            sending: function (file, xhr, formData) {
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
                new swal({
                    text: res.message.file[0],
                    icon: "error",
                    button: "باشه"
                })
                file.previewElement.remove();

            },
        });
	</script>
@endsection
@section('style')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
@endsection