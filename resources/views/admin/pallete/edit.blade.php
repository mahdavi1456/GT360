@extends('admin.master')
@section('title', 'pallete List')
@section('content')
    @include('sweetalert::alert')
    @include("admin.partial.nav")
    @include("admin.partial.aside")
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        {{ breadcrumb('ویرایش پالت') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <form action="{{ route('pallete.update', $pallete) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">نام لاتین <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ $pallete->name }}" placeholder="نام لاتین..." required  oninvalid="this.setCustomValidity('نام پالت را وارد نمایید.')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">برچسب <span class="text-danger">*</span></label>
                                                <input type="text" name="label" class="form-control" value="{{ $pallete->label }}" placeholder="برچسب..." required  oninvalid="this.setCustomValidity('برچسب پالت را وارد نمایید.')"
                                                       oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>توضیح کامل</label>
                                                <textarea name="details" class="form-control" placeholder="توضیح کامل...">{{ $pallete->details }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label>رنگ اول</label>
                                            <input type="text" name="first_color" class="form-control" value="{{ $pallete->first_color }}" placeholder="رنگ اول...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ دوم</label>
                                            <input type="text" name="second_color" class="form-control" value="{{ $pallete->second_color }}" placeholder="رنگ دوم...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ سوم</label>
                                            <input type="text" name="third_color" class="form-control" value="{{ $pallete->third_color }}" placeholder="رنگ سوم...">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>رنگ چهارم</label>
                                            <input type="text" name="fourth_color" class="form-control" value="{{ $pallete->fourth_color }}" placeholder="رنگ چهارم...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>

    </script>
    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css"/>
@endsection
