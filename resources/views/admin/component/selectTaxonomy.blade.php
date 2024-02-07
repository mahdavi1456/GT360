@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('انتخاب طبقه بندی') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <form  action="{{ route('component.taxonomyStore', $component->id) }}" method="POST">
                                    @csrf
                                    <select name="taxonomies[]" class="custom-select select2" multiple>>
                                        @foreach ($taxonomies as $taxonomy)
                                            <option @selected(in_array($taxonomy->id,$pluck)) value="{{ $taxonomy->id }}">{{ $taxonomy->name }}</option>
                                        @endforeach

                                    </select>
                                    <div class="col-12 text-center mt-3">
                                        <button type="submit" class="btn btn-success">اعمال</button>
                                    </div>
                                </form>
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
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('scripts')

@endsection
