<?php
require_once __DIR__."/../../lib/autoload.php";
// koneksi database

$host = "127.0.0.1"; // default localhost
$username = "root";
$password = "1234"; // default null
$database = "sdt_projects";

/*
$host = "sql313.epizy.com";
$username = "epiz_32347932";
$password = "a1nmTmyqTyS";
$database = "epiz_32347932_sdt_projects";
*/

$conn = Connection::getConnection() ? Connection::getConnection() : Connection::connect($host, $username, $password, $database);

// mysqli_connect($host, $username, $password, $database);