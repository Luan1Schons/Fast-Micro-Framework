<?php

namespace App\Database;
use PDO;
class Connection
{

    private static $pdo = null;
    public static function connection()
    {
        if(static::$pdo)
        {
            return static::$pdo;
        }
        try {
            static::$pdo = new PDO($_ENV['DB_DRIVER'].':host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
            return static::$pdo;
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }
        
       
       
    }
}