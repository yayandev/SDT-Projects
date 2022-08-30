<?php
$path = __DIR__."/src/";
$files = array_diff(scandir($path), array('.', '..'));

foreach ($files as $file){
  require_once __DIR__."/src/".$file;
}