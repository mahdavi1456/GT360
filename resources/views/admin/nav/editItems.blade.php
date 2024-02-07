<div class="row">
    <div class="col-md-6">
        <div class="container">
            <div id="accordion">
                {{-- page section --}}
                <div class="card " style="margin-bottom: 0 !important">
                    <div class="card-header p-0" id="heading-1">
                        <h5 class="mb-0">
                            <button class="btn bg-white d-block w-100 collapsed " data-toggle="collapse" type="button"
                                data-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one"> <i
                                    class="fa float-left" aria-hidden="true"></i>
                                <span class="float-right"><strong>صفحات</strong></span>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse-one" class="collapse" aria-labelledby="headingOne" data-parent="#accordionl">
                        <div class="card-body">
                            @if ($pages->count() > 0)
                                <form id="page-form">
                                    <input type="hidden" name="item_type" value="page">
                                    <input type="hidden" name="nav_id" value="{{ $nav->id }}">

                                    <div class="form-group">
                                        <label for="">لیست صفحات</label>
                                        <select name="pages[]" class="selectpicker w-100" multiple>
                                            @foreach ($pages as $page)
                                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group text-left">
                                        <button onclick="submitForm('#page-form')" type="button"
                                            class="btn btn-primary btn-sm">اضافه شدن</button>
                                    </div>
                                </form>
                            @else
                                <div class="alert alert-info"> صفحه ای برای انتخاب وجود ندارد!</div>
                            @endif

                        </div>
                    </div>
                </div>
                {{-- link section --}}
                <div class="card" style="margin-bottom: 0 !important">
                    <div class="card-header p-0" id="heading-two">
                        <h5 class="mb-0">
                            <button class="btn bg-white d-block w-100 collapsed" data-toggle="collapse" type="button"
                                data-target="#collapse-two" aria-expanded="true" aria-controls="collapse-two"> <i
                                    class="fa float-left" aria-hidden="true"></i>
                                <span class="float-right"><strong>پیوند دلخواه</strong></span>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse-two" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form id='link-form'>
                                <input type="hidden" name="item_type" value="link">
                                <input type="hidden" name="nav_id" value="{{ $nav->id }}">
                                <div class="form-group">
                                    <label for="">نام پیوند </label>
                                    <input type="text" class="form-control" required name="name"
                                        oninvalid="this.setCustomValidity('تکمیل این کادر الزامیست')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="">نشانی </label>
                                    <input type="text" class="form-control" required name="link"
                                        oninvalid="this.setCustomValidity('تکمیل این کادر الزامیست')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="">بازشدن در</label>
                                    <select name="target" class="custom-select select2">
                                        <option value="_self">پنجره کنونی</option>
                                        <option value="_blank">پنجره جدید</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">قابل مشاهده برای موتور های جستجو</label>
                                    <select name="rel" class="custom-select select2">
                                        <option value="true">بله</option>
                                        <option value="false">خیر</option>
                                    </select>
                                </div>
                                <div class="form-group text-left">
                                    <button type="button" onclick="submitForm('#link-form')"
                                        class="btn btn-primary btn-sm">اضافه شدن</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- left section --}}
    <div class="col-md-6">
        @if ($items->count() > 0)
            <div class="container">
                <div id="accordion1">
                    @foreach ($items as $item)
                    @if ($item->item_type=='link')
                    {{-- link edit section --}}
                    <div class="card">
                        <div class="card-header p-0" id="heading-{{ $item->id }}">
                            <h5 class="mb-0">
                                <button class="btn bg-white d-block w-100 collapsed" data-toggle="collapse"
                                    type="button" data-target="#collapse-{{ $item->id }}"
                                    aria-expanded="true" aria-controls="collapse">
                                    <i class="fa float-left" aria-hidden="true"></i>
                                    <small class="float-left ml-3 text-secondary">{{ $item->type_value }}</small>
                                    <span class="float-right"><strong>{{ $item->name }}</strong></span>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse-{{ $item->id }}" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordion1">
                            <div class="card-body">
                                <form >
                                    <input type="hidden" name="item_id" value="{{$item->id}}">
                                    <div class="form-group">
                                        <label for="">نام پیوند </label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $item->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">نشانی </label>
                                        <input name="link" type="text" class="form-control"
                                            value="{{ $item->link }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">بازشدن در</label>
                                        <select name="target" class="custom-select select2">
                                            <option @selected($item->target == '_self') value="_self">پنجره کنونی
                                            </option>
                                            <option @selected($item->target == '_blank') value="_blank">پنجره جدید</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">قابل مشاهده برای موتورهای جستجو</label>
                                        <select name="rel" class="custom-select select2">
                                            <option @selected($item->rel == 'true') value="true">بله</option>
                                            <option @selected($item->rel == 'false') value="false">خیر</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-left">
                                        <button type="button" onclick="submiteditForm(this)"
                                            class="btn btn-primary btn-sm">ویرایش</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- page edit section --}}
                    @elseif ($item->item_type=='page')
                    <div class="card">
                        <div class="card-header p-0" id="heading-{{ $item->id }}">
                            <h5 class="mb-0">
                                <button class="btn bg-white d-block w-100 collapsed" data-toggle="collapse"
                                    type="button" data-target="#collapse-{{ $item->id }}"
                                    aria-expanded="true" aria-controls="collapse">
                                    <i class="fa float-left" aria-hidden="true"></i>
                                    <small class="float-left ml-3 text-secondary">{{ $item->type_value }}</small>
                                    <span class="float-right"><strong>{{ $item->name }}</strong></span>
                                </button>
                            </h5>
                        </div>
                        <div id="collapse-{{ $item->id }}" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordion1">
                            <div class="card-body">
                                <form >
                                    <input type="hidden" name="item_id" value="{{$item->id}}">
                                    <div class="form-group">
                                        <label for="">نام پیوند </label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $item->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">نشانی </label>
                                        <input name="link" readonly type="text" class="form-control"
                                            value="{{ $item->link }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">بازشدن در</label>
                                        <select name="target" class="custom-select select2">
                                            <option @selected($item->target == '_self') value="_self">پنجره کنونی
                                            </option>
                                            <option @selected($item->target == '_blank') value="_blank">پنجره جدید</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">قابل مشاهده برای موتورهای جستجو</label>
                                        <select name="rel" class="custom-select select2">
                                            <option @selected($item->rel == 'true') value="true">بله</option>
                                            <option @selected($item->rel == 'false') value="false">خیر</option>
                                        </select>
                                    </div>
                                    <div class="form-group text-left">
                                        <button type="button" onclick="submiteditForm(this)"
                                            class="btn btn-primary btn-sm">ویرایش</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        @else
            <div class="alert alert-info">
                مقداری جهت نمایش وجود ندارد
            </div>
        @endif
    </div>
</div>
