<?php
require 'sistem/query.php';

session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit;
}
// <!-- cetak session login -->
if ($_SESSION['admin']) {
    $login = $_SESSION['admin'];
}

$allnotif = query("SELECT * FROM notif ORDER BY id DESC");

$user = query("SELECT * FROM multi_user WHERE id = '$login'")[0];

$jmluser = count(query("SELECT * FROM multi_user"));

$jmladmin = count(query("SELECT * FROM multi_user WHERE level = 'admin' "));

$jmlpost = count(query("SELECT * FROM postingan"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Projects | Admin Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../icons/bootstrap-icons.css">
</head>
<style>
    body header {
        width: 100%;
    }

    body nav {
        width: 200px;
        position: absolute;
        z-index: 999;
    }

    .nav-link:hover {
        background-color: grey;
    }
</style>

<body>

    <!-- start header -->
    <header>
        <h3 class="bg-light d-flex justify-content-between fs-4 p-3"><span><button class="btn" id="view" onclick="viewSIdeBar();"><i class="bi bi-list"></i></button><button class="btn" onclick="closeSIdeBar();" style="display: none;" id="close"><i class="bi bi-x-lg"></i></button>Hai Admin!</span> <span class="fs-5"><?= $user['username']; ?></span></h3>
        <nav class="bg-light shadow text-dark p-3" style="display: none;" id="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark active" aria-current="page" href="index.php"><i class="bi bi-house-fill"></i> dashboard</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="#"><i class="bi bi-person-check-fill"></i>admin</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="#"><i class="bi bi-person-fill"></i>user</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="registerMember.php"><i class="bi bi-person-plus-fill"></i>add acount</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="#"><i class="bi bi-archive-fill"></i>manage post</a>
                </li>
                <li class="nav-item mb-3">
                    <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" title="logout"><i class="bi bi-box-arrow-in-right"></i>logout</a>
                </li>
            </ul>
        </nav>
        <!-- nav script -->
        <script>
            function viewSIdeBar() {
                let sideBar = document.getElementById("sidebar");
                let view = document.getElementById("view");
                let close = document.getElementById("close");

                view.setAttribute("style", "display:none;");
                close.setAttribute("style", "");
                sideBar.setAttribute("style", "");
            }

            function closeSIdeBar() {
                let sideBar = document.getElementById("sidebar");
                let view = document.getElementById("view");
                let close = document.getElementById("close");

                view.setAttribute("style", "");
                close.setAttribute("style", "display:none;");
                sideBar.setAttribute("style", "display:none;");
            }
        </script>

    </header>
    <!-- end header -->


    <!-- dashboar -->
    <div class="container">
        <div class="row d-flex justify-content-around mt-3">
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">user</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center fs-3"><?= $jmluser; ?></h6>
                    <a href="#" class="card-link">read more</a>
                </div>
            </div>
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">admin</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center fs-3"><?= $jmladmin; ?></h6>
                    <a href="#" class="card-link">read more</a>
                </div>
            </div>
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">post</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center fs-3"><?= $jmlpost; ?></h6>
                    <a href="#" class="card-link">read more</a>
                </div>
            </div>
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">message</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center fs-3">0</h6>
                    <a href="#" class="card-link">read more</a>
                </div>
            </div>
        </div>
    </div>



    <!-- modal logout -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                </div>
                <div class="modal-body">
                    <p>Anda akan logout ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <a href="../logout.php" class="btn btn-danger">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal logout -->


    <!-- notifikasi -->
    <div class="container mt-5 p-4">
        <?php foreach ($allnotif as $notif) : ?>
            <div class="card mb-3">
                <div class="card-header">
                    <?= $notif['author']; ?> Memposting sesuatu!!!
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?= $notif['title']; ?></p>
                        <footer class="blockquote-footer"><?= $notif['date']; ?></footer>
                    </blockquote>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- end notifikasi -->

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>