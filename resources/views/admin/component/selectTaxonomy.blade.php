@extends('admin.master')
@section('title', 'تخصیص طبقه بندی')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('تخصیص طبقه بندی') }}
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="row">
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="card">
                    <form action="{{ route('component.taxonomyStore', $component->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="taxonomies[]" class="custom-select select2" multiple>>
                                        @foreach ($taxonomies as $taxonomy)
                                            <option @selected(in_array($taxonomy->id,$pluck)) value="{{ $taxonomy->id }}">{{ $taxonomy->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item list-group-item-action active">
                                            <strong>بخش های مربوط به قالب {{ $component->label }}</strong>
                                        </li>
                                        @foreach ($componentTaxonomy as $taxonomy)
                                            <li class="list-group-item">{{ $taxonomy->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-left">
                            <button type="submit" class="btn btn-success">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
