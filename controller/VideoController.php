<?php
	/**
	 * Created by PhpStorm.
	 * User: guillet
	 * Date: 27/05/18
	 * Time: 14:16
	 */
	
	class VideoController
	{
		
		protected $models;
		protected $views;
		protected $template;
		
		public function __construct()
		{
			$this->models = new VideoModels();
			$this->template = new Render();
			
			$this->content();
		}
		
		public function content(){
			$this->template();
			
			$this->initContent();
		}
		
		public function template(){
			$titre = $this->models->getTitle($_GET['id'], $_GET['titre']);
			
			$this->template->assign('title', $titre);
			$this->template->assign('css', 'global');
			$this->template->assign('view', 'Video');
			$this->template->assign('action', '/');
		}
		
		public function initContent(){
			$video = $this->models->getVideo($_GET['id'], $_GET['titre']);
			$list_video = $this->models->getListVideo($_GET['id'], $video->category);
			
			$this->template->assign('video', $video);
			$this->template->assign('list_video', $list_video);
		}
	}