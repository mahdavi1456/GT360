<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">عمومی</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">تصویر لوگو</label>
                <input type="file" name="first_cover" onchange="uploadImage(this)">

                @if ($image = imageLoader('first_cover'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('first_cover')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
            <div class="col-3 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" class="form-control" placeholder="عنوان..."
                    value="{{ $settingModel->getSetting('title', $account->id) }}">
            </div>
            <div class="col-3 form-group">
                <label class="form-label">توضیحات</label>
                <input type="text" name="description" class="form-control" placeholder="توضیحات..."
                    value="{{ $settingModel->getSetting('description', $account->id) }}">
            </div>
        </div>
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">فهرست</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col form-group">
                <label class="form-label">مورد اول</label>
                <input type="text" name="nav_item_text1" class="form-control" placeholder="مورد اول..."
                    value="{{ $settingModel->getSetting('nav_item_text1', $account->id) }}">
            </div>
            <div class="col form-group">
                <label class="form-label">مورد دوم</label>
                <input type="text" name="nav_item_text2" class="form-control" placeholder="مورد دوم..."
                    value="{{ $settingModel->getSetting('nav_item_text2', $account->id) }}">
            </div>
            <div class="col form-group">
                <label class="form-label">مورد سوم</label>
                <input type="text" name="nav_item_text3" class="form-control" placeholder="مورد سوم..."
                    value="{{ $settingModel->getSetting('nav_item_text3', $account->id) }}">
            </div>
            <div class="col form-group">
                <label class="form-label">مورد چهارم</label>
                <input type="text" name="nav_item_text4" class="form-control" placeholder="مورد چهارم..."
                    value="{{ $settingModel->getSetting('nav_item_text4', $account->id) }}">
            </div>
            <div class="col form-group">
                <label class="form-label">مورد پنجم</label>
                <input type="text" name="nav_item_text5" class="form-control" placeholder="مورد پنجم..."
                    value="{{ $settingModel->getSetting('nav_item_text5', $account->id) }}">
            </div>
            <div class="col form-group">
                <label class="form-label">مورد ششم</label>
                <input type="text" name="nav_item_text6" class="form-control" placeholder="مورد ششم..."
                    value="{{ $settingModel->getSetting('nav_item_text6', $account->id) }}">
            </div>
            <div class="col form-group">
                <label class="form-label">مورد هفتم</label>
                <input type="text" name="nav_item_text7" class="form-control" placeholder="مورد هفتم..."
                    value="{{ $settingModel->getSetting('nav_item_text7', $account->id) }}">
            </div>
        </div>
    </div>
</div>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">بخش دوم</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">تصویر</label>
                <input type="file" name="first_cover_sec2" onchange="uploadImage(this)">
                @if ($image = imageLoader('first_cover_sec2'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('first_cover_sec2')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">عنوان اول</label>
                <input type="text" name="title_sec2" class="form-control" placeholder="عنوان اول..."
                    value="{{ $settingModel->getSetting('title_sec2', $account->id) }}">
            </div>
            <div class="col-12 form-group">
                <div class="col-12 form-group">
                    <label class="form-label">زیر عنوان اول</label>
                    <textarea rows="4" name="description_sec2" class="form-control" placeholder="متن اول...">{{ $settingModel->getSetting('description_sec2', $account->id) }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">معرفی</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">عنوان اول</label>
                <input type="text" name="first_title" class="form-control" placeholder="عنوان اول..."
                    value="{{ $settingModel->getSetting('first_title', $account->id) }}">
            </div>
            <div class="col-6 form-group">
                <label class="form-label">زیر عنوان اول</label>
                <input type="text" name="first_subtitle" class="form-control" placeholder="زیر عنوان اول..."
                    value="{{ $settingModel->getSetting('first_subtitle', $account->id) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">متن اول</label>
                <textarea rows="4" name="first_text" class="form-control" placeholder="متن اول...">{{ $settingModel->getSetting('first_text', $account->id) }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">تماس</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">نقشه گوگل</label>
                <textarea name="google_map" class="form-control ltr" placeholder="نقشه گوگل...">{{ $settingModel->getSetting('google_map', $account->id) }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">خدمات</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">عنوان خدمات</label>
                <input type="text" name="service_title" class="form-control" placeholder="عنوان خدمات..."
                    value="{{ $settingModel->getSetting('service_title', $account->id) }}">
            </div>
            <div class="col-6 form-group">
                <label class="form-label">متن خدمات</label>
                <input type="text" name="service_text" class="form-control" placeholder="متن خدمات..."
                    value="{{ $settingModel->getSetting('service_text', $account->id) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">آیکن اول</label>
                <input type="text" name="service_first_icon" class="form-control" placeholder="آیکن اول..."
                    value="{{ $settingModel->getSetting('service_first_icon', $account->id) }}">
                <hr>
                <label class="form-label">عنوان اول</label>
                <input type="text" name="service_first_icon" class="form-control" placeholder="عنوان اول..."
                    value="{{ $settingModel->getSetting('service_first_title', $account->id) }}">
            </div>
            <div class="col-6 form-group">
                <label class="form-label">آیکن دوم</label>
                <input type="text" name="service_second_icon" class="form-control" placeholder="آیکن دوم..."
                    value="{{ $settingModel->getSetting('service_second_icon', $account->id) }}">
                <hr>
                <label class="form-label">عنوان دوم</label>
                <input type="text" name="service_second_title" class="form-control" placeholder="عنوان دوم..."
                    value="{{ $settingModel->getSetting('service_second_title', $account->id) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">آیکن سوم</label>
                <input type="text" name="service_third_icon" class="form-control" placeholder="آیکن سوم..."
                    value="{{ $settingModel->getSetting('service_third_icon', $account->id) }}">
                <hr>
                <label class="form-label">عنوان سوم</label>
                <input type="text" name="service_third_title" class="form-control" placeholder="عنوان چهارم..."
                    value="{{ $settingModel->getSetting('service_third_title', $account->id) }}">
            </div>
            <div class="col-6 form-group">
                <label class="form-label">آیکن چهارم</label>
                <input type="text" name="service_fourth_icon" class="form-control" placeholder="آیکن چهارم..."
                    value="{{ $settingModel->getSetting('service_fourth_icon', $account->id) }}">
                <hr>
                <label class="form-label">عنوان چهارم</label>
                <input type="text" name="service_fourth_title" class="form-control" placeholder="عنوان چهارم..."
                    value="{{ $settingModel->getSetting('service_fourth_title', $account->id) }}">
            </div>
        </div>
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">محصولات / نمونه کارها</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="portfolio_title" class="form-control" placeholder="عنوان..."
                    value="{{ $settingModel->getSetting('portfolio_title', $account->id) }}">
            </div>
            <div class="col-6 form-group">
                <label class="form-label">توضیحات</label>
                <input type="text" name="portfolio_text" class="form-control" placeholder="توضیحات..."
                    value="{{ $settingModel->getSetting('portfolio_text', $account->id) }}">
            </div>
        </div>
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">تصاویر</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">

                <label class="form-label">تصویر کاور اول</label>
                <input type="file" name="first_cover" onchange="uploadImage(this)">

                @if ($image = imageLoader('first_cover'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('first_cover')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
            <div class="col-6 form-group">
                <label class="form-label">تصویر کاور دوم</label>
                <input type="file" name="second_cover" onchange="uploadImage(this)">

                @if ($image = imageLoader('second_cover'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('second_cover')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
