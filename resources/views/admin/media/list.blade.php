@extends('admin.master')
@section('title', 'Media List')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/dropzone.min.css') }}">
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('رسانه') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="dropzone" id="dropzone" method="post" action="{{ route('mediaUpload') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="type" id="type" value="media">
                                    <input type="hidden" name="filepath" id="filepath">
                                    <input type="hidden" name="filename" id="filename">
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" id="result">{{ $mediaModel->list() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/dropzone.min.js') }}"></script>
    <script type="text/javascript">

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $(document.body).on("click", ".delete-confirm", function() {
            var form =  $(this).closest("form");
            event.preventDefault();

            Swal.fire({
                title: "اخطار",
                text: "آیا از حذف این فایل اطمینان دارید؟",
                icon: "warning",
                showDenyButton: true,
                confirmButtonText: "بله",
                denyButtonText: "خیر"
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('mediaDelete') }}",
                        data: {
                            id: $(this).data('id')
                        },
                        success: function (data) {
                            $("#result").html(data);
                            Swal.fire({
                                title: "موفق",
                                text: "فایل با موفقیت حذف شد.",
                                icon: "success"
                            });
                        },
                        error: function (data) {
                            Swal.fire({
                                title: "خطا",
                                text: data.responseJSON.message,
                                icon: "error"
                            });
                        }
                    });
                } else if (result.isDenied) {
                    //
                }
            });
        });

        function copyToClipboard() {
            var textBox = document.getElementById("fileUrl");
            textBox.select();
            document.execCommand("copy");
            $(this).prop("disabled", true);
        }

        Dropzone.options.dropzone = {
            dictDefaultMessage: "اینجا کلیک و فایل یا فایل های مورد نظر خود را انتخاب نمایید.",
            maxFilesize: 12,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4",
            addRemoveLinks: false,
            timeout: 5000000,
            success: function (file, response) {

                let loading = "Loading...";
                $("#result").html(loading);

                $.ajax({
                    type: "POST",
                    url: "{{ route('mediaList') }}",
                    data: { },
                    success: function (data) {
                        $("#result").html(data);
                        Swal.fire({
                            title: "موفق",
                            text: "اطلاعات با موفقیت ثبت شد.",
                            icon: "success"
                        });
                    },
                    error: function (data) {
                        console.log(data);
                        Swal.fire({
                            title: "خطا",
                            text: data.responseJSON.message,
                            icon: "error"
                        });
                    }
                });

            }
        }
    </script>
@endsection
