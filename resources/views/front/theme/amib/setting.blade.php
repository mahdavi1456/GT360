<div class="row mt-3">
    <div class="col-6 form-group">
        <label class="form-label">عنوان اول</label>
        <input type="text" name="first_title" class="form-control" placeholder="عنوان اول..." value="{{ $settingModel->getSetting('first_title', $account->id) }}">
    </div>
    <div class="col-6 form-group">
        <label class="form-label">توضیحات اول</label>
        <input type="text" name="first_description" class="form-control" placeholder="توضیحات اول..." value="{{ $settingModel->getSetting('first_description', $account->id) }}">
    </div>
</div>
