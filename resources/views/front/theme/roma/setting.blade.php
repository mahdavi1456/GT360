<div class="row mt-3">

    <div class="col-6 form-group">
        <label class="form-label">نام</label>
        <input type="text" name="title" value="{{ $settingModal->getSetting('title', $account->id) }}">
    </div>
    <div class="col-6 form-group">
        <label class="form-label">توضیحات</label>
        <input type="text" name="description" value="{{ $settingModal->getSetting('description', $account->id) }}">
    </div>
</div>
