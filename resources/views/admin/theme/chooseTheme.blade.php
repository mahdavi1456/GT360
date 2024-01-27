@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb("انتخاب قالب") }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($themes as $theme )
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset('images/no-img.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{$theme->name}}</h5>
                              <p class="card-text">متن متن متن متن متن متن متن متن متن </p>
                              @if ($account->activeTheme()==$theme->name)
                                <button class="btn btn-success">فعال شده</button>
                              @else
                              <a href="{{route('theme.activeTheme',$theme->name)}}" class="btn btn-primary">فعالسازی</a>
                              @endif
                            </div>
                          </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')

@endsection
