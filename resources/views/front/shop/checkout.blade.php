@extends('front.layouts.master')
@section('title', 'تسویه حساب')
@section('style')
    <link rel="stylesheet" href="{{ asset('asset/dist/css/custom-style.css') }}">
@endsection
@section('content')
    <section class="py-5">
        <div class="container">

            <div class="d-flex flex-column checkout-box">

                <div class="col-12">

                    <div class="p-2 pull-right"><strong> آدرس ها </strong></div>
                    <div class="p-2  pull-left">افزودن آدرس</div>


                </div>

                <form class="col-12" method="POST" action="">

                @foreach ($customerAddresses as $customerAddress)
                    <div class="p-2 col-12 checkout-item mt-4 selectable-item">

                        {{ $customerAddress->state }}: {{ $customerAddress->city }} ,
                        {{ $customerAddress->address }}

                    </div>
                @endforeach

            </div>

            <div class="d-flex flex-column checkout-box">

                <div class="col-12">

                    <div class="p-2 pull-right"><strong> مشخصات </strong></div>

                </div>

                <div class="row">

                    <div class="col-md-4">
                        <label>نام <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $customer->name }}" name="name" class="form-control"
                            placeholder="نام..." value="{{ old('name') }}" required
                            oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                            oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-4">
                        <label>نام خانوادگی <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $customer->family }}" name="family" class="form-control"
                            placeholder="نام خاوادگی..." value="{{ old('family') }}" required
                            oninvalid="this.setCustomValidity('.لطفا نام خانوادگی را وارد کنید')"
                            oninput="this.setCustomValidity('')">
                    </div>
                    <div class="col-md-4">
                        <label>موبایل <span class="text-danger">*</span></label>
                        <input type="text" value="{{ $customer->mobile }}" name="mobile" class="form-control"
                            placeholder="موبایل..." value="{{ old('mobile') }}" required
                            oninvalid="this.setCustomValidity('.لطفا موبایل را وارد کنید')"
                            oninput="this.setCustomValidity('')">
                    </div>
                </div>

            </div>


            <div class="d-flex flex-column checkout-box">

                <div class="col-12">

                    <div class="p-2 pull-right"><strong> روش های پرداخت </strong></div>

                </div>

                    <div class="row col-12">
                        @foreach ($PaymentTypes as $PaymentType)
                            <div class="col-md-3">
                                <div class="p-2 checkout-item mt-4  selectable-item2">
                                    <img src="{{ $PaymentType->icon }}" style="margin-left: 10px;" width="50px"> {{ $PaymentType->name }}
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>


            <div class="d-flex flex-column checkout-box">

                <div class="col-12">

                    <div class="p-2 pull-right"><strong> روش های ارسال </strong></div>

                </div>

                <div class="row col-12">
                    <div class="col-6">
                        <div class="p-2 checkout-item mt-4 selectable-item3">تست</div>
                    </div>
                    <div class="col-6">
                        <div class="p-2 checkout-item mt-4 selectable-item3">تست</div>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-success">ذخیره</button>

        </div>
    </section>
@endsection

@section('scripts')

<script>

document.addEventListener('DOMContentLoaded', function() {
    const selectableItems = document.querySelectorAll('.selectable-item');

    selectableItems.forEach(item => {
        item.addEventListener('click', () => {
            selectableItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('selected');
                }
            });

            item.classList.toggle('selected');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const selectableItems = document.querySelectorAll('.selectable-item2');

    selectableItems.forEach(item => {
        item.addEventListener('click', () => {
            selectableItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('selected');
                }
            });

            item.classList.toggle('selected');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const selectableItems = document.querySelectorAll('.selectable-item3');

    selectableItems.forEach(item => {
        item.addEventListener('click', () => {
            selectableItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('selected');
                }
            });

            item.classList.toggle('selected');
        });
    });
});


</script>
@endsection
