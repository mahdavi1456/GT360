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

        {{ TextHelper::breadcrumb("ایجاد کاربر برای اکانت :  $account->name") }}

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
                                <form action="{{ route('users.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="name" id="name" placeholder="نام ..." class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label">نام خانوادگی <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="family" id="family" placeholder="نام خانوادگی..." class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> موبایل <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="mobile" id="mobile" placeholder="موبایل..." class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> ایمیل <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="email" id="email" placeholder="ایمیل..." class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> استان </label>
                                                <input type="text" name="state" class="form-control" id="state" placeholder="استان..."/>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> شهر </label>
                                                <input type="text" name="city" class="form-control" id="city" placeholder="شهر..."/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required"> آدرس </label>
                                                <input type="text" name="address" class="form-control" id="address" placeholder="آدرس..."/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> کدپستی </label>
                                                <input type="text" name="postalcode" class="form-control" id="postalcode" placeholder="کدپستی..."/>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> نام کاربری </label>
                                                <input type="text" name="username" class="form-control" id="username" placeholder="نام کاربری..." required/>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> رمز عبور </label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="رمز عبور..." required/>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="form-label required"> تأیید رمزعبور: </label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="تایید رمز عبور..."/>
                                        </div>
                                    </div>
                                    <input type="hidden" name="account_id" class="form-control" id="account_id" value="{{ $account->id }}"/>
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
