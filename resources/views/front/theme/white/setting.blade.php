<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">بخش اول</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 form-group">
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
        </div>
    </div>
</div>
