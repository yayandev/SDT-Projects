<?php
session_start();
if (!isset($_SESSION["users"])) {
  header("Location: ../login.php");
  exit;
}

require '../sistem/sis_request_category.php';

/* cetak variabel login */
$login = $_SESSION['users'];

$user = query("SELECT * FROM multi_user WHERE id = '$login'")[0];

if (isset($_POST["send"])) {
  /* insert username to post method */
  $_POST["username"] = $user["username"];
  $categoryName = $_POST["categoryName"];
  $process = send_request($_POST);
  if ($process["ok"]) {
    echo "
        <div class='alert alert-success' role='alert'>
         permintaan berhasil, tunggu sampai admin mengabulkan !
        </div>
        <script>
          setTimeout(() => {
            window.location.href='../../'
          }, 2000)
        </script>
        ";
  } else {
    $message = $process["message"];
    echo "
        <div class='alert alert-danger' role='alert'>
          $message
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
    <title>SDT Prjoects | request category</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <style>
        .login {
            width: 300px;
            margin: auto;
            margin-top: 50px;
            padding: 30px;
            box-sizing: border-box;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="login shadow">
        <?php if (isset($error)) : ?>

            <div class='alert alert-danger' role='alert'>
                ada error saat mengirim permintaan
            </div>

        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">
                    <h4> <a href="index.html" style="text-decoration: none;"><span class="text-primary">SDT</span> <span class="text-secondary">Projects</span></a></h4>
                    
                    <p>Request Category</p>
                </label>
            </div>
            <div class="mb-3">
                <label for="categoryName" class="form-label text-capitalize">nama kategori</label>
                <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="nama kategori" required>
            </div>
            <div class="mb-3">
                <label for="reason" class="form-label text-capitalize">alasan</label>
                <textarea class="form-control" id="reason" name="reason" placeholder="tulis alasannya" required></textarea>
            </div>
            <div class="mb-3">
                <button class="form-control btn btn-primary" name="send">kirim</button>
            </div>
        </form>
    </div>


    <script src="../../../js/bootstrap.bundle.min.js"></script>
</body>

</html>