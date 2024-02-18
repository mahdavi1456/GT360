<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title pull-right">رویدادها</h3>
        <select name="event_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('event_status', $accountId, $projectId) == 1 ? 'selected' : '' }}
                value="1">فعال</option>
            <option {{ $settingModel->getSetting('event_status', $accountId, $projectId) == 0 ? 'selected' : '' }}
                value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('event_status', $accountId, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان رویداد</label>
                    <input name="event_title" class="form-control" placeholder="عنوان رویداد..."
                        {{ $settingModel->getSetting('event_title', $accountId, $projectId) }}>
                </div>
                <div class="col-6 form-group">
                    <label class="form-label">تصویر رویداد</label>
                    <input type="file" name="event_image" onchange="uploadImage(this)">
                    @if ($image = imageLoader('event_image'))
                        <div class="imageLoader position-relative">
                            <img src="{{ asset(ert('tsp') . $image) }}" class="w-100 object-fit-contain">
                            <button type="button" onclick="destroyImage('team_image1')"
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
        <h3 class="card-title pull-right">گالری</h3>
        <select name="gallery_status" class="form-select pull-left" onchange="this.form.submit()">
            <option {{ $settingModel->getSetting('gallery_status', $accountId, $projectId) == 1 ? 'selected' : '' }}
                    value="1">فعال</option>
            <option {{ $settingModel->getSetting('gallery_status', $accountId, $projectId) == 0 ? 'selected' : '' }}
                    value="0">غیرفعال</option>
        </select>
    </div>
    @if ($settingModel->getSetting('gallery_status', $accountId, $projectId) == 1)
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label class="form-label">عنوان گالری</label>
                    <input name="gallery_title" class="form-control" placeholder="عنوان گالری..."
                        {{ $settingModel->getSetting('event_title', $accountId, $projectId) }}>
                </div>
            </div>
        </div>
    @endif
</div>
