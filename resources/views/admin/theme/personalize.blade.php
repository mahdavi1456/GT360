@extends('admin.master')
@section('title', 'شخصی سازی')
@section('style')
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('شخصی سازی') }}
        <section class="content">
            <div class="container-fluid">
                @include('admin.partial.error')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="{{ route('theme.updatePersonalize') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 form-group">
                                            <label>فونت</label>
                                            <select name="font" class="form-control">
                                                @foreach ($fonts as $font)
                                                    <option value="{{ $font->name }}">{{ $font->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label>پالت رنگ</label>
                                            <select name="pallete" class="form-control">
                                                @foreach ($palletes as $pallete)
                                                    <option value="{{ $pallete->name }}">{{ $pallete->label }}</option>
                                                @endforeach
                                            </select>
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
