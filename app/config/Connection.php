<?php
namespace MC\Config;
use MC\Helpers\Errors\RedirectException;
use PDO;
use PDOException;

class Connection{
    private static $con = null;
    public static function getCon(){
        $username = 'root';
        $password = '';
        $dbname = 'movies';
        $port = '3306';
        $host = '127.0.0.1';
        $engine = 'mysql';
        $dsn = "$engine:dbname=$dbname;host=$host;port=$port";
        if (self::$con == null){
            try{
                self::$con = new PDO($dsn,$username,$password);
            }
            catch (PDOException $e){
                throw new RedirectException("unavailable.php"); 
            }
        }
        return self::$con;
    }


}