<?php
	if(!empty($video)){
		echo '
			<div class="content input-group">
				<div class="col-md-12 col-xl-9 mb-5">
					<div class="col-md-12 mb-2">
						<video width="100%" poster="assets/img/thumbnail/'.$video->miniature.'" controls autoplay>
							<source src="assets/video/'.$video->video.'" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					</div>
					<div class="col-md-12">
						<h5 class="title_video">'.$video->titre.'</h5>
					</div>
				</div>
		';
		
		if(!empty($list_video)){
			echo '<div class="input-group col-md-12 col-xl-3 scroll_div">
					<div class="col-md-12">
						<hr class="border">
						<h1 class="col-md-12 title_upload">'.mb_strtoupper($video->category).'</h1>
						<hr class="border">
					</div>
				';
			
			foreach ($list_video as $list){
				echo '
					<a href="Video_'.$list->id.'_'.hash('sha512', $list->titre).'" class="input-group col-md-12 mb-3 link" id="'.$list->id.'">
						<div class="col-md-12 col-xl-6 align-vertical">
							<img width="100%" src="assets/img/thumbnail/'.$list->miniature.'">
						</div>
						<div class="col-md-12 col-xl-6 mt-title-mobile align-vertical">
							<h5 class="title_list_video">'.$list->titre.'</h5>
							<hr class="border none-border">
						</div>
					</a>
				';
			}
			echo '</div>';
		}
		
		echo '</div>';
		
	} else{
		echo '<div class="alert alert-danger" role="alert">
				  <strong>Lien inexistant</strong>
			  </div>';
		
		header('Location: http://vps353046.ovh.net/');
		exit();
	}
?>