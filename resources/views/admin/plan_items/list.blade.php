@extends('admin.master')
@section('title', 'form List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb(' آیتم ها') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <span> آیتم برای <strong>{{ $plan->label }}</strong></span>
                                    </div>
                                </div>
                            </div>
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
                                <form action="{{ route('plan.stroeItem') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="action" value="{{ $action }}">
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    @if ($item)
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label class="required">از <span class="text-danger">*</span></label>
                                                <input type="text" name="from" class="form-control"
                                                    value="{{ $item?->from }}" placeholder="از..." required
                                                    oninvalid="this.setCustomValidity('نام بخش را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label class="required">تا <span class="text-danger">*</span></label>
                                                <input type="text" name="to" class="form-control"
                                                    value="{{ $item?->to }}" placeholder="تا..." required
                                                    oninvalid="this.setCustomValidity('نام بخش را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label class="required">قیمت <span class="text-danger">*</span></label>
                                                <input type="text" name="price" class="form-control"
                                                    value="{{ $item?->price}}" placeholder="قیمت..." required
                                                    oninvalid="this.setCustomValidity('نام بخش را وارد نمایید.')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <label class="required">قیمت تخفیف </label>
                                                <input type="text" name="off_price" class="form-control"
                                                    value="{{$item?->off_price }}" placeholder="قیمت تخفیف ...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">{{$item?"ویرایش":"ایجاد"}}</button>
                                            @if ($item)
                                            <a href="{{route('plan.ListItems',$plan->id)}}" class="btn btn-danger">انصراف</a>
                                            @endif
                                            <a href="{{route('plan.index')}}" class="btn btn-primary">بسته ها</a>
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
                            {{-- <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('plan.create',['theme_id'=>request('theme_id')]) }}" class="pull-left btn btn-info text-white">افزودن جدید</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card-body p-0 table-responsive">
                                @if ($items->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>از</th>
                                            <th>تا</th>
                                            <th>قیمت</th>
                                            <th>قیمت تخفیف</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ convertToPersian($item->from) }}</td>
                                                <td>{{ convertToPersian($item->to) }}</td>
                                                <td>{{ price($item->price) }}</td>
                                                <td>{{ price($item->off_price) }}</td>
                                                <td>
                                                    <a href="{{ route('plan.ListItems', ['plan' => $plan->id, 'item' => $item->id]) }}"
                                                        class="btn btn-warning m-1">ویرایش</a>
                                                    <a href="{{ route('plan.itemDelete', $item->id) }}"
                                                        data-confirm-delete="true" class="btn btn-danger m-1">حذف</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger m-2 text-center">
                                        موردی جهت نمایش موجود نیست.
                                    </div>
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

@endsection
