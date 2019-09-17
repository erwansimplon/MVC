<?php
	if(!empty($success)){
		echo '
			<div class="alert alert-success" role="alert">
				  '.$success.'
			</div>';
	}
	
	if(!empty($error)){
		echo '
			<div class="alert alert-danger" role="alert">
				  '.$error.'
			</div>';
	}
?>
<div class="container-fluid h-100">
	<div class="row justify-content-center align-items-center height">
		<div class="col-md-11 col-xl-5 form-control">
			<h3 class="title_upload form_search text-center">Mettre en ligne une vidéo</h3>
			<form action="" method="post" autocomplete="off" enctype="multipart/form-data">
				<div class="custom-file mb-3">
					<input name="video" type="file" class="custom-file-input upload" id="customFileVideo" accept="video/mp4,video/x-m4v,video/*,audio/*">
					<label class="custom-file-label upload" for="customFileVideo">Choisir la vidéo</label>
				</div>
				<div class="custom-file mb-3">
					<input name="photo" type="file" class="custom-file-input upload" id="customFileImage" accept="image/*">
					<label class="custom-file-label upload" for="customFileImage">Choisir la minature</label>
				</div>
				<div class="form-group">
					<input name="titre" type="text" class="form-control" placeholder="Titre">
				</div>
				<div class="form-group">
					<select name="themes" class="form-control">
						<option value="0">Catégorie</option>
						<?php
							foreach ($themes as $theme){
								echo '<option value="'.$theme->id.'">'.$theme->name.'</option>';
							}
						?>
					</select>
				</div>
				<div class="row justify-content-center align-items-center">
					<input type="submit" name="submit" class="btn btn-primary" value="Mettre en ligne">
				</div>
			</form>
		</div>
	</div>
</div>