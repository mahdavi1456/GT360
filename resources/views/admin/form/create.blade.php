@extends('admin.master')
@section('title', 'create form')
@section('content')
    {{-- @include('sweetalert::alert') --}}
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('ایجاد فرم') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
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
                                <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="theme_id" value="{{ request('theme_id') }}">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="required">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ old('title') }}" placeholder="نام..." required
                                                    oninvalid="this.setCustomValidity('نام بخش را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('scripts')


    <script src="{{ asset('js/validation.js') }}"></script>

@endsection
@section('style')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css"/> --}}
@endsection
