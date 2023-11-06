@extends('admin.master')
@section('title', 'Account')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('داشبورد') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (is_null(Auth::user()->account->slug))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            لطفا از منوی سمت راست فرم تکمیل اطلاعات را پر کنید. در غیر این صورت قادر به استفاده از امکانات پنل نخواهید بود.
                        </div>
                    </div>
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

                                <div class="col-6 text-center p-4">
                                    ساعت :
                                    @php
                                        echo verta()->format('H:i');
                                    @endphp

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
