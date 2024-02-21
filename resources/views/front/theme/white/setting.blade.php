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
                <div class="col-6 form-group">
                    <label class="form-label">تصویر بخش اول</label>
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
                <div class="col-6 form-group">
                    <label class="form-label">کد رنگ زمینه</label>
                    <input name="body_bg_color" class="form-control" placeholder="کد رنگ زمینه..."
                           value="{{ $settingModel->getSetting('body_bg_color', $accountId, $projectId) }}">
                    <div class="alert alert-info text-center">به صورت کد #2b2b2b</div>
                </div>
            </div>
        </div>
    @endif
</div>

