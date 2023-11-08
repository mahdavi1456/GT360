@extends('front.layouts.master')
@section('title', 'تسویه حساب')
@section('style')
    <link rel="stylesheet" href="{{ asset('asset/dist/css/custom-style.css') }}">
@endsection
@section('content')
@include('sweetalert::alert')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex flex-column checkout-box">
                        <div class="col-12">
                            <div class="p-2 pull-right"><strong> مشخصات </strong></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>نام <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $customer->name }}" name="name" class="form-control persianletters"
                                    placeholder="نام..." value="{{ old('name') }}" required
                                    oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div class="col-md-4">
                                <label>نام خانوادگی <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $customer->family }}" name="family" class="form-control persianletters"
                                    placeholder="نام خاوادگی..." value="{{ old('family') }}" required
                                    oninvalid="this.setCustomValidity('.لطفا نام خانوادگی را وارد کنید')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                            <div class="col-md-4">
                                <label>موبایل <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $customer->mobile }}" name="mobile" class="form-control just-numbers"
                                    placeholder="موبایل..." value="{{ old('mobile') }}" required
                                    oninvalid="this.setCustomValidity('.لطفا موبایل را وارد کنید')"
                                    oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column checkout-box">
                        <div class="col-12">
                            <div class="p-2 pull-right"><strong> افزودنی های سفارش </strong></div>
                        </div>
                        @if ($addons->count() > 0)
                        <div class="row col-12">
                            @foreach ($addons as $addon)
                                <div class="col-md-4">
                                    <div class="p-2 checkout-item mt-4 selectable-item-multiple {{ $checkout->addons->contains($addon->id) ? 'selected' : '' }}" data-group="addon" onclick="addon({{ $checkout->id }}, {{ $addon->id }})">
                                        {{ $addon->title }}
                                        <br>
                                        هزینه: {{ $addon->showPrice() }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column checkout-box">
                        <div class="col-12" id="factor-container">
                            {{ $checkout->loadFactor() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex flex-column checkout-box">
                        <div class="col-12">
                            <div class="p-2 pull-right"><strong> آدرس ها </strong></div>
                            <div class="p-2  pull-left" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">افزودن آدرس</div>
                        </div>
                        @foreach ($customerAddresses as $customerAddress)
                            <div class="p-2 col-12 checkout-item mt-4 selectable-item" data-group="address">
                                @if($customerAddress->details)
                                    {{ $customerAddress->details }}
                                    <br>
                                @endif
                                {{ $customerAddress->state }}: {{ $customerAddress->city }} ,
                                {{ $customerAddress->address }}
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex flex-column checkout-box">
                        <div class="col-12">
                            <div class="p-2 pull-right"><strong> روش های ارسال </strong></div>
                        </div>
                        @if ($transports->count() > 0)
                        <div class="row col-12">
                            @foreach ($transports as $key => $transport)
                                <div class="col-md-12">
                                    <div class="p-2 checkout-item mt-4 selectable-item {{ $checkout->transport_id == $transport->id ? 'selected' : '' }}" data-group="transport" onclick="transport({{ $checkout->id }}, {{ $transport->id }})">
                                        {{ $transport->title }}
                                        <br>
                                        هزینه: {{ fa_number(number_format($transport->tprice)) }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="d-flex flex-column checkout-box">
                        <div class="col-12">
                            <div class="p-2 pull-right"><strong> روش های پرداخت </strong></div>
                        </div>
                        @if ($paymentTypes->count() > 0)
                        <div class="row col-12">
                            @foreach ($paymentTypes as $paymentType)
                                <div class="col-md-12">
                                    <div class="p-2 checkout-item mt-4 selectable-item" data-group="payment">
                                        <img src="{{ $paymentType->icon }}" style="margin-left: 10px;" width="50px">
                                        {{ $paymentType->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">ذخیره</button>
        </div>
        <!-- Modal -->
        <form method="POST" action="{{ route('addAddress', ['customer_id' => $customer->id]) }}">
        @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">افزودن آدرس</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger"><b>اخطار: </b>{{ $error }}</div>
                                @endforeach
                            @endif
                            <label>عنوان <span class="text-danger">*</span></label>
                            <input type="details" name="details" class="form-control"
                                placeholder="عنوان..." value="{{ old('details') }}" required
                                oninvalid="this.setCustomValidity('.لطفا عنوان را وارد کنید')"
                                oninput="this.setCustomValidity('')">
                            <label>استان <span class="text-danger">*</span></label>
                            <input type="state" name="state" class="form-control"
                                placeholder="استان..." value="{{ old('state') }}" required
                                oninvalid="this.setCustomValidity('.لطفا استان را وارد کنید')"
                                oninput="this.setCustomValidity('')">
                            <label>شهر <span class="text-danger">*</span></label>
                            <input type="city" name="city" class="form-control"
                                placeholder="استان..." value="{{ old('city') }}" required
                                oninvalid="this.setCustomValidity('.لطفا شهر را وارد کنید')"
                                oninput="this.setCustomValidity('')">
                            <label for="your_textarea">آدرس<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" name="address" rows="4" cols="47"  placeholder="آدرس..." required
                            oninvalid="this.setCustomValidity('.لطفا آدرس را وارد کنید')"
                            oninput="this.setCustomValidity('')">{{ old('address') }}</textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn btn-primary">ذخیره</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('scripts')
    <script>
        $('.selectable-item').click(function() {
            var group = $(this).data('group');
            $('.selectable-item[data-group = ' + group + ']').removeClass('selected');
            $(this).addClass('selected');
        });

        $('.selectable-item-multiple').click(function() {
            $(this).toggleClass('selected');
        });
    </script>

    <script src="{{ asset('js/factor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
