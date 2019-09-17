<?php
/**
 * Created by PhpStorm.
 * User: guillet
 * Date: 27/05/18
 * Time: 12:31
 */

class Autoloader
{
    /**
     * Enregistre notre autoloader
     *
     * @param $class
     */
    static function register($class){

        $tab = explode('\\', $class);

        $path = implode(DIRECTORY_SEPARATOR, $tab).'.php';

        include_once($path);

    }

    static function hydrate(array $donnees, $table, $colonne = false){

        $table = new $table();
        $keys = array();
        $valeur  = array();

        foreach ($donnees as $donnee){

            foreach ($donnee as $key => $value){
                $method = 'set'.ucfirst($key);

                if(method_exists($table, $method)){
                    array_push($keys,$key);
                    array_push($valeur,$table->$method($value));
                }
            }
        }

        $tableau = array_chunk($valeur, $colonne);

        return $tableau;
    }
}