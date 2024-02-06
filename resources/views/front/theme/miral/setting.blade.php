<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">عمومی</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" class="form-control" placeholder="میرال..."
                    value="{{ $settingModel->getSetting('title', $account->id) }}">
            </div>
            <div class="col-8 form-group">
                <label class="form-label">توضیحات</label>
                <input type="text" name="description" class="form-control" placeholder="توضیحات..."
                    value="{{ $settingModel->getSetting('description', $account->id) }}">
            </div>
        </div>
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">فهرست و لوگو</h3>
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
            <div class="col-4 form-group bg-secondary">
                <label class="form-label">تصویر لوگو</label>
                <input type="file" name="logo" onchange="uploadImage(this)">
                @if ($image = imageLoader('logo'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('logo')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
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
            <div class="col-4 form-group">
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
            <div class="col-1 form-group">
                <label class="form-label">عنوان اول</label>
                <textarea type="text" name="first_title_section2" class="form-control" placeholder="عنوان اول..."
                    value="{{ $settingModel->getSetting('first_title_section2', $account->id) }}"></textarea>
            </div>
            <div class="col-1 form-group">
                <label class="form-label">عنوان دوم</label>
                <textarea> type="text" name="secound_title_section2" class="form-control" placeholder="عنوان دوم..."
                    value="{{ $settingModel->getSetting('secound_title_section2', $account->id) }}">
            </div>
            <div class="col-1 form-group">
                <label class="form-label">عنوان سوم</label>
                <input type="text" name="thired_title_section2" class="form-control" placeholder="عنوان سوم..."
                    value="{{ $settingModel->getSetting('thired_title_section2', $account->id) }}">
            </div>
            <div class="col-1 form-group">
                <label class="form-label">دکمه</label>
                <input type="text" name="button_section2" class="form-control" placeholder="دکمه"
                    value="{{ $settingModel->getSetting('button_section2', $account->id) }}">
            </div>
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
            <div class="col-4 form-group">
                <label class="form-label">تصویرآیکن اول</label>
                <input type="file" name="first_icon" onchange="uploadImage(this)">
                @if ($image = imageLoader('first_icon'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('first_icon')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
            <div class="col-4 form-group">
                <label class="form-label">عنوان اول</label>
                <input type="text" name="first_title_section3" class="form-control" placeholder="عنوان اول..."
                    value="{{ $settingModel->getSetting('first_title_section3', $account->id) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">زیر عنوان اول</label>
                <input type="text" name="first_subtitle_section3" class="form-control"
                    placeholder="زیر عنوان اول..."
                    value="{{ $settingModel->getSetting('first_subtitle_section3', $account->id) }}">
            </div>
            <hr>
            <div class="col-4 form-group">
                <label class="form-label">تصویرآیکن دوم</label>
                <input type="file" name="secound_icon" onchange="uploadImage(this)">
                @if ($image = imageLoader('secound_icon'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('secound_icon')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
            <div class="col-4 form-group">
                <label class="form-label">عنوان دوم</label>
                <input type="text" name="secound_title_section3" class="form-control" placeholder="عنوان دوم..."
                    value="{{ $settingModel->getSetting('secound_title_section3', $account->id) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">زیر عنوان دوم</label>
                <input type="text" name="secound_subtitle_section3" class="form-control"
                    placeholder="زیر عنوان دوم..."
                    value="{{ $settingModel->getSetting('secound_subtitle_section3', $account->id) }}">
            </div>
            <hr>
            <div class="col-4 form-group">
                <label class="form-label">تصویرآیکن سوم</label>
                <input type="file" name="third_icon" onchange="uploadImage(this)">
                @if ($image = imageLoader('third_icon'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('third_icon')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
            <div class="col-4 form-group">
                <label class="form-label">عنوان سوم</label>
                <input type="text" name="third_title_section3" class="form-control" placeholder="عنوان دوم..."
                    value="{{ $settingModel->getSetting('third_title_section3', $account->id) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">زیر عنوان سوم</label>
                <input type="text" name="third_subtitle_section3" class="form-control"
                    placeholder="زیر عنوان دوم..."
                    value="{{ $settingModel->getSetting('third_subtitle_section3', $account->id) }}">
            </div>
            <hr>
        </div>
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">پروژه ها</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="title_section7" class="form-control" placeholder="عنوان..."
                    value="{{ $settingModel->getSetting('title_section7', $account->id) }}">
            </div>
            <div class="col-6 form-group">
                <label class="form-label">توضیحات</label>
                <input type="text" name="text_section7" class="form-control" placeholder="توضیحات..."
                    value="{{ $settingModel->getSetting('text_section7', $account->id) }}">
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
