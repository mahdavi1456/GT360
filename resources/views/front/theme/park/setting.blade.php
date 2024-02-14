<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">بخش اول</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">
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
            <div class="col-6 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="title" class="form-control" placeholder="عنوان..."
                    value="{{ $settingModel->getSetting('title', $account->id) }}">
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
        <h3 class="card-title">بخش دوم</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6 form-group">
                <label class="form-label">عنوان</label>
                <input type="text" name="section2_title" class="form-control" placeholder="عنوان..."
                    value="{{ $settingModel->getSetting('section2_title', $account->id) }}">
            </div>
            <div class="col-6 form-group">
                <label class="form-label">لینک ویدئو</label>
                <input type="text" name="section2_video_url" class="form-control" placeholder="لینک ویدئو..."
                       value="{{ $settingModel->getSetting('section2_video_url', $account->id) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 form-group">
                <label class="form-label">متن</label>
                <textarea name="section2_text" class="form-control" placeholder="متن...">{{ $settingModel->getSetting('section2_text', $account->id) }}</textarea>
            </div>
        </div>
    </div>
</div>
