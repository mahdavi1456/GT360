@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{ breadcrumb('افزودنی های سفارش') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
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
                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">نام محصول <span class="text-danger">*</span></label>
                                                <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" placeholder="نام محصول..." required  oninvalid="this.setCustomValidity('.لطفا نام محصول را وارد کنید')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>دسته</label>
                                                <select name="categories[]" class="form-control select2" multiple>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->cname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>قیمت خرید <span class="text-danger">*</span></label>
                                                <input type="text" name="purchase_price" class="form-control just-numbers" value="{{ old('purchase_price') }}" placeholder="قیمت خرید..." required oninvalid="this.setCustomValidity('.لطفا قیمت خرید را وارد کنید')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>قیمت فروش <span class="text-danger">*</span></label>
                                                <input type="text" name="sales_price" class="form-control just-numbers" value="{{ old('sales_price') }}" placeholder="قیمت فروش..." required oninvalid="this.setCustomValidity('.لطفا قیمت فروش را وارد کنید')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>موجودی <span class="text-danger">*</span></label>
                                                <input type="text" name="inventory" class="form-control just-numbers" value="{{ old('inventory') }}" placeholder="موجودی..." required oninvalid="this.setCustomValidity('.لطفا موجودی را وارد کنید')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>قیمت فروش ویژه</label>
                                                <input type="text" name="offer_price" class="form-control just-numbers" value="{{ old('offer_price') }}" placeholder="قیمت فروش ویژه...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>فایل</label>
                                                <div>
                                                    <div id="files-list">
                                                        <input type="hidden" id="files" name="files">
                                                    </div>
                                                </div>
                                                <div class="dropzone"></div>
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
                                @if ($products->count() > 0)
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>مبلغ با تخفیف</th>
                                            <th>مبلغ اصلی</th>
                                            <th>حداقل خرید</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($checkoutOptions as $checkoutOption)
                                            <tr>
                                                <td>{{ fa_number($checkoutOption->index + 1) }}</td>
                                                <td>{{ $checkoutOption->title }}</td>
                                                <td>{{ $checkoutOption->details }}</td>
                                                <td>{{ fa_number($checkoutOption->off_price) }}</td>
                                                <td>{{ fa_number($checkoutOption->real_price) }}</td>
                                                <td>{{ fa_number($checkoutOption->min_price) }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('product.edit', $product) }}"
                                                       class="btn btn-warning m-1">ویرایش</a>
                                                    <form action="{{ route('product.destroy', $product) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger m-1" id="confirmdelete{{ $product->id }}">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger text-center">
                                        موردی جهت نمایش موجود نیست.
                                    </div>
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

    @if ($products->count() > 0)
        @foreach ($products as $product)
            <script>
                $('#confirmdelete{{ $product->id }}').click(function(event) {
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
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            </script>
        @endforeach
    @endif

@endsection
