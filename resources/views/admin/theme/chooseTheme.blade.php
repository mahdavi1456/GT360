@extends('admin.master')
@section('title', 'انتخاب قالب')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb("انتخاب قالب") }}
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-0">
                            @if ($themes->count() > 0)
                                <div class="row">
                                    @foreach ($themes as $theme)
                                        @if ($themeName == $theme->name)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    @if ($theme->preview)
                                                        <img class="w-100 object-fit-contain"
                                                             src="{{ asset(ert('theme-path') . $theme->preview) }}">
                                                    @else
                                                        <img class="card-img-top"
                                                             src="{{ asset('images/no-img-theme.jpg') }}">
                                                    @endif
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $theme->label }}</h5>
                                                        <p class="card-text">{{ $theme->slogan }}</p>
                                                        @if ($themeName == $theme->name)
                                                            <button class="btn btn-success">فعال شده</button>
                                                        @else
                                                            <a href="{{ route('theme.activeTheme', $theme->name) }}"
                                                               class="btn btn-primary">فعالسازی</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-danger m-2 text-center">هیچ قالبی جهت فعالسازی در سامانه تعریف
                                    نشده است.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
