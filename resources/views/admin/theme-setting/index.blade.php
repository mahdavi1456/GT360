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
                            <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
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
                                    @if ($themeName = $settingModel->getSetting('active_theme', $account->id))
                                        @include("front.theme.$themeName.setting")
                                    @else
                                        @php
                                            $themeName = $settingModel->getSetting('default_theme', 0)
                                        @endphp
                                        @include("front.theme.$themeName.setting")
                                    @endif
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
