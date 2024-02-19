@extends('admin.master')
@section('title', 'مدیریت فهرست ها')
@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        [data-toggle="collapse"] .fa:before {
            content: "\f139";
        }

        [data-toggle="collapse"].collapsed .fa:before {
            content: "\f13a";
        }

        .nav-info ul {
            list-style-type: none;
        }
        /* sort style */
        .mr-30{
            margin-right: 30px !important;
        }
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('مدیریت فهرست ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <div class="row">
                                    <h3 class="col-8 card-title">فهرست های قالب</h3>
                                    <div class="col-4">
                                        <form id="nav-list-form">
                                            <input type="hidden" name="type" value="get-nav-info">
                                            <select name="nav" class="custom-select select2" id="">
                                                <option selected value="">انتخاب فهرست...</option>
                                                @foreach ($navs as $nav)
                                                    <option value="{{ $nav->id }}">{{ $nav->label }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body nav-info p-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        //get info ajax
        $('select[name="nav"]').on('change', function() {
            $("#loading-overlay").fadeIn();
            let data = $('#nav-list-form').serialize();

            $.ajax({
                url: "{{ url()->current() }}",
                method: 'get',
                data: data,
                success: function(res) {
                    $('.nav-info').empty();
                    $('.nav-info').append(res);
                    $('.selectpicker').selectpicker({
                        noneSelectedText: 'بدون انتخاب'
                    });
                    $("#loading-overlay").fadeOut();

                },
                error: function(res) {
                    $("#loading-overlay").fadeOut();
                    Swal.fire({
                        title: "خطا",
                        text: res.responseJSON.message,
                        icon: "error"
                    });
                    console.log(res);
                }
            });
        });
        $('form').on('submit', function(e) {
            e.preventDefault();
        });
        //submit ajax function
        function submitForm(form) {
            $("#loading-overlay").fadeIn();
            let data = $(form).serialize();
            $.ajax({
                url: "{{ url()->current() }}",
                method: 'get',
                data: data,
                success: function(res) {
                    $('.nav-info').empty();
                    $('.nav-info').append(res);
                    $(form).parents('.collapse').addClass('show');
                    $('.selectpicker').selectpicker({
                        noneSelectedText: 'بدون انتخاب'
                    });
                    console.log(res);
                    $("#loading-overlay").fadeOut();

                },
                error: function(res) {
                    $("#loading-overlay").fadeOut();
                    Swal.fire({
                        title: "خطا",
                        text: res.responseJSON.message,
                        icon: "error"
                    });
                    console.log(res);
                }
            });
        }
        //edit form function
        function submiteditForm(e) {
            $("#loading-overlay").fadeIn();
            let data = $(e).parents('form').serialize();
            $.ajax({
                url: "{{ url()->current() }}",
                method: 'get',
                data: data,
                success: function(res) {
                    Swal.fire({
                        title: "موفق",
                        text: "تغییرات با موفقیت اعمال شد",
                        icon: "success"
                    });
                    console.log('edit',res);
                    $(e).parents('.card:first').find('h5 span').html(res.name);
                    $("#loading-overlay").fadeOut();
                },
                error: function(res) {
                    $("#loading-overlay").fadeOut();
                    Swal.fire({
                        title: "خطا",
                        text: res.responseJSON.message,
                        icon: "error"
                    });
                    console.log(res);
                }
            });
        }
        //delele itesm function
        function destroyItem(item, nav) {

            Swal.fire({
                title: "اطمینان دارید؟",
                text: "آیا از حذف این مورد اطمینان دارید؟",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "بله، مطمئنم.",
                cancelButtonText: "نه، پشیمون شدم."
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#loading-overlay").fadeIn();
                    $.ajax({
                        type: "get",
                        url: "{{ url()->current() }}",
                        data: {
                            'item_id': item,
                            'type': 'delete_item',
                            'nav_id': nav
                        },
                        success: function(res) {
                            Swal.fire({
                                title: "موفق",
                                text: 'آیتم انتخاب شده حذف شد',
                                icon: "success"
                            });
                            $('.nav-info').empty();
                            $('.nav-info').append(res);
                            $('.selectpicker').selectpicker({
                                noneSelectedText: 'بدون انتخاب'
                            });
                            $("#loading-overlay").fadeOut();
                        },
                        error: function(data) {
                            $("#loading-overlay").fadeOut();
                            Swal.fire({
                                title: "خطا",
                                text: data.responseJSON.message,
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
