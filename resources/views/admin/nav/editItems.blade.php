<div class="row">
    <div class="col-md-6">
        <div class="container">
            <div id="accordion">
                <div class="card " style="margin-bottom: 0 !important">
                    <div class="card-header p-0" id="heading-1">
                        <h5 class="mb-0">
                            <button class="btn bg-white d-block w-100" data-toggle="collapse" type="button"
                                data-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1"> <i
                                    class="fa float-left" aria-hidden="true"></i>
                                <span class="float-right"><strong>صفحات</strong></span>
                            </button>
                        </h5>
                    </div>
                    <div id="collapse-1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            @if ($pages->count() > 0)
                                <form action="">
                                    <label for="">لیست صفحات</label>
                                    <select name="page_id" class="custom-select select2">
                                        @foreach ($pages as $page)
                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>

                                </form>
                            @else
                                <div class="alert alert-info"> صفحه ای برای انتخاب وجود ندارد!</div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom: 0 !important">
                    <div class="card-header p-0" id="heading-2">
                        <h5 class="mb-0">
                            <button class="btn bg-white d-block w-100" data-toggle="collapse" type="button"
                                data-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2"> <i
                                    class="fa float-left" aria-hidden="true"></i>
                                <span class="float-right"><strong>پیوند دلخواه</strong></span>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse-2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="">نام پیوند </label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">نشانی </label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">بازشدن در</label>
                                    <select name="target" class="custom-select select2">
                                        <option value="_self">پنجره کنونی</option>
                                        <option value="_blank">پنجره جدید</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">قابل مشاهده برای موتور های جتستجو</label>
                                    <select name="rel" class="custom-select select2">
                                        <option value="true">بله</option>
                                        <option value="false">خیر</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
