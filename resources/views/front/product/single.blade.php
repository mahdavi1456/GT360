@extends('front.layouts.master')
@section('title', $product->product_name)
@section('content')
<section id="products" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-md-4">
                        @if ($product->primaryImage())
                            <a href="#">
                                <img src="{{ $product->primaryImage() }}" class="rounded w-100">
                            </a>
                        @else
                            <a href="#">
                                <img src="{{ asset('images/no-img.jpg') }}" class="rounded w-100">
                            </a>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $product->product_name }}</h3>
                        <span>{{ fa_number($product->showPrice()) }} تومان</span>
                        <div class="d-flex">
                            <div style="width: 120px">
                                <input type="text" name="amount" class="touchspin text-center">
                            </div>
                            <button class="btn btn-success mx-2" onclick="addToCart({{ $product->id }})"><i class="fa fa-shopping-cart"></i> افزودن به سبد خرید</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <nav>
                <div class="nav nav-tabs nav-tabs-light-mode" role="tablist">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-selected="true">گالری تصاویر</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-selected="false">توضیحات</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#comments" type="button" role="tab" aria-selected="false">نظرات</button>
                </div>
                </nav>
                <div class="tab-content border border-top-0 py-3">
                    <div class="tab-pane fade show active" id="gallery" role="tabpanel">
                        @if($media->count() > 0)
                            <div class="owl-carousel owl-theme">
                                @foreach ($media as $item)
                                <div class="item">
                                    <img src="{{ asset($item->image) }}" class="img-thumbnail rounded mx-2" style="width: 225px; height: 225px; object-fit:scale-down;">
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert">
                                تصویری برای این محصول ثبت نشده است.
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="description" role="tabpanel">...</div>
                    <div class="tab-pane fade" id="comments" role="tabpanel">...</div>
                </div>
        </div>
    </div>
</section>
@endsection