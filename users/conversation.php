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

$tableExist = mysqli_query($conn, "SHOW TABLES LIKE 'chat'");
  
if ($tableExist->num_rows === 0) {
   if (!mysqli_query($conn, "
       CREATE TABLE chat (
         id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         message TEXT NOT NULL,
         sender TEXT NOT NULL,
         date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
       );
       ")
   ) {
     echo "can't create table chats into database";
  }
}

$result = [];
$message = $_POST["message"] ?? null;
$sender = $_POST["sender"] ?? null;
$start = $_GET["start"] ?? 0;

if (!empty($message) && !empty($sender)) {
  $sql = "INSERT INTO chat VALUES (NULL, '".$message."', '".$sender."', NULL)";
  $result["send_status"] = mysqli_query($conn, $sql);
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  
  echo json_encode($result);
  exit;
}

if (isset($_GET["start"])) {
  $sql = "SELECT * FROM chat INNER JOIN multi_user ON chat.sender = multi_user.id WHERE chat.id > $start";
  $data = query($sql);
  /* clearing data password */
  foreach ($data as $i => $d) {
    unset($d["password"]);
    $data[$i] = $d;
  }
  $result["items"] = $data;
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
    <?php include "app/asset/inc/inc_conversation.php"; ?>
    <!-- end chat -->

    <!-- notifikasi -->
    <?php include 'app/asset/inc/inc_notifikasi.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>