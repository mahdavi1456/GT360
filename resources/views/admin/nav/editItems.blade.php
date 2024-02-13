<div class="row">
    <div class="col-md-6">
        <div class="container">
            <div id="accordion">
                {{-- page section --}}
                <div class="card" style="margin-bottom: 0 !important">
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
                <div class="card " style="margin-bottom: 0 !important">
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
                                    <label for="">عنوان </label>
                                    <input type="text" class="form-control" placeholder="عنوان..." name="name">
                                </div>
                                <div class="form-group">
                                    <label for="">نشانی </label>
                                    <input type="text" class="form-control" placeholder="نشانی..." name="link">
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
                {{-- <div id="accordion1"> --}}
                <div id="sortable5">
                    @foreach ($items as $item)
                        <div class="sortable-item" item-id='{{ $item->id }}' item-type='parent'>
                            @if ($item->item_type == 'link')
                                {{-- link edit section --}}
                                <div class="card ">
                                    <div class="p-0" id="heading-{{ $item->id }}">
                                        <h5 class="mb-0">
                                            <a class="btn bg-white d-block w-100 h-100 collapsed"
                                                data-toggle="collapse" data-target="#collapse-{{ $item->id }}"
                                                aria-expanded="true" aria-controls="collapse">
                                                <div>
                                                    <i class="fa float-left" aria-hidden="true"></i>
                                                    <small
                                                        class="float-left ml-3 text-secondary">{{ $item->type_value }}</small>
                                                    <span
                                                        class="float-right"><strong>{{ $item->name }}</strong></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-{{ $item->id }}" class="collapse"
                                        aria-labelledby="headingOne" data-parent="#accordion1">
                                        <div class="card-body">
                                            <form>
                                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                <div class="form-group">
                                                    <label for="">عنوان</label>
                                                    <input name="name" placeholder="عنوان..." type="text"
                                                        class="form-control" value="{{ $item->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">نشانی </label>
                                                    <input name="link" type="text" placeholder="نشانی..."
                                                        class="form-control" value="{{ $item->link }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">بازشدن در</label>
                                                    <select name="target" class="custom-select select2">
                                                        <option @selected($item->target == '_self') value="_self">پنجره کنونی
                                                        </option>
                                                        <option @selected($item->target == '_blank') value="_blank">پنجره جدید
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">قابل مشاهده برای موتورهای جستجو</label>
                                                    <select name="rel" class="custom-select select2">
                                                        <option @selected($item->rel == 'true') value="true">بله
                                                        </option>
                                                        <option @selected($item->rel == 'false') value="false">خیر
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group text-left">
                                                    <button type="button" onclick="submiteditForm(this)"
                                                        class="btn btn-primary btn-sm">ویرایش</button>
                                                    <button type="button"
                                                        onclick="destroyItem({{ $item->id . ',' . $nav->id }})"
                                                        class="btn btn-danger btn-sm">حذف</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- page edit section --}}
                            @elseif ($item->item_type == 'page')
                                <div class="card">
                                    <div class="card-header p-0" id="heading-{{ $item->id }}">
                                        <h5 class="mb-0 ">
                                            <a class="btn bg-white d-block w-100 h-100 collapsed"
                                                data-toggle="collapse" data-target="#collapse-{{ $item->id }}"
                                                aria-expanded="true" aria-controls="collapse">
                                                <div>

                                                    <i class="fa float-left" aria-hidden="true"></i>
                                                    <small
                                                        class="float-left ml-3 text-secondary">{{ $item->type_value }}</small>
                                                    <span
                                                        class="float-right"><strong>{{ $item->name }}</strong></span>
                                                </div>
                                                <div class="clearfix"></div>

                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse-{{ $item->id }}" class="collapse"
                                        aria-labelledby="headingOne" data-parent="#accordion1">
                                        <div class="card-body">
                                            <form>
                                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                                <div class="form-group">
                                                    <label for="">عنوان </label>
                                                    <input name="name" placeholder="عنوان..." type="text"
                                                        class="form-control" value="{{ $item->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">نشانی </label>
                                                    <input name="link" placeholder="نشانی..." readonly
                                                        type="text" class="form-control"
                                                        value="{{ $item->link }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">بازشدن در</label>
                                                    <select name="target" class="custom-select select2">
                                                        <option @selected($item->target == '_self') value="_self">پنجره کنونی
                                                        </option>
                                                        <option @selected($item->target == '_blank') value="_blank">پنجره جدید
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">قابل مشاهده برای موتورهای جستجو</label>
                                                    <select name="rel" class="custom-select select2">
                                                        <option @selected($item->rel == 'true') value="true">بله
                                                        </option>
                                                        <option @selected($item->rel == 'false') value="false">خیر
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group text-left">
                                                    <button type="button" onclick="submiteditForm(this)"
                                                        class="btn btn-primary btn-sm">ویرایش</button>
                                                    <button type="button"
                                                        onclick="destroyItem({{ $item->id . ',' . $nav->id }})"
                                                        class="btn btn-danger btn-sm">حذف</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                       @foreach ($item->children as $child)
                       @php

                       @endphp
                       <div class="sortable-item mr-30" item-id='{{ $child->id }}' item-type='child'>
                        @if ($child->item_type == 'link')
                            {{-- link edit section --}}
                            <div class="card ">
                                <div class="p-0" id="heading-{{ $child->id }}">
                                    <h5 class="mb-0">
                                        <a class="btn bg-white d-block w-100 h-100 collapsed"
                                            data-toggle="collapse" data-target="#collapse-{{ $child->id }}"
                                            aria-expanded="true" aria-controls="collapse">
                                            <div>
                                                <i class="fa float-left" aria-hidden="true"></i>
                                                <small
                                                    class="float-left ml-3 text-secondary">{{ $child->type_value }}</small>
                                                <span
                                                    class="float-right"><strong>{{ $child->name }}</strong></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-{{ $child->id }}" class="collapse"
                                    aria-labelledby="headingOne" data-parent="#accordion1">
                                    <div class="card-body">
                                        <form>
                                            <input type="hidden" name="item_id" value="{{ $child->id }}">
                                            <div class="form-group">
                                                <label for="">عنوان</label>
                                                <input name="name" placeholder="عنوان..." type="text"
                                                    class="form-control" value="{{ $child->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">نشانی </label>
                                                <input name="link" type="text" placeholder="نشانی..."
                                                    class="form-control" value="{{ $child->link }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">بازشدن در</label>
                                                <select name="target" class="custom-select select2">
                                                    <option @selected($child->target == '_self') value="_self">پنجره کنونی
                                                    </option>
                                                    <option @selected($child->target == '_blank') value="_blank">پنجره جدید
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">قابل مشاهده برای موتورهای جستجو</label>
                                                <select name="rel" class="custom-select select2">
                                                    <option @selected($child->rel == 'true') value="true">بله
                                                    </option>
                                                    <option @selected($child->rel == 'false') value="false">خیر
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group text-left">
                                                <button type="button" onclick="submiteditForm(this)"
                                                    class="btn btn-primary btn-sm">ویرایش</button>
                                                <button type="button"
                                                    onclick="destroyItem({{ $child->id . ',' . $nav->id }})"
                                                    class="btn btn-danger btn-sm">حذف</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- page edit section --}}
                        @elseif ($child->item_type == 'page')
                            <div class="card">
                                <div class="card-header p-0" id="heading-{{ $child->id }}">
                                    <h5 class="mb-0 ">
                                        <a class="btn bg-white d-block w-100 h-100 collapsed"
                                            data-toggle="collapse" data-target="#collapse-{{ $child->id }}"
                                            aria-expanded="true" aria-controls="collapse">
                                            <div>

                                                <i class="fa float-left" aria-hidden="true"></i>
                                                <small
                                                    class="float-left ml-3 text-secondary">{{ $child->type_value }}</small>
                                                <span
                                                    class="float-right"><strong>{{ $child->name }}</strong></span>
                                            </div>
                                            <div class="clearfix"></div>

                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse-{{ $child->id }}" class="collapse"
                                    aria-labelledby="headingOne" data-parent="#accordion1">
                                    <div class="card-body">
                                        <form>
                                            <input type="hidden" name="item_id" value="{{ $child->id }}">
                                            <div class="form-group">
                                                <label for="">عنوان </label>
                                                <input name="name" placeholder="عنوان..." type="text"
                                                    class="form-control" value="{{ $child->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">نشانی </label>
                                                <input name="link" placeholder="نشانی..." readonly
                                                    type="text" class="form-control"
                                                    value="{{ $child->link }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">بازشدن در</label>
                                                <select name="target" class="custom-select select2">
                                                    <option @selected($child->target == '_self') value="_self">پنجره کنونی
                                                    </option>
                                                    <option @selected($child->target == '_blank') value="_blank">پنجره جدید
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">قابل مشاهده برای موتورهای جستجو</label>
                                                <select name="rel" class="custom-select select2">
                                                    <option @selected($child->rel == 'true') value="true">بله
                                                    </option>
                                                    <option @selected($child->rel == 'false') value="false">خیر
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group text-left">
                                                <button type="button" onclick="submiteditForm(this)"
                                                    class="btn btn-primary btn-sm">ویرایش</button>
                                                <button type="button"
                                                    onclick="destroyItem({{ $child->id . ',' . $nav->id }})"
                                                    class="btn btn-danger btn-sm">حذف</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                       @endforeach
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
<script>
    $(document).ready(function() {
        var sortedItems = {};
        $("#sortable5").sortable({
            items: '.sortable-item',
            connectWith: '.sortable-item',
            start: function(event, ui) {
                // Store the initial X coordinate of the dragged item
                startX = ui.item;
                // $(startX).css( "marginRight", "30px" );

            },
            sort: function(event, ui) {
                var item = $(ui.item);

                if (parseFloat(item.css('left')) < -40) {
                    //console.log('sort',parseFloat(sort.css('left')));
                    let prev = item.prev(".sortable-item");

                    if (prev.hasClass('sortable-item')) {
                        item.addClass('mr-30');
                        item.attr('item-type', 'child');
                        sortedItems[item.attr('item-id')] = {
                            class: 'mr-30',
                            type: 'child'
                        }
                    }

                }
                if (parseFloat(item.css('left')) > -5) {
                    item.removeClass('mr-30').attr('item-type', 'parent');

                }
            },
            update: function(event, ui) {
                // console.log('update');
                var item = $(ui.item);
                let prev = item.prev(".sortable-item");

                $.each(sortedItems, function(itemId, data) {
                    $(`.sortable-item[item-id=${itemId}]`).attr('item-type', data.type);
                    $(`.sortable-item[item-id=${itemId}]`).addClass(data.class);
                });
                if (!prev.hasClass('sortable-item')) {
                    item.removeClass('mr-30');
                    item.attr('item-type', 'parent');
                    sortedItems[item.attr('item-id')] = {
                        class: '',
                        type: 'parent'
                    }
                }
                //  sendAjax();
            },
            stop: function(event, ui) {
                sortForRequest();
            }
        }).disableSelection();
    });

    function sortForRequest() {
        let sortForSend = {};
        let i = 1;
        $.each($('.sortable-item'), function(itemId, tag) {
            if ($(tag).attr('item-type') == 'parent') {
                sortForSend['parent-' + $(tag).attr('item-id')] = {
                    order: i
                };
                i++;
            }
            if ($(tag).attr('item-type') == 'child') {
                let parent = $(tag).prevAll('.sortable-item[item-type=parent]:first').attr('item-id');

                if (!sortForSend['parent-'+parent].children) {
                    sortForSend['parent-'+parent].children = [];
                }
                // sortForSend['parent-'+parent]={order:i};
                sortForSend['parent-'+parent].children.push($(tag).attr('item-id'));
                i++;
            }
        });
        console.log('data',sortForSend);
        // return sortForSend;
        $("#loading-overlay").fadeIn();
        $.ajax({
            url: "{{ route('nav.resort') }}",
            method: 'get',
            data: sortForSend,
            success: function(res) {
                console.log('res',res);
                $("#loading-overlay").fadeOut();

            },
            error: function(res) {
                $("#loading-overlay").fadeOut();
                Swal.fire({
                    title: "خطا",
                    text: res.responseJSON.message,
                    icon: "error"
                });
                console.log(res);
            }
        });
    }
    // function goAjax(sort) {

    // }
</script>
