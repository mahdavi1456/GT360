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

        {{ TextHelper::breadcrumb("کاربران مرتبط با اکانت: $account->name") }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                @if(count($users) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>نام</th>
                                            <th>نام خانوادگی</th>
                                            <th>موبایل</th>
                                            <th>ایمیل</th>
                                            <th>نام کاربری</th>
                                            <th>وضعیت کاربر</th>
                                            <th>استان</th>
                                            <th>شهر</th>
                                            <th>آدرس</th>
                                            <th>کد پستی</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->family }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->user_status }}</td>
                                                <td>{{ $user->state }}</td>
                                                <td>{{ $user->city }}</td>
                                                <td>{{ $user->address }}</td>
                                                <td>{{ $user->postalcode }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="alert alert-danger text-center"> موردی جهت نمایش موجود نیست. </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
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
