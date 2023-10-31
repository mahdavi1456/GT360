@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('محصولات') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('search') }}" method="GET">
                                    <div class="form-row align-items-center">
                                        <div class="form-group col-auto my-1">
                                            <label for="query">نام کالا:</label>
                                            <input type="text" name="product_name" id="product_name"
                                                class="form-control">
                                        </div>
                                        <div class="form-group col-auto my-1">
                                            <label for="category">دسته بندی:</label>
                                            <select name="category" id="category" class="form-control">
                                                <option value="">انتخاب کنید</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->cname }}">
                                                        {{ $category->cname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-auto" style="margin-top: 31px;">
                                            <button type="submit" class="btn btn-primary">جستجو</button>
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
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <a href="{{ route('product.create') }}"
                                            class="pull-left btn btn-primary text-white">افزودن جدید</a>
                                    </div>
                                </div>
                                @if ($products->count() > 0)
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>نام محصول</th>
                                            <th>دسته</th>
                                            <th>قیمت خرید</th>
                                            <th>قیمت فروش</th>
                                            <th>موجودی</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->primaryCategory() }}</td>
                                                <td>{{ fa_number($product->purchase_price) }}</td>
                                                <td>{{ fa_number($product->sales_price) }}</td>
                                                <td>{{ fa_number($product->inventory) }}</td>
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

@endsection
