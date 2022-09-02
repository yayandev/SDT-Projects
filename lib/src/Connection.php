<?php
class Connection {
  private static $u, $p, $h, $db;
  private static 
    $conn = null,
    $uptime = null;
  public static $counter = 0;
  
  public static function connect($h = "localhost", $u = "root", $p = "", $db = null) {
    self::$h = $h;
    self::$u = $u;
    self::$p = $p;
    self::$db = $db;
    #error_reporting(0);
    
   // if connect exist return
   if (!empty(self::$conn)) {
     return self::$conn;
   }
   
   // create new connection
    try {
     $connect = mysqli_connect($h, $u, $p, $db) or die("connecting failed!" );
      self::$conn = $connect;
      self::$counter += 1;
      self::$uptime = date("d M Y h:i:s");
      
      return $connect;
    } catch(\Exception $e) {
      echo "something wrong!, failed connect database, check your terminal / log to see exception";
      error_log($e);
      exit;
    }
  }
  
  public static function setDatabase($db = null) {
    self::$db = $db;
    error_reporting(0);
   // create new connection
    try {
     $connect = mysqli_select_db($db) or die("connecting failed!" );
      self::$conn = $connect;
      self::$uptime = date("d M Y h:i:s");
      
      return $connect;
    } catch(\Exception $e) {
      echo "something wrong!, failed connect database, check your terminal / log to see exception";
      error_log($e);
      exit;
    }
  }
  
  public static function getConnection(){
    if (!self::$conn) {
      // throw new Exception("connection object has missing!");
      return false;
    }
    return self::$conn;
  }
  
  public static function getCredentials(){
    if (!self::$conn) {
      throw new Exception("class must initialize first!");
    }
    return [
        "host" => self::$h,
        "username" => self::$u,
        "password" => self::$p,
        "database" => self::$db,
        "uptime" => self::$uptime,
      ];
  }
}
