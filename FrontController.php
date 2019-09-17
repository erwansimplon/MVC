<?php
/**
 * Created by PhpStorm.
 * User: guillet
 * Date: 27/05/18
 * Time: 13:03
 */
	
set_time_limit(0);
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
require_once 'config/Autoloader.php';

$page = 'Index';

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

$models = $page.'Models';
$controller = $page.'Controller';

Autoloader::register('config/Database');
Autoloader::register('config/Render');

Autoloader::register('core/sql/SelectSqlCore');
Autoloader::register('core/sql/ReplaceSqlCore');
Autoloader::register('core/sql/UpdateSqlCore');
Autoloader::register('core/sql/InsertSqlCore');
Autoloader::register('core/sql/DeleteSqlCore');

Autoloader::register('core/EmailCore');

Autoloader::register('models/'.$models);
Autoloader::register('controller/'.$controller);

new $controller();
