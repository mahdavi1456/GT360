@extends('layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/dropzone.min.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>نوشته‌ها</h1>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">{{ $action == 'edit' ? 'فرم ویرایش نوشته' : 'فرم ایجاد نوشته' }}</h3>
        </div>
        <div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="required">عنوان</label>
						<input type="text" name="title" id="title" class="form-control" oninvalid="this.setCustomValidity('عنوان را وارد کنید.')"
							 value="{{ $action == 'edit' ? $post->title : old('title') }}" oninput="setCustomValidity('')" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="required">نامک</label>
						<input type="text" name="slug" id="slug" class="form-control" oninvalid="this.setCustomValidity('نامک را وارد کنید.')" id="slug"
							 value="{{ $action == 'edit' ? $post->slug : old('slug') }}" oninput="setCustomValidity('')" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label>چکیده</label>
						<textarea name="abstract" id="abstract" class="form-control form-control-sm">{{ $action == 'edit' ? $post->abstract : old('abstract') }}</textarea>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="required">متن</label>
						<textarea name="content" id="content" class="form-control form-control-sm">{{ $action == 'edit' ? $post->content : old('content') }}</textarea>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>ترتیب نمایش</label>
						<select name="order" id="order" class="form-control">
							@for ($i = 0; $i <= 20; $i++)
								<option value="{{ $i }}" {{ $action == 'edit' ? ($post->post_order == $i ? 'selected':'') : (old('order') == '0' ? 'selected' : '') }}>{{ $i + 1 }}</option>
							@endfor
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>وضعیت تصویر شاخص در ادامه مطلب</label>
						<select name="thumbnail_status" class="form-control" id="thumbnail_status">
                            <option value="1" {{ $action == 'edit' ? ($post->thumbnail_status == 1 ? 'selected':'') : (old('thumbnail_status')== '1' ? 'selected':'') }}>نمایش</option>
                            <option value="0" {{ $action == 'edit' ? ($post->thumbnail_status == 0 ? 'selected':'') : (old('thumbnail_status')== '0' ? 'selected':'') }}>عدم نمایش</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>نام نویسنده</label>
						<input type="text" name="author" id="author" class="form-control" value="{{ $action == 'edit' ? $post->author : old('author') }}">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="publish_status" class="required">وضعیت نشر</label>
						<select class="form-control" id="publish_status" name="publish_status">
							<option value="0" {{ $action=='edit' ? ($post->publish_status == '0' ? 'selected':'') : (old('publish_status')== '0' ? 'selected':'') }}>عدم انتشار</option>
							<option value="1" {{ $action=='edit' ? ($post->publish_status == '1' ? 'selected':'') : (old('publish_status')== '1' ? 'selected':'') }}> انتشار</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="post_type" class="required">نوع نوشته</label>
						{{ $componentModel->element("component_id", "component-id") }}
						@error('component_id')
							<div class="mt-2 text-danger error-text">{{ $message }}</div>
						@enderror
					</div>
				</div>
				<div id="taxonomy_fields" class="col-md-12">
					@if($action == 'edit' || old('post_type_id'))
						@include('posts.partials.taxonomy', ['hidden'=>$hidden, 'taxonomies'=>$taxonomies,'post_id'=>$post->id, 'model'=>'post', 'hidden_taxonomies'=>$hidden_taxonomies])
					@endif
				</div>
			</div>

					<div class="col-md-12">
						<div class="form-group">
							<label>تصویر شاخص</label>
                            <div class="row">
                                <div class="form-group mt-3">
                                    <div class="d-flex align-items-center">
                                        <button type="button" class="btn btn-light" style="display:block;" onclick="document.getElementById('file').click()">انتخاب فایل</button>
                                        <input type='file' id="file" name='file' style="display:none">
                                        <input hidden id="type" name='type' value="post">
                                        <span id="selected_filename" class="mx-2"> فایلی انتخاب نشده</span>
                                        <input type="submit" value="پیوست" class="ml-1 btn btn-primary submit-btn">
                                    </div>
                                    <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
                                </div>
                                <input name="filepath" id="filepath" hidden value="{{ $action == 'edit' ? $post->thumbnail : old('filepath')}}">
                                <div id="filepreview" class="d-flex mr-3 justify-content-center align-items-center col-3" style="{{($action == 'edit'  && $post->thumbnail ) || old('filepath') ? '' : 'display:none;'}}">
                                    @if ($action == 'edit')
                                        @if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png')
                                            <img src="{{$action == 'edit' && $post->thumbnail ? asset($post->thumbnail) : asset(old('filepath'))}}" class="w-100" style="{{($action == 'edit'  && $post->thumbnail )|| old('filepath') ? '' : 'display:none;'}}"><br>
                                        @else
                                            <a target="_blank" href="{{ $action == 'edit' && $post->thumbnail ? asset($post->thumbnail) : asset(old('filepath')) }}" style="{{($action == 'edit'  && $post->thumbnail )|| old('filepath') ? '' : 'display:none;'}}">نمایش فایل</a>
                                        @endif
                                    @else
                                        <img src="" class="w-100" style="display:none"><br>
                                        <a target="_blank" href="" style="display:none">نمایش فایل</a>
                                    @endif
                                </div>
                            </div>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="progress">
							<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
						</div>
					</div>

			    <br>
			<div class="form-group row d-flex align-items-center">
				<label for="multimedia_id" class="custom-field-title col-md-2 col-form-label text-right font-weight-bold">فایل های چندرسانه ای:</label>
				<input type="hidden" name="multimedia_id[]" id="multimedia_id">
				<div class="col-sm-10">
					 <div id="multimedia" class="dropzone form-control form-control-sm" ></div>
				</div>
			</div>
			@if ($action == 'edit')
				<div class="row">
					@if (count(get_media($post->id, 'multimedia')) > 0)
						@foreach (get_media($post->id, 'multimedia') as $key=>$photo)
							<div class="d-flex justify-content-start col-12 mb-2" id="updated_photo_{{$photo->id}}">
								<span class="ml-1">{{ $key + 1}}.</span>
								<a target="_blank" class="ml-3" href="{{asset($photo->media->url)}}">{{$photo->media->name}}</a>
{{--								<span class="ml-3">{{$photo->media->size / 8}} بایت</span>--}}
								<button class="btn btn-danger btn-sm removePhoto" type="button" data-id="{{$photo->id}}"><i class="fa fa-close ml-1"></i>حذف</button>
							</div>
						@endforeach
					@endif
				</div>
			@endif
			<div class="form-group row d-flex align-items-center">
				<label for="photo_id" class="custom-field-title col-md-2 col-form-label text-right font-weight-bold">فایل پیوست :</label>
				<input type="hidden" name="photo_id[]" id="product-photo">
				<div class="col-sm-10">
					 <div id="photo" class="dropzone form-control form-control-sm" ></div>
				</div>
			</div>
			@if($action == 'edit')
				<div class="row">
					@if(count(get_media($post->id, 'post')) > 0)
						@foreach(get_media($post->id, 'post') as $key=>$photo)
							<div class="d-flex justify-content-start col-12" id="updated_photo_{{$photo->id}}">
								<span class="ml-1">{{$key+ 1}}.</span>
								<a target="_blank" class="ml-3" href="{{asset($photo->media->url)}}">{{$photo->media->name}}</a>
{{--								<span class="ml-3">{{$photo->media->size / 8}} بایت</span>--}}
								<button class="btn btn-danger btn-sm removePhoto" type="button" data-id="{{$photo->id}}"><i class="fa fa-close ml-1"></i>حذف</button>
							</div>
						@endforeach
					@endif
				</div>
			@endif
			<div class="d-flex justify-content-end">
				<button type="button" class="btn btn-success py-2 px-4 save-post" data-type="{{$action}}" data-id="{{$action == 'edit' ? $post->id : ''}}" onclick="productGallery()"> ذخیره</button>
			</div>
        </div>
    </div>
</section>
<!-- /.content -->

@endsection
@section('script')
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/file.js')}}"></script>
    <script src="{{asset('js/product.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/dropzone.min.js')}}"></script>
    <script>

		productGallery = function(){
            document.getElementById('product-photo').value = photoList;
            document.getElementById('multimedia_id').value = photoList2;
        };

        CKEDITOR.replace('content',{
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage',
            filebrowserUploadUrl: "{{route('upload.ckeditor', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
        })

        $(document).on('change', '#post_type_id', function() {
            var id = $('#post_type_id option:selected').val();
			if(id == 3) {

			}
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = {
                id: id,
                type: 'category',
            };
            var type = "POST";
            var ajaxurl = "{{route('post.getTaxonomies')}}";
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    $('#taxonomy_fields').html(data.html);
					$('.select2').select2();
                }
            });
        })

        $(document).on('click', '.save-post', function() {
			var id = $(this).data('id');
			var type = $(this).data('type');
            if ($('#post_type_id').val() != "" && CKEDITOR.instances['content'].getData() != ""){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var formData = {
					list: $("#post-form *").serialize(),
					content: CKEDITOR.instances['content'].getData(),
					taxonomy_fields : $("#taxonomy_fields *").serialize()
				};
				console.log(formData);
				var APP_URL = $('meta[name="_base_url"]').attr('content');
				if(type == 'create') {
					var ajaxurl = APP_URL + "/posts";
					var type = "POST";
				} else {
					var ajaxurl = APP_URL + "/posts/" + id;
					var type = "PATCH";
				}
				$.ajax({
					type: type,
					url: ajaxurl,
					data: formData,
					dataType: 'json',
					success: function (data) {
						if (data == 'success') {
							swal({
								title: "ثبت نوشته",
								text: 'نوشته با موفقیت ثبت شد.',
								timer: 2000,
								buttons: false,
								type: "success",
								icon: "success",
							});
							location.reload(true);
						} else {
							swal({
								title: "ثبت نوشته",
								text: 'عنوان نوشته تکراری است.',
								timer: 2000,
								buttons: false,
								type: "error",
								icon: "error",
							});
						}
					}
				});
            } else {
                swal({
                    title: "خطا",
                    text: 'لطفا فیلدهای ستاره دار را پر کنید.',
                    timer: 2000,
                    buttons: false,
                    type: "error",
                    icon: "error",
                })
            }
        });
    </script>
@endsection
