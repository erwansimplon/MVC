<?php
/**
 * Created by PhpStorm.
 * User: guillet
 * Date: 27/05/18
 * Time: 14:16
 */

class IndexController
{

    protected $models;
    protected $views;
    protected $template;
    
    public function __construct()
    {
        $this->models = new IndexModels();
        $this->template = new Render();

        $this->content();
    }

    public function content(){

        $this->template();

        $this->initContent();
    }

    public function template(){
        $this->template->assign('title', 'Youtube');
        $this->template->assign('css', 'global');
        $this->template->assign('view', 'Global');
        $this->template->assign('action', '');
    }
	
	public function initContent(){
		
		$data_video = array();
		
		$data_video = (!empty($_GET['search'])) ? $this->dataSearch($data_video) : $this->dataInit($data_video);
		
		$this->template->assign('data_video', $data_video);
	}
	
	public function dataSearch($data_video){
		$video = $this->models->getVideo($_GET['search']);
		$data_video[$video[0]->category] = $video;
		
		return $data_video;
	}
	
	public function dataInit($data_video){
		$themes = $this->models->getAllThemes();
		
		foreach ($themes as $theme) {
			$data_video[$theme->name] = $this->models->getAllVideoByTheme($theme->name);
		}
		
		return $data_video;
	}
}