@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb("حمل و نقل") }}

        <!-- Main content -->
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
                                <form action="{{ route('transport.update', $transport->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">عنوان <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') ?? $transport->title }}"
                                                    placeholder="عنوان..." required oninvalid="this.setCustomValidity('.لطفا عنوان را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required">هزینه (تومان) <span class="text-danger">*</span></label>
                                                <input type="text" name="tprice" class="form-control" id="tprice"  value="{{  old('tprice') ??  $transport->tprice }}"
                                                    placeholder="هزینه..." required oninvalid="this.setCustomValidity('.لطفا هزینه را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label required">توضیحات</label>
                                                <textarea name="tdetails" class="form-control" id="tdetails" placeholder="توضیحات...">{{ old('tdetails') ?? $transport->tdetails }}</textarea>
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
