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
                                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="cname" class="form-control" id="cname"
                                                    placeholder="نام..." required oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label required">دسته والد</label>
                                                <select name="cparent" class="form-control" id="cparent">
                                                    <option value="">انتخاب کنید</option>
                                                    @foreach ($categories as $id => $category)
                                                        <option value="{{ $category->id }}">{{ $category->cname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label required">تصویر </label>
                                                <input type="file" name="image" id="imageInput"
                                                    class="form-control-file" onchange="showImage(this)">
                                            </div>
                                            <img id="selectedImage" style="display: none;" width="100px" height="100px"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label required">توضیحات</label>
                                                <textarea name="cdetails" class="form-control" id="cdetails" placeholder="توضیحات..."></textarea>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(count($categories) > 0)
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام دسته</th>
                                        <th>دسته والد</th>
                                        <th>تصویر</th>
                                        <th>توضیحات</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @php $i = 1; @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>@php echo fa_number($i); @endphp</td>
                                            <td>{{ $category->cname }}</td>
                                            <td>{{ $category->parent?->cname }}</td>
                                            <td>
                                            @if ($category->image)
                                                <img src="{{ asset('images/categories/' . $category->image) }}" alt="تصویر دسته بندی" width="50px">
                                                @else
                                                بدون تصویر
                                            @endif
                                            </td>
                                            <td>
                                                @if ($category->cdetails)
                                                {{ $category->cdetails }}
                                                @else
                                                بدون توضیحات
                                            @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" id="confirmdelete{{ $category->id }}">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </table>
                                @else
                                <div class="alert alert-danger text-center"> موردی جهت نمایش موجود نیست. </div>
                                @endif
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

@if ($categories->count() > 0)
@foreach ($categories as $category)
<script>
    $('#confirmdelete{{ $category->id }}').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
                title: `آیا مطمئنید؟`,
                text: "این مورد برای همیشه حذف خواهد شد.",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: 'انصراف',
                confirmButtonText: 'تایید',
            })
            .then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
    });
</script>

@endforeach
    @endif

    <script>
        function showImage(input) {
            const selectedImage = document.getElementById("selectedImage");
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                    selectedImage.style.display = "block";
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
