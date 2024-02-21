@extends('admin.master')
@section('title', 'میز کار')
@section('style')
    <style type="text/css">
        td {
            vertical-align: middle !important;
        }
        .custom-title-class{
            font-size: x-small;

        }
        .custom-icon-class{
            font-size: 8px;
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
            if ($project) {
                $projectName = App\Models\Project::getProjectName($project->project_id);
            } else {
                $projectName = '';
            }
        @endphp
        {{ breadcrumb('میز کار ' . $projectName) }}
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
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary">
                            <p>کد معرف: {{ auth()->user()->account_id }}</p>
                            <p>لینک معرف:
                                <span
                                    class="ref-link">{{ route('register', ['ref_id'=> auth()->user()->account_id]) }}</span>
                                <button class="btn btn-outline-primary mr-3 btn-sm" onclick="copyContent('.ref-link')"> کپی
                                    کردن</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        function copyContent(selector) {

            var element = document.querySelector(selector);
            var textarea = document.createElement('textarea');
            textarea.value = element.innerText;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            Swal.fire({
                position: "bottom-end",
                icon: "success",
                title: "لینک معرف کپی شد",
                showConfirmButton: false,
                customClass: {
                    title: 'custom-title-class',
                    icon: 'custom-icon-class'
                },
                timer: 1000,
                width: '300px',
            });

        }

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
