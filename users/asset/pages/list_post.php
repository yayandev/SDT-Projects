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
$author = $user['username'];

$allpost = query("SELECT * FROM postingan WHERE author = '$author'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Project | Daftra Post | <?= $user['username']; ?></title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
</head>

<body>

    <div class="container p-2">
        <h3 class="text-center fs-4">Daftar Postingan <span class="text-secondary" style="text-decoration: underline;"><?= $user['username']; ?></span> <span class="text-primary">SDT</span> <span class="text-secondary">Projects</span></h3>
        <hr>
        <a href="../../index.php" class="btn btn-secondary">Back</a>
        <div class="row d-flex justify-content-around mt-3">
            <?php foreach ($allpost as $post) : ?>
                <div class="card mb-3" style="width: 16rem;">
                    <img src="../../../admin/images-post/<?= $post['images']; ?>" class="card-img-top p-2" alt="..." height="150px" width="150px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['title']; ?></h5>
                        <p class="card-text"><?= $post['date']; ?></p>
                        <a href="#" class="btn btn-primary">detail</a>
                        <a href="" class="btn btn-danger">hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="../../../js/bootstrap.bundle.min.js"></script>
</body>

</html>