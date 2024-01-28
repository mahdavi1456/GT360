@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb("بازدید صفحات - ".$visits->total()) }}

        <!-- Main content -->
        
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if (count($visits) > 0)
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>ip</th>
                                            <th>url</th>
                                            <th>route</th>
                                            <th>browser</th>
                                            <th>device</th>
                                            <th>date</th>
                                        </tr>
                                        @foreach ($visits as $key => $visit)
                                            <tr>
                                                <td>{{$visits->firstItem()+$key}}</td>
                                                <td>{{ $visit->ip }}</td>
                                                <td>{{ $visit->url }}</td>
                                                <td>{{ $visit->route }}</td>
                                                <td>{{ $visit->browser }}</td>
                                                <td>{{ $visit->device }}</td>
                                                <td>{{ zaman($visit->created_at) }}</td>
                                            </tr>

                                        @endforeach
                                    </table>
                                @else
                                    <div class="alert alert-danger text-center"> موردی جهت نمایش موجود نیست. </div>
                                @endif
                            </div>
                            <div class="">
                                {!!$visits->render()!!}
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
