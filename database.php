<?php 
class Database {
     private static $db=null;


    private function __construct() {
    }

    public static function getDB() {
        if (is_null(self::$db)) {
            self::$db=new PDO("mysql:host=remotemysql.com:3306/6dQHsEkzvW?serverTimezone=GMT;dbname=6dQHsEkzvW","6dQHsEkzvW","5qxpdkAUSI");
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec("set names utf8");
        }
        return self::$db;
    }



}

?>