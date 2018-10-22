<?php

if (!defined('__CONFIG__')) {
    exit('You do not have any configurations');
}

class DB {
    
    protected static $con;
    
    private function __construct()
    {
        try {
            self::$con = new PDO('mysql:charset=utf8mb4;host=localhost;port=3306;dbname=php_login_registration', 'admin', 'admin123');
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$con->setAttribute(PDO::ATTR_PERSISTENT, false);
        } catch (PDOException $e) {
            echo "Could not connect to database.\r\n" . $e;
            exit;
        }
    }

    public static function getConnection() {
        // if this instance is not started, start it
        if (!self::$con) {
            new DB();
        }
        // return the db connection
        return self::$con;
    }

}