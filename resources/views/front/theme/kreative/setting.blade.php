<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">بخش اول</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 form-group">
                <label class="form-label">تصویر زمینه</label>
                <input type="file" name="background_cover" onchange="uploadImage(this)">
                @if ($image = imageLoader('background_cover'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('background_cover')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
            <div class="col-4 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" class="form-control" placeholder="عنوان..."
                       value="{{ $settingModel->getSetting('title', $account->id) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">متن دکمه شروع</label>
                <input type="text" name="start_btn_text" class="form-control" placeholder="متن دکمه شروع..."
                       value="{{ $settingModel->getSetting('start_btn_text', $account->id) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
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
        <h3 class="card-title pull-right">معرفی</h3>
        <select name="about_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('about_status', $account->id) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('about_status', $account->id) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('about_status', $account->id) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان اول</label>
                    <input type="text" name="about_first_title" class="form-control" placeholder="عنوان اول..."
                           value="{{ $settingModel->getSetting('about_first_title', $account->id) }}">
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">زیر عنوان اول</label>
                    <input type="text" name="about_first_subtitle" class="form-control" placeholder="زیر عنوان اول..."
                           value="{{ $settingModel->getSetting('about_first_subtitle', $account->id) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label class="form-label">متن اول</label>
                    <textarea rows="4" name="about_first_text" class="form-control" placeholder="متن اول...">{{ $settingModel->getSetting('about_first_text', $account->id) }}</textarea>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">خدمات</h3>
        <select name="service_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('service_status', $account->id) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('service_status', $account->id) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('service_status', $account->id) == 1)
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
                <div class="col-3 form-group">
                    <label class="form-label">آیکن اول</label>
                    <input type="text" name="service_first_icon" class="form-control" placeholder="آیکن اول..."
                           value="{{ $settingModel->getSetting('service_first_icon', $account->id) }}">
                    <hr>
                    <label class="form-label">عنوان اول</label>
                    <input type="text" name="service_first_title" class="form-control" placeholder="عنوان اول..."
                           value="{{ $settingModel->getSetting('service_first_title', $account->id) }}">
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">آیکن دوم</label>
                    <input type="text" name="service_second_icon" class="form-control" placeholder="آیکن دوم..."
                           value="{{ $settingModel->getSetting('service_second_icon', $account->id) }}">
                    <hr>
                    <label class="form-label">عنوان دوم</label>
                    <input type="text" name="service_secound_title" class="form-control"
                           placeholder="عنوان دوم..."
                           value="{{ $settingModel->getSetting('service_secound_title', $account->id) }}">
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">آیکن سوم</label>
                    <input type="text" name="service_third_icon" class="form-control" placeholder="آیکن سوم..."
                           value="{{ $settingModel->getSetting('service_third_icon', $account->id) }}">
                    <hr>
                    <label class="form-label">عنوان سوم</label>
                    <input type="text" name="service_third_title" class="form-control"
                           placeholder="عنوان چهارم..."
                           value="{{ $settingModel->getSetting('service_third_title', $account->id) }}">
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">آیکن چهارم</label>
                    <input type="text" name="service_fourth_icon" class="form-control"
                           placeholder="آیکن چهارم..."
                           value="{{ $settingModel->getSetting('service_fourth_icon', $account->id) }}">
                    <hr>
                    <label class="form-label">عنوان چهارم</label>
                    <input type="text" name="service_fourth_title" class="form-control"
                           placeholder="عنوان چهارم..."
                           value="{{ $settingModel->getSetting('service_fourth_title', $account->id) }}">
                </div>
            </div>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">تیم ما</h3>
        <select name="team_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('team_status', $account->id) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('team_status', $account->id) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('team_status', $account->id) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-12 form-group">
                    <div class="col-12 form-group ">
                        <label class="form-label ">تصویر بک گراند</label>
                        <input type="file" name="background_cover_team" onchange="uploadImage(this)">
                        @if ($image = imageLoader('background_cover_team'))
                            <div class="imageLoader position-relative">
                                <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                                <button type="button" onclick="destroyImage('background_cover_team')"
                                        class="btn btn-sm btn-danger position-absolute"
                                        style="bottom: 0; left: 49%">حذف</button>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 form-group">
                        <label class="form-label">عنوان</label>
                        <input type="text" name="title_team" class="form-control" placeholder="عنوان..."
                               value="{{ $settingModel->getSetting('title_team', $account->id) }}">
                    </div>

                    <label class="form-label">توضیحات</label>
                    <input type="text" name="description_team" class="form-control" placeholder="توضیحات..."
                           value="{{ $settingModel->getSetting('description_team', $account->id) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label ">تصویر اول</label>
                    <input type="file" name="team_image1" onchange="uploadImage(this)">
                    @if ($image = imageLoader('team_image1'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('team_image1')"
                                    class="btn btn-sm btn-danger position-absolute"
                                    style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-4 form-group">
                    <label class="form-label">عنوان تصویر اول</label>
                    <input type="text" name="title_team_image1" class="form-control"
                           placeholder="عنوان تصویر اول..."
                           value="{{ $settingModel->getSetting('title_team_image1', $account->id) }}">
                    <div class="col-4 form-group">
                        <label class="form-label">زیر عنوان تصویر اول</label>
                        <input type="text" name="subtitle_team_image1" class="form-control"
                               placeholder="زیرعنوان تصویر اول..."
                               value="{{ $settingModel->getSetting('subtitle_team_image1', $account->id) }}">

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label ">تصویر دوم</label>
                    <input type="file" name="team_image2" onchange="uploadImage(this)">
                    @if ($image = imageLoader('team_image2'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('team_image2')"
                                    class="btn btn-sm btn-danger position-absolute"
                                    style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-12 form-group">
                    <label class="form-label">عنوان تصویر دوم</label>
                    <input type="text" name="title_team_image2" class="form-control"
                           placeholder="عنوان تصویر دوم..."
                           value="{{ $settingModel->getSetting('title_team_image2', $account->id) }}">
                    <label class="form-label">زیر عنوان تصویر دوم</label>
                    <input type="text" name="subtitle_team_image2" class="form-control"
                           placeholder="زیرعنوان تصویردوم..."
                           value="{{ $settingModel->getSetting('subtitle_team_image2', $account->id) }}">

                </div>
            </div>
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label ">تصویر سوم</label>
                    <input type="file" name="team_image3" onchange="uploadImage(this)">
                    @if ($image = imageLoader('team_image3'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('team_image3')"
                                    class="btn btn-sm btn-danger position-absolute"
                                    style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-12 form-group">
                    <label class="form-label">عنوان تصویر سوم</label>
                    <input type="text" name="title_team_image3" class="form-control"
                           placeholder="عنوان تصویر سوم..."
                           value="{{ $settingModel->getSetting('title_team_image1', $account->id) }}">
                    <label class="form-label">زیر عنوان تصویر سوم</label>
                    <input type="text" name="subtitle_team_image3" class="form-control"
                           placeholder="زیرعنوان تصویر سوم..."
                           value="{{ $settingModel->getSetting('subtitle_team_image3', $account->id) }}">
                </div>
            </div>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">محصولات / نمونه کارها</h3>
        <select name="portfolio_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('portfolio_status', $account->id) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('portfolio_status', $account->id) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('portfolio_status', $account->id) == 1)
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
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">تعرفه ها</h3>
        <select name="price_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('price_status', $account->id) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('price_status', $account->id) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('price_status', $account->id) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان</label>
                    <input type="text" name="price_title" class="form-control" placeholder="عنوان..."
                           value="{{ $settingModel->getSetting('price_title', $account->id) }}">
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">توضیحات</label>
                    <input type="text" name="price_text" class="form-control" placeholder="توضیحات..."
                           value="{{ $settingModel->getSetting('price_text', $account->id) }}">
                </div>
            </div>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">تماس</h3>
        <select name="contact_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('contact_status', $account->id) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('contact_status', $account->id) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('contact_status', $account->id) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان</label>
                    <input type="text" name="contact_title" class="form-control" placeholder="عنوان..."
                           value="{{ $settingModel->getSetting('contact_title', $account->id) }}">
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">توضیحات</label>
                    <input type="text" name="contact_text" class="form-control" placeholder="توضیحات..."
                           value="{{ $settingModel->getSetting('contact_text', $account->id) }}">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label class="form-label">نقشه گوگل</label>
                    <textarea name="google_map" class="form-control ltr" placeholder="نقشه گوگل...">{{ $settingModel->getSetting('google_map', $account->id) }}</textarea>
                </div>
            </div>
        </div>
    @endif
</div>
