<?php
session_start();
if (!isset($_SESSION["users"])) {
    header("Location: ../login.php");
    exit;
}


require '../admin/sistem/query.php';


$allmember = query("SELECT * FROM multi_user WHERE level = 'user'");
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

    <!-- inc team -->
    <?php include 'app/asset/inc/inc_team.php'; ?>
    <!-- end team -->

    <!-- notifikasi -->
    <?php include 'app/asset/inc/inc_notifikasi.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>