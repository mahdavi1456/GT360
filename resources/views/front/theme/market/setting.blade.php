<div class="row mt-3">
    <div class="col-6 form-group">
        <label class="form-label">عنوان</label>
        <input type="text" name="title" class="form-control" placeholder="عنوان..." value="{{ $settingModel->getSetting('title', $account->id) }}">
    </div>
    <div class="col-6 form-group">
        <label class="form-label">توضیحات</label>
        <input type="text" name="description" class="form-control" placeholder="توضیحات..." value="{{ $settingModel->getSetting('description', $account->id) }}">
    </div>
</div>
