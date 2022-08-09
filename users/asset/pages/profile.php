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
require '../sistem/sis_posting.php';

$user = query("SELECT * FROM multi_user where id = $login")[0];
$name = $user['username'];

$jmlpost = count(query("SELECT * FROM postingan WHERE author = '$name'"));


if (isset($_POST['edit'])) {
    if (editImages($_POST) > 0) {
        echo "
        <div class='alert alert-success' role='alert'>
        Update images Success! Please refresh page <a href='profile.php' class='btn btn-light'><i class='bi bi-arrow-clockwise'></i></a>
        </div>
        ";
    } else {
        echo "
        <div class='alert alert-danger' role='alert'>
        Update images Error! Please refresh page <a href='profile.php' class='btn btn-light'><i class='bi bi-arrow-clockwise'></i></a>
        </div>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user['username']; ?> | Profile</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../icons/bootstrap-icons.css">
</head>

<body>


    <div class="container">
        <div class="jumbotron bg-light p-3 shadow m-3">
            <img src="../../../admin/images-post/<?= $user['img']; ?>" class="rounded-circle" width="200px" height="200px" alt=""><br>
            <a type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">edit images</a>
            <a type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#biodata" data-bs-whatever="@getbootstrap">biodata</a>
            <h2 class="display-4 fs-3">username : <?= $user['username']; ?></h2>
            <p class="lead">Jumlah postingan : <?= $jmlpost; ?></p>
            <hr class="my-4">

            <a class="btn btn-secondary btn-lg" href="../../index.php" role="button">Back</a>
        </div>
    </div>


    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit images | <?= $user['username']; ?></h5>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <img src="../../../admin/images-post/<?= $user['img']; ?>" class="rounded-circle form-label" width="200px" height="200px" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="file" class="col-form-label">File images</label>
                            <input type="file" class="form-control" id="file" required name="images">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit">edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="biodata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Biodata | <?= $user['username']; ?></h5>
                </div>
                <div class="modal-body">
                    COMMING SOON!!!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../js/bootstrap.bundle.min.js"></script>
</body>

</html>