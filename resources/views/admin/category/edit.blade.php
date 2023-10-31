@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb("دسته بندی محصولات") }}

        <!-- Main content -->
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
                                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="cname" class="form-control" id="cname"  value="{{ $category->cname }}"
                                                    placeholder="نام..." required oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label required">دسته والد</label>
                                                <select name="cparent" class="form-control" id="cparent">
                                                    <option value="">انتخاب کنید</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}" {{ $category->cparent == $item->id ? "selected" : ""}}>{{ $item->cname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label required">تصویر </label>
                                                <input type="file" name="image" id="image"
                                                    class="form-control-file" onchange="previewImage()">
                                            </div>
                                            <div>
                                                @if ($category->image)
                                                <div style="display: flex; align-items: flex-start; position: relative;" id="show-image">
                                                    <img src="{{ asset('images/categories/' . $category->image) }}" id="imagePreview" style="max-width: 100px;">
                                                    <div style="position: absolute; top: 0; right: 0;">
                                                        <div class="delete-button" data-category="{{ $category->id }}" style="width: 20px; height: 20px; background-color: red; display: flex; justify-content: center; align-items: center;">
                                                            <span style="font-size: 20px; color: white;">X</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <img src="" style="display: hidden;" id="imagePreview" width="100px">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label required">توضیحات</label>
                                                <textarea name="cdetails" class="form-control" id="cdetails" placeholder="توضیحات...">{{ $category->cdetails }}</textarea>
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
    function previewImage() {
        const fileInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
    </script>

    <script>
    function storeImageLocally() {
        const fileInput = document.getElementById('image');
        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                localStorage.setItem('selectedImage', e.target.result);
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }


    </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-button').click(function() {
            var imageId = $(this).data('category');
            $('#image').val('');

            $.ajax({
                type: 'POST',
                url: '/delete-image',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                    image_id: imageId
                },
                success: function(response) {

                    $("#show-image").remove();
                },
                error: function() {
                }
            });
        });
    });
</script>


@endsection
