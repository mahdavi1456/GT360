@extends('admin.master')
@section('title', 'ایجاد نوع پرداخت')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('ایجاد نوع پرداخت') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger"><b>اخطار: </b>{{ $error }}</div>
                                        @endforeach
                                    @endif
                                @endif
                                <form method="POST" action="{{ route('payments_type.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="required">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="نام..." value="{{ old('name') }}" required
                                                    oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>آیکون</label>
                                                <input type="text" name="icon" class="form-control" id="icon"
                                                    placeholder="آیکون..." value="{{ old('icon') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>ترتیب نمایش <span class="text-danger">*</span></label>
                                                <select name="display_order" id="display_order" class="form-control"
                                                    required
                                                    oninvalid="this.setCustomValidity('.لطفا ترتیب نمایش را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="">انتخاب کنید</option>
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>وضعیت <span class="text-danger">*</span></label>
                                                <select name="status" class="form-control" id="status" required
                                                    oninvalid="this.setCustomValidity('.لطفا وضعیت را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="">انتخاب کنید...</option>
                                                    <option value="active">فعال</option>
                                                    <option value="inactive">غیرفعال</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>توضیحات</label>
                                                <textarea name="description" class="form-control" id="description" placeholder="توضیحات...">{{ old('description') }}</textarea>
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
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/dropzone.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/dropzone.css" type="text/css" />
@endsection

@section('scripts')

    <script src="{{ asset('js/validation.js') }}"></script>

@endsection
