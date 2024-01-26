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
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Instagram <i class="fa fa-instagram"></i></label>
                                            <input type="text" name="instagram" class="form-control ltr" placeholder="Instagram..." value="{{ $settingModel->getSetting("instagram") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Youtube <i class="fa fa-youtube"></i></label>
                                            <input type="text" name="youtube" class="form-control ltr" placeholder="Youtube..." value="{{ $settingModel->getSetting("youtube") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Facebook <i class="fa fa-facebook"></i></label>
                                            <input type="text" name="facebook" class="form-control ltr" placeholder="Facebook..." value="{{ $settingModel->getSetting("facebook") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">X <i class="fa fa-twitter"></i></label>
                                            <input type="text" name="x" class="form-control ltr" placeholder="X..." value="{{ $settingModel->getSetting("x") }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Telegram <i class="fa fa-send-o"></i></label>
                                            <input type="text" name="telegram" class="form-control ltr" placeholder="Telegram..." value="{{ $settingModel->getSetting("telegram") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Behance <i class="fa fa-behance"></i></label>
                                            <input type="text" name="behance" class="form-control ltr" placeholder="Behance..." value="{{ $settingModel->getSetting("behance") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Dribble <i class="fa fa-dribbble"></i></label>
                                            <input type="text" name="dribble" class="form-control ltr" placeholder="Dribble..." value="{{ $settingModel->getSetting("dribble") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">Pinterest <i class="fa fa-pinterest"></i></label>
                                            <input type="text" name="pinterest" class="form-control ltr" placeholder="Pinterest..." value="{{ $settingModel->getSetting("pinterest") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">ایتا</label>
                                            <input type="text" name="ieta" class="form-control ltr" placeholder="ایتا..." value="{{ $settingModel->getSetting("ieta") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">بله</label>
                                            <input type="text" name="bale" class="form-control ltr" placeholder="بله..." value="{{ $settingModel->getSetting("bale") }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="form-label">روبیکا</label>
                                            <input type="text" name="rubika" class="form-control ltr" placeholder="روبیکا..." value="{{ $settingModel->getSetting("rubika") }}">
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
