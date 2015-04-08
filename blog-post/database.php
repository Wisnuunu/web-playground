<?php

class Database {
    private static $dbName = '<datahost>';
    private static $dbHost = '<datahost>';
    private static $dbUsername = '<usually using root>';
    private static $dbPassword = '';
    
    private static $cont = null;
    
    
    public function __construct() {
        die('Error when init database');
    }
    
    public static function connect() {
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbPassword);
            }
            catch( PDOExecption $e ){
                die($e->getMessage());
            } 
        }
        
        return self::$cont;
    }
    
    public static function disconnect() {
        self::$cont = null;
    }
}


?>
