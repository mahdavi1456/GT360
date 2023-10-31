@extends('admin.master')
@section('title', 'Category List')
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('کد تخفیف') }}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="container">
                                        <div class="row alert alert-danger  justify-content-center mt-4">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <form action="{{ route('discount.update', $discount->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" id="title"
                                                    placeholder="نام..." value="{{ $discount->title }}"  required oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" style="margin-top: 38px;">
                                                <input class="form-check-input mx-0" type="radio" name="flexRadioDefault" id="type0" {{ $discount->percent ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault1" style="padding-right: 22px;">
                                                  درصدی
                                                </label>
                                                <input class="form-check-input mx-0" type="radio" name="flexRadioDefault" id="type1" {{ $discount->price ? 'checked' : '' }}>
                                                <label class="form-check-label" for="flexRadioDefault2" style="padding-right: 22px;">
                                                  قیمتی
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required">درصد <span class="text-danger">*</span></label>
                                                <input type="text" name="percent" class="form-control just-numbers" id="percent" placeholder="درصد..." value="{{ old('percent') ?? $discount->percent }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required">قیمت(تومان) <span class="text-danger">*</span></label>
                                                <input type="text" name="price" class="form-control just-numbers" id="price" disabled placeholder="قیمت..." value="{{ old('price') ?? $discount->price }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">حداقل خرید <span class="text-danger">*</span></label>
                                                <input type="text" name="min_cart" value="{{ old('min_cart')?? $discount->min_cart }}" class="form-control just-numbers" placeholder="حداقل خرید..." required oninvalid="this.setCustomValidity('.لطفا حداقل خرید را وارد کنید')"
                                                oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">حداکثر خرید <span class="text-danger">*</span></label>
                                                <input type="text" name="max_cart" value="{{ old('max_cart')?? $discount->max_cart }}" class="form-control just-numbers" placeholder="حداکثر خرید..." required oninvalid="this.setCustomValidity('.لطفا حداکثر خرید را وارد کنید')"
                                                oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label required">تاریخ اعتبار <span class="text-danger">*</span></label>
                                            <input type="text" name="validity_date" class="datepicker form-control" id="validity_date"  value="{{ old('validity_date') ?? fa_number(Verta::instance($discount->validity_date)->format('Y/m/d'))}}" required oninvalid="this.setCustomValidity('.لطفا تاریخ اعتبار را وارد کنید')"
                                            oninput="this.setCustomValidity('')" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="form-label required">تعداد اعتبار <span class="text-danger">*</span></label>
                                            <input type="text" name="number" class="form-control just-numbers" id="number" placeholder="تعداد اعتبار..." value="{{ old('number') ?? $discount->number }}" required oninvalid="this.setCustomValidity('.لطفا تعداد اعتبار را وارد کنید')"
                                            oninput="this.setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label required">توضیحات</label>
                                                <textarea name="details" class="form-control" id="details" placeholder="توضیحات...">{{ old('details') ?? $discount->details }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">ذخیره</button>
                                        </div>
                                    </div>
                                </form>
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

<script>
    $(document).ready(function() {
        if($('#type1').is(':checked')) {
            $('#percent').prop('disabled', true);
            $('#price').prop('disabled', false);
        }

        $('#type0').click(function(){
            $('#percent').prop('disabled', false);
            $('#price').prop('disabled', true);
        });
        $('#type1').click(function(){
            $('#percent').prop('disabled', true);
            $('#price').prop('disabled', false);
        });
    });
</script>

<script src="{{ asset('js/validation.js') }}"></script>


@endsection
