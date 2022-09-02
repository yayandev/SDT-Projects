<?php
error_reporting(E_ALL^E_WARNING);
session_start();
ob_start();
require_once("../app/init.php");
$app = new App;
ob_end_flush();