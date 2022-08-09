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

  <nav class="navbar navbar-expand-lg bg-light d-flex">
    <h3 class="text-primary  navbar-nav animate__animated animate__backInDown" id="logo">SDT <p class="text-secondary">Projects</p>
    </h3>
    <button type="button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="btn nav-button ">
      <i class="bi bi-justify-right"></i>
    </button>
    <ul class="navbar-nav" id="nav-desktop">
      <li class="nav-item m-2 animate__animated animate__backInDown animate__delay-1s">
        <a class="nav-link active" aria-current="page" href="blog.php" title="blog"><i class="bi bi-house"></i></a>
      </li>
      <li class="nav-item m-2 animate__animated animate__backInDown animate__delay-2s">
        <a href="asset/pages/profile.php" class="btn"><i class="bi bi-file-person-fill"></i></a>
      </li>
      <li class="nav-item m-2 animate__animated animate__backInDown animate__delay-3s">
        <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalsetting" title="setting"><i class="bi bi-gear"></i></a>
      </li>
      <li class="nav-item m-2 animate__animated animate__backInDown animate__delay-4s">
        <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalnotif" title="setting">
          <i class="bi bi-bell-fill"></i>
        </a>
      </li>
      <li class="nav-item m-2 animate__animated animate__backInDown animate__delay-5s">
        <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" title="logout"><i class="bi bi-box-arrow-right"></i></a>
      </li>
    </ul>
  </nav>

  <!-- nav mobile -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title d-flex" id="offcanvasRightLabel"><span class="text-primary  navbar-nav" id="logo">SDT <p class="text-secondary">Projects</p></span></h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Blog
          <span class="badge  rounded-pill"><a class="btn btn-info" aria-current="page" href="blog.php" title="blog"><i class="bi bi-house"></i></a></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Profile
          <span class="badge rounded-pill"> <a href="asset/pages/profile.php" class="btn btn-primary"><i class="bi bi-file-person-fill"></i></a></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Setting
          <span class="badge  rounded-pill"><a type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalsetting" title="setting"><i class="bi bi-gear"></i></a></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Notifikasi
          <span class=" badge rounded-pill">
            <a type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalnotif" title="setting">
              <i class="bi bi-bell-fill"></i>
            </a>
          </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Logout
          <span class="badge  rounded-pill"><a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" title="logout"><i class="bi bi-box-arrow-right"></i></a></span>
        </li>
      </ul>
    </div>
  </div>
  <!-- end nav mobile -->



  <!-- end header -->
  <!-- modal logout -->
  <!-- Modal -->
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


  <!-- modal setting -->
  <div class="modal fade" id="modalsetting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Setting</h5>
        </div>
        <div class="modal-body">
          comingsoon!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal setting -->

  <!-- modal notif -->
  <div class="modal fade" id="modalnotif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
        </div>
        <div class="modal-body">
          comingsoon!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal notif -->



  <!-- main -->

  <div class="container animate__animated animate__backInDown animate__delay-2s mt-5">
    <div class="jumbotron p-3 bg-light shadow text-secondary">
      <h1 class="display-4">Hai, <?= $user['username']; ?>!</h1>
      <p class="lead">Selamat datang!</p>
      <hr class="my-4">
      <p>Bagaimana hari ini Apa yang kamu buat! yuk posting Di SDT Projects Agar teman satu team Melihat Karyamu.</p>
      <a class="btn btn-primary btn-lg" href="asset/pages/posting.php" role="button">Posting</a>
      <a class="btn btn-secondary btn-lg" href="asset/pages/list_post.php" role="button">Daftar Posting</a></a>
    </div>
  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>