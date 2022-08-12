<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit;
}
require 'sistem/query.php';
require 'sistem/conn.php';

if (isset($_POST["status"]) && isset($_POST["category"])) {
  $newCategory = $_POST["category"];
  if ($_POST["status"] === "apply") {
    /* insert new category */
    mysqli_query($conn, "INSERT INTO kategori VALUES (
      NULL,
      '$newCategory'
    )");
    if (mysqli_query($conn, "
        DELETE FROM request_category
        WHERE category = '$newCategory'
      ")) {
        echo json_encode([
            "ok" => true,
            "message" => "success apply category $newCategory !"
          ]);
        exit;
    }
  } else {
    if (mysqli_query($conn, "
        DELETE FROM request_category
        WHERE category = '$newCategory'
      ")) {
        echo json_encode([
          "ok" => true,
          "message" => "success reject category $newCategory !"
        ]);
        exit;
    }
  }
}

$login = $_SESSION['admin'];
$user = query("SELECT * FROM multi_user WHERE id = '$login'")[0];
$requests = query("SELECT * FROM request_category");
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
    .nav-link.active {
      background-color: grey;
    }
    .card-body {
      min-height: 20vh;
    }
    .reason {
      max-height: 20vh;
      min-height: 20vh;
      overflow-y: scroll;
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
                    <a class="nav-link d-flex gap-2 text-dark" href="./users.php"><i class="bi bi-person-fill"></i>users</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link d-flex gap-2 text-dark" href="registerMember.php"><i class="bi bi-person-plus-fill"></i>add acount</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link d-flex gap-2 text-dark" href="#"><i class="bi bi-archive-fill"></i>manage post</a>
                </li>
                <li class="nav-item mb-3">
                    <a class="nav-link d-flex gap-2 text-dark active" href="./request-category.php"><i class="bi bi-tag-fill"></i>request category</a>
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
        <?php foreach ($requests as $request): ?>
        <div class="col-12 col-md-6 col-lg-4">
            <!-- html... -->
          <div class="card m-2">
            <div class="card-body d-flex flex-column gap-1">
              <h5 class="card-title">
                <?= $request["username"]; ?>
              </h5>
              <p class="card-text">
                <div class="reason">
                  <?= $request["reason"]; ?>
                </div>
                <div class="d-flex gap-2">
                  <form onsubmit="return false" class="request-response" action="" method="post" accept-charset="utf-8">
                    <input type="hidden" name="category" id="category" value="<?= $request["category"]; ?>" />
                    <button  name="apply" value="apply" class="btn btn-success">
                      setuju
                    </button>
                    <button  name="reject" value="reject" class="btn btn-danger">
                      tolak
                    </button>
                  </form>
                </div>
              </p>
            </div>
          </div>
        </div>
       <?php endforeach; ?>
      </div>
      
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf-8">
      $(".request-response button").on("click", function(){
        let parent = $(this)[0].parentElement.parentElement.parentElement.parentElement
        let category = $(this).parent().find("input").val()
        let status = $(this).attr("name")
        $.ajax({
          type : 'POST',
          url : window.location.href,
          data : {
            category: category,
            status: status
          },
          success: function(data) {
            let parsed = JSON.parse(data)
            if (parsed.ok) {
              /* update modal */
              alert(parsed.message)
              parent.remove()
            }
          },
          error: function() {
            console.log(data);
          }
        })
        return true
      })
    </script>
  </body>
</html>