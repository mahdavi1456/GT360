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
                @if ($errors->any())
                    <div class="row">
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" name="action_type" value="theme">
                        @if ($themeName = $settingModel->getSetting('active_theme', $account->id))
                            @include("front.theme.$themeName.setting")
                        @else
                            @php
                                $themeName = $settingModel->getSetting('default_theme', 0)
                            @endphp
                            @include("front.theme.$themeName.setting")
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success w-100">ذخیره</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
