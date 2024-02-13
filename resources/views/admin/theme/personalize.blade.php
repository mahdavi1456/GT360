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
                                            <select name="category" class="form-control">
                                                <option value="company">شرکتی</option>
                                                <option value="shop">فروشگاهی</option>
                                                <option value="news">خبری</option>
                                                <option value="multiple">چند منظوره</option>
                                                <option value="personal">شخصی</option>
                                            </select>
                                        </div>
                                        <div class="col-6 form-group">
                                            <label>پالت رنگ</label>
                                            <select name="category" class="form-control">
                                                <option value="company">شرکتی</option>
                                                <option value="shop">فروشگاهی</option>
                                                <option value="news">خبری</option>
                                                <option value="multiple">چند منظوره</option>
                                                <option value="personal">شخصی</option>
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
