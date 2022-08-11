<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit;
}
if (!isset($_GET["name"])) {
  echo "require parameter name on url!";
}

require 'sistem/query.php';

$name = $_GET["name"];
$user = query("SELECT * FROM multi_user WHERE username = '$name'");
if ($user == null) {
  http_response_code(404);
  exit;
}
$user = $user[0];

$profile = query("SELECT * FROM profile WHERE name = '$name'")[0];
$posts = query("SELECT * FROM postingan WHERE author = '$name'");
$posts = count($posts) > 0 ? $posts : [];

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Projects | list all users</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../icons/bootstrap-icons.css">
    <style>
    p {
      margin: 0;
    }
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
    .pp {
      height: 10rem;
      width: 10rem;
    }
    .thumb {
      height: 20vh;
      width: 100%;
    }
    .nav-link.active {
      background-color: grey;
    }
    .card-body {
      min-height: 20vh;
    }
</style>
  </head>
  <body>
    <!-- start header -->
    <header>
        <h3 class="bg-light d-flex justify-content-between fs-4 p-3"><span><button class="btn" id="view" onclick="viewSIdeBar();"><i class="bi bi-list"></i></button><button class="btn" onclick="closeSIdeBar();" style="display: none;" id="close"><i class="bi bi-x-lg"></i></button>Hai Admin!</span> <span class="fs-5"><?= $user['username']; ?></span></h3>
        <nav class="bg-light shadow text-dark p-3 rounded" style="display: none;" id="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a class="nav-link d-flex gap-2 text-dark" aria-current="page" href="index.php"><i class="bi bi-house-fill"></i> dashboard</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link d-flex gap-2 text-dark" href="#"><i class="bi bi-person-check-fill"></i>admin</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link d-flex gap-2 text-dark active" href="./users.php"><i class="bi bi-person-fill"></i>users</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link d-flex gap-2 text-dark" href="registerMember.php"><i class="bi bi-person-plus-fill"></i>add acount</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link d-flex gap-2 text-dark" href="#"><i class="bi bi-archive-fill"></i>manage post</a>
                </li>
                <li class="nav-item mb-3">
                    <a type="button" class="btn btn-danger d-flex gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal" title="logout"><i class="bi bi-box-arrow-in-right"></i>logout</a>
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
    <div class="container">
      
      <div class="row">
        <div class="col-12">
          <div class="card m-2">
            <img src="./images-post/<?= $user["img"]; ?>" class="card-img-top rounded-circle pp mx-auto my-2" alt="<?= $user["username"]; ?>">
            <div class="card-body d-flex flex-column gap-1">
              <h5 class="card-title">
                <?= $user["username"]; ?>
              </h5>
              <?php foreach ($profile as $key => $item): ?>
                <p class="card-text">
                  <?= $key; ?> : <?= $item; ?>
                </p>
              
              <?php endforeach; ?>
              <p class="card-text">
                total posts : <?= count($posts) ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <?php if ($posts !== null): ?>
      <div class="row">
        <h1 class="fs-5">
          <?= $user["username"]; ?>'s Posts
        </h1>
        <?php foreach ($posts as $post): ?>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <img src="./images-post/<?= $post["images"]; ?>" class="card-img-top thumb mx-auto my-2" alt="<?= $user["username"]; ?>">
              <div class="card-title">
                <?= $post["title"]; ?>
              </div>
              
              <div class="d-flex gap-2">
                <a href="<?= $post["demo"]; ?>" class="btn btn-primary ">
                  visit
                </a>
                <a href="<?= $post["source"]; ?>" class="btn btn-info ">
                  source code
                </a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        
      </div>
      <?php endif; ?>
    </div>
    
    
  </body>
</html>