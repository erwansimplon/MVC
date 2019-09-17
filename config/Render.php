<?php
/**
 * Created by PhpStorm.
 * User: guillet
 * Date: 27/05/18
 * Time: 15:36
 */

class Render
{
    private $data = array();
    private $render = FALSE;

    public function __construct()
    {
        $this->render = 'views/templates/templates.php';
    }

    public function assign($variable, $value){
        $this->data[$variable] = $value;
    }

    public function __destruct()
    {
        extract($this->data);
        include_once($this->render);
    }
}