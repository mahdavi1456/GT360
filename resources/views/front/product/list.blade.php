@extends('front.layouts.master')
@section('title', 'فروشگاه')
@section('page-header')
    <div class="container">
        <div class="row">
            <div id="category-list">
                <ul>
                    <li>
                        <a href="{{ route('front.products.list') }}">همه</a>
                    </li>
                    @foreach ($categories as $category)
                        <li onclick="document.getElementById('cat-form-{{ $category->id }}').submit()">{{ $category->cname }}</li>
                    @endforeach
                </ul>
                @foreach ($categories as $category)
                    <form action="" id="cat-form-{{ $category->id }}">
                        <input type="hidden" name="category" value="{{ $category->id }}">
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section id="products" class="py-5">
        <div class="container">
            <div class="row">
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                    <article class="col-3">
                        <a href="{{ route('front.products.single', $product) }}">
                            <img src="{{ $product->primaryImage() ? asset($product->primaryImage()) : asset('images/no-img.jpg') }}" class="img-fluid">
                        </a>
                        <h2>{{ $product->product_name }}</h2>
                        <span>{{ $product->sales_price }}</span>
                        <button class="btn btn-success">+</button>
                    </article>
                    @endforeach
                @else
                    
                @endif
            </div>
        </div>
    </section>
@endsection