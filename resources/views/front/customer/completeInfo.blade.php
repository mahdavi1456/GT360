@extends('front.layouts.master')
@section('title', 'تکمیل پروفایل')
@section('style')
    <link rel="stylesheet" href="{{ asset('asset/dist/css/custom-style.css') }}">
@endsection
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex flex-column checkout-box-login">
                <div class="col-12 mb-4">
                    <div class="p-2 pull-right"><strong> تکمیل پروفایل </strong></div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('storeInfo', ['customer_id' => $customer_id]) }}" method="post" class="form-element" id="loginform">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>نام <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control persianletters" placeholder="نام..."
                                value="{{ old('name') }}" required
                                oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                                oninput="this.setCustomValidity('')">
                        </div>
                        <div class="col-md-4">
                            <label>نام خانوادگی <span class="text-danger">*</span></label>
                            <input type="text" name="family" class="form-control persianletters" placeholder="نام خانوادگی..."
                                value="{{ old('family') }}" required
                                oninvalid="this.setCustomValidity('.لطفا نام خانوادگی را وارد کنید')"
                                oninput="this.setCustomValidity('')">
                        </div>
                        <div class="col-md-4">
                            <label>استان <span class="text-danger">*</span></label>
                            <input type="text" name="state" class="form-control" placeholder="استان..." required
                                oninvalid="this.setCustomValidity('.لطفا استان را وارد کنید')"
                                oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <label>شهر <span class="text-danger">*</span></label>
                            <input type="text" name="city" class="form-control" placeholder="َشهر..." required
                                oninvalid="this.setCustomValidity('.لطفا شهر را وارد کنید')"
                                oninput="this.setCustomValidity('')">
                        </div>
                        <div class="col-md-4">
                            <label>آدرس <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control" placeholder="آدرس..." required
                                oninvalid="this.setCustomValidity('.لطفا آدرس را وارد کنید')"
                                oninput="this.setCustomValidity('')">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">ذخیره</button>
                </form>
            </div>
        </div>
    @endsection
