@extends('admin.master')
@section('title', 'طبقه بندی ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('طبقه بندی ها') }}
        <section class="content">
            <div class="modal fade" id="termModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">تعریف لیست مقادیر طبقه بندی</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="term-list"></div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">لیست طبقه بندی ها</h3>
                                <a href="{{ route('taxonomy.create') }}" class="d-flex align-items-center btn btn-success btn-sm mr-auto text-white">
                                    جدید
                                </a>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($taxonomies->isEmpty())
                                    <div class="alert alert-danger m-2 text-center">موردی جهت نمایش موجود نیست.</div>
                                @else
                                    <table class="table table-bordered table-hover text-center">
                                        <tr class="table-warning">
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>نوع</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($taxonomies as $key => $taxonomy)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $taxonomy->name }}</td>
                                                <td>{{ $taxonomy->description }}</td>
                                                <td>{{ $taxonomy->type == 'select' ? 'انتخاب تکی' : 'انتخاب چند تایی' }}</td>
                                                <td>
                                                    @if ($taxonomy->status == 1)
                                                        <span class="badge badge-success">نمایش</span>
                                                    @else
                                                        <span class="badge badge-danger">عدم نمایش</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    <button type="button" class="btn btn-info btn-sm mx-1 load-term" data-id="0" data-taxonomy-id="{{ $taxonomy->id }}" data-toggle="modal" data-target="#termModal"><i class="fa fa-plus ml-1"></i>لیست مقادیر</button>
                                                    <a class="btn btn-warning mx-1 btn-sm" href="{{ route('taxonomy.edit', $taxonomy->id) }}" data-toggle="tooltip" data-placement="top" title="ویرایش"><i class="fa fa-edit"></i></a>
                                                    <form method="post" action="{{route('taxonomy.destroy', $taxonomy->id)}}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button data-toggle="tooltip" data-placement="top" title="حذف" type="submit" class="delete-confirm-taxonomy btn btn-danger btn-sm mx-1 align-items-center"><i class="fa fa-close"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
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
    <script type="text/javascript" src="{{ asset('js/media.js') }}"></script>
    <script type="text/javascript">

        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $(document.body).on("click", ".delete-confirm-taxonomy", function () {
            var form =  $(this).closest("form");
            event.preventDefault();
            new swal({
                title: "حذف طبقه بندی",
                text:  "آیا از حذف طبقه بندی مطمئن هستید؟",
                icon: "warning",
                dangerMode: true,
                buttons: ["خیر", "بله"]
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });

        var row;

        function start() {
            row = event.target;
        }

        function dragover() {
            var e = event;

            e.preventDefault();

            let children= Array.from(e.target.parentNode.parentNode.children);

            if (children.indexOf(e.target.parentNode)>children.indexOf(row)){
                e.target.parentNode.after(row);
            } else {
                e.target.parentNode.before(row);
            }
        }

        function dragEnd(event, type) {
            var form = $(".term_row_position *").serialize();
            var formData = {
                form: form,
                taxonomy_id: $('#taxonomy_id').val(),
            };
            var type = "post";
            var APP_URL = $('meta[name="_base_url"]').attr('content');
            var ajaxurl = APP_URL+"/term-sort"

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    $('#term-list').html(data.html);
                }
            });
        }

        $(document.body).on("click", ".load-term", function (event) {
            $("#term-list").html("<div class='w-100 d-flex justify-content-center'>در حال بارگذاری...</div>");
            var taxonomy_id = $(this).data("taxonomy-id");
            var id = $(this).data("id");
            $("#taxonomy_id").val(taxonomy_id);
            $("#term-search-text").val("");
            event.preventDefault();
            $.ajax({
                type: "post",
                url: "{{ route('termList') }}",
                data: {
                    taxonomy_id: taxonomy_id,
                    id: id
                },
                success: function (data) {
                    $("#term-list").html(data);
                }, error: function (data) {
                    $("#term-list").html(data);
                }
            });
        });

        $(document.body).on("click", "#store-term", function () {
            var action = $(this).data("action");
            var id = $(this).data("id");
            var taxonomy_id = $(this).data("taxonomy-id");
            var parent_id = $("#parent-id").val();
            var name = $("#name").val();
            var slug = $("#slug").val();
            var description = $("#description").val();
            $.ajax({
                type: "post",
                url: "{{ route('term.store') }}",
                data: {
                    action: action,
                    id: id,
                    parent_id: parent_id,
                    taxonomy_id: taxonomy_id,
                    name: name,
                    slug: slug,
                    description: description
                },
                success: function (data) {
                    $("#term-list").html(data);
                }, error: function (data) {
                    $("#term-list").html(data);
                }
            });
        });
    </script>
@endsection
