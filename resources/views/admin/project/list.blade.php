@extends('admin.master')
@section('title', 'پروژه ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('پروژه ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('project.create') }}"
                                            class="pull-left btn btn-info btn-sm text-white">پروژه جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($projects->count() > 0)
                                    <table class="table table-hover table-bordered text-center">
                                        <tr class="table-warning">
                                            <th style="width: 10px">#</th>
                                            <th>لوگو</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>انقضا</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td>
                                                    <img class="object-fit-contain" style="width: 150px"
                                                        src="{{ $project->logo ? asset(ert('aip') . $project->logo) : asset('v1/images/logo.png') }}">
                                                </td>
                                                <td nowrap>{{ $project->title }}</td>
                                                <td>{!! $project->description !!}</td>
                                                <td>{{zaman($project->expire)}}</td>
                                                <td nowrap>
                                                    @if ($project->charge())
                                                        <a href="{{ route('project.show', $project->id) }}"
                                                            class="btn btn-success btn-sm">میز کار</a>
                                                        <a href="{{ route('openProject', ['project_id' => $project->id]) }}"
                                                            class="btn btn-info btn-sm">ورود به پروژه</a>
                                                    @else
                                                    <a href="{{ route('buyPlan', ['project_id' => $project->id]) }}"
                                                        class="btn btn-info btn-sm">شارژ حساب</a>
                                                    @endif
                                                    <a href="{{ route('project.create', ['update' => $project->id]) }}"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('project.destroy', $project->id) }}"
                                                        data-confirm-delete="true" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></a>
                                                         @if ($project->deltaExpire())
                                                         <button class=" mt-3 btn btn-sm bg-success btn-block " style="color: white !important" disabled >{{$project->deltaExpire()}}</button>
                                                         @endif

                                                </td>

                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger m-2 text-center">موردی جهت نمایش موجود نیست.</div>
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
