@extends('admin.master')
@section('title', 'تعریف متغیر نوع پرداخت')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('تعریف متغیر نوع پرداخت') }}

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
                                <form method="POST" action="{{ route('CreateAccountPaymentTypeVariable') }}">
                                    @csrf
                                    <div class="row">
                                        @foreach ($payment_type_variables as $payment_type_variable)
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label class="required"> {{ $payment_type_variable->label }} </label>
                                                    <input type="text" name="variable_values[]" class="form-control"
                                                        placeholder="{{ $payment_type_variable->label }}..."
                                                        value="{{ $payment_type_variable->variable_value }}">
                                                    <input type="hidden" name="variable_ids[]"
                                                        value="{{ $payment_type_variable->id }}">
                                                </div>
                                            </div>
                                        @endforeach
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
