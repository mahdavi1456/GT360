@extends('admin.master')
@section('title', 'Taxonomy Create')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('محتوا') }}
        <section class="content">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">{{ $action == 'edit' ? 'فرم ویرایش طبقه بندی' : 'فرم ایجاد طبقه بندی' }}</h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form method="post" action="{{ $action == 'edit' ? route('taxonomy.update', $taxonomy->id) : route('taxonomy.store') }}" enctype='multipart/form-data'>
                            @if ($action == 'edit')
                                @method('PATCH')
                            @else
                                @method('POST')
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="required">عنوان</label>
                                        <input type="text" name="name" required oninvalid="this.setCustomValidity(' عنوان را را وارد کنید')" class="form-control" id="name"
                                                value="{{ $action == 'edit' ? $taxonomy->name : old('name') }}" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>نامک</label>
                                        <input type="text" name="slug" id="slug" class="form-control" value="{{$action == 'edit' ? $taxonomy->slug: old('slug')}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="required">وضعیت نمایش</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1" {{ $action == 'edit' && $taxonomy->status == 1 ? 'selected' : '' }}>نمایش</option>
                                            <option value="0" {{ $action == 'edit' && $taxonomy->status == 0 ? 'selected' : '' }}>عدم نمایش</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="required">نوع</label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="select" {{ $action == 'edit' && $taxonomy->type == 'select' ? 'selected' : '' }}>انتخاب تکی</option>
                                            <option value="multiple" {{ $action == 'edit' && $taxonomy->type == 'multiple' ? 'selected' : '' }}>انتخاب چندتایی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">توضیحات</label>
                                        <textarea name="description" id="description" class="form-control">{{ $action == 'edit' ? $taxonomy->description : old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')

@endsection
