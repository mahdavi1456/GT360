@extends('admin.master')
@section('title', 'create form')
@section('content')
    {{-- @include('sweetalert::alert') --}}
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb(' فرم تغییر رمز') }}

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
                                <form action="{{ route('storePassword') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group ">
                                                <div class="col-4 m-auto">
                                                    <label class="required">رمز عبور <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="password" class="form-control"
                                                        value="" placeholder="رمز عبور ..." required
                                                        oninvalid="this.setCustomValidity(' رمز عبور  را وارد نمایید.')"
                                                        oninput="this.setCustomValidity('')">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-4 m-auto">
                                                    <label class="required">رمز عبور جدید <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" name="newPassword" class="form-control"
                                                        value="" placeholder="رمز عبور جدید..." required
                                                        oninvalid="this.setCustomValidity('رمز جدید را وارد نمایید.')"
                                                        oninput="this.setCustomValidity('')">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-4 m-auto">
                                                    <label class="required">تکرار رمز عبور<span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" name="newPassword_confirmation" class="form-control"
                                                        value="" placeholder="تکرار رمز عبور..." required
                                                        oninvalid="this.setCustomValidity(' تکرار رمز را وارد نمایید.')"
                                                        oninput="this.setCustomValidity('')">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-success">تغییر رمز</button>
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

@endsection
@section('style')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css"/> --}}
@endsection
