<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش اول</h3>
        <select name="section1_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('section1_status', $accountId, $projectId) == 1 ? 'selected' : '' }}
                value="1">فعال</option>
            <option {{ $settingModel->getSetting('section1_status', $accountId, $projectId) == 0 ? 'selected' : '' }}
                value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('section1_status', $accountId, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-4 form-group">
                    <label class="form-label">عنوان بخش اول</label>
                    <input name="section1_title" class="form-control" placeholder="عنوان بخش اول..."
                        {{ $settingModel->getSetting('section1_title', $accountId, $projectId) }}>
                </div>
                <div class="col-4 form-group">
                    <label class="form-label">تصویر بخش اول</label>
                    <input type="file" name="section1_image" onchange="uploadImage(this)">
                    @if ($image = imageLoader('section1_image'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('team_image1')"
                                    class="btn btn-sm btn-danger position-absolute"
                                    style="bottom: 0; left: 49%">حذف</button>
                        </div>
                    @endif
                </div>
                <div class="col-4 form-group">
                    <label class="form-label">لیست محتوا بخش اول</label>
                    <input name="section1_component" class="form-control" placeholder="لیست محتوا بخش اول..."
                        {{ $settingModel->getSetting('section1_component', $accountId, $projectId) }}>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش دوم</h3>
        <select name="section2_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('section2_status', $accountId, $projectId) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('section2_status', $accountId, $projectId) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('section2_status', $accountId, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان بخش دوم</label>
                    <input name="section2_title" class="form-control" placeholder="عنوان بخش دوم..."
                        {{ $settingModel->getSetting('section2_title', $accountId, $projectId) }}>
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">لیست محتوا بخش دوم</label>
                    <input name="section2_component" class="form-control" placeholder="لیست محتوا بخش دوم..."
                        {{ $settingModel->getSetting('section2_component', $accountId, $projectId) }}>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش سوم</h3>
        <select name="section3_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('section3_status', $accountId, $projectId) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('section3_status', $accountId, $projectId) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('section3_status', $accountId, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان بخش سوم</label>
                    <input name="section3_title" class="form-control" placeholder="عنوان بخش سوم..."
                        {{ $settingModel->getSetting('section3_title', $accountId, $projectId) }}>
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">لیست محتوا بخش سوم</label>
                    <input name="section3_component" class="form-control" placeholder="لیست محتوا بخش سوم..."
                        {{ $settingModel->getSetting('section3_component', $accountId, $projectId) }}>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش چهارم</h3>
        <select name="section4_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('section4_status', $accountId, $projectId) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('section4_status', $accountId, $projectId) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('section4_status', $accountId, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان بخش چهارم</label>
                    <input name="section4_title" class="form-control" placeholder="عنوان بخش چهارم..."
                        {{ $settingModel->getSetting('section4_title', $accountId, $projectId) }}>
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">لیست محتوا بخش چهارم</label>
                    <input name="section4_component" class="form-control" placeholder="لیست محتوا بخش چهارم..."
                        {{ $settingModel->getSetting('section4_component', $accountId, $projectId) }}>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">بخش پنجم</h3>
        <select name="section5_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('section5_status', $accountId, $projectId) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('section5_status', $accountId, $projectId) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('section5_status', $accountId, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان بخش پنجم</label>
                    <input name="section5_title" class="form-control" placeholder="عنوان بخش پنجم..."
                        {{ $settingModel->getSetting('section5_title', $accountId, $projectId) }}>
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">لیست محتوا بخش پنجم</label>
                    <input name="section5_component" class="form-control" placeholder="لیست محتوا بخش پنجم..."
                        {{ $settingModel->getSetting('section5_component', $accountId, $projectId) }}>
                </div>
            </div>
        </div>
    @endif
</div>
