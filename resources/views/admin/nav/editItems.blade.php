<div class="row">
    <div class="col-md-6">
        <div class="container">
            <div id="accordion">
                <div class="card " style="margin-bottom: 0 !important">
                    <div class="card-header p-0" id="heading-1">
                        <h5 class="mb-0">
                            <button class="btn bg-white d-block w-100" data-toggle="collapse" type="button"
                                data-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one"> <i
                                    class="fa float-left" aria-hidden="true"></i>
                                <span class="float-right"><strong>صفحات</strong></span>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse-one" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            @if ($pages->count() > 0)
                                <form id="page-form">
                                    <input type="hidden" name="item_type" value="link">
                                    <div class="form-group">
                                        <label for="">لیست صفحات</label>
                                        <select name="page_id" class="custom-select select2">
                                            @foreach ($pages as $page)
                                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group text-left">
                                        <button class="btn btn-primary btn-sm">ذخیره</button>
                                    </div>
                                </form>
                            @else
                                <div class="alert alert-info"> صفحه ای برای انتخاب وجود ندارد!</div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 0 !important">
                    <div class="card-header p-0" id="heading-two">
                        <h5 class="mb-0">
                            <button class="btn bg-white d-block w-100" data-toggle="collapse" type="button"
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
                                        class="btn btn-primary btn-sm">ذخیره</button>
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
                <div id="accordion">
                    @foreach ($items as $item)
                        <div class="card">
                            <div class="card-header p-0" id="heading-{{$item->id}}">
                                <h5 class="mb-0">
                                    <button class="btn bg-white d-block w-100" data-toggle="collapse" type="button"
                                        data-target="#collapse-{{$item->id}}" aria-expanded="true" aria-controls="collapse-{{$item->id}}">
                                        <i class="fa float-left" aria-hidden="true"></i>
                                        <small class="float-left" >{{$item->type_value}}</small>
                                        <span class="float-right"><strong>{{ $item->name }}</strong></span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse-{{$item->id}}" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="">نام پیوند </label>
                                            <input name="name" type="text" class="form-control"
                                                value="{{$item->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">نشانی </label>
                                            <input name="link" type="text" class="form-control" value="{{$item->link}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">بازشدن در</label>
                                            <select name="target" class="custom-select select2">
                                                <option @selected($item->target=='_self') value="_self">پنجره کنونی</option>
                                                <option @selected($item->target=='_blank') value="_blank">پنجره جدید</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">قابل مشاهده برای موتورهای جستجو</label>
                                            <select name="rel" class="custom-select select2">
                                                <option @selected($item->rel=='true') value="true">بله</option>
                                                <option @selected($item->rel=='false') value="false">خیر</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
