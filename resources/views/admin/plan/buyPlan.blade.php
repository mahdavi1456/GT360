@extends('admin.master')
@section('title', 'خرید اشتراکبهط')
@section('style')
    <style>
        .card-text ul,
        .card-text ol {
            padding: 0 !important;
            list-style-type: none !important;
            width: 100%;
            margin-bottom: 0px
        }

        .card-text li:before {
            content: '✓';
            margin-left: 10px;
            color: green;
        }
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <div class="content-wrapper">
        {{ breadcrumb('پکیج ها') }}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($planTypes as $type)
                            @php

                                $plans = App\Models\Plan::where('plan_type', $type)->with('items')->latest()->get();
                            @endphp
                            <div class="card">
                                <div class="card-header bg-warning">
                                    <h3 class="card-title">{{ $type }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-stretch">
                                        @foreach ($plans as $plan)
                                            <div class="col-lg-4">
                                                <div class="card h-100 d-flex flex-column p-3">
                                                    <div class="card-body p-0">
                                                        <h5 class="card-title">{{ $plan->label }}</h5>
                                                        <div class="card-text mt-3">
                                                            {!! $plan->desc !!}
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto p-2  pt-0 prices">
                                                        <ul>
                                                            @foreach ($plan->items as $item)
                                                                <li class="mb-2 "><span class="ml-3">از تا:
                                                                        {{ fa_number($item->from) }}-{{ fa_number($item->to) }}
                                                                        روز</span>
                                                                        @if ($item->off_price)
                                                                        <span class="ml-3">قیمت: {{price($item->off_price)}}</span>
                                                                        <span class="ml-1" style="text-decoration: line-through;">قیمت: {{price($item->price)}}</span>
                                                                        @else
                                                                        <span class="ml-3">قیمت: {{price($item->price)}}</span>
                                                                        @endif
                                                                    <span class="float-left"><a href="#"
                                                                            class="btn btn-sm btn-outline-primary">خرید</a></span>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
@endsection
