@extends('admin.master')
@section('title', 'میز کار')
@section('style')
    <style type="text/css">
        td {
            vertical-align: middle !important;
        }
    </style>
@endsection
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
                @if (session('project_id'))
                    @if (!auth()->user()->slug())
                        <div class="alert alert-warning">
                            <b>نام سایت ثبت نشده جهت ثبت</b>
                            <a href="{{ route('accountSite.edit', auth()->user()->account->id) }}">کلیک کنید</a>
                        </div>
                    @endif
                    @if (!$setting->getSetting('active_theme'))
                        <div class="alert alert-warning">
                            <b>شما قالب فعال ندارید. برای فعال کردن قالب</b>
                            <a href="{{ route('theme.choose', auth()->user()->account->id) }}">کلیک کنید</a>
                        </div>
                    @endif
                    @if (auth()->user()->slug() and $setting->getSetting('active_theme', auth()->user()->account->id))
                        <div class="alert alert-warning">
                            <a href="{{ route('enterSite', auth()->user()->slug()) }}" target="_blank" class="nav-link">ورود
                                به
                                سایت</a>
                        </div>
                    @endif
                    @else
                    <div class="alert alert-danger">
                    لطفا در ابتدا پروژه مورد نظر را انتخاب کنید
                    </div>
                @endif
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6 bg-info text-center p-4">
                                        <i class="fa fa-calendar" style="font-size:48px;"></i>
                                    </div>
                                    <div class="col-6 text-center p-4">
                                        <b>امروز: </b>
                                        @php
                                            echo convertToPersian(verta()->format('Y/m/d'));
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6 bg-primary text-center p-4">
                                        <i class="fa fa-clock-o" style="font-size:48px;"></i>
                                    </div>
                                    <div class="col-6 d-flex justify-content-center p-4">
                                        <b>ساعت: </b>
                                        @php
                                            echo convertToPersian(verta()->format('H:i'));
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-6 bg-success text-center p-4">
                                        <i class="fa fa-eye " style="font-size:48px;color: white;"></i>
                                    </div>
                                    <div class="col-6 text-center p-4">
                                        <b>بازدید امروز: </b>
                                        {{ convertToPersian(App\Models\Visit::dashboardDayVisit()) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('project.create') }}"
                                            class="pull-left btn btn-info text-white">افزودن جدید</a>
                                        <h5 class="pull-right">پروژه های من</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($projects->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>لوگو</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>
                                                    <img class="object-fit-contain" style="width: 150px"
                                                        src="{{ $project->logo ? asset(ert('aip') . $project->logo) : asset('v1/images/logo.png') }}"
                                                        alt="logo">
                                                </td>
                                                <td>{{ $project->title }}</td>
                                                <td>{!! $project->description !!}</td>
                                                <td>
                                                    @if (session('project_id') == $project->id)
                                                        <button class="  btn btn-success btn-sm m-1"> پروژه فعال </button>
                                                    @else
                                                        <a href="{{ route('dashboard', ['project' => $project->id]) }}"
                                                            class="btn btn-sm btn-primary m-1">فعال کردن</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger m-2 text-center">موردی جهت نمایش موجود نیست.</div>
                                @endif
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
        //alert('ff');
        // $('.project-status').on('click',function () {
        //    // alert('ff');
        //     $("#loading-overlay").fadeIn();
        //     let id=$(this).attr('item-id');
        //     $.ajax({
        //         type: 'get',
        //         url: "{{ url()->current() }}",
        //         data: {
        //             project:id
        //         },
        //         success: function(respnse) {
        //             $("#loading-overlay").fadeOut();
        //             $('td.b-b-p button').attr('class','project-status btn btn-sm btn-primary m-1');
        //             $(`.project-status[item-id=${id}]`).attr('class','project-status btn btn-success btn-sm m-1').html('پروژه فعال');
        //             Swal.fire({
        //                 title: "موفق",
        //                 text: "پروژه خواسته شده فعال شد",
        //                 icon: "success"
        //             });
        //         },
        //         error: function(respnse) {
        //             alert('eroor');
        //             console.log(respnse);
        //         }
        //     });
        // });
        // $(document).ready(function() {
        //     $('#company_fields').hide();

        //     $('#account_type').change(function() {
        //         if ($(this).val() === 'حقوقی') {
        //             $('#company_fields').show();
        //         } else {
        //             $('#company_fields').hide();
        //         }
        //     });
        // });
    </script>
@endsection
