@extends('admin.master')
@section('title', 'تنظیمات قالب')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('تنظیمات قالب') }}
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
                                    @php
                                        $themeName = $settingModel->getSetting('active_theme', $account->id);
                                    @endphp
                                    @include("front.theme.$themeName.setting")

                                </div>
                                <div class="card-footer text-left">
                                    <button type="submit" class="btn btn-success">ذخیره</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        // let imageNames = [];
        // $.each($('input[type=file]'), function(i, ele) {
        //     imageNames.push($(ele).attr('name'));
        // });
        // if (imageNames.length > 0) {
        //     imageNames['send_type'] = 'get-images';
        //     $.ajax({
        //         type: 'get',
        //         url: "{{ route('setting.store') }}",
        //         data: imageNames,
        //         success: function(response) {
        //             $('#image-part').remove();
        //             $('#outer-div').append(response);
        //             Swal.fire({
        //                 title: "موفق",
        //                 text: "فایل و اطلاعات ذخیره شدند",
        //                 icon: "success"
        //             });

        //         },
        //         error: function(response) {
        //             alert('error');
        //             console.log(response);
        //         }
        //     });
        // }

        function uploadImage() {

            var form = $('#setting-form');
            var formData = new FormData(form[0]);
            formData.append('send_type', "ajax")
            $.ajax({
                type: 'post',
                url: "{{ route('setting.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#image-part').remove();
                    $('#outer-div').append(response);
                    Swal.fire({
                        title: "موفق",
                        text: "فایل و اطلاعات ذخیره شدند",
                        icon: "success"
                    });

                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });
        }
    </script>
@endsection
