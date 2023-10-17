@extends('front.layouts.master')
@section('title', 'سبد خرید')
@section('content')
<section id="products" class="py-5">
    <div class="container">
        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>نام <span class="text-danger">*</span></label>
                        <input type="text" name="c_name" class="form-control" value="{{ old('c_name') }}" placeholder="نام...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>نام خانوادگی <span class="text-danger">*</span></label>
                        <input type="text" name="c_family" class="form-control" value="{{ old('c_family') }}" placeholder="نام خانوادگی...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>موبایل <span class="text-danger">*</span></label>
                        <input type="text" name="c_mobile" class="form-control" value="{{ old('c_mobile') }}" placeholder="موبایل...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>شهر <span class="text-danger">*</span></label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }}" placeholder="شهر...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>استان <span class="text-danger">*</span></label>
                        <input type="text" name="state" class="form-control" value="{{ old('state') }}" placeholder="استان...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>کد پستی <span class="text-danger">*</span></label>
                        <input type="text" name="zipcode" class="form-control" value="{{ old('zipcode') }}" placeholder="کد پستی...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>آدرس <span class="text-danger">*</span></label>
                        <textarea name="address" class="form-control" rows="2" placeholder="آدرس...">{{ old('address') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>توضیحات</label>
                        <textarea name="details" class="form-control" rows="5" placeholder="توضیحات...">{{ old('details') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>روش ارسال</label>
                        <div class="form-check">
                            <input class="form-check-input form-check-inline" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input form-check-inline" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Second default radio
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection