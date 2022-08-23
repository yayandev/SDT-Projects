<?php


// mulai session
session_start();

// panggil function
require 'admin/sistem/conn.php';

// logic login
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM multi_user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {

            if ($row['level'] == 'admin') {

                // set session
                $_SESSION['admin'] = $row['id'];
                header("Location: admin/index.php");

                exit;
            } else if ($row['level'] == 'user') {
                //set session
                $_SESSION['users'] = $row['id'];
                header("Location: users/index.php");
                exit;
            }
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Prjoects | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .login {
            width: 300px;
            margin: auto;
            margin-top: 50px;
            padding: 30px;
            box-sizing: border-box;
            border-radius: 10px;
            position: relative;
        }
    </style>
</head>

<body>
    <script>
        function read() {
            let pass = document.getElementById("password");
            let read = document.getElementById("read")
            let closepw = document.getElementById("closepw");

            pass.setAttribute("type", "text");
            read.setAttribute("style", "display:none;");
            closepw.setAttribute("style", "");
        }

        function closepw() {
            let pass = document.getElementById("password");
            let read = document.getElementById("read")
            let closepw = document.getElementById("closepw");

            pass.setAttribute("type", "password");
            closepw.setAttribute("style", "display:none;");
            read.setAttribute("style", "");
        }
    </script>
    <div class="login shadow">
        <?php if (isset($error)) : ?>

            <div class='alert alert-danger' role='alert'>
                Password atau username salah!
            </div>

        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">
                    <h4>Login <a href="landing_page/index.php" style="text-decoration: none;"><span class="text-primary">SDT</span> <span class="text-secondary">Projects</span></a></h4>
                </label>
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
            </div>
            <div class="input-group mb-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required style="border-right: none;">
                <span class="input-group-text" style="background-color: transparent;border-left: none;">
                    <a type="button" class="btn btn-sm" id="read" onclick="read();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                    </a>
                    <a type="button" class="btn btn-sm" id="closepw" onclick="closepw();" style="display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                        </svg>
                    </a>
                </span>
            </div>
            <div class="mb-3">
                <label class="form-label"><a href="http://wa.me/6283873614764/?text=Hai%20Admin%20Saya%20ingin%20Bergabung%20dengan%20team%20*SDT%20Project*%20" style="text-decoration: none; font-size: 14px;">Join SDT Projects ?</a></label>
            </div>
            <div class="mb-3">
                <button class="form-control btn btn-primary" name="login">Login</button>
            </div>
        </form>
        <p style="position: absolute; bottom: 0; font-size: 9px;">SDT Projects @yanz</p>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>