@extends('admin.master')
@section('title', 'Product List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{ breadcrumb('تنظیمات فروشگاه') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">تب‌ها</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">روش های
                                            پرداخت</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">روش های
                                            ارسال</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">

                                        <form method="POST" action="{{ route('PaymentTypeToAccount') }}">
                                            @csrf
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th class="text-center">نام</th>
                                                    <th class="text-center">وضعیت <span class="text-danger">*</span></th>
                                                    <th class="text-center">مدیریت</th>
                                                </tr>

                                                <tr>
                                                    @foreach ($peyment_types as $payment_type)
                                                        <td>{{ fa_number($loop->index + 1) }}</td>
                                                        <td class="text-center">{{ $payment_type->name }}</td>
                                                        <input type="hidden" name="payment_type_id"
                                                            id="payment_type_id_{{ $payment_type->id }}"
                                                            value="{{ $payment_type->id }}">
                                                        <td>
                                                            <select name="payment_is_active" class="form-control"
                                                                id="payment_is_active_{{ $payment_type->id }}"
                                                                onchange="save_payment_type({{ $payment_type->id }})">
                                                                <option value="active" {{ auth()->user()->account->paymentTypes->contains($payment_type->id) ? 'selected' : '' }}>فعال</option>
                                                                <option value="deactive" {{ auth()->user()->account->paymentTypes->contains($payment_type->id) ? '' : 'selected' }}>غیرفعال</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-success btn-block" href="{{ route('AccountPaymentTypeVariable', ['id' => $payment_type->id]) }}"> تنظیمات </a>
                                                        </td>
                                                </tr>
                                                @endforeach

                                            </table>
                                        </form>

                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">

                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th class="text-center">نام</th>
                                                <th class="text-center">وضعیت <span class="text-danger">*</span></th>
                                                <th class="text-center">مدیریت</th>
                                            </tr>

                                            <tr>
                                                @foreach ($transports as $transport)
                                                    <td>{{ fa_number($loop->index + 1) }}</td>
                                                    <td class="text-center">{{ $transport->title }}</td>
                                                    <td>
                                                        <select name="transport_is_active" class="form-control"
                                                            id="condition">
                                                            <option value="">انتخاب کنید...</option>
                                                            <option value="active">فعال</option>
                                                            <option value="deactive">غیرفعال</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-success btn-block"> تنظیمات </button>
                                                    </td>
                                            </tr>
                                            @endforeach

                                        </table>

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        function save_payment_type(id) {
            var payment_type_id = $('#payment_type_id_' + id).val();
            var payment_is_active = $('#payment_is_active_' + id).val();

            $.ajax({
                url: '/payment-type-to-account',
                method: 'POST',
                data: {
                    payment_type_id: payment_type_id,
                    payment_is_active: payment_is_active,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'موفقیت!',
                        text: response.message,
                    });
                },
                error: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'error',
                        title: 'خطا!',
                        text: 'یک خطا رخ داده است.',
                    });

                }
            });
        }
    </script>

@endsection
