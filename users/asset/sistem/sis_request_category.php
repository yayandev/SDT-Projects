<?php
date_default_timezone_set('Asia/Jakarta');
require '../../../admin/sistem/conn.php';
require '../../../admin/sistem/query.php';
function send_request($data)
{
  global $conn;
  $username = htmlspecialchars($data["username"]);
  $reason = htmlspecialchars($data["reason"]);
  $category = htmlspecialchars($data["categoryName"]);
  $date = date("F j, Y, g:i a");
  $existCategory = query("SELECT * FROM kategori WHERE kategori = '$category' ");
  
  $tablename = "request_category";
  /* cek jika sudah ada category yg sama */
  if ($existCategory != null) {
    return [
       "ok" => false,
       "message" => "category $category sudah ada!"
     ];
  }
  $tableExist = mysqli_query($conn, "SHOW TABLES LIKE '$tablename'");
  
  if ($tableExist->num_rows === 0) {
     if (!mysqli_query($conn, "
         CREATE TABLE $tablename (
           id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
           username TEXT NOT NULL,
           category TEXT NOT NULL,
           reason TEXT NOT NULL,
           date TEXT NOT NULL
         );
         ")
     ) {
       return [
           "ok" => false,
           "message" => "can't create into database"
         ];
    }
  }
  
  if (!mysqli_query($conn, "
      INSERT INTO $tablename VALUES (
        NULL,
        '$username',
        '$category',
        '$reason',
        '$date'
      );
    ")) {
    return [
       "ok" => false,
       "message" => "internal server error!"
     ];
  }
  return [
       "ok" => true,
       "message" => "success sending request!"
     ];
}