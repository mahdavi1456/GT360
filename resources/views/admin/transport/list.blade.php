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

        {{ TextHelper::breadcrumb("حمل و نقل") }}

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
                                <form action="{{ route('transport.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">عنوان <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="عنوان..." required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required">هزینه (تومان)</label>
                                                <input type="text" name="tprice" class="form-control" id="tprice"
                                                    placeholder="هزینه..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label required">توضیحات</label>
                                                <textarea name="tdetails" class="form-control" id="tdetails" placeholder="توضیحات..."></textarea>
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
                                @if(count($transports) > 0)
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>عنوان</th>
                                        <th>هزینه</th>
                                        <th>توضیحات</th>
                                        <th>عملیات</th>
                                    </tr>
                                    @php $i = 1; @endphp
                                    @foreach ($transports as $transport)
                                        <tr>
                                            <td>@php echo $i; @endphp</td>
                                            <td>{{ $transport->title }}</td>
                                            <td>
                                                @if ($transport->tprice)
                                                {{ $transport->tprice }} تومان
                                                @else
                                                بدون قیمت
                                            @endif
                                            </td>
                                            <td>
                                            @if ($transport->tdetails)
                                                {{ $transport->tdetails }}
                                                @else
                                                بدون توضیحات
                                            @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('transport.edit', $transport->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                                <form action="{{ route('transport.destroy', $transport->id) }}" method="POST" style="display: inline;">
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
