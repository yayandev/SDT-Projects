<?php
require '../../../admin/sistem/conn.php';
require '../../../admin/sistem/query.php';

function send_request($data)
{
  global $conn;
  $username = htmlspecialchars($_POST["username"]);
  $reason = htmlspecialchars($_POST["reason"]);
  $category = htmlspecialchars($_POST["categoryName"]);
  
  $existCategory = query("SELECT * FROM kategori WHERE kategori = '$category' ");
  
  /* cek jika sudah ada category yg sama */
  if ($existCategory != null) {
    return false;
  }
  
  return true;
}