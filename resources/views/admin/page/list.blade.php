@extends('admin.master')
@section('title', 'صفحات')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('صفحات') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title col-md-4">فیلتر صفحه </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('page.index') }}" method="get" class="col-md-12">
                                    <div class="d-flex flex-wrap align-items-end">
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
                                                value="{{ $request->from }}" class="datePicker form-control form-control-sm"
                                                autocomplete="off" />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>تا تاریخ:</label>
                                            <input type="text" name="to" id="to" value="{{ $request->to }}"
                                                placeholder="تا..." class="datePicker form-control form-control-sm"
                                                autocomplete="off" />
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
                                <h3 class="card-title">لیست صفحات ({{ $pages->total() }})</h3>
                                <a href="{{ route('page.create', ['action' => 'create']) }}"
                                    class="d-flex align-items-center btn btn-success btn-sm mr-auto text-white">
                                    <i class="fa fa-plus ml-2"></i> افزودن صفحه
                                </a>
                            </div>
                            <div class="card-body p-0 table-responsive">
                                @if ($pages->isEmpty())
                                    <div class="alert alert-danger text-center m-2">موردی جهت نمایش موجود نیست.</div>
                                @else
                                    <table class="table table-bordered table-striped table-hover text-center">
                                        <tr class="table-warning">
                                            <th>#</th>
                                            <th>تصویر شاخص</th>
                                            <th>عنوان</th>
                                            <th>بازدید</th>
                                            <th>نویسنده</th>
                                            <th>تاریخ</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($pages as $key => $page)
                                            <tr>
                                                <td>{{ $pages->firstItem() + $key }}</td>
                                                <td>
                                                    @if ($page->thumbnail)
                                                        <img style="width:100px !important; object-fit: contain"
                                                            src="{{ asset(ert('pip')) . '/' . $page->thumbnail }}">
                                                        @else
                                                            فاقد تصویر
                                                        @endif

                                                </td>
                                                <td>{{ $page->title }}</td>
                                                {{-- <td>{{ $post->visitLogs()->count() }}</td> --}}
                                                <td>{{ 25 }}</td>
                                                <td>{{ $page->author_object->name . ' ' . $page->author_object->family }}
                                                </td>
                                                <td>{{ zaman($page->created_at) }}</td>
                                                <td>
                                                    <span class="badge {{ $page->publish_status == 'publish' ? 'badge-success' : 'badge-danger' }}">
                                                        {{ $page->publish_status == 'publish' ? 'انتشار' : 'عدم انتشار' }}
                                                    </span>
                                                </td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a class="btn btn-info btn-sm ml-2" target="_blank"
                                                                href="">مشاهده</a>
                                                            <a class="btn btn-warning btn-sm ml-2 d-flex align-items-center"
                                                                href="{{ route('page.create', ['action' => 'update', 'page' => $page->id]) }}"
                                                                data-toggle="tooltip" data-placement="top" title="ویرایش"><i
                                                                    class="fa fa-edit"></i></a>
                                                            {{-- <div class="display-inline-block">
                                                                <form method="post" class="h-100" action="{{ route('page.destroy', $page->id) }}">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" data-toggle="tooltip" data-placement="top" title="حذف" class="h-100 delete-confirm btn btn-danger btn-sm d-flex align-items-center"><i class="fa fa-close"></i></button>
                                                                </form>
                                                            </div> --}}
                                                            <a href="{{ route('page.destroy', $page->id) }}"
                                                                data-confirm-delete='true' data-toggle="tooltip"
                                                                data-placement="top" title="حذف"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fa fa-close"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="w-100 mt-3 d-flex justify-content-center">
                                        {{ $pages->withQueryString()->render() }}
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
    <script type="text/javascript">
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
