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

        <a href="{{ route('users.create', ['accountId' => $account->id]) }}" class="btn btn-primary">ایجاد کاربر</a>

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
                                            <th class="px-4">نام</th>
                                            <th class="px-4">نام خانوادگی</th>
                                            <th class="px-4">موبایل</th>
                                            <th class="px-4">ایمیل</th>
                                            <th class="px-4">نام کاربری</th>
                                            <th class="px-4">وضعیت کاربر</th>
                                            <th class="px-4">استان</th>
                                            <th class="px-4">شهر</th>
                                            <th class="px-4">آدرس</th>
                                            <th class="px-4">کد پستی</th>
                                            <th class="px-4">عملیات</th>
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
                                                <td><a href="{{ route('user.editUser', ['accountId' => $account->id, 'userId' => $user->id]) }}" class="btn btn-warning">ویرایش</a>
                                                <form action="{{ route('account.users.destroy', ['accountId' => $account->id, 'userId' => $user->id]) }}" class="mt-1" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف کاربر</button>
                                                </form>
                                            </td>
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
