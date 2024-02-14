<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">عمومی</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" class="form-control" placeholder="عنوان..."
                    value="{{ $settingModel->getSetting('title', $account->id) }}">
            </div>
            <div class="col-8 form-group">
                <label class="form-label">توضیحات</label>
                <input type="text" name="description" class="form-control" placeholder="توضیحات..."
                    value="{{ $settingModel->getSetting('description', $account->id) }}">
            </div>
            <div class="col form-group">
                <label class="form-label">متن دکمه</label>
                <input type="text" name="button_title" class="form-control" placeholder="متن دکمه..."
                    value="{{ $settingModel->getSetting('button_title', $account->id) }}">
            </div>
        </div>
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش اول</h3>
        <select name="sec1_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('sec_status', $account->id) == 1 ? 'selected' : '' }} value="1">
                فعال</option>
            <option {{ $settingModel->getSetting('sec1_status', $account->id) == 0 ? 'selected' : '' }} value="0">
                غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('sec1_status', $account->id) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label ">تصویر اول</label>
                    <input type="file" name="image1_sec1" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image1_sec1'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image1_sec1')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col form-group">
                    <label class="form-label">عنوان اول</label>
                    <input type="text" name="title1_sec1" class="form-control" placeholder="عنوان کوچک..."
                        value="{{ $settingModel->getSetting('title1_sec1', $account->id) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان اول</label>
                    <input type="text" name="subtitle1_sec1" class="form-control" placeholder="عنوان بزرگ..."
                        value="{{ $settingModel->getSetting('subtitle1_sec1', $account->id) }}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label ">تصویر دوم</label>
                    <input type="file" name="image2_sec1" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image2_sec1'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image2_sec1')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col form-group">
                    <label class="form-label">عنوان دوم</label>
                    <input type="text" name="title2_sec1" class="form-control" placeholder="عنوان کوچک..."
                        value="{{ $settingModel->getSetting('title2_sec1', $account->id) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان اول</label>
                    <input type="text" name="subtitle2_sec1" class="form-control" placeholder="عنوان بزرگ..."
                        value="{{ $settingModel->getSetting('subtitle2_sec1', $account->id) }}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label ">تصویر سوم</label>
                    <input type="file" name="image3_sec1" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image3_sec1'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image3_sec1')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col form-group">
                    <label class="form-label">عنوان سوم</label>
                    <input type="text" name="title3_sec1" class="form-control" placeholder="عنوان کوچک..."
                        value="{{ $settingModel->getSetting('title_sec1', $account->id) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان سوم</label>
                    <input type="text" name="subtitle3_sec1" class="form-control" placeholder="عنوان بزرگ..."
                        value="{{ $settingModel->getSetting('subtitle3_sec1', $account->id) }}">
                </div>
            </div>
            <hr>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">بخش دوم</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col form-group">
                <label class="form-label">عنوان اول</label>
                <input type="text" name="first_title_sec2" class="form-control" placeholder="عنوان اول"
                    value="{{ $settingModel->getSetting('first_title_sec2', $account->id) }}">
            </div>
            <div class="col form-group">
                <label class="form-label">عنوان دوم</label>
                <input type="text" name="second_title_sec2" class="form-control" placeholder="عنوان دوم"
                    value="{{ $settingModel->getSetting('second_title_sec2', $account->id) }}">
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
