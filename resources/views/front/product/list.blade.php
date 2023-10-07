@extends('front.layouts.master')
@section('title', 'فروشگاه')
@section('style')
    <style>
        .card-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        body {
            background-color: var(--light);
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="py-5">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="shadow-sm p-2 text-center bg-white rounded">
                        <h2>محصولات</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="shadow-sm p-2 bg-white rounded">
                        <h4 class="my-2">دسته بندی</h4>
                        <ul>
                            <a href="{{ route('front.products.list') }}" class="text-dark">
                                <li class="list-group-item my-2 rounded {{ !request('category') ? 'active' : '' }}">همه محصولات</li>
                            </a>
                            @if(count($categories) > 0)
                                @foreach ($categories as $category)
                                    <form action="" id="cat-form-{{ $category->id }}">
                                        <input type="hidden" name="category" value="{{ $category->id }}">
                                    </form>
                                    <a href="#" class="text-dark" onclick="document.getElementById('cat-form-{{ $category->id }}').submit()">
                                        <li class="list-group-item my-2 rounded {{ request('category') == $category->id ? 'active' : '' }}">
                                            {{ $category->cname }}
                                        </li>
                                    </a>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    @if (count($products) > 0)
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-3 mb-2">
                                    <div class="card card-outline">
                                        @if ($product->primaryImage())
                                            <a href="{{ route('front.products.single', $product) }}">
                                                <img src="{{ $product->primaryImage() }}" class="card-img">
                                            </a>
                                        @else
                                            <a href="{{ route('front.products.single', $product) }}">
                                                <img src="{{ asset('images/no-img.jpg') }}" class="card-img">
                                            </a>
                                        @endif
                                        <div class="card-body">
                                            <h4 class="card-title mb-3">{{ $product->product_name }}</h4>
                                            <span>{{ fa_number(number_format($product->sales_price)) }} تومان</span>
                                            <a href="{{ route('front.products.single', $product) }}" class="btn btn-primary w-100 mt-2">مشاهده محصول</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-danger text-center">
                            متاسفانه محصولی یافت نشد.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection