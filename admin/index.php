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

$user = query("SELECT * FROM multi_user WHERE id = '$login'")[0];

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
        <h3 class="bg-light d-flex justify-content-between fs-4 p-3"><span><button class="btn" id="view" onclick="viewSIdeBar();"><i class="bi bi-list"></i></button><button class="btn" onclick="closeSIdeBar();" style="display: none;" id="close"><i class="bi bi-x-lg"></i></button>Hai Admin!</span> <span class="fs-5"><button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-person-circle"></i></button></span></h3>
        <nav class="bg-light shadow text-dark p-3" style="display: none;" id="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark active" aria-current="page" href="#"><i class="bi bi-house-fill"></i> dashboard</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="#"><i class="bi bi-person-check-fill"></i>admin</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="#"><i class="bi bi-person-fill"></i>user</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link text-dark" href="#"><i class="bi bi-person-plus-fill"></i>add user</a>
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



    <!-- modal -->
    <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Name Admin : <?= $user['username'];  ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="../logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- dashboar -->
    <div class="container">
        <div class="row d-flex justify-content-around mt-3">
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">user</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center fs-3">0</h6>
                    <a href="#" class="card-link">read more</a>
                </div>
            </div>
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">admin</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center fs-3">0</h6>
                    <a href="#" class="card-link">read more</a>
                </div>
            </div>
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">post user</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center fs-3">0</h6>
                    <a href="#" class="card-link">read more</a>
                </div>
            </div>
            <div class="card mb-3" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">post team</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-center fs-3">0</h6>
                    <a href="#" class="card-link">read more</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>