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
                                    <input type="hidden" name="action" value="{{ $action }}">
                                    @if (request()->has('update'))
                                        <input type="hidden" name="update" value="{{ $reserve?->id }}">
                                    @endif
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>عنوان <span class="text-danger">*</span></label>
                                            <input type="text" required
                                                oninvalid="this.setCustomValidity('کادر مشخص شده را پر کنید.')"
                                                oninput="this.setCustomValidity('')" name="name" id="name"
                                                value="{{ $reserve?->name }}" class="form-control form-control"
                                                placeholder="عنوان..." />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>توضیحات <span class="text-danger">*</span></label>
                                            <input type="text" required
                                                oninvalid="this.setCustomValidity('کادر مشخص شده را پر کنید.')"
                                                oninput="this.setCustomValidity('')" name="details" id="details"
                                                value="{{ $reserve?->details }}" class="form-control"
                                                placeholder="توضیحات..." />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>قیمت <span class="text-danger">*</span></label>
                                            <input type="text" required
                                                oninvalid="this.setCustomValidity('کادر مشخص شده را پر کنید.')"
                                                oninput="this.setCustomValidity('')" name="price" id="price"
                                                value="{{ $reserve?->price }}" class="form-control" placeholder="قیمت..." />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>قیمت تخفیف خورده </label>
                                            <input type="text"  name="off_price" id="off-price"
                                                value="{{ $reserve?->off_price }}" class="form-control"
                                                placeholder="قیمت تخفیف خورده..." />
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>وضعیت</label>
                                            <select name="status" id="status" class="form-control">
                                                <option @selected($reserve?->status == 'active') value="active">فعال</option>
                                                <option @selected($reserve?->status == 'deactive') value="deactive">غیرفعال</option>
                                            </select>
                                        </div>
                                        <div class="col ">
                                            <label class="fade d-block">-</label>
                                            <button type="submit" class="btn btn-success">{{$action=='create'?"ثبت":"ویرایش"}}</button>
                                            @if ($action=='update')
                                            <a class="btn btn-danger" href="{{route('reserve-part.index')}}">انصراف</a>
                                            @endif
                                        </div>
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
                                                <td>{{ price($reservePart->price) }}</td>
                                                <td>{{ price($reservePart->off_price) }}</td>
                                                <td>{{ $reservePart->status }}</td>
                                                <td>
                                                    <a href="{{ route('reserve-part.index', ['update' => $reservePart->id]) }}"
                                                        class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a data-confirm-delete='true' href="{{route('reserve-part.destroy',$reservePart->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
    <script type="text/javascript"></script>
@endsection
