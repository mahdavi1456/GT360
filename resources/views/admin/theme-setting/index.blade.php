@extends('admin.master')
@section('title', 'تنظیمات قالب')
@section('style')
    <style>
        tr td {
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
            $themeName = $settingModel->getSetting('active_theme', $account->id, 0);
        @endphp
        {{ breadcrumb(' تنظیمات قالب - ' . $themeName) }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card" id="outer-div">
                            <form id="setting-form" action="{{ route('setting.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="action_type" value="theme">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="row">
                                            <div class="col-12">
                                                @foreach ($errors->all() as $error)
                                                    <div class="alert alert-danger">{{ $error }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @include("front.theme.$themeName.setting")
                                </div>
                                <div class="card-footer text-left">
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script>
        function getImages() {
            let imageNames = {};
            $.each($('input[type=file]'), function(i, ele) {
                imageNames['key' + i] = $(ele).attr('name');
                // imageNames.push(['key'+i=:]);
            });

            //console.log(imageNames);

            $.ajax({
                type: 'get',
                url: "{{ route('setting.getImages') }}",
                data: imageNames,
                success: function(response) {
                    //console.log(response);
                    $('#image-part').remove();
                    $('#outer-div').append(response);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });

        }
        getImages();

        function resetFile() {
            $('input[type="file"]').val('');
        }

        function destroyImage(key) {
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
                        url: "{{route('setting.destroyImage')}}",
                        data:{
                            'key':key
                        },
                        success: function(data) {
                            getImages();
                            $("#loading-overlay").fadeOut();
                            Swal.fire({
                                title: "موفق",
                                text: 'تصویر با موفقیت حذف شد',
                                icon: "success"
                            });

                        },
                        error: function(data) {
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

        function uploadImage() {
            var form = $('#setting-form');
            var formData = new FormData(form[0]);
            formData.append('send_type', "ajax");
            $("#loading-overlay").fadeIn();
            $.ajax({
                type: 'post',
                url: "{{ route('setting.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    getImages();
                    resetFile();
                    $("#loading-overlay").fadeOut();
                    Swal.fire({
                        title: "موفق",
                        text: "فایل و اطلاعات ذخیره شدند",
                        icon: "success"
                    });
                },
                error: function(response) {
                    $("#loading-overlay").fadeOut();
                    alert('error');
                    console.log(response);
                }
            });
        }
    </script>
@endsection
