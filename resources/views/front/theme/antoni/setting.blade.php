<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">نوار بالا</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">متن اول</label>
                <input type="text" name="top_bar_first_text" class="form-control" placeholder="متن اول..."
                    value="{{ $settingModel->getSetting('top_bar_first_text', $accountId, $projectId) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-3 form-group">
                <label class="form-label">متن پیوند اول</label>
                <input type="text" name="top_bar_first_link_text" class="form-control" placeholder="متن پیوند اول..."
                       value="{{ $settingModel->getSetting('top_bar_first_link_text', $accountId, $projectId) }}">
            </div>
            <div class="col-3 form-group">
                <label class="form-label">آدرس پیوند اول</label>
                <input type="text" name="top_bar_first_link_src" class="form-control" placeholder="آدرس پیوند اول..."
                       value="{{ $settingModel->getSetting('top_bar_first_link_src', $accountId, $projectId) }}">
            </div>
            <div class="col-3 form-group">
                <label class="form-label">متن پیوند دوم</label>
                <input type="text" name="top_bar_second_link_text" class="form-control" placeholder="متن پیوند دوم..."
                       value="{{ $settingModel->getSetting('top_bar_second_link_text', $accountId, $projectId) }}">
            </div>
            <div class="col-3 form-group">
                <label class="form-label">آدرس پیوند دوم</label>
                <input type="text" name="top_bar_second_link_src" class="form-control" placeholder="آدرس پیوند دوم..."
                       value="{{ $settingModel->getSetting('top_bar_second_link_src', $accountId, $projectId) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label class="form-label">برچسب تلفن تماس</label>
                <input type="text" name="top_bar_phone_label" class="form-control" placeholder="برچسب تلفن تماس..."
                       value="{{ $settingModel->getSetting('top_bar_phone_label', $accountId, $projectId) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">پیوند تلفن تماس</label>
                <input type="text" name="top_bar_phone_link" class="form-control" placeholder="پیوند تلفن تماس..."
                       value="{{ $settingModel->getSetting('top_bar_phone_link', $accountId, $projectId) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">متن تلفن تماس</label>
                <input type="text" name="top_bar_phone_text" class="form-control" placeholder="متن تلفن تماس..."
                       value="{{ $settingModel->getSetting('top_bar_phone_text', $accountId, $projectId) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">متن آخر</label>
                <input type="text" name="top_bar_last_text" class="form-control" placeholder="متن آخر..."
                       value="{{ $settingModel->getSetting('top_bar_last_text', $accountId, $projectId) }}">
            </div>
        </div>
    </div>
</div>

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">جعبه زیر اسلایدر</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">متن اول</label>
                <input type="text" name="top_bar_first_text" class="form-control" placeholder="متن اول..."
                    value="{{ $settingModel->getSetting('top_bar_first_text', $accountId, $projectId) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-3 form-group">
                <label class="form-label">متن پیوند اول</label>
                <input type="text" name="top_bar_first_link_text" class="form-control" placeholder="متن پیوند اول..."
                       value="{{ $settingModel->getSetting('top_bar_first_link_text', $accountId, $projectId) }}">
            </div>
            <div class="col-3 form-group">
                <label class="form-label">آدرس پیوند اول</label>
                <input type="text" name="top_bar_first_link_src" class="form-control" placeholder="آدرس پیوند اول..."
                       value="{{ $settingModel->getSetting('top_bar_first_link_src', $accountId, $projectId) }}">
            </div>
            <div class="col-3 form-group">
                <label class="form-label">متن پیوند دوم</label>
                <input type="text" name="top_bar_second_link_text" class="form-control" placeholder="متن پیوند دوم..."
                       value="{{ $settingModel->getSetting('top_bar_second_link_text', $accountId, $projectId) }}">
            </div>
            <div class="col-3 form-group">
                <label class="form-label">آدرس پیوند دوم</label>
                <input type="text" name="top_bar_second_link_src" class="form-control" placeholder="آدرس پیوند دوم..."
                       value="{{ $settingModel->getSetting('top_bar_second_link_src', $accountId, $projectId) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label class="form-label">برچسب تلفن تماس</label>
                <input type="text" name="top_bar_phone_label" class="form-control" placeholder="برچسب تلفن تماس..."
                       value="{{ $settingModel->getSetting('top_bar_phone_label', $accountId, $projectId) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">پیوند تلفن تماس</label>
                <input type="text" name="top_bar_phone_link" class="form-control" placeholder="پیوند تلفن تماس..."
                       value="{{ $settingModel->getSetting('top_bar_phone_link', $accountId, $projectId) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">متن تلفن تماس</label>
                <input type="text" name="top_bar_phone_text" class="form-control" placeholder="متن تلفن تماس..."
                       value="{{ $settingModel->getSetting('top_bar_phone_text', $accountId, $projectId) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">متن آخر</label>
                <input type="text" name="top_bar_last_text" class="form-control" placeholder="متن آخر..."
                       value="{{ $settingModel->getSetting('top_bar_last_text', $accountId, $projectId) }}">
            </div>
        </div>
    </div>
</div>
