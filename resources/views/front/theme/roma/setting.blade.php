<div class="row">
    <div class="col-6 form-group">
        <label class="form-label">عنوان</label>
        <input type="text" name="title" class="form-control" placeholder="عنوان..." value="{{ $settingModel->getSetting('title', $account->id) }}">
    </div>
    <div class="col-6 form-group">
        <label class="form-label">توضیحات</label>
        <input type="text" name="description" class="form-control" placeholder="توضیحات..." value="{{ $settingModel->getSetting('description', $account->id) }}">
    </div>
</div>

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">سربرگ</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4 form-group">
                <label class="form-label">عنوان اول</label>
                <input type="text" name="first_title" class="form-control" placeholder="عنوان اول..." value="{{ $settingModel->getSetting('first_title', $account->id) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">زیر عنوان اول</label>
                <input type="text" name="first_subtitle" class="form-control" placeholder="زیر عنوان اول..." value="{{ $settingModel->getSetting('first_subtitle', $account->id) }}">
            </div>
            <div class="col-4 form-group">
                <label class="form-label">متن اول</label>
                <input type="text" name="first_text" class="form-control" placeholder="متن اول..." value="{{ $settingModel->getSetting('first_text', $account->id) }}">
            </div>
        </div>
    </div>
</div>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">تماس</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">نقشه گوگل</label>
                <textarea name="google_map" class="form-control ltr" placeholder="نقشه گوگل...">{{ $settingModel->getSetting('google_map', $account->id) }}</textarea>
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
                <input type="text" name="service_title" class="form-control" placeholder="عنوان خدمات..." value="{{ $settingModel->getSetting('service_title', $account->id) }}">
            </div>
            <div class="col-6 form-group">
                <label class="form-label">متن خدمات</label>
                <input type="text" name="service_text" class="form-control" placeholder="متن خدمات..." value="{{ $settingModel->getSetting('service_text', $account->id) }}">
            </div>
        </div>
    </div>
</div>
