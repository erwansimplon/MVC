<?php
	/**
	 * Created by PhpStorm.
	 * User: guillet
	 * Date: 27/05/18
	 * Time: 14:16
	 */
	
	class UploadModels extends Database
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
		
		public function add($array){
			
			$insert = $this->insert->insert('video', $array)
									->value($array);
			
			$requete = $this->pdo->exec('mysql', $insert);
			
			return $requete;
		}
		
		public function getAllThemes(){
			$select = $this->select->select('*')
									->from('theme');
			
			$requete = $this->pdo->query('mysql', $select);
			
			return $requete;
		}
	}