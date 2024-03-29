@extends('admin.master')
@section('title', 'Account')
@section('style')
    <style>
        .ck-editor__editable {
            height: 180px;
        }
    </style>
@endsection
@section('content')
    @include('sweetalert::alert')
    @include('admin.partial.nav')
    @include('admin.partial.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        {{ breadcrumb('ویرایش مشترک') }}

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
                                <form action="{{ route('account.update', $account->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <h4>اطلاعات شخصی</h4>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label">نوع حساب <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control" id="account_type" name="account_type" required
                                                    oninvalid="this.setCustomValidity('.لطفا نوع حساب را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                                    <option value="">انتخاب کنید...</option>
                                                    <option value="حقیقی" @if (old('account_type') == 'حقیقی') selected @endif
                                                        @if ($account->account_type == 'حقیقی') selected @endif>حقیقی</option>
                                                    <option value="حقوقی" @if (old('account_type') == 'حقوقی') selected @endif
                                                        @if ($account->account_type == 'حقوقی') selected @endif>حقوقی</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label">نام <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control persianletters"
                                                    id="name" placeholder="نام..."
                                                    value="{{ old('name') ?? $account->name }}" required
                                                    oninvalid="this.setCustomValidity('.لطفا نام را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> نام خانوادگی <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="family" class="form-control persianletters"
                                                    id="family" placeholder="نام خانوادگی..."
                                                    value="{{ old('family') ?? $account->family }}" required
                                                    oninvalid="this.setCustomValidity('.لطفا نام خانوادگی را وارد کنید')"
                                                    oninput="this.setCustomValidity('')">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> موبایل <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="mobile" class="form-control just-numbers"
                                                    id="mobile" placeholder="موبایل..."
                                                    value="{{ old('mobile') ?? $account->mobile }}" required
                                                    oninvalid="this.setCustomValidity('.لطفا موبایل را وارد کنید')"
                                                    oninput="this.setCustomValidity('')" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> تلفن ثابت </label>
                                                <input type="text" name="phone" class="form-control just-numbers"
                                                    id="phone" placeholder="021xxxxxxxx"
                                                    value="{{ old('phone') ?? $account->phone }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> ایمیل </label>
                                                <input type="text" name="email" class="form-control nonPersianletters"
                                                    id="email" placeholder="ایمیل..."
                                                    value="{{ old('email') ?? $account->email }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> تاریخ تولد </label>
                                                <input type="text" name="birthday" class="datepicker form-control"
                                                    id="birthday" placeholder="۱۴۰۱/۰۱/۰۱"
                                                    value="{{ old('birthday') ?? fa_number(Verta::instance($account->birthday)->format('Y/m/d')) }}"
                                                    readonly />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> کد ملی </label>
                                                <input type="text" name="mellicode" class="form-control just-numbers"
                                                    id="mellicode" placeholder="کد ملی..."
                                                    value="{{ old('mellicode') ?? $account->mellicode }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> استان </label>
                                                <input type="text" name="state" class="form-control" id="state"
                                                    placeholder="استان..."
                                                    value="{{ old('state') ?? $account->state }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> شهر </label>
                                                <input type="text" name="city" class="form-control" id="city"
                                                    placeholder="شهر..." value="{{ old('city') ?? $account->city }}" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label required"> آدرس </label>
                                                <input type="text" name="address" class="form-control" id="address"
                                                    placeholder="آدرس..."
                                                    value="{{ old('address') ?? $account->address }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> کد پستی </label>
                                                <input type="text" name="postalcode" class="form-control just-numbers"
                                                    id="postalcode" placeholder="کد پستی..."
                                                    value="{{ old('postalcode') ?? $account->postalcode }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> نام شرکت / فروشگاه<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="company" class="form-control" id="company"
                                                    placeholder="نام شرکت..."
                                                    value="{{ old('company') ?? $account->company }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> اسلاگ </label>
                                                <input type="text" name="slug"
                                                    class="form-control nonPersianletters" id="slug"
                                                    placeholder="اسلاگ..." value="{{ old('slug') ?? $account->slug }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label "> نوع حساب </label>
                                                <select name="account_acl" class="form-control select2">
                                                    <option value="customer"
                                                        @if (old('account_acl') ?? $account->account_acl == 'customer') selected @endif>مشتری</option>
                                                    <option value="agent"
                                                        @if (old('account_acl') ?? $account->account_acl == 'agent') selected @endif>نماینده</option>
                                                    <option value="cos"
                                                        @if (old('account_acl') ?? $account->account_acl == 'cos') selected @endif>همکار فروش
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> نام رابط </label>
                                                <input type="text" name="interface_name"
                                                    class="form-control " placeholder="نام رابط..."
                                                    value="{{ old('interface_name') ?? $account->interface_name }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label class="form-label required"> موبایل رابط </label>
                                                <input type="text" name="interface_mobile"
                                                    class="form-control " placeholder="موبایل رابط..."
                                                    value="{{ old('interface_mobile') ?? $account->interface_mobile }}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label"> توضیحات </label>
                                                <textarea rows="5" class="form-control Reditor1" name="desc">{{$account->description}}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="company_fields">
                                        <hr>
                                        <h4>اطلاعات شرکت</h4>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label required"> نوع شرکت </label>
                                                    <select class="form-control" id="company_type" name="company_type">
                                                        <option value="">انتخاب کنید...</option>
                                                        <option value="شرکت های سهامی"
                                                            @if (old('company_type') == 'شرکت های سهامی') selected @endif
                                                            @if ($account->company_type == 'شرکت های سهامی') selected @endif>شرکت های
                                                            سهامی</option>
                                                        <option value="شرکت با مسئولیت محدود"
                                                            @if (old('company_type') == 'شرکت با مسئولیت محدود') selected @endif
                                                            @if ($account->company_type == 'شرکت با مسئولیت محدود') selected @endif>شرکت با
                                                            مسئولیت محدود</option>
                                                        <option value="شرکت های تضامنی"
                                                            @if (old('company_type') == 'شرکت های تضامنی') selected @endif
                                                            @if ($account->company_type == 'شرکت های تضامنی') selected @endif>شرکت های
                                                            تضامنی</option>
                                                        <option value="شرکت مختلط غیر سهامی"
                                                            @if (old('company_type') == 'شرکت مختلط غیر سهامی') selected @endif
                                                            @if ($account->company_type == 'شرکت مختلط غیر سهامی') selected @endif>شرکت مختلط
                                                            غیر سهامی</option>
                                                        <option value="شرکت مختلط سهامی"
                                                            @if (old('company_type') == 'شرکت مختلط سهامی') selected @endif
                                                            @if ($account->company_type == 'شرکت مختلط سهامی') selected @endif>شرکت مختلط
                                                            سهامی</option>
                                                        <option value="شرکت های نسبی"
                                                            @if (old('company_type') == 'شرکت های نسبی') selected @endif
                                                            @if ($account->company_type == 'شرکت های نسبی') selected @endif>شرکت های
                                                            نسبی</option>
                                                        <option value="شرکت های تعاونی تولید و مصرف"
                                                            @if (old('company_type') == 'شرکت های تعاونی تولید و مصرف') selected @endif
                                                            @if ($account->company_type == 'شرکت های تعاونی تولید و مصرف') selected @endif>شرکت های
                                                            تعاونی تولید و مصرف</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label required"> شناسه ملی </label>
                                                    <input type="text" name="national_id"
                                                        class="form-control just-numbers" id="national_id"
                                                        placeholder="شناسه ملی..."
                                                        value="{{ old('national_id') ?? $account->national_id }}" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label required"> شماره ثبت </label>
                                                    <input type="text" name="registration_number"
                                                        class="form-control just-numbers" id="registration_number"
                                                        placeholder="شماره ثبت..."
                                                        value="{{ old('registration_number') ?? $account->registration_number }}" />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label class="form-label required"> تاریخ ثبت </label>
                                                    <input type="text" name="registration_date"
                                                        class="datepicker form-control" id="registration_date"
                                                        placeholder="۱۴۰۱/۰۱/۰۱"
                                                        value="{{ old('registration_date') ?? fa_number(Verta::instance($account->registration_date)->format('Y/m/d')) }}"
                                                        readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="account_status">وضعیت اکانت:</label>
                                            @if ($account->account_status == 'active')
                                                <span class="badge bg-success"
                                                    style="font-size: 17px;color: #FFF !important;">فعال</span>
                                            @else
                                                <span class="badge bg-danger"
                                                    style="font-size: 17px;color: #FFF !important;">غیرفعال</span>
                                            @endif
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
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            if ($('#account_type').val() === 'حقوقی') {
                $('#company_fields').show();
            } else {
                $('#company_fields').hide();
            }

            $('#account_type').change(function() {
                if ($(this).val() === 'حقوقی') {
                    $('#company_fields').show();
                } else {
                    $('#company_fields').hide();
                }
            });
        });
        ClassicEditor.create(document.querySelector('.Reditor1'), {
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|', 'heading',
                    '|', 'bold', 'italic',
                    '|', 'link', 'insertImage', 'insertTable', 'mediaEmbed',
                    '|', 'bulletedList', 'numberedList'
                ]
            },
            language: {
                // The UI will be Arabic.
                ui: 'fa',
                // And the content will be edited in Arabic.
                content: 'fa'
            }
        }).catch(error => {
            console.error(error);
        });
    </script>

    <script src="{{ asset('js/validation.js') }}"></script>

@endsection
