<div class="container-fluid mt-5">
	<div class="row mb-5">
		<div class="col-12 reserveBox">
			<div class="reserveBoxSelect">
				<style type="text/css">
					.img-thumbnail {
						height: 100%;
						width: 100%;
						object-fit: cover;
					}
					.cnt_gallery_images > div {
						margin-bottom: 30px;
					}
					.lightbox-overlay {
						cursor: pointer;
					}
				</style>
				<h3 class="mb-5">تصاویر</h3>
				<div class="row cnt_gallery_images">
					<?php

                    use public_html\class\gallery;

                    $gallery = new gallery();
					$image_gallery = $gallery->get_image_gallery();
					if(count($image_gallery)) {
						foreach($image_gallery as $row) {
							?>
							<div class="col-md-3 cwa-lightbox-image" href="https://heliapp.ir/gt-content/asset/images/gallery/<?php echo $row['filename'] ?>">
								<img class="img-thumbnail" src="https://heliapp.ir/gt-content/asset/images/gallery/<?php echo $row['filename'] ?>" >
							</div>
							<?php
						}
					} else { ?>
						<p class="m-auto" style="color: red">تصویری موجود نیست</p>
						<?php
					} ?>
				</div>
				<h3 class="mb-5 mt-5">ویدیوها</h3>
				<div class="row col-md-12">
					<?php
					$gallery = new gallery();
					$video_gallery = $gallery->get_video_gallery();
					if(count($video_gallery)) {
						foreach($video_gallery as $row) {
							?>
							<div class="col-md-2">
								<video width="150" height="150" src="https://heliapp.ir/gt-content/asset/video/<?php echo $row['filename'] ?>" controls>
							</div>
							<?php
						}
					} else { ?>
						<p class="m-auto" style="color: red">ویدیویی موجود نیست.</p>
						<?php
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="../js/cwa-lightbox-gallery/cwa_lightbox_/javascript/cwa_lightbox_bundle_v1.js" defer></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on("click", ".lightbox-content", function() {
			let cls = $(event.target).attr("class");
			if(cls == "lightbox-content") {
				$(".lightbox-overlay").slideUp(100);
				$("body").css("overflow", "");
			}
		})
	})
</script>
