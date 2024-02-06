@extends('admin.master')
@section('title', 'Category List')
@section('style')
    <style>
        [data-toggle="collapse"] .fa:before {
            content: "\f139";
        }

        [data-toggle="collapse"].collapsed .fa:before {
            content: "\f13a";
        }
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{ breadcrumb('انتخاب فهرست') }}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-header">
                                    <div class="col-4">
                                        <form id="nav-list-form">
                                            <input type="hidden" name="type" value="get-nav-info">
                                            <label for="">فهرست های قالب</label>
                                            <select name="nav" class="custom-select select3" id="">
                                                <option value="">انتخاب فهرست...</option>
                                                @foreach ($navs as $nav)
                                                    <option value="{{ $nav->id }}">{{ $nav->label }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>

                                </div>
                                {{-- @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif --}}
                               <div class="nav-info p-3" style="min-height: 100px;"></div>
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
        $('select[name="nav"]').change(function() {
            $("#loading-overlay").fadeIn();
            let data = $('#nav-list-form').serialize();
            $.ajax({
                url: "{{ url()->current() }}",
                method: 'get',
                data:data,
                success:function(res){
                  //  console.log(res);
                    $('.nav-info').empty();
                    $('.nav-info').append(res);
                    $("#loading-overlay").fadeOut();
                },
                error:function(res){
                    $("#loading-overlay").fadeOut();
                    Swal.fire({
                        title: "خطا",
                        text: " خطاااااا",
                        icon: "error"
                    });
                    console.log(res);
                }
            });
        });
    </script>
@endsection
