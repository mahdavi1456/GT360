@extends('front.layouts.master')
@section('title', 'لیست اکانت ها')
@section('content')
    <div class="container">
        <div class="my-5">
            <div class="row mb-3">
                <h3>لیست اکانت ها</h3>
            </div>
            <div class="row">
                @foreach ($accounts as $account)
                    <div class="col-md-3 mb-2">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h4 class="card-title">{{ $account->name . ' ' . $account->family }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('front.products.list') }}">
                                    <input type="hidden" name="account" value="{{ $account->id }}">
                                    <button type="submit" class="btn btn-info w-100">مشاهده فروشگاه</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection