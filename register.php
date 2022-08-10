<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT Prjoects | Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                Password atau username salah!
            </div>

        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">
                    <h4>Register <a href="index.html" style="text-decoration: none;"><span class="text-primary">SDT</span> <span class="text-secondary">Projects</span></a></h4>
                </label>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <label class="form-label"><a href="http://wa.me/6283873614764/?text=Hai%20Admin%20Saya%20ingin%20Bergabung%20dengan%20team%20*SDT%20Project*%20" style="text-decoration: none;">Join SDT Projects ?</a></label>
            </div>
            <div class="mb-3">
                <button class="form-control btn btn-primary" name="register">register</button>
            </div>
        </form>
    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>