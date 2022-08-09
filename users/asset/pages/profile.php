<?php
session_start();
if (!isset($_SESSION["users"])) {
    header("Location: ../../../login.php");
    exit;
}

// <!-- cetak session login -->
if ($_SESSION['users']) {
    $login = $_SESSION['users'];
}

require '../../../admin/sistem/query.php';


$user = query("SELECT * FROM multi_user where id = $login")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user['username']; ?> | Profile</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
</head>

<body>


    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4"><?= $user['username']; ?></h1>
            <p class="lead">Level Akun : <?= $user['level']; ?></p>
            <hr class="my-4">
            <p><a href="" class="btn btn-primary disabled">Ganti Password</a> Comingsoon!</p>
            <a class="btn btn-primary btn-lg" href="../../index.php" role="button">Back</a>
        </div>
    </div>

    <script src="../../../js/bootstrap.bundle.min.js"></script>
</body>

</html>