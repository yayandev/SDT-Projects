<?php
require_once __DIR__."/lib/autoload.php";

$argv = ArgumentScanner::get();

function isValid ($var = null) {
  return !empty($var) && ( $var != null || $var !== "" );
}

if ( isValid($argv->h) && isValid($argv->u) && isValid($argv->p) && isValid($argv->db) ) {
  try {
    $conn = Connection::connect($argv->h, $argv->u, $argv->u, $argv->db);
    echo "success connect to database [". $argv->db . "]";
  } catch (\Exception $e) {
    echo $e;
  }
}



/* start program */
if( isset($argv->start) && $argv->start === "" ) {
  exec("php -S localhost:8000") or die("failed to start");
  echo "running at port 8000";
}

if ( isset($argv->start) && $argv->start !== "" ) {
  exec("php -S localhost:". $argv->start) or die("failed to start");
  echo "running at port ". $argv->start;
}


exit;