@extends('admin.master')
@section('title', 'ویرایش فونت')
@section('content')
    @include('sweetalert::alert')
    @include("admin.partial.nav")
    @include("admin.partial.aside")
    <div class="content-wrapper">
        {{ breadcrumb('ویرایش فونت') }}
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="row">
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{ route('font.update', $font) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label class="required">نام لاتین <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ $font->name }}" placeholder="نام لاتین..." required
                                                   oninvalid="this.setCustomValidity('نام فونت را وارد نمایید.')"
                                                   oninput="this.setCustomValidity('')">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label class="required">برچسب <span class="text-danger">*</span></label>
                                            <input type="text" name="label" class="form-control"
                                                   value="{{ $font->label }}" placeholder="برچسب..." required
                                                   oninvalid="this.setCustomValidity('برچسب فونت را وارد نمایید.')"
                                                   oninput="this.setCustomValidity('')">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label>توضیح کامل</label>
                                            <textarea name="details" class="form-control"
                                                      placeholder="توضیح کامل...">{{ $font->details }}</textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row text-left">
                                        <div class="col-12">
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
