<div class="form_search">
	<div class="nav_pc row">
		<form action="<?php echo $action; ?>" method="get" class="input-group col-md-12" autocomplete="off">
			<div class="col-md-4 col-lg-3">
				<a href="<?php echo $action; ?>">
					<img src="assets/img/logo.jpg"/>
				</a>
			</div>
			<div class="input-group col-md-6 col-xl-5 mt-3 mb-3">
				<input type="text" name="search" class="form-control" placeholder="Rechercher ..." >
				<div class="input-group-append">
					<button type="submit" class="btn input-group-text"><i class="fa fa-search"></i></button>
				</div>
			</div>
			<div class="col-md-2 col-xl-4 mt-3 mb-3">
				<?php if(isset($return)): ?>
					<a href="javascript:history.back()" class="btn input-group-text float-right"><i class="fa fa-reply"></i>&nbsp;Retour</a>
				<?php else: ?>
					<a href="upload" class="btn input-group-text float-right"><i class="fa fa-upload"></i>&nbsp;Télécharger</a>
				<?php endif;?>
			</div>
		</form>
	</div>
	<div class="nav_mobile row">
		<form action="<?php echo $action; ?>" method="get" class="input-group col-md-12" autocomplete="off">
			<div class="col-md-8">
				<a href="<?php echo $action; ?>">
					<img src="assets/img/logo.jpg"/>
				</a>
			</div>
			<div class="col-md-4 mb-3 menu-mobile">
				<a href="upload" class="fa-menu-mobile float-right <?php if(isset($return)) : echo $return; endif;?>"><i class="fa fa-upload"></i>&nbsp;</a>
			</div>
			<div class="form-group col-md-12 has-search">
				<span class="fa fa-search form-control-feedback"></span>
				<input type="text" name="search" class="form-control" placeholder="Rechercher ..." >
			</div>
		</form>
	</div>
</div>