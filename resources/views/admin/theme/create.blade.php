@extends('admin.master')
@section('title', 'Theme List')
@section('style')
    <style>
        .custom-file-label::after {
            content: "فایل";
        }

        .custom-file-label:after {
            right: unset;
            left: 0;
            border-left: unset;
            border-right: inherit;
            border-radius: 0.35rem 0 0 0.35rem;
        }
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('ایجاد قالب') }}
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="row">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{ route('theme.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4 form-group">
                                            <label class="required">نام لاتین <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control nonPersianletters"
                                                value="{{ old('name') }}" placeholder="نام لاتین..." required
                                                oninvalid="this.setCustomValidity('نام قالب را وارد نمایید.')"
                                                oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label class="required">برچسب <span class="text-danger">*</span></label>
                                            <input type="text" name="label" class="form-control"
                                                value="{{ old('label') }}" placeholder="برچسب..." required
                                                oninvalid="this.setCustomValidity('برچسب قالب را وارد نمایید.')"
                                                oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>نوع قالب</label>
                                            {{-- <select name="category" class="form-control">
                                                <option value="company">شرکتی</option>
                                                <option value="shop">فروشگاهی</option>
                                                <option value="news">خبری</option>
                                                <option value="multiple">چند منظوره</option>
                                                <option value="personal">شخصی</option>
                                            </select> --}}
                                            <select name="category" class="form-control select2" required
                                                oninvalid="this.setCustomValidity('.لطفا نوع بسته را وارد کنید')"
                                                oninput="this.setCustomValidity('')">
                                                <option value="">انتخاب کنید...</option>
                                                @foreach ($plans as $plan)
                                                    <option value="{{ $plan->id }}"
                                                        @if (old('category') == $plan->id) selected @endif>
                                                        {{ $plan->label }} (<span style="font-size: x-small;color:#eee">{{$plan->plan_type}}</span>)</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>توضیح کوتاه <span class="text-danger">*</span></label>
                                                <input type="text" name="slogan" class="form-control"
                                                    value="{{ old('slogan') }}" placeholder="توضیح کوتاه...">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="primary_image"> تصویر پیش نمایش</label>
                                            <div class="custom-file">
                                                <input type="file" name="preview" class="custom-file-input"
                                                    id="primary_image">
                                                <label class="custom-file-label" for="primary_image"> انتخاب
                                                    فایل </label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>وضعیت</label>
                                                <select name="status" class="form-control">
                                                    <option value="active">فعال</option>
                                                    <option value="deactive">غیرفعال</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>توضیح کامل</label>
                                                <textarea name="details" class="form-control" placeholder="توضیح کامل...">{{ old('details') }}</textarea>
                                            </div>
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
    <script>
        $('#primary_image').change(function() {
            //get the file name
            var fileName = $(this).val().split('\\').pop();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });
    </script>
    <script src="{{ asset('js/validation.js') }}"></script>
@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css" />
@endsection
