<?php
// koneksi database

$host = "localhost"; // default localhost
$username = "root";
$password = ""; // default null
$database = "sdt_projects";

/*
$host = "sql313.epizy.com";
$username = "epiz_32347932";
$password = "a1nmTmyqTyS";
$database = "epiz_32347932_sdt_projects";
*/
$conn = mysqli_connect($host, $username, $password, $database);
