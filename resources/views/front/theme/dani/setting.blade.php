<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">عمومی</h3>
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
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
            <div class="col-4 form-group">
                <label class="form-label">تصویر</label>
                <input type="file" name="image" onchange="uploadImage(this)">
                @if ($image = imageLoader('image'))
                    <div class="imageLoader position-relative">
                        <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                        <button type="button" onclick="destroyImage('image')"
                            class="btn btn-sm btn-danger position-absolute" style="bottom: 0; left: 49%">حذف</button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" class="form-control" placeholder="عنوان..."
                    value="{{ $settingModel->getSetting('title', $account->id, $projectId) }}">
            </div>

            <div class="col form-group">
                <label class="form-label">متن دکمه</label>
                <input type="text" name="button_title" class="form-control" placeholder="متن دکمه..."
                    value="{{ $settingModel->getSetting('button_title', $account->id, $projectId) }}">
            </div>
        </div>
    </div>
</div>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش اول</h3>
        <select name="sec1_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('sec1_status', $account->id, $projectId) == 1 ? 'selected' : '' }}
                value="1">
                فعال</option>
            <option {{ $settingModel->getSetting('sec1_status', $account->id, $projectId) == 0 ? 'selected' : '' }}
                value="0">
                غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('sec1_status', $account->id, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label d-block ">تصویر اول</label>
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
                        value="{{ $settingModel->getSetting('title1_sec1', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان اول</label>
                    <input type="text" name="subtitle1_sec1" class="form-control" placeholder="عنوان بزرگ..."
                        value="{{ $settingModel->getSetting('subtitle1_sec1', $account->id, $projectId) }}">
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label d-block">تصویر دوم</label>
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
                        value="{{ $settingModel->getSetting('title2_sec1', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان دوم</label>
                    <input type="text" name="subtitle2_sec1" class="form-control" placeholder="عنوان بزرگ..."
                        value="{{ $settingModel->getSetting('subtitle2_sec1', $account->id, $projectId) }}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label d-block">تصویر سوم</label>
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
                        value="{{ $settingModel->getSetting('title3_sec1', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان سوم</label>
                    <input type="text" name="subtitle3_sec1" class="form-control" placeholder="عنوان بزرگ..."
                        value="{{ $settingModel->getSetting('subtitle3_sec1', $account->id, $projectId) }}">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label d-block">تصویر چهارم</label>
                    <input type="file" name="image4_sec1" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image4_sec1'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image4_sec1')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col form-group">
                    <label class="form-label">عنوان چهارم</label>
                    <input type="text" name="title4_sec1" class="form-control" placeholder="عنوان کوچک..."
                        value="{{ $settingModel->getSetting('title4_sec1', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان چهارم</label>
                    <input type="text" name="subtitle4_sec1" class="form-control" placeholder="عنوان بزرگ..."
                        value="{{ $settingModel->getSetting('subtitle4_sec1', $account->id, $projectId) }}">
                </div>
            </div>
        </div>
    @endif
</div>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش دوم</h3>
        <select name="sec2_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('sec2_status', $account->id, $projectId) == 1 ? 'selected' : '' }}
                value="1">
                فعال</option>
            <option {{ $settingModel->getSetting('sec2_status', $account->id, $projectId) == 0 ? 'selected' : '' }}
                value="0">
                غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('sec2_status', $account->id, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label d-block">تصویر</label>
                    <input type="file" name="image_sec2" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image_sec2'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image_sec2')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col form-group">
                    <label class="form-label">عنوان</label>
                    <input type="text" name="title_sec2" class="form-control" placeholder="عنوان کوچک..."
                        value="{{ $settingModel->getSetting('title_sec2', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان</label>
                    <input type="text" name="subtitle_sec2" class="form-control" placeholder="عنوان کوچک..."
                        value="{{ $settingModel->getSetting('subtitle_sec2', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">متن دکمه</label>
                    <input type="text" name="button_title_sec2" class="form-control" placeholder="متن دکمه..."
                        value="{{ $settingModel->getSetting('button_title_sec2', $account->id, $projectId) }}">
                </div>
            </div>
        </div>
    @endif
</div>


<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش سوم</h3>
        <select name="sec3_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('sec3_status', $account->id, $projectId) == 1 ? 'selected' : '' }}
                value="1">
                فعال</option>
            <option {{ $settingModel->getSetting('sec3_status', $account->id, $projectId) == 0 ? 'selected' : '' }}
                value="0">
                غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('sec3_status', $account->id, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان اول</label>
                    <input type="text" name="title1_sec3" class="form-control" placeholder="عنوان کوچک..."
                        value="{{ $settingModel->getSetting('title1_sec3', $account->id, $projectId) }}">
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">عنوان دوم</label>
                    <input type="text" name="title2_sec3" class="form-control" placeholder="عنوان بزرگ..."
                        value="{{ $settingModel->getSetting('title2_sec3', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">متن دکمه</label>
                    <input type="text" name="button1_sec3" class="form-control" placeholder="متن دکمه اول..."
                        value="{{ $settingModel->getSetting('button1_sec3', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">متن دکمه</label>
                    <input type="text" name="button2_sec3" class="form-control" placeholder="متن دکمه دوم..."
                        value="{{ $settingModel->getSetting('button2_sec3', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">متن دکمه</label>
                    <input type="text" name="button3_sec3" class="form-control" placeholder="متن دکمه سوم..."
                        value="{{ $settingModel->getSetting('button3_sec3', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">متن دکمه</label>
                    <input type="text" name="button4_sec3" class="form-control" placeholder="متن دکمه چهارم..."
                        value="{{ $settingModel->getSetting('button4_sec3', $account->id, $projectId) }}">
                </div>
            </div>
        </div>
    @endif
</div>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش چهارم</h3>
        <select name="sec4_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('sec4_status', $account->id, $projectId) == 1 ? 'selected' : '' }}
                value="1">
                فعال</option>
            <option {{ $settingModel->getSetting('sec4_status', $account->id, $projectId) == 0 ? 'selected' : '' }}
                value="0">
                غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('sec4_status', $account->id, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-3 form-group">
                    <label class="form-label">تصویر اول</label>
                    <input type="file" name="image1_sec4" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image1_sec4'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image1_sec4')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">تصویر دوم</label>
                    <input type="file" name="image2_sec4" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image2_sec4'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image2_sec4')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">تصویر سوم</label>
                    <input type="file" name="image3_sec4" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image3_sec4'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image3_sec4')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">تصویر چهارم</label>
                    <input type="file" name="image4_sec4" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image4_sec4'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image4_sec4')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3 form-group">
                    <label class="form-label">تصویر پنجم</label>
                    <input type="file" name="image5_sec4" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image5_sec4'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image5_sec4')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">تصویر ششم</label>
                    <input type="file" name="image6_sec4" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image6_sec4'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image6_sec4')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">تصویر هفتم</label>
                    <input type="file" name="image7_sec4" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image7_sec4'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image7_sec4')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-3 form-group">
                    <label class="form-label">تصویر هشتم</label>
                    <input type="file" name="image8_sec4" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image8_sec4'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image8_sec4')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش چهارم</h3>
        <select name="sec4_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('sec8_status', $account->id, $projectId) == 1 ? 'selected' : '' }}
                value="1">
                فعال</option>
            <option {{ $settingModel->getSetting('sec8_status', $account->id, $projectId) == 0 ? 'selected' : '' }}
                value="0">
                غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('sec8_status', $account->id, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-4 form-group ">
                    <label class="form-label ">تصویر اول</label>
                    <input type="file" name="image1_sec8" onchange="uploadImage(this)">
                    @if ($image = imageLoader('image1_sec8'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('image1_sec8')"
                                class="btn btn-sm btn-danger position-absolute"
                                style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col form-group">
                    <label class="form-label">عنوان اول</label>
                    <input type="text" name="title1_sec8" class="form-control" placeholder="عنوان اول..."
                        value="{{ $settingModel->getSetting('title1_sec8', $account->id, $projectId) }}">
                </div>
                <div class="col form-group">
                    <label class="form-label">زیر عنوان اول</label>
                    <input type="text" name="subtitle1_sec8" class="form-control" placeholder="عنوان دوم..."
                        value="{{ $settingModel->getSetting('subtitle1_sec8', $account->id, $projectId) }}">
                </div>
            </div>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title pull-right">بخش پنجم</h3>
                <select name="sec5_status" class="form-select pull-left" onchange="this.form.submit()">
                    <option
                        {{ $settingModel->getSetting('sec5_status', $account->id, $projectId) == 1 ? 'selected' : '' }}
                        value="1">
                        فعال</option>
                    <option
                        {{ $settingModel->getSetting('sec5_status', $account->id, $projectId) == 0 ? 'selected' : '' }}
                        value="0">
                        غیرفعال</option>
                </select>
            </div>
            @if ($settingModel->getSetting('sec5_status', $account->id, $projectId) == 1)
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 form-group ">
                            <label class="form-label ">تصویر اول</label>
                            <input type="file" name="image1_sec5" onchange="uploadImage(this)">
                            @if ($image = imageLoader('image1_sec5'))
                                <div class="imageLoader position-relative">
                                    <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                                    <button type="button" onclick="destroyImage('image1_sec5')"
                                        class="btn btn-sm btn-danger position-absolute"
                                        style="bottom: 0; left: 49%">حذف</button>
                                </div>
                            @endif
                        </div>
                        <div class="col form-group">
                            <label class="form-label">عنوان اول</label>
                            <input type="text" name="title1_sec5" class="form-control" placeholder="عنوان اول..."
                                value="{{ $settingModel->getSetting('title1_sec5', $account->id, $projectId) }}">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">زیر عنوان اول</label>
                            <input type="text" name="subtitle1_sec5" class="form-control"
                                placeholder="زیر عنوان اول..."
                                value="{{ $settingModel->getSetting('subtitle1_sec2', $account->id, $projectId) }}">
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title pull-right">بخش دهم</h3>
                <select name="sec10_status" class="form-select pull-left" onchange="this.form.submit()">
                    <option
                        {{ $settingModel->getSetting('sec10_status', $account->id, $projectId) == 1 ? 'selected' : '' }}
                        value="1">
                        فعال</option>
                    <option
                        {{ $settingModel->getSetting('sec10_status', $account->id, $projectId) == 0 ? 'selected' : '' }}
                        value="0">
                        غیرفعال</option>
                </select>
            </div>
            @if ($settingModel->getSetting('sec10_status', $account->id, $projectId) == 1)
                <div class="card-body">
                    <div class="row">
                        <div class="col form-group">
                            <label class="form-label">عنوان اول</label>
                            <input type="text" name="title1_sec10" class="form-control"
                                placeholder="عنوان اول..."
                                value="{{ $settingModel->getSetting('title1_sec10', $account->id, $projectId) }}">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">زیر عنوان اول</label>
                            <input type="text" name="subtitle1_sec10" class="form-control"
                                placeholder="زیر عنوان اول..."
                                value="{{ $settingModel->getSetting('subtitle1_sec10', $account->id, $projectId) }}">
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col form-group">
                            <label class="form-label">عنوان دوم</label>
                            <input type="text" name="title2_sec10" class="form-control"
                                placeholder="عنوان دوم..."
                                value="{{ $settingModel->getSetting('title2_sec10', $account->id, $projectId) }}">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">زیر عنوان دوم</label>
                            <input type="text" name="subtitle2_sec10" class="form-control"
                                placeholder="زیر عنوان دوم.."
                                value="{{ $settingModel->getSetting('subtitle2_sec10', $account->id, $projectId) }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col form-group">
                            <label class="form-label">عنوان سوم</label>
                            <input type="text" name="title3_sec10" class="form-control"
                                placeholder="عنوان سوم..."
                                value="{{ $settingModel->getSetting('title3_sec10', $account->id, $projectId) }}">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">زیر عنوان سوم</label>
                            <input type="text" name="subtitle3_sec10" class="form-control"
                                placeholder="زیر عنوان سوم..."
                                value="{{ $settingModel->getSetting('subtitle3_sec10', $account->id, $projectId) }}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col form-group">
                            <label class="form-label">عنوان چهارم</label>
                            <input type="text" name="title4_sec10" class="form-control"
                                placeholder="عنوان چهارم..."
                                value="{{ $settingModel->getSetting('title4_sec10', $account->id, $projectId) }}">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">زیر عنوان چهارم</label>
                            <input type="text" name="subtitle4_sec10" class="form-control"
                                placeholder="زیرعنوان چهارم..."
                                value="{{ $settingModel->getSetting('subtitle4_sec10', $account->id, $projectId) }}">
                        </div>
                    </div>
                </div>
            @endif
        </div>
        