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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if(count($accounts) > 0)
                                <table class="table-responsive table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="px-4">شماره</th>
                                            <th class="px-4">نوع اکانت</th>
                                            <th class="px-4">نام</th>
                                            <th class="px-4">نام خانوادگی</th>
                                            <th class="px-4">موبایل</th>
                                            <th class="px-4">تلفن</th>
                                            <th class="px-4">ایمیل</th>
                                            <th class="px-4">تاریخ تولد</th>
                                            <th class="px-4">کد ملی</th>
                                            <th class="px-4">استان</th>
                                            <th class="px-4">شهر</th>
                                            <th class="px-4">آدرس</th>
                                            <th class="px-4">کدپستی</th>
                                            <th class="px-4">شرکت</th>
                                            <th class="px-4">نوع شرکت</th>
                                            <th class="px-4">شناسه ملی شرکت</th>
                                            <th class="px-4">شماره ثبت شرکت</th>
                                            <th class="px-4">تاریخ ثبت شرکت</th>
                                            <th class="px-4">وضعیت اکانت</th>
                                            <th class="px-4">عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->id }}</td>
                                                <td>{{ $account->account_type }}</td>
                                                <td>{{ $account->name }}</td>
                                                <td>{{ $account->family }}</td>
                                                <td>{{ $account->mobile }}</td>
                                                <td>{{ $account->phone }}</td>
                                                <td>{{ $account->email }}</td>
                                                <td>{{ $account->birthday }}</td>
                                                <td>{{ $account->mellicode }}</td>
                                                <td>{{ $account->state }}</td>
                                                <td>{{ $account->city }}</td>
                                                <td>{{ $account->address }}</td>
                                                <td>{{ $account->postalcode }}</td>
                                                <td>{{ $account->company }}</td>
                                                <td>{{ $account->company_type }}</td>
                                                <td>{{ $account->national_id }}</td>
                                                <td>{{ $account->registration_number }}</td>
                                                <td>{{ $account->registration_date }}</td>
                                                <td>{{ $account->account_status }}</td>
                                                <td>
                                                    <a href="{{ route('account.showUsers', ['accountId' => $account->id]) }}" class="btn btn-primary">مشاهده کاربران</a>
                                                    <a href="{{ route('account.edit', $account->id) }}"
                                                        class="btn btn-primary">ویرایش</a>
                                                    <form action="{{ route('account.destroy', $account->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
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
