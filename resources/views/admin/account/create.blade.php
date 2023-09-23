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
                                <form action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h4>اطلاعات شخصی</h4>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label">نوع حساب <span
                                                        class="text-danger">*</span></label>
                                                <select name="account_type" id="account_type" class="form-control" required>
                                                    <option value="حقیقی">حقیقی</option>
                                                    <option value="حقوقی">حقوقی</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="نام..." required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> نام خانوادگی <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="family" class="form-control" id="family"
                                                    placeholder="نام خانوادگی..." required>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> موبایل <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="mobile" class="form-control" id="mobile"
                                                    placeholder="09xxxxxxxxx"  required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> تلفن ثابت </label>
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                    placeholder="021xxxxxxxx" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> ایمیل </label>
                                                <input type="text" name="email" class="form-control" id="email"
                                                    placeholder="ایمیل..." />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> تاریخ تولد </label>
                                                <input type="text" name="birthday" class="datepicker form-control"
                                                    id="birthday" placeholder="۱۴۰۱/۰۱/۰۱" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> کد ملی </label>
                                                <input type="text" name="mellicode" class="form-control" id="mellicode"
                                                    placeholder="کد ملی..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> استان </label>
                                                <input type="text" name="state" class="form-control" id="state"
                                                    placeholder="استان..." />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> شهر </label>
                                                <input type="text" name="city" class="form-control" id="city"
                                                    placeholder="شهر..." />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required"> آدرس </label>
                                                <input type="text" name="address" class="form-control" id="address"
                                                    placeholder="آدرس..." />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> کد پستی </label>
                                                <input type="text" name="postalcode" class="form-control"
                                                    id="postalcode" placeholder="کد پستی..." />
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
                                                    <input type="text" name="company" class="form-control"
                                                        id="company" placeholder="نام شرکت..." />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label required"> نوع شرکت </label>
                                                    <select name="company_type" id="company_type" class="form-control">
                                                        <option value="">انتخاب کنید</option>
                                                        <option value="شرکت های سهامی">شرکت های سهامی</option>
                                                        <option value="شرکت با مسئولیت محدود">شرکت با مسئولیت محدود
                                                        </option>
                                                        <option value="شرکت های تضامنی">شرکت های تضامنی</option>
                                                        <option value="شرکت مختلط غیر سهامی">شرکت مختلط غیر سهامی</option>
                                                        <option value="شرکت مختلط سهامی">شرکت مختلط سهامی</option>
                                                        <option value="شرکت های نسبی">شرکت های نسبی</option>
                                                        <option value="شرکت های تعاونی تولید و مصرف">شرکت های تعاونی تولید
                                                            و
                                                            مصرف</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label required"> شناسه ملی </label>
                                                    <input type="text" name="national_id" class="form-control"
                                                        id="national_id" placeholder="شناسه ملی..." />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label required"> شماره ثبت </label>
                                                    <input type="text" name="registration_number" class="form-control"
                                                        id="registration_number" placeholder="شماره ثبت..." />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label required"> تاریخ ثبت </label>
                                                    <input type="text" name="registration_date"
                                                        class="datepicker form-control" id="registration_date"
                                                        placeholder="۱۴۰۱/۰۱/۰۱" />
                                                </div>
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
    $(document).ready(function () {
        $('#company_fields').hide();

        $('#account_type').change(function () {
            if ($(this).val() === 'حقوقی') {
                $('#company_fields').show();
            } else {
                $('#company_fields').hide();
            }
        });
    });
</script>
@endsection

