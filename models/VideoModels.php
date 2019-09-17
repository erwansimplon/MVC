<?php
	/**
	 * Created by PhpStorm.
	 * User: guillet
	 * Date: 27/05/18
	 * Time: 14:16
	 */
	
	class VideoModels extends Database
	{
		protected $pdo;
		
		protected $select;
		protected $insert;
		protected $update;
		protected $replace;
		protected $delete;
		
		public function __construct()
		{
			$this->pdo = new Database();
			
			$this->select  = new SelectSqlCore();
			$this->insert  = new InsertSqlCore();
			$this->update  = new UpdateSqlCore();
			$this->replace = new ReplaceSqlCore();
			$this->delete  = new DeleteSqlCore();
		}
		
		public function getTitle($id, $video){
			$select = $this->select->select('titre')
									->from('video')
									->where('id = "'.$id.'"',
											'crypt_titre = "'.$video.'"');
			
			$requete = $this->pdo->query('mysql', $select, false, true);
			
			if(isset($requete->titre)){
				return $requete->titre;
			}
			
			return $requete;
		}
		
		public function getListVideo($id, $category){
			
			$table = array('theme' => 't');
			
			$liaison = array('v.id_theme' => 't.id');
			
			$select = $this->select->select('v.*, t.name as category')
									->from('video', 'v')
									->join('inner', $table, $liaison)
									->where('v.id != "'.$id.'"',
											't.name = "'.$category.'"');
			
			$requete = $this->pdo->query('mysql', $select);
			
			return $requete;
		}
		
		public function getVideo($id, $video){
			
			$table = array('theme' => 't');
			
			$liaison = array('v.id_theme' => 't.id');
			
			$select = $this->select->select('v.*, t.name as category')
									->from('video', 'v')
									->join('inner', $table, $liaison)
									->where('v.id = "'.$id.'"',
											'v.crypt_titre = "'.$video.'"');
			
			$requete = $this->pdo->query('mysql', $select, false, true);
			
			return $requete;
		}
	}