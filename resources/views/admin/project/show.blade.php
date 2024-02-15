@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb(' میزکار پروژه - ' .$project->title) }}

        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <table class="table table-bordered">
                                    <tr>

                                        <th>بخش</th>
                                        <th>عملیات</th>

                                    </tr>

                                        <tr>
                                            <td> مدیریت قالب </td>
                                            <td>
                                                <a href="{{ route('project.show', $project->id) }}" class="btn btn-info m-1"> میز کار</a>
                                                <a href="{{ route('project.create',['update'=>$project->id]) }}" class="btn btn-warning m-1"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('project.destroy', $project->id) }}"  data-confirm-delete="true" class="btn btn-danger m-1"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>

                                </table>
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
    <script type="text/javascript">

    </script>
@endsection
