<?php
use App\Helpers\TextHelper;
?>
@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ TextHelper::breadcrumb('کد تخفیف') }}

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
                                <form action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="نام..." required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" style="margin-top: 38px;">
                                                <input class="form-check-input mx-0" type="radio" name="flexRadioDefault" id="type0" checked>
                                                <label class="form-check-label" for="flexRadioDefault1" style="padding-right: 22px;">
                                                  درصدی
                                                </label>
                                                <input class="form-check-input mx-0" type="radio" name="flexRadioDefault" id="type1">
                                                <label class="form-check-label" for="flexRadioDefault2" style="padding-right: 22px;">
                                                  قیمتی
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required">درصد</label>
                                                <input type="text" name="percent" class="form-control" id="percent" placeholder="درصد...">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required">قیمت(تومان)</label>
                                                <input type="text" name="price" class="form-control" id="price" disabled placeholder="قیمت...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label required">تاریخ اعتبار</label>
                                            <input type="text" name="validity_date" class="datepicker form-control" id="validity_date"  placeholder="۱۴۰۱/۰۱/۰۱" >
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label required">تعداد اعتبار</label>
                                            <input type="text" name="number" class="form-control" id="number" placeholder="تعداد اعتبار...">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label required">توضیحات</label>
                                                <textarea name="details" class="form-control" id="details" placeholder="توضیحات..."></textarea>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if (count($discounts) > 0)
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام</th>
                                        <th>درصد</th>
                                        <th>قیمت</th>
                                        <th>تاریخ اعتبار</th>
                                        <th>تعداد اعتبار</th>
                                        <th>توضیحات</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @php $i = 1; @endphp
                                    @foreach ($discounts as $discount)
                                        <tr>
                                            <td>@php echo $i; @endphp</td>
                                            <td>{{ $discount->title }}</td>
                                            <td>{{ $discount->percent ?? 'بدون درصد' }}</td>
                                            <td>{{ $discount->price ?? 'بدون قیمت' }}</td>
                                            <td>@if($discount->validity_date) {{  verta($discount->validity_date)->formatDate(); }} @endif</td>
                                            <td>{{ $discount->number ?? 'بدون تعداد' }}</td>
                                            <td>{{ $discount->dateails ?? 'بدون توضیحات' }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('discount.edit', $discount->id) }}" class="btn btn-warning btn-sm mx-1">ویرایش</a>
                                                <form action="{{ route('discount.destroy', $discount->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $i++; @endphp
                                    @endforeach
                                </table>
                                @else
                                <div class="alert alert-danger text-center"> موردی جهت نمایش موجود نیست. </div>
                                @endif
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

<script>
    $(document).ready(function() {
        if($('#type1').is(':checked')) {
            $('#percent').prop('disabled', true);
            $('#price').prop('disabled', false);
        }

        $('#type0').click(function(){
            $('#percent').prop('disabled', false);
            $('#price').prop('disabled', true);
        });
        $('#type1').click(function(){
            $('#percent').prop('disabled', true);
            $('#price').prop('disabled', false);
        });
    });
</script>

@endsection
