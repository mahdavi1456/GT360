@extends('admin.master')
@section('title', 'Post List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('محتوا') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title col-md-4">فیلتر نوشته ها</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('post.index') }}" method="get" class="col-md-12">
                                    <div class="d-flex flex-wrap align-items-end">
                                        <div class="col-md-4 form-group">
                                            <label>نوع نوشته</label>
                                            <select class="form-control select2" name="component_id" id="post_type">
                                                <option value="">همه</option>
                                                @foreach ($components as $component)
                                                    <option value="{{ $component->id }}"
                                                        {{ $request->component_id == $component->id ? 'selected' : '' }}>
                                                        {{ $component->label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>نویسنده</label>
                                            <select class="form-control select2" name="author" id="user_id">
                                                <option value="">همه</option>
                                                @foreach ($accountUsers as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $request->author == $user->id ? 'selected' : '' }}>
                                                        {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>وضعیت</label>
                                            <select class="form-control select2" name="publish_status" id="status">
                                                <option value=""
                                                    {{ $request->publish_status == '' ? 'selected' : '' }}>همه</option>
                                                <option value="publish"
                                                    {{ $request->publish_status == 'publish' ? 'selected' : '' }}>منتشر شده
                                                </option>
                                                <option value="draft"
                                                    {{ $request->publish_status == 'draft' ? 'selected' : '' }}>پیش نویس
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>عنوان</label>
                                            <input type="text" name="title" id="title"
                                                value="{{ $request->title }}" class="form-control form-control-sm" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>از تاریخ:</label>
                                            <input type="text" name="from" id="from" placeholder="از..."
                                                value="{{ $request->from }}"
                                                class="datePicker form-control form-control-sm" autocomplete="off" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>تا تاریخ:</label>
                                            <input type="text" name="to" id="to" value="{{ $request->to }}"  placeholder="تا..."
                                                class="datePicker form-control form-control-sm" autocomplete="off" />
                                        </div>
                                        <button type="submit" class="btn btn-info mr-auto check-validity"><i
                                                class="fa fa-filter"></i>فیلتر</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">لیست نوشته‌ها ({{ $posts->total() }})</h3>
                                <a href="{{ route('post.create', ['component_id' => request('component_id'), 'action' => 'create']) }}"
                                    class="d-flex align-items-center btn btn-success btn-sm mr-auto text-white">
                                    <i class="fa fa-plus ml-2"></i> افزودن نوشته
                                </a>
                            </div>
                            <div class="card-body">
                                @if ($posts->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        <span class="not-found">نوشته یافت نشد.</span>
                                    </div>
                                @else
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>تصویر شاخص</th>
                                                <th>نوع نوشته</th>
                                                <th>عنوان</th>
                                                <th>بازدید</th>
                                                <th>نویسنده</th>
                                                <th>تاریخ</th>
                                                <th>وضعیت</th>
                                                <th width="10%">عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $key => $post)
                                                <tr>
                                                    <td>{{ $posts->firstItem() + $key }}</td>
                                                    <td>
                                                        <div class="text-center">
                                                            @if ($post->thumbnail)
                                                                <img style="width:100px !important; object-fit: contain"
                                                                    src="{{ asset(ert('thumb-path')) . '/' . $post->thumbnail }}">
                                                            @else
                                                                بدون تصویر
                                                            @endif

                                                        </div>
                                                    </td>
                                                    <td>{{ $post->component->name }}</td>
                                                    <td>{{ $post->title }}</td>
                                                    {{-- <td>{{ $post->visitLogs()->count() }}</td> --}}
                                                    <td>{{ 25 }}</td>
                                                    <td>{{ $post->author_object->name . ' ' . $post->author_object->family }}
                                                    </td>
                                                    <td>{{ zaman($post->created_at) }}</td>
                                                    <td>
                                                        <span
                                                            class="badge {{ $post->publish_status == 'draft' ? 'badge-danger' : 'badge-success' }}">{{ $post->publish_status == 'draft' ? 'عدم انتشار' : 'انتشار' }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            {{-- <a class="btn btn-info btn-sm ml-2" target="_blank" href="{{ route('blog.show', $post->slug) }}">مشاهده</a> --}}
                                                            <a class="btn btn-info btn-sm ml-2" target="_blank"
                                                                href="">مشاهده</a>
                                                            <a class="btn btn-warning btn-sm ml-2 d-flex align-items-center"
                                                                href="{{ route('post.create', ['component_id' => request('component_id'), 'action' => 'update', 'post' => $post->id]) }}"
                                                                data-toggle="tooltip" data-placement="top" title="ویرایش"><i
                                                                    class="fa fa-edit"></i></a>
                                                            <div class="display-inline-block">
                                                                <form method="post" class="h-100"
                                                                    action="{{ route('post.destroy', $post->id) }}">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" data-toggle="tooltip"
                                                                        data-placement="top" title="حذف"
                                                                        class="h-100 delete-confirm btn btn-danger btn-sm d-flex align-items-center"><i
                                                                            class="fa fa-close"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            <!-- /.card-body -->
                            <div class="w-100 mt-3 d-flex justify-content-center"></div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).on('click', '.delete-confirm', function() {
            var form = $(this).closest("form");
            event.preventDefault();
            new swal({
                    title: "حذف نوشته",
                    text: "آیا از حذف نوشته مطمئن هستید؟",
                    icon: "warning",
                    dangerMode: true,
                    buttons: ["خیر", "بله"],
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
        $(function() {
            $("#from, #to").persianDatepicker({
                initialValue: false,
                obsever: true,
                format: 'YYYY/MM/DD',
                autoClose: true
            });
        });
    </script>

@endsection
