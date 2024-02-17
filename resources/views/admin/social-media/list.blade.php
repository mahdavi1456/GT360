@extends('admin.master')
@section('title', 'شبکه های اجتماعی')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('شبکه های اجتماعی') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">شبکه های اجتماعی</h3>
                            </div>
                            <form name="data" action="{{ route('social-media.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label">عنوان</label>
                                            <input type="text" name="follow_us_title" class="form-control" placeholder="عنوان..." value="{{ $settingModel->getSetting("follow_us_title", $accountId, $projectId) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Instagram <i class="fa fa-instagram"></i></label>
                                            <input type="text" name="instagram" class="form-control ltr" placeholder="Instagram..." value="{{ $settingModel->getSetting("instagram", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Youtube <i class="fa fa-youtube"></i></label>
                                            <input type="text" name="youtube" class="form-control ltr" placeholder="Youtube..." value="{{ $settingModel->getSetting("youtube", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Facebook <i class="fa fa-facebook"></i></label>
                                            <input type="text" name="facebook" class="form-control ltr" placeholder="Facebook..." value="{{ $settingModel->getSetting("facebook", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">X <i class="fa fa-twitter"></i></label>
                                            <input type="text" name="x" class="form-control ltr" placeholder="X..." value="{{ $settingModel->getSetting("x", $accountId, $projectId) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Linkedin <i class="fa fa-linkedin"></i></label>
                                            <input type="text" name="linkedin" class="form-control ltr" placeholder="Linkedin..." value="{{ $settingModel->getSetting("linkedin", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Google Plus <i class="fa fa-google-plus"></i></label>
                                            <input type="text" name="google_plus" class="form-control ltr" placeholder="Google Plus..." value="{{ $settingModel->getSetting("google_plus", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">RSS <i class="fa fa-rss"></i></label>
                                            <input type="text" name="rss" class="form-control ltr" placeholder="RSS..." value="{{ $settingModel->getSetting("rss", $accountId, $projectId) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Telegram <i class="fa fa-send-o"></i></label>
                                             <input type="text" name="telegram" class="form-control ltr" placeholder="Telegram..." value="{{ $settingModel->getSetting("telegram", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Behance <i class="fa fa-behance"></i></label>
                                            <input type="text" name="behance" class="form-control ltr" placeholder="Behance..." value="{{ $settingModel->getSetting("behance", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Dribble <i class="fa fa-dribbble"></i></label>
                                            <input type="text" name="dribble" class="form-control ltr" placeholder="Dribble..." value="{{ $settingModel->getSetting("dribble", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Pinterest <i class="fa fa-pinterest"></i></label>
                                            <input type="text" name="pinterest" class="form-control ltr" placeholder="Pinterest..." value="{{ $settingModel->getSetting("pinterest", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">ایتا</label>
                                            <input type="text" name="ieta" class="form-control ltr" placeholder="ایتا..." value="{{ $settingModel->getSetting("ieta", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">بله</label>
                                            <input type="text" name="bale" class="form-control ltr" placeholder="بله..." value="{{ $settingModel->getSetting("bale", $accountId, $projectId) }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">روبیکا</label>
                                            <input type="text" name="rubika" class="form-control ltr" placeholder="روبیکا..." value="{{ $settingModel->getSetting("rubika", $accountId, $projectId) }}">
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
