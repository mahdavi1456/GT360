@extends('admin.master')
@section('title', 'Category List')
@section('content')
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
                <div class="col-4">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label class="form-label required">نام</label>
                        <input type="text" name="cname" class="form-control" id="cname" placeholder="نام..."  required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="form-label required">دسته والد</label>
                        <select name="cparent" class="form-control" id="cparent">
                            <option value="">انتخاب کنید</option>
                            @foreach($categories as $id => $cname)
                                <option value="{{ $id }}">{{ $cname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="form-label required">تصویر</label>
                        <input type="file" name="image" id="image" class="form-control-file" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label class="form-label required">توضیحات</label>
                        <textarea name="cdetails" class="form-control" id="cdetails" placeholder="توضیحات..."></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">ذخیره</button>
            </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ردیف</th>
                                    <th>والد</th>
                                    <th>عنوان دسته</th>
                                    <th>توضیحات</th>
                                    <th>عملیات</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>آپدیت نرم افزار</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-danger">55%</span></td>
                                    <td><span class="badge bg-danger">55%</span></td>
                                </tr>
                            </table>
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
    Dropzone.options.myDropzone = {
        url: "{{ route('categories.store') }}",
        paramName: "image", // نام فیلد تصویر
        maxFilesize: 2, // حداکثر اندازه فایل (MB)
        acceptedFiles: ".jpeg,.jpg,.png,.gif", // پسوندهای مجاز
        addRemoveLinks: true,
        timeout: 5000, // مدت زمان مجاز برای آپلود (میلی‌ثانیه)
        success: function (file, response) {
            // عملیات موفقیت‌آمیز
        },
        error: function (file, response) {
            // خطا در آپلود
        }
    };
</script>
@endsection

