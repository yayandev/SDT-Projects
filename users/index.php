<?php

session_start();
if (!isset($_SESSION["users"])) {
  header("Location: ../login.php");
  exit;
}

// <!-- cetak session login -->
if ($_SESSION['users']) {
  $login = $_SESSION['users'];
}

require '../admin/sistem/query.php';

$user = query("SELECT * FROM multi_user WHERE id = '$login'")[0];

$allpost = query("SELECT * FROM postingan");
$allnotif = query("SELECT * FROM notif ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SDT Projects</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/users.css">
  <link rel="stylesheet" href="../icons/bootstrap-icons.css">
  <link rel="stylesheet" href="../css/animasi.css">
</head>

<body>
  <!-- header -->
  <?php include 'asset/inc/header.php' ?>
  <br>
  <!-- main -->
  <?php include 'asset/inc/main.php' ?>

  <!-- modal -->
  <?php include 'asset/modal/modal-notifikasi.php'; ?>
  <?php include 'asset/modal/modal-changes-password.php'; ?>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>