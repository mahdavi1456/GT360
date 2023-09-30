@extends('admin.master')
@section('title', 'Account')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('حساب کاربری') }}

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
                                                <td class="w-auto text-center">{{ $account->id }}</td>
                                                <td class="w-auto text-center">{{ $account->account_type }}</td>
                                                <td class="w-auto text-center">{{ $account->name }}</td>
                                                <td class="w-auto text-center">{{ $account->family }}</td>
                                                <td class="w-auto text-center">{{ $account->mobile }}</td>
                                                <td class="w-auto text-center">{{ $account->phone }}</td>
                                                <td class="w-auto text-center">{{ $account->email }}</td>
                                                <td class="w-auto text-center">@if($account->birthday) {{  verta($account->birthday)->formatDate(); }} @endif</td>
                                                <td class="w-auto text-center">{{ $account->mellicode }}</td>
                                                <td class="w-auto text-center">{{ $account->state }}</td>
                                                <td class="w-auto text-center">{{ $account->city }}</td>
                                                <td class="w-auto text-center">{{ $account->address }}</td>
                                                <td class="w-auto text-center">{{ $account->postalcode }}</td>
                                                <td class="w-auto text-center"{{ $account->company }}</td>
                                                <td class="w-auto text-center">{{ $account->company_type }}</td>
                                                <td class="w-auto text-center">{{ $account->national_id }}</td>
                                                <td class="w-auto text-center">{{ $account->registration_number }}</td>
                                                <td class="w-auto text-center">{{ $account->registration_date }}</td>
                                                <td class="w-auto text-center">{{ $account->account_status }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('user.showUsers', ['accountId' => $account->id]) }}" class="btn btn-primary m-1">مشاهده کاربران</a>
                                                    <a href="{{ route('account.edit', $account->id) }}"
                                                        class="btn btn-warning m-1">ویرایش</a>
                                                    <form action="{{ route('account.destroy', $account->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger m-1"
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
