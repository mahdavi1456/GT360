@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb("دسته بندی محصولات") }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger  justify-content-center mt-4">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="">قالب پیشفرض</label>
                                            <select class="custom-select" name="default_theme">
                                                @foreach ($themes  as $theme )
                                                    <option
                                                        @selected($defaultTheme==$theme->name) value="{{$theme->name}}">{{$theme->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">عنوان سایت <span class="text-danger">*</span></label>
                                                <input type="text" name="settings[title]" class="form-control" id="title" placeholder="عنوان سایت..." value = "{{ getSetting('title') }}" required oninvalid="this.setCustomValidity('.لطفا عنوان را وارد کنید')"
                                                oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">توضیحات سایت <span class="text-danger">*</span></label>
                                                <textarea name="settings[description]" class="form-control" id="description" placeholder="توضیحات..." required oninvalid="this.setCustomValidity('.لطفا توضیحات را وارد کنید')"
                                                oninput="this.setCustomValidity('')">{{ getSetting('description') }}</textarea>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
