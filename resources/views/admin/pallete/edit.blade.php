@extends('admin.master')
@section('title', 'ویرایش پالت')
@section('content')
    @include('sweetalert::alert')
    @include("admin.partial.nav")
    @include("admin.partial.aside")
    <div class="content-wrapper">
        {{ breadcrumb('ویرایش پالت') }}
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{ route('pallete.update', $pallete) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    @method('put')
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label class="required">نام لاتین <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ $pallete->name }}" placeholder="نام لاتین..." required
                                                   oninvalid="this.setCustomValidity('نام پالت را وارد نمایید.')"
                                                   oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="required">برچسب <span class="text-danger">*</span></label>
                                            <input type="text" name="label" class="form-control"
                                                   value="{{ $pallete->label }}" placeholder="برچسب..." required
                                                   oninvalid="this.setCustomValidity('برچسب پالت را وارد نمایید.')"
                                                   oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>توضیح کامل</label>
                                            <textarea name="details" class="form-control"
                                                      placeholder="توضیح کامل...">{{ $pallete->details }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label>رنگ اول</label>
                                            <input type="text" name="first_color" class="form-control"
                                                   value="{{ $pallete->first_color }}" placeholder="رنگ اول...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ دوم</label>
                                            <input type="text" name="second_color" class="form-control"
                                                   value="{{ $pallete->second_color }}" placeholder="رنگ دوم...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ سوم</label>
                                            <input type="text" name="third_color" class="form-control"
                                                   value="{{ $pallete->third_color }}" placeholder="رنگ سوم...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ چهارم</label>
                                            <input type="text" name="fourth_color" class="form-control"
                                                   value="{{ $pallete->fourth_color }}" placeholder="رنگ چهارم...">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12 text-left">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
@section('style')
@endsection
