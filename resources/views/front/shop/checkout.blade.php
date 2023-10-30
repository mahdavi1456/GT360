@extends('front.layouts.master')
@section('title', 'تسویه حساب')
@section('style')
    <link rel="stylesheet" href="{{ asset('asset/dist/css/custom-style.css') }}">
@endsection
@section('content')

@include('sweetalert::alert')

    <section class="py-5">
        <div class="container">

            <div class="d-flex flex-column checkout-box">

                <div class="col-12">

                    <div class="p-2 pull-right"><strong> آدرس ها </strong></div>
                    <div class="p-2  pull-left" data-bs-toggle="modal" data-bs-target="#exampleModal">افزودن آدرس</div>


                </div>

                <form class="col-12" method="POST" action="">

                    @foreach ($customerAddresses as $customerAddress)
                        <div class="p-2 col-12 checkout-item mt-4 selectable-item">

                            @if($customerAddress->details) {{ $customerAddress->details }} <br> @endif
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
                                <img src="{{ $PaymentType->icon }}" style="margin-left: 10px;" width="50px">
                                {{ $PaymentType->name }}
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

        </form>

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
