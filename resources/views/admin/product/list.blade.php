@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include("admin.partial.nav")
    @include("admin.partial.aside")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb("محصولات") }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <a href="{{ route('product.create') }}" class="pull-left btn btn-primary text-white">افزودن جدید</a>
                                    </div>
                                </div>
                                @if($products->count() > 0)
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
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->primaryCategory() }}</td>
                                        <td>{{ $product->purchase_price }}</td>
                                        <td>{{ $product->sales_price }}</td>
                                        <td>{{ $product->inventory }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', $product) }}" class="btn btn-warning">ویرایش</a>
                                            <form action="{{ route('product.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">حذف</button>
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
