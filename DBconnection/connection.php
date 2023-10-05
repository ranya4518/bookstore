<?php
require_once 'config.php';
class DB{
private static $pdo=null;
public static function connect(){
    if(self::$pdo==null){
        try{
            self::$pdo=new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASSWORD);
        }catch(PDOException $e){
        die($e->getMessage());
        }
    }
    return self::$pdo;
  }
public static function kapat(){
    self::$pdo->close();

}



}