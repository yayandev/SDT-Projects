<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../login.php");
    exit;
}

require 'sistem/register.php';



if (isset($_POST["register"])) {

    if (register($_POST) > 0) {

        echo "<div class='alert alert-success' role='alert'>
        Create Acount success!
      </div>
      ";
    } else {
        echo mysqli_error($conn);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Prjoects | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .Register {
            margin: auto;
            width: 500px;
            margin-top: 20px;
            padding: 20px;
            box-sizing: border-box;
            border-radius: 10px;
        }


        @media screen and (max-width:678px) {
            .Register {
                margin: auto;
                width: 300px;
                margin-top: 20px;
                padding: 20px;
                box-sizing: border-box;
                border-radius: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="Register shadow">
        <div class="mb-3">
            <label class="form-label">
                <p class="fs-4">Create Acount Member <span class="text-primary"><br>SDT</span> <span class="text-secondary">Projects</span></p>
            </label>
        </div>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="username" aria-label="username" aria-describedby="basic-addon1">
            </div>

            <div class="mb-3">
                <label for="password">password</label>
                <input type="text" id="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon2">
            </div>

            <div class="mb-3">
                <label for="password2">konfirmasi password</label>
                <input type="text" name="password2" class="form-control" id="password2" placeholder="konfirmasi password" aria-describedby="basic-addon3">
            </div>
            <div class="mb-3">
                <label for="level" class="form-input">Level Akses</label>
                <select class="form-select form-select-sm mb-3 form-control" name="level" id="level" aria-label=".form-select-lg example">
                    <option>user</option>
                    <option>admin</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="form-control btn btn-primary" name="register">Create</button>
            </div>
        </form>
    </div>


    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>