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
        @php
            $project = App\Models\Project::checkOpenProject(auth()->user()->account->id);
        @endphp
        {{ breadcrumb('میز کار ' . App\Models\Project::getProjectName($project->project_id)) }}
        <section class="content">
            <div class="container-fluid">
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
