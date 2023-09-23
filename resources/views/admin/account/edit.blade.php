<?php

use App\Helpers\TextHelper;
?>
@extends('admin.master')
@section('title', 'Account')
@section('content')
@include('sweetalert::alert')
@include('admin.partial.nav')
@include('admin.partial.aside')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    {{ TextHelper::breadcrumb('حساب کاربری') }}

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
                            <form action="{{ route('account.update', $account->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <h4>اطلاعات شخصی</h4>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">نوع حساب <span class="text-danger">*</span></label>
                                            <select class="form-control" id="account_type" name="account_type">
                                                <option value="حقیقی" @if($account->account_type == 'حقیقی') selected @endif>حقیقی</option>
                                                <option value="حقوقی" @if($account->account_type == 'حقوقی') selected @endif>حقوقی</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label">نام <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="نام..." value="{{ $account->name }}">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> نام خانوادگی <span class="text-danger">*</span></label>
                                            <input type="text" name="family" class="form-control" id="family" placeholder="نام خانوادگی..." value="{{ $account->family }}">
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> موبایل <span class="text-danger">*</span></label>
                                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="09xxxxxxxxx" value="{{ $account->mobile }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> تلفن ثابت </label>
                                            <input type="text" name="phone" class="form-control" id="phone" placeholder="021xxxxxxxx" value="{{ $account->phone }}" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> ایمیل </label>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="ایمیل..." value="{{ $account->email }}" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> تاریخ تولد </label>
                                            <input type="text" name="birthday" class="datepicker form-control" id="birthday" placeholder="۱۴۰۱/۰۱/۰۱" value="{{ $account->birthday }}" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> کد ملی </label>
                                            <input type="text" name="mellicode" class="form-control" id="mellicode" placeholder="کد ملی..." value="{{ $account->mellicode }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> استان </label>
                                            <input type="text" name="state" class="form-control" id="state" placeholder="استان..." value="{{ $account->state }}" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> شهر </label>
                                            <input type="text" name="city" class="form-control" id="city" placeholder="شهر..." value="{{ $account->city }}" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label required"> آدرس </label>
                                            <input type="text" name="address" class="form-control" id="address" placeholder="آدرس..." value="{{ $account->address }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> کد پستی </label>
                                            <input type="text" name="postalcode" class="form-control" id="postalcode" placeholder="کد پستی..." value="{{ $account->postalcode }}" />
                                        </div>
                                    </div>
                                </div>
                                <div id="company_fields">
                                    <hr>
                                    <h4>اطلاعات شرکت</h4>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> نام شرکت </label>
                                                <input type="text" name="company" class="form-control" id="company" placeholder="نام شرکت..." value="{{ $account->company }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> نوع شرکت </label>
                                                <select class="form-control" id="company_type" name="company_type">
                                                    <option value="شرکت های سهامی" @if($account->company_type == 'شرکت های سهامی') selected @endif>شرکت های سهامی</option>
                                                    <option value="شرکت با مسئولیت محدود" @if($account->company_type == 'شرکت با مسئولیت محدود') selected @endif>شرکت با مسئولیت محدود</option>
                                                    <option value="شرکت های تضامنی" @if($account->company_type == 'شرکت های تضامنی') selected @endif>شرکت های تضامنی</option>
                                                    <option value="شرکت مختلط غیر سهامی" @if($account->company_type == 'شرکت مختلط غیر سهامی') selected @endif>شرکت مختلط غیر سهامی</option>
                                                    <option value="شرکت مختلط سهامی" @if($account->company_type == 'شرکت مختلط سهامی') selected @endif>شرکت مختلط سهامی</option>
                                                    <option value="شرکت های نسبی" @if($account->company_type == 'شرکت های نسبی') selected @endif>شرکت های نسبی</option>
                                                    <option value="شرکت های تعاونی تولید و مصرف" @if($account->company_type == 'شرکت های تعاونی تولید و مصرف') selected @endif>شرکت های تعاونی تولید و مصرف</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> شناسه ملی </label>
                                                <input type="text" name="national_id" class="form-control" id="national_id" placeholder="شناسه ملی..." value="{{ $account->national_id }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> شماره ثبت </label>
                                                <input type="text" name="registration_number" class="form-control" id="registration_number" placeholder="شماره ثبت..." value="{{ $account->registration_number }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> تاریخ ثبت </label>
                                                <input type="text" name="registration_date" class="datepicker form-control" id="registration_date" placeholder="۱۴۰۱/۰۱/۰۱" value="{{ $account->registration_date }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="account_status">وضعیت اکانت:</label>
                                          {{ $account->account_status }}
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
        $('#company_fields').hide();

        $('#account_type').change(function() {
            if ($(this).val() === 'حقوقی') {
                $('#company_fields').show();
            } else {
                $('#company_fields').hide();
            }
        });
    });
</script>
@endsection
