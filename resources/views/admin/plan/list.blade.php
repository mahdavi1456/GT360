@extends('admin.master')
@section('title', 'بسته ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('بسته ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('plan.create') }}"
                                           class="pull-left btn btn-info btn-sm">جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($plans->count() > 0)
                                    <table class="table table-hover table-bordered text-center">
                                        <tr class="table-warning">
                                            <th>#</th>
                                            <th>نام</th>
                                            <th>برچسب</th>
                                            <th>توضیحات</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($plans as $plan)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>{{ $plan->name }}</td>
                                                <td>{{ $plan->label }}</td>
                                                <td class="pr-4">{!! $plan->desc !!}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('plan.ListItems', ['plan' => $plan->id]) }}"
                                                       class="btn btn-info btn-sm mx-1"> آیتم ها</a>
                                                    <a href="{{ route('plan.edit', ['plan' => $plan->id]) }}"
                                                       class="btn btn-warning btn-sm mx-1"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('plan.destroy', $plan->id) }}"
                                                       data-confirm-delete="true"
                                                       class="btn btn-danger btn-sm mx-1"><i class="fa fa-trash"></i></a>
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
    </div>
@endsection
@section('scripts')
@endsection
