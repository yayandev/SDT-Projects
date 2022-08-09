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
$name = $user['username'];

$jmlpost = count(query("SELECT * FROM postingan WHERE author = '$name'"));



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
        <div class="jumbotron bg-light p-3 shadow m-3">
            <img src="../../../admin/images-post/<?= $user['img']; ?>" class="rounded-circle" width="150px" height="150px" alt=""><br>
            <a href="" class="btn btn-primary m-2">edit images</a>
            <h1 class="display-4">username : <?= $user['username']; ?></h1>
            <p class="lead">Jumlah postingan : <?= $jmlpost; ?></p>
            <hr class="my-4">
            <a class="btn btn-secondary btn-lg" href="../../index.php" role="button">Back</a>
        </div>
    </div>

    <script src="../../../js/bootstrap.bundle.min.js"></script>
</body>

</html>