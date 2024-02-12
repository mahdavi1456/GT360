@extends('admin.master')
@section('title', 'تخصیص فهرست به قالب')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('تخصیص فهرست به قالب') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @if ($errors->any())
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="card">
                    <form  action="{{ route('theme.navStore', $theme->id) }}" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    @csrf
                                    <label> فهرست ها</label>
                                    <select name="navs[]" class="custom-select select2" multiple>
                                        <option value="">انتخاب کنید...</option>
                                        @foreach ($navs as $nav)
                                            <option @selected(in_array($nav->id,$pluck)) value="{{ $nav->id }}">{{ $nav->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label> لیست فهرست ها</label>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-group-item-action active">
                                            <strong>فهرست های مربوط به قالب {{ $theme->name }}</strong>
                                        </li>
                                        @foreach ($themNavs as $nav)
                                            <li class="list-group-item">{{ $nav->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-success">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
