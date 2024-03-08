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
                    @if ($themes->count() > 0)

                        <div class="row">
                            @if ($activeTheme)
                                <div class="col-md-4">
                                    <div class="card">
                                        @if ($activeTheme->preview)
                                            <img class="w-100 object-fit-contain"
                                                 src="{{ asset(ert('theme-path') . $activeTheme->preview) }}">
                                        @else
                                            <img class="card-img-top w-100 object-fit-contain" style="height: 166px;"
                                                 src="{{ asset('images/no-img-theme.jpg') }}">
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $activeTheme->label }}</h5>
                                            <p class="card-text">{{ $activeTheme->slogan }}</p>
                                            <ton class="btn btn-success">فعال شده</ton>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            @foreach ($themes as $theme)
                                <div class="col-md-3">
                                    <div class="card">
                                        @if ($theme->preview)
                                            <img class="w-100 object-fit-contain"
                                                 src="{{ asset(ert('theme-path') . $theme->preview) }}">
                                        @else
                                            <img class="w-100 object-fit-contain"
                                                 src="{{ asset('images/no-img-theme.jpg') }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $theme->label }}</h5>
                                            <p class="card-text">{{ $theme->slogan }}</p>
                                                <a href="{{ route('theme.activeTheme', $theme->name) }}"
                                                   class="btn btn-primary">فعالسازی</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-danger m-2 text-center">هیچ قالبی جهت فعالسازی در سامانه تعریف نشده است.</div>
                    @endif

                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
