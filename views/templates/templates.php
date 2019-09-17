<?php
/**
 * Created by PhpStorm.
 * User: guillet
 * Date: 27/05/18
 * Time: 16:17
 */
echo "
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>$title</title>
		<link rel='icon' href='assets/img/favicon.ico' type='image/x-icon'/>
        <link rel='stylesheet' type='text/css' href='assets/css/".strtolower($css).".css' />
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' />
		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
		<link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css'>";

if(isset($js)){
	echo "
		<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
		<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/i18n/jquery-ui-i18n.min.js'></script>
		<script src='assets/js/".strtolower($js).".js'></script>";
}

echo "
    </head>
    <body>";

		include_once('menu.php');
        include_once('views/'.ucfirst($view).'Views.php');

echo"</body>
</html>
";