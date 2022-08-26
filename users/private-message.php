<?php
session_start();
if (!isset($_SESSION["users"])) {
    header("Location: ../login.php");
    exit;
}
require '../admin/sistem/query.php';
if ($_SESSION['users']) {
    $login = $_SESSION['users'];
}

$user = query("SELECT * FROM multi_user WHERE id = '$login'")[0];

$tableExist = mysqli_query($conn, "SHOW TABLES LIKE 'private_chat'");
  
if ($tableExist->num_rows === 0) {
   if (!mysqli_query($conn, "
       CREATE TABLE private_chat (
         id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         message TEXT NOT NULL,
         sender INT NOT NULL,
         receiver INT NOT NULL,
         date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
       );
       ")
   ) {
     echo "can't create table chats into database";
  }
}

$result = [];
/* user yg dichat */
$username = ( $_GET["username"] ?? $_POST["username"] ) ?? null;
$message = $_POST["message"] ?? null;
$sender = $_POST["sender"] ?? null;
$receiver = $_POST["receiver"] ?? null;
$start = $_GET["start"] ?? 0;

if (!$username) {
  header('HTTP/1.0 403 Forbidden');
  exit;
}

if ($username === $user["username"]) {
  header("location: /users/team.php");
  exit;
}

$receiveUser = query("SELECT * FROM multi_user WHERE username = '$username'")[0];


if (!empty($message) && !empty($sender)) {
  $sql = "INSERT INTO private_chat VALUES (NULL, '".$message."', '".$sender."','".$receiver."', NULL)";
  $result["send_status"] = mysqli_query($conn, $sql);
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  
  echo json_encode($result);
  exit;
}


if (isset($_GET["start"])) {
  $authUserId = intval($user["id"]);
  $receiverId = intval($receiveUser["id"]);
  
  $sql = "SELECT * FROM private_chat WHERE private_chat.id > $start AND private_chat.receiver = $receiverId AND private_chat.sender = $authUserId";
  $sql2 = "SELECT * FROM private_chat WHERE private_chat.id > $start AND private_chat.receiver = $authUserId AND private_chat.sender = $receiverId";
  
  $dikirim = query($sql);
  $diterima = query($sql2);
  
  $merged = array_merge($dikirim, $diterima);
  sort($merged);
  $result["items"] = $merged;
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  echo json_encode($result);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Projects</title>
    <link rel="stylesheet" href="app/asset/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body class="bg-light">

    <!-- inc header -->
    <?php include 'app/asset/inc/inc_header.php'; ?>
    <!-- end header -->

    <!-- inc chat  -->
    <?php include "app/asset/inc/inc_private-message.php"; ?>
    <!-- end chat -->

    <!-- notifikasi -->
    <?php include 'app/asset/inc/inc_notifikasi.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>