@extends('admin.master')
@section('title', 'تنظیمات قالب')
@section('style')
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb(' تنظیمات قالب  '. projectName() . '-' . $themeName) }}
        <section class="content">
            <div class="container-fluid">
                @include('admin.partial.error')
                <div class="row">
                    <div class="col-12">
                        <div class="card" id="outer-div">
                            <form id="setting-form" action="{{ route('setting.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="action_type" value="theme">
                                <div class="card-body">
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
                    // $(ele).parent().find('.imageLoader').remove();
                    // $(ele).parent().append(response);
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
                            $("#loading-overlay").fadeOut();
                            $(`input[name="${key}"]`).parent().find('.imageLoader').remove();
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

        function uploadImage(ele) {
            var formData = new FormData();
            formData.append('send_type', "ajax");
            var image=$(ele).prop('files')[0];
           // console.log($(ele).attr);
            formData.append($(ele).attr('name'),image);
            formData.append('_token',"{{csrf_token()}}");
            $("#loading-overlay").fadeIn();
            $.ajax({
                type: 'post',
                url: "{{ route('setting.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $(ele).parent().find('.imageLoader').remove();
                    $(ele).parent().append(response);
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
        // function uploadImage(ele) {
        //     var form = $('#setting-form');
        //     var formData = new FormData(form[0]);
        //     formData.append('send_type', "ajax");
        //     $("#loading-overlay").fadeIn();
        //     $.ajax({
        //         type: 'post',
        //         url: "{{ route('setting.store') }}",
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: function(response) {
        //             getImages();
        //             resetFile();
        //             $("#loading-overlay").fadeOut();
        //             Swal.fire({
        //                 title: "موفق",
        //                 text: "فایل و اطلاعات ذخیره شدند",
        //                 icon: "success"
        //             });
        //         },
        //         error: function(response) {
        //             $("#loading-overlay").fadeOut();
        //             alert('error');
        //             console.log(response);
        //         }
        //     });
        // }
    </script>
@endsection
