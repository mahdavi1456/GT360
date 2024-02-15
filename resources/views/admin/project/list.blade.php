@extends('admin.master')
@section('title', 'form List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('پروژه ها') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="{{ route('project.create') }}" class="pull-left btn btn-info text-white">افزودن جدید</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($projects->count() > 0)
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>لوگو</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>{{ fa_number($loop->index + 1) }}</td>
                                                <td><img class="object-fit-contain" style="width: 150px" src="{{$project->logo?asset(ert('aip').$project->logo)
                                                :asset('v1/images/logo.png')}}" alt="logo"></td>
                                                <td>{{ $project->title }}</td>
                                                <td>{!! $project->description !!}</td>
                                                <td>
                                                    <a href="{{ route('project.show', $project->id) }}" class="btn btn-info m-1"> میز کار</a>
                                                    <a href="{{ route('project.create',['update'=>$project->id]) }}" class="btn btn-warning m-1"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('project.destroy', $project->id) }}"  data-confirm-delete="true" class="btn btn-danger m-1"><i class="fa fa-trash"></i></a>
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
