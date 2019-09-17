
<div class="content input-group mt-3">
	<?php
		if(!empty($data_video)){
			foreach ($data_video as $category => $data){
				if(!empty($data)) {
					echo '<div class="col-md-12 mb-4">
							<hr class="border">
							<h1 class="col-md-12 title_upload">'.mb_strtoupper($category).'</h1>
							<hr class="border">
							</div>';
				}
				foreach ($data as $video){
					echo '<a href="Video_'.$video->id.'_'.hash('sha512', $video->titre).'" class="input-group col-md-12 col-xl-2 mb-4">
							<div class="col-md-12">
								<img class="img-fluid mb-2" src="assets/img/thumbnail/'.$video->miniature.'">
								<h5 class="title_list_video mt-title-mobile">'.mb_strtoupper($video->titre).'</h5>
								<hr class="border none-border">
							</div>
						  </a>';
				}
			}
		}
	?>
</div>