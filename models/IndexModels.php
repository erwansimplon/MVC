<?php
/**
 * Created by PhpStorm.
 * User: guillet
 * Date: 27/05/18
 * Time: 14:16
 */

class IndexModels extends Database
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
	
	public function getAllVideoByTheme($theme){
		
		$table = array('theme' => 't');
		
		$liaison = array('v.id_theme' => 't.id');
		
		$select = $this->select->select('v.*, t.name as category')
								->from('video', 'v')
								->join('inner', $table, $liaison)
								->where('t.name LIKE "'.$theme.'"');
		
		$requete = $this->pdo->query('mysql', $select);
		
		return $requete;
	}
	
	public function getAllThemes(){
		$select = $this->select->select('*')
								->from('theme');
		
		$requete = $this->pdo->query('mysql', $select);
		
		return $requete;
	}
	
	public function getVideo($video){
		
		$table = array('theme' => 't');
		
		$liaison = array('v.id_theme' => 't.id');
		
		$select = $this->select->select('v.*, t.name as category')
								->from('video', 'v')
								->join('inner', $table, $liaison)
								->where('v.titre LIKE "%'.$video.'%" OR t.name LIKE "'.$video.'"');
		
		$requete = $this->pdo->query('mysql', $select);
		
		return $requete;
	}
}