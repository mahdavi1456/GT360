@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{ breadcrumb('انتخاب فهرست') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <form  action="{{ route('theme.navStore', $theme->id) }}" method="POST">
                                    @csrf
                                    <select name="navs[]" class="custom-select" multiple>
                                        @foreach ($navs as $nav)
                                            <option @selected(in_array($nav->id,$pluck)) value="{{ $nav->id }}">{{ $nav->name }}</option>
                                        @endforeach

                                    </select>
                                    <div class="col-12 text-center mt-3">
                                        <button type="submit" class="btn btn-primary">اعمال</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">

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
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')

@endsection
