@extends('front.layouts.master')
@section('title', 'فروشگاه')
@section('style')
    <style>
        .card-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="my-5">
            <div class="row mb-3">
                <h3>محصولات</h3>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-2">
                        <div class="card card-outline">
                            @if ($product->primaryImage())
                                <img src="{{ $product->primaryImage() }}" class="card-img">
                            @else
                                <img src="{{ asset('images/no-img.jpg') }}" class="card-img">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title mb-2">{{ $product->product_name }}</h4>
                                <span class="mb-2">{{ fa_number($product->sales_price) }} تومان</span>
                                <a href="#" class="btn btn-info w-100">مشاهده محصول</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection