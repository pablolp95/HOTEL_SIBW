<?php
/**
 * Created by PhpStorm.
 * User: joseccf
 * Date: 17/05/16
 * Time: 12:16
 */
class Db
{
    private static $instance = NULL;
    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {

        $dbhost = "localhost";
        $dbname = "sibw";
        $dbuser = "root";
        $dbpswd = "sibw";

        if (!isset(self::$instance)) {
            self::$instance= new mysqli($dbhost,$dbuser,$dbpswd,$dbname);
        }
        return self::$instance;
    }
}
?>