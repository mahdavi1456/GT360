@extends('admin.master')
@section('title', 'میز کار')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('میز کار') }}
        <section class="content">
            <div class="container-fluid">
                @if (!auth()->user()->accountFieldsCompleted())
                    <div class="alert alert-danger">
                        لطفا از منوی سمت راست فرم تکمیل اطلاعات را پر کنید. در غیر این صورت قادر به استفاده از
                        امکانات پنل نخواهید بود.
                    </div>
                @endif
                @if (!auth()->user()->slug())
                    <div class="alert alert-warning">
                        نام سایت ثبت نشده جهت ثبت <a
                            href="{{ route('account.profile.edit', auth()->user()->account->id) }}">کلیک کنید</a>
                    </div>
                @endif
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6 bg-info text-center p-4">
                                        <i class="fa fa-calendar" style="font-size:48px;"></i>
                                    </div>
                                    <div class="col-6 text-center p-4">
                                        تاریخ :
                                        @php
                                            echo verta()->format('Y/m/d');
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6 bg-primary text-center p-4">
                                        <i class="fa fa-clock-o" style="font-size:48px;"></i>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center p-4">
                                        ساعت :
                                        @php
                                            echo verta()->format('H:i');
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6 bg-success text-center p-4">
                                        <i class="fa fa-eye " style="font-size:48px;color: white;"></i>
                                    </div>
                                    <div class="col-6 text-center p-4">
                                        بازدید سایت :
                                        {{ convertToPersian(12344324) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
