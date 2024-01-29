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
                        <div class="card">
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
                </form>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        function uploadImage() {
            var form = $('#seeting-form');
            var formData = new FormData(form[0]);
            formData.append('_token',"{{csrf_token()}}")
            $.ajax({
                type: 'post',
                url: "{{ route('setting.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert('yes');
                    console.log(response);
                },
                error: function(response) {
                    alert('error');
                    console.log(response);
                }
            });
        }
    </script>
@endsection
