<?php
	/**
	 * Created by PhpStorm.
	 * User: guillet
	 * Date: 27/05/18
	 * Time: 14:16
	 */
	
	class UploadController
	{
		
		protected $models;
		protected $views;
		protected $template;
		
		protected $encrypth;
		
		public function __construct()
		{
			$this->models = new UploadModels();
			$this->template = new Render();
			
			$this->encrypth = 'sha512';
			
			$this->content();
		}
		
		public function content(){
			
			if(isset($_POST['submit'])){
				$this->postProcess();
			} else{
				$this->initContent();
				$this->template();
			}
		}
		
		public function template(){
			$this->template->assign('title', 'Youtube');
			$this->template->assign('css', 'global');
			$this->template->assign('view', 'Upload');
			$this->template->assign('js', 'upload');
			$this->template->assign('action', '/');
			$this->template->assign('return', 'hide_visibility');
		}
		
		public function initContent(){
			
			$themes = $this->models->getAllThemes();
			
			$this->template->assign('themes', $themes);
		}
		
		
		public function postProcess(){
			
			$obj = array(
				'id_theme'    => $_POST['themes'],
				'titre'       => $_POST['titre'],
				'crypt_titre' => $this->crypth(strip_tags($_POST['titre'])),
				'miniature'   => $this->crypth_file('photo'),
				'video'       => $this->crypth_file('video')
			);
			
			$add = $this->models->add($obj);
			
			if($add){
				$this->upload('photo', 'img/thumbnail/', true);
				$this->upload('video', 'video/');
				
				$this->template->assign('success', 'Vidéo en ligne');
			} else{
				$this->template->assign('error', 'Problème sur la mise en ligne de la vidéo');
			}
			
			$this->initContent();
			$this->template();
		}
		
		public function upload($file, $sub_dir, $resize = false){
			$dir = $_SERVER['DOCUMENT_ROOT'].'assets/';
			
			if($resize) {
				$this->setResizeImage($_FILES[$file]['tmp_name'], 1280, 720);
			}
			move_uploaded_file($_FILES[$file]['tmp_name'], $dir.$sub_dir.$this->crypth_file($file));
		}
		
		public function setResizeImage($image, $largeur, $longueur){
			$imagick = new Imagick($image);
			$imagick->setimagebackgroundcolor(new ImagickPixel("black"));
			$imagick->thumbnailImage($largeur, $longueur, true, true);
			$imagick->writeImage($image);
			$imagick->clear();
		}
		
		public function crypth_file($file){
			$path_info = pathinfo($_FILES[$file]['name']);
			$ext = $path_info['extension'];
			
			return hash($this->encrypth, $_FILES[$file]['name']).'.'.$ext;
		}
		
		public function crypth($text){
			return hash($this->encrypth, $text);
		}
	}