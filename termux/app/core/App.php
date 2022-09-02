<?php

class App{
   public function __construct(){
      $url = $this -> sanitizeUrl();
      var_dump($url);
   }
   public function  sanitizeUrl(){
      if(isset($_GET['url'])){
         return $_GET['url'];
      }
   }
}