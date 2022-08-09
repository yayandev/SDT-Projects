<?php
require '../admin/sistem/query.php';

$allkategori = query("SELECT * FROM kategori");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Projects | blog</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../icons/bootstrap-icons.css">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg bg-light p-1">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="../index.html"><span class="text-primary">SDT</span> <span style="font-size: 16px;">Blog</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mb-3">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mb-3 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            kategori
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($allkategori as $kategori) : ?>
                                <li><a class="dropdown-item" href="#"><?= $kategori['kategori']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item mb-3 dropdown">
                        <a class="dropdown-toggle nav-link " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            opsi
                        </a>
                        <ul class="dropdown-menu">
                            <li class="p-2"><a class="dropdown-item bg-primary text-white text-center" href="../login.php">Login Member</a></li>
                            <li class="p-2"><a href="http://wa.me/6283873614764/?text=Halo%20admin%20Saya%20Ingin%20Berfabung%20Dengan%20Team%20*SDT%20Projects*" class="dropdown-item bg-info text-white text-center" href="">Join Member</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </nav>
    <!-- end header -->

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>