@extends('admin.master')
@section('title', 'سانس ها')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('سانس ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title col-md-4">فرم</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('reserve-part.store') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>عنوان</label>
                                            <input type="text" name="name" id="name" value="" class="form-control form-control" placeholder="عنوان..." />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>توضیحات</label>
                                            <input type="text" name="details" id="details" value="" class="form-control" placeholder="توضیحات..." />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>قیمت</label>
                                            <input type="text" name="price" id="price" value="" class="form-control" placeholder="قیمت..." />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>قیمت تخفیف خورده</label>
                                            <input type="text" name="off_price" id="off-price" value="" class="form-control" placeholder="قیمت تخفیف خورده..." />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>وضعیت</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="active">فعال</option>
                                                <option value="deactive">غیرفعال</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">ثبت</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-0 table-responsive">
                                @if ($reserveParts->isEmpty())
                                    <div class="alert alert-danger m-2 text-center">موردی جهت نمایش موجود نیست.</div>
                                @else
                                    <table class="table table-bordered table-striped table-hover text-center">
                                        <tr class="table-warning">
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>قیمت</th>
                                            <th>قیمت تخفیف خورده</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($reserveParts as $key => $reservePart)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $reservePart->name }}</td>
                                                <td>{{ $reservePart->details }}</td>
                                                <td>{{ number_format($reservePart->price) }}</td>
                                                <td>{{ number_format($reservePart->off_price) }}</td>
                                                <td>{{ $reservePart->status }}</td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
    <script type="text/javascript">

    </script>
@endsection
