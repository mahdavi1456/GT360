@extends('admin.master')
@section('title', 'تماس با ما')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('تماس با ما') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">تماس با ما</h3>
                            </div>
                            <form name="data" action="{{ route('contact.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label">آدرس نقشه گوگل <i class="fa fa-map-pin"></i></label>
                                            <input type="text" name="instagram" class="form-control ltr" placeholder="Google Map URL..." value="{{ $settingModel->getSetting("instagram") }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label">آدرس دفتر مرکزی</label>
                                            <input type="text" name="telegram" class="form-control ltr" placeholder="Telegram..." value="{{ $settingModel->getSetting("telegram") }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label">آدرس کارخانه</label>
                                            <input type="text" name="dribble" class="form-control ltr" placeholder="Dribble..." value="{{ $settingModel->getSetting("dribble") }}">
                                        </div>
                                    </div>
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
@endsection
