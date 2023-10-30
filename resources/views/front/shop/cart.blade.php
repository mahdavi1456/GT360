@extends('front.layouts.master')
@section('title', 'سبد خرید')
@section('content')
<section id="products" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($bodies->count())
                    <table class="table" id="cart-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام محصول</th>
                                <th>قیمت واحد</th>
                                <th>تعداد</th>
                                <th>قیمت کل</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bodies as $body)
                                <tr id="tr-{{ $body->id }}">
                                    <td>{{ fa_number($loop->index+1) }}</td>
                                    <td>
                                        <a href="{{ route('front.products.single', $body->product_id) }}" target="_blank">{{ $body->product_name }}</a>
                                    </td>
                                    <td>{{ fa_number($body->showPrice()) }}</td>
                                    <td>
                                        <input type="text" name="amount" class="touchspin text-center" value="{{ $body->product_count }}" onchange="amount({{ $body->id }}, this.value)">
                                    </td>
                                    <td id="bodyPrice-{{ $body->id }}">{{ fa_number($body->total()) }}</td>
                                    <td>
                                        <a href="#" class="text-danger" onclick="removeFromCart({{ $body->id }})"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">جمع کل</td>
                                <td id="totalPrice">{{ fa_number($cart->totalPrice()) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4">تخفیف</td>
                                <td id="discountPrice">{{ fa_number($cart->discount_price ?? 0) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4">مبلغ نهایی</td>
                                <td id="finalPrice">{{ fa_number($cart->final_price) }}</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="alert">
                        سبد خرید شما خالی است.
                        <a href="/" class="btn btn-primary">بازگشت به فروشگاه</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>کد تخفیف</label>
                    <input type="text" name="discount" class="form-control" value="{{ $cart->discount_title }}" placeholder="کد تخفیف...">
                </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" onclick="discount({{ $cart->id }}, true)">اعمال کد تخفیف</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-danger" onclick="removeDiscount({{ $cart->id }})">حذف کد تخفیف</button>
            </div>
            <div class="col-md-3">
                <a href="{{ route('customer.login') }}" class="btn btn-success">تسویه حساب</a>
            </div>
        </div>
    </div>
</section>
@endsection
