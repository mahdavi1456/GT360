<?php
use App\Helpers\TextHelper;
?>
@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ TextHelper::breadcrumb('کد تخفیف') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger  justify-content-center mt-4">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <form action="{{ route('discount.update', $discount->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="نام..." value="{{ $discount->title }}" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" style="margin-top: 38px;">
                                                <input class="form-check-input mx-0" type="radio" name="flexRadioDefault" id="type0" {{ $discount->percent ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1" style="padding-right: 22px;">
                                                  درصدی
                                                </label>
                                                <input class="form-check-input mx-0" type="radio" name="flexRadioDefault" id="type1" {{ $discount->price ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault2" style="padding-right: 22px;">
                                                  قیمتی
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required">درصد</label>
                                                <input type="text" name="percent" class="form-control" id="percent" placeholder="درصد..." value="{{ $discount->percent }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required">قیمت(تومان)</label>
                                                <input type="text" name="price" class="form-control" id="price" disabled placeholder="قیمت..." value="{{ $discount->price }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label required">تاریخ اعتبار</label>
                                            <input type="text" name="validity_date" class="datepicker form-control" id="validity_date"  placeholder="۱۴۰۱/۰۱/۰۱" value="{{ $discount->validity_date }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label required">تعداد اعتبار</label>
                                            <input type="text" name="number" class="form-control" id="number" placeholder="تعداد اعتبار..." value="{{ $discount->number }}">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label required">توضیحات</label>
                                                <textarea name="details" class="form-control" id="details" placeholder="توضیحات...">{{ $discount->details }}</textarea>
                                            </div>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        if($('#type1').is(':checked')) {
            $('#percent').prop('disabled', true);
            $('#price').prop('disabled', false);
        }

        $('#type0').click(function(){
            $('#percent').prop('disabled', false);
            $('#price').prop('disabled', true);
        });
        $('#type1').click(function(){
            $('#percent').prop('disabled', true);
            $('#price').prop('disabled', false);
        });
    });
</script>

@endsection
