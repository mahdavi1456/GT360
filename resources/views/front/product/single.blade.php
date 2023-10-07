@extends('front.layouts.master')
@section('title', $product->product_name)
@section('style')
    <style>
        body {
            background-color: var(--light);
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="py-5">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="shadow-sm p-3 bg-white rounded">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($product->primaryImage())
                                    <a href="#">
                                        <img src="{{ $product->primaryImage() }}" class="img-thumbnail rounded w-100">
                                    </a>
                                @else
                                    <a href="#">
                                        <img src="{{ asset('images/no-img.jpg') }}" class="img-thumbnail rounded w-100">
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h3>{{ $product->product_name }}</h3>
                                <span>{{ fa_number(number_format($product->sales_price)) }} تومان</span>
                                <div class="d-flex">
                                    <div style="width: 120px">
                                        <input type="text" class="touchspin text-center">
                                    </div>
                                    <button class="btn btn-success mx-2"><i class="fa fa-shopping-cart"></i> افزودن به سبد خرید</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="shadow-sm p-3 bg-white rounded">
                        <div class="row">
                            <div class="col-12">
                                <h4>گالری تصاویر</h4>
                            </div>
                            @foreach ($media as $item)
                                <img src="{{ asset($item->image) }}" class="img-thumbnail rounded mx-2" style="width: 225px; height: 225px; object-fit:scale-down;">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection