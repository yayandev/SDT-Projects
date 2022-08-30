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

$allpost = query("SELECT * FROM postingan ORDER BY id DESC");
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
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }
    </style>
</head>
<script>
    $(document).ready(function() {
        $(".preloader").fadeOut();
    })
</script>

<body class="bg-light" onload="load();">
    <!-- inc load  -->
    <?php include "app/asset/inc/inc_load.php" ?>
    <!-- end load -->
    <!-- inc header -->
    <?php include 'app/asset/inc/inc_header.php'; ?>
    <!-- end header -->

    <!-- inc home  -->
    <?php include 'app/asset/inc/inc_home.php'; ?>
    <!-- end home -->

    <!-- notifikasi -->
    <?php include 'app/asset/inc/inc_notifikasi.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>